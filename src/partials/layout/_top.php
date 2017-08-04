<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
?><!DOCTYPE html>
<html lang="en">
  <head>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_head.php'); ?>
  </head>
  <body class="top-navbar-fixed">
<?php # Google Tag Manager (noscript) ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHZM4LT" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/src/partials/layout/_topnav.php'); ?>
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