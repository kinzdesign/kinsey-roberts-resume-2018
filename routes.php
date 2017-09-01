<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

  require_once($_SERVER['DOCUMENT_ROOT'] . getScriptForRoute());
  
  // wrap routing in a function so return can be used instead of nested ifs
  function getScriptForRoute()
  {
    // if no first argument (homepage), show full resume
    if(!isset($_GET['arg1']) || !$_GET['arg1'])
      return '/_tenures.php';
    // process first argument
    $arg1 = $_GET['arg1'];
    // handle skills
    if ($arg1 == 'skills')
    {
      // if present, second argument is skill type
      if(isset($_GET['arg2']))
      {
        Page::$params['skill-type'] = $_GET['arg2'];
        // if present, third argument is skill and this is a skill page
        if(isset($_GET['arg3']))
        {
          Page::$params['skill'] = $_GET['arg3'];
          return '/_skill.php';
        }
      }
      // if only one or two arguments, list skills
      return '/_skills.php';
    }
    // handle PDF viewers
    else if ($arg1 == 'pdf') {
      Page::$params['pdf'] = $_GET['arg2'];
      return '/_pdf.php';
    }
    // handle privacy page
    else if ($arg1 == 'privacy') {
      return '/_privacy.php';
    }
    // otherwise, first arg is tenure type
    else
    {
      Page::$params['tenure-type'] = $arg1;
      // if present, second argument is tenure
      if(isset($_GET['arg2']))
      {
        Page::$params['tenure'] = $_GET['arg2'];
        // if present, third argument is project and this is a project page
        if(isset($_GET['arg3']))
        {
          Page::$params['project'] = $_GET['arg3'];
          return '/_project.php';
        }
        // otherwise, it's just a tenure page
        return '/_tenure.php';
      }
      // if only one argument, list tenures
      return '/_tenures.php';
    }

  }
