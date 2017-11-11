<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function sync_dir($root, $directory) {
  $dir = new DirectoryIterator($directory);
  foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
      if($fileinfo->isDir()) {
        sync_dir($root, $fileinfo->getPathname());
      }
      elseif($fileinfo->isFile()) {
        sync_file($root, $fileinfo);
      }
    }
  }
}

function sync_file($root, $fileinfo) {
  switch ($fileinfo->getExtension()) {
    # do nothing for gzip files
    case 'gz':
      break;
    # compress text-based formats
    case 'html':
    case 'js':
    case 'css':
    case 'map':
    case 'xml':
    case 'svg':
    case 'json':
      gzip_file($root, $fileinfo->getPathname());
      break;
    # upload binary files as-is
    default:
      upload_file($root, $fileinfo->getPathname());
      break;
  }
}

function relative_path($root, $pathname) {
  return str_replace('\\','/',str_replace($root, '', $pathname));
}

function echo_exec($cmd) {
  echo str_replace('upload:', '   > uploaded:', exec($cmd));
  echo "\r\n";
}

function gzip_file($root, $pathname) {
  // build gz file path
  $gzippath = "$pathname.gz";
  // open the gz file (w9 = highest compression)
  $fp = gzopen($gzippath, 'w9');
  // compress the file
  gzwrite ($fp, file_get_contents($pathname));
  // close the gz file
  gzclose($fp);
  // get relative path
  $relative = relative_path($root, $pathname);
  // upload gz file
  echo_exec("aws s3 cp --content-encoding gzip $gzippath s3://kinseyroberts.me{$relative}");
  // delete gz file
  unlink($gzippath);
}

function upload_file($root, $pathname) {
  // get relative path
  $relative = relative_path($root, $pathname);
  // upload file
  echo_exec("aws s3 cp $pathname s3://kinseyroberts.me{$relative}");
}

$root = realpath("../static");
sync_dir($root, $root);
