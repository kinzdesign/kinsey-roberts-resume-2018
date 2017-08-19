<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function download_page($path) {
  // ensure directory exists
  $dir = "../static{$path}";
  if(!file_exists($dir))  
    mkdir($dir, 0777, true);
  // download and save contents to static
  file_put_contents("../static{$path}index.html", file_get_contents("http://localhost{$path}?static=true"));
  echo "   > created /static{$path}\n";
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
  if(!$tenure->hasUrl())
    download_page("/{$tenure->type()->slug()}/{$tenure->slug()}/");
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
// build employer pages
download_page('/23andme/');
download_page('/amazon/');
download_page('/change-org/');
download_page('/facebook/');
download_page('/google/');
download_page('/microsoft/');

// copy assets
exec("xcopy /I /S /H /Y /C {$cwd}\\..\\assets {$cwd}\\..\\static\\assets");
echo "   > copied assets\n";
