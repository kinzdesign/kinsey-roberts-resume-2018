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
// build tenure-type pages
foreach (TenureType::getAll() as $type)
  download_page("/{$type->slug()}/");

// copy assets
exec("xcopy /I /S /H /Y /C {$cwd}\\..\\assets {$cwd}\\..\\static\\assets");
echo "   > copied assets\n";
