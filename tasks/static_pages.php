<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function download_page($path) {
  // ensure directory exists
  $dir = "../static{$path}";
  if(!file_exists($dir))  
    mkdir($dir);
  // download and save contents to static
  file_put_contents("../static{$path}index.html", file_get_contents("http://localhost{$path}?static=true"));
  echo "   > created /static{$path}\n";
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
  download_page("/{$tenure->type()->slug()}/{$tenure->slug()}/");
// build project pages
foreach (Project::getAll() as $project) {
  download_page("/{$project->tenure()->type()->slug()}/{$project->tenure()->slug()}/{$project->slug()}/");
  download_page("/projects/{$project->slug()}/");
}
// build skills root
download_page('/skills/');
// build skill-type pages
foreach (SkillType::getAll() as $type)
  download_page("/skills/{$type->slug()}/");
// build skill pages
foreach (Skill::getAll() as $skill)
  download_page("/skills/{$skill->type()->slug()}/{$skill->slug()}/");

// copy assets
exec("xcopy /I /S /H /Y /C {$cwd}\\..\\assets {$cwd}\\..\\static\\assets");
echo "   > copied assets\n";
