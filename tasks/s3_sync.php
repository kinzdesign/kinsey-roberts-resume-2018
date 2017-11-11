<?php

$cwd = getcwd();
require_once("$cwd/../vendor/autoload.php"); 

function sync_dir($root, $directory) {
  $dir = new DirectoryIterator($directory);
  $dirs = [];
  foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
      if($fileinfo->isDir()) {
        // queue subdirectories
        $dirs[] = $fileinfo->getPathname();
      }
      elseif($fileinfo->isFile()) {
        sync_file($root, $fileinfo);
      }
    }
  }
  // process queued subdirectories
  foreach ($dirs as $pathname) {
    sync_dir($root, $pathname);
  }
}

function sync_file($root, $fileinfo) {
  switch ($fileinfo->getExtension()) {
    # file types to skip (not upload)
    case 'gz':
    case 'map':
      break;
    # compress text-based formats
    case 'html':
    case 'js':
    case 'css':
    case 'xml':
    case 'svg':
    case 'json':
    case 'txt':
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

function s3_upload($pathname, $relative, $encoding = '') {
  $cmd = "aws s3 cp --cache-control max-age=2592000 --expires 2034-01-01T00:00:00Z {$encoding} $pathname s3://kinseyroberts.me{$relative}";
  echo str_replace('upload:', '   > uploaded:', exec($cmd)) . "\r\n";
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
  s3_upload($gzippath, $relative, '--content-encoding gzip');
  // delete gz file
  unlink($gzippath);
}

function upload_file($root, $pathname) {
  // get relative path
  $relative = relative_path($root, $pathname);
  // upload file
  s3_upload($pathname, $relative);
}

// sync static directory, recursively
$root = realpath("../static");
sync_dir($root, $root);
// ping Google with new sitemap
$ping = 'https://www.google.com/webmasters/tools/ping?sitemap=' . urlencode(Config::productionHost() . '/sitemap.xml');
echo '   > pinging Google at ' . $ping;
