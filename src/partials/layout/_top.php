<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
?><!DOCTYPE html>
<html lang="en">
  <head>
<?php Page::renderPartial('layout', 'head'); ?>
  </head>
  <body class="top-navbar-fixed">
<?php Page::renderPartial('layout', 'gtm-body'); ?>
<?php Page::renderPartial('layout', 'topnav'); ?>
    <div class="container">
<?php if(Page::$showSidebar) { ?>
      <div class="row row-offcanvas row-offcanvas-right">
        <main class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
<?php } else { ?>
      <div class="row">
        <main class="col-xs-12">
<?php }
      if(Page::$showBreadcrumbs && count(Page::$breadcrumbs) > 0)
        Page::renderPartial('layout', 'breadcrumbs');