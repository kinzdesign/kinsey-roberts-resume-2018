<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
?><!DOCTYPE html>
<html lang="en">
  <head>
<?php Page::renderPartial('layout', 'head'); ?>
  </head>
  <body class="top-navbar-fixed" itemscope itemtype="http://schema.org/Person">
<?php Page::renderPartial('layout', 'gtm-body'); ?>
<?php Page::renderPartial('layout', 'topnav'); ?>
    <div class="container">
<?php if(Page::showSidebar()) { 
        if(Page::$offCanvasSidebar) { ?>
      <div class="row row-offcanvas row-offcanvas-right">
        <main class="col-xs-12 col-sm-8 col-md-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-warning btn-xs btn-offcanvas" data-toggle="offcanvas">Skills</button>
          </p>
<?php   } else { ?>
      <div class="row">
        <main class="col-xs-12 col-sm-8 col-md-9">
<?php   } ?>
<?php } else { ?>
      <div class="row">
        <main class="col-xs-12">
<?php }
      if(Page::$showBreadcrumbs && count(Page::$breadcrumbs) > 0)
        Page::renderPartial('layout', 'breadcrumbs');