<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  Page::$showBreadcrumbs = false;
  Page::$canonicalUrl = '/search/';
  Page::renderTop('Search');
?>
<h1>Search</h1>
<script>
  (function() {
    var cx = '008993550426554016801:d51wxpkzrte';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
<style>
  input.gsc-search-button,
  .gsc-input-box {
    height: 32px !important;
    border-radius: $btn-border-radius-base;
  }

  input.gsc-search-button {
    background-image: url(https://www.google.com/uds/css/v2/search_box_icon.png) !important;
    background-repeat: no-repeat;
    background-position: center;
  }

  input.gsc-input {
    @extend .form-control;
  }

  .gsc-control-cse, .gsc-control-cse .gsc-table-result {
    font-family: $font-family-sans-serif !important;
  }
</style>
<?php Page::renderBottom();
