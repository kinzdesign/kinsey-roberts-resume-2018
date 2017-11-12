<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function minify_html($contents) {
  if(Config::minifyHtml()) {
    // condense tags separated by just a line break
    $contents = preg_replace('!>[\r\n]+<!', '><', $contents);
    // replace consecutive whitespace with a single space
    $contents = preg_replace('!\s+!', ' ', $contents);
  }
  return $contents;
}

function download_page($sitemap, $w3cTime, $path, $priority) {
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
  // add to sitemap
  return $sitemap . "<url><loc>".Config::productionHost()."{$path}</loc><lastmod>{$w3cTime}</lastmod><priority>{$priority}</priority></url>";
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

// begin sitemap XML
$sitemap = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
// get timestamp in proper format
$w3cTime = Config::getBuildTimeW3C();

// build homepage
$sitemap = download_page($sitemap, $w3cTime, '/', '1.0');
// build error page
$sitemap = download_page($sitemap, $w3cTime, '/error/', '0.0');
// build privacy page
$sitemap = download_page($sitemap, $w3cTime, '/privacy/', '0.0');
// build search page
$sitemap = download_page($sitemap, $w3cTime, '/search/', '0.0');
// build tenure-type pages
foreach (TenureType::getAll() as $type)
  $sitemap = download_page($sitemap, $w3cTime, "/{$type->slug()}/", 0.8);
// build tenure pages
foreach (Tenure::getAll() as $tenure)
  if($tenure->showLink() && !$tenure->hasUrl())
    $sitemap = download_page($sitemap, $w3cTime, "/{$tenure->type()->slug()}/{$tenure->slug()}/", 0.6);
// build projects root
$sitemap = download_page($sitemap, $w3cTime, '/projects/', 0.7);
// build project pages
foreach (Project::getAll() as $project)
  $sitemap = download_page($sitemap, $w3cTime, "/{$project->tenure()->type()->slug()}/{$project->tenure()->slug()}/{$project->slug()}/", 0.5);
// build skills root
$sitemap = download_page($sitemap, $w3cTime, '/skills/', 0.7);
// build skill-type pages
foreach (SkillType::getAll() as $type)
  $sitemap = download_page($sitemap, $w3cTime, "/skills/{$type->slug()}/", 0.4);
// build skill pages
foreach (Skill::getAll() as $skill)
  $sitemap = download_page($sitemap, $w3cTime, "/skills/{$skill->type()->slug()}/{$skill->slug()}/", 0.3);
// build PDF viewer pages
foreach ((new DirectoryIterator("$cwd/../assets/pdfs/")) as $file)
  if ($file->getExtension() == 'pdf')
    $sitemap = download_page($sitemap, $w3cTime, '/pdf/' . substr($file->getFilename(), 0, -4) . '/', 0.6);

// write and stage sitemap
file_put_contents("../sitemap.xml", $sitemap .= '</urlset>');
exec("git add ..\\sitemap.xml");

// copy assets
exec("xcopy /I /S /H /Y /C {$cwd}\\..\\assets {$cwd}\\..\\static\\assets");
echo "   > copied  /assets/ to /static/assets/\n";

// copy root files
copy_file('favicon.ico');
copy_file('robots.txt');
copy_file('humans.txt');
copy_file('sitemap.xml');

// stage static directory
exec("git add ..\\static\\");
