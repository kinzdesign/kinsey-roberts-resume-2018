<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function minify_html($contents) {
  // condense tags separated by just a line break
  $contents = preg_replace('!>[\r\n]+<!', '><', $contents);
  // replace consecutive whitespace with a single space
  $contents = preg_replace('!\s+!', ' ', $contents);
  // return minified
  return $contents;
}

function download_page($path) {
  // ensure directory exists
  $dir = "../static{$path}";
  if(!file_exists($dir))  
    mkdir($dir, 0777, true);
  // download contents
  $contents = file_get_contents("http://localhost{$path}?static=true");
  // minify contents
  $contents = minify_html($contents);
  // save contents to static
  file_put_contents("../static{$path}index.html", $contents);

  echo "   > created /static{$path}\n";
}

function copy_page($from, $to) {
  // ensure directory exists
  $dir = "../static{$to}";
  if(!file_exists($dir))  
    mkdir($dir, 0777, true);
  // download and save contents to static
  copy("../static{$from}index.html", "../static{$to}index.html");
  echo "   > copied  /static{$from} to /static{$to}\n";
}

function copy_file($path) {
  copy("../{$path}", "../static/{$path}");
  echo "   > copied  /{$path} to /static/{$path}\n";

}

function endswith($haystack, $needle) {
    $h = strlen($haystack);
    $n = strlen($needle);
    if ($n > $h) return false;
    return substr_compare($haystack, $needle, $h - $n, $n) === 0;
}

// build homepage
download_page('/');
// build error page
download_page('/error/');
// build tenure-type pages
foreach (TenureType::getAll() as $type)
  download_page("/{$type->slug()}/");
// build tenure pages
foreach (Tenure::getAll() as $tenure)
  if($tenure->showLink() && !$tenure->hasUrl())
    download_page("/{$tenure->type()->slug()}/{$tenure->slug()}/");
// build projects root
download_page('/projects/');
// build project pages
foreach (Project::getAll() as $project)
  download_page("/{$project->tenure()->type()->slug()}/{$project->tenure()->slug()}/{$project->slug()}/");
// build skills root
download_page('/skills/');
// build skill-type pages
foreach (SkillType::getAll() as $type)
  download_page("/skills/{$type->slug()}/");
// build skill pages
foreach (Skill::getAll() as $skill)
  download_page("/skills/{$skill->type()->slug()}/{$skill->slug()}/");
// build PDF viewer pages
foreach ((new DirectoryIterator("$cwd/../assets/pdfs/")) as $file)
  if ($file->getExtension() == 'pdf')
    download_page('/pdf/' . substr($file->getFilename(), 0, -4) . '/');

// copy assets
exec("xcopy /I /S /H /Y /C {$cwd}\\..\\assets {$cwd}\\..\\static\\assets");
echo "   > copied  /assets/ to /static/assets/\n";

// copy root files
copy_file('favicon.ico');
copy_file('robots.txt');
copy_file('humans.txt');
