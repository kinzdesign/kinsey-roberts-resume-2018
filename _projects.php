<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  Project::queueProjectsBreadcrumb();
  Page::renderTop('Projects');
  $projects = Project::getAll(' ORDER BY COALESCE(displayorder, 254), name');
  echo "          <h1>Projects</h1>\r\n";
  echo "          <ul class=\"project-list\">\r\n";
  foreach ($projects as $project) {
    echo "            <li>\r\n";
    echo "              <a href=\"{$project->url()}\" class=\"project-list-name\" data-category=\"Projects List\" data-action=\"Project Click - {$project->name()}\">\r\n";
    echo "                {$project->name()}\r\n";
    echo "              </a>\r\n";
    if($project->synopsis())
      echo "              <div class=\"project-list-synopsis\">{$project->synopsis()}</div>\r\n";
    echo "            </li>\r\n";
  }
  echo "          </ul>\r\n";

  Page::renderBottom();
