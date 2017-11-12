<?php 
  require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
  $slug = Page::$params['pdf'];
  // get file path
  $path = "{$_SERVER['DOCUMENT_ROOT']}/assets/pdfs/{$slug}.pdf";
  if(!file_exists($path)) {
    // handle 404
    Page::error(404, "We could not find a PDF with slug '{$slug}'.", "Not Found");
  } else { // output contents
    // use stripped-down CSS and JS
    Page::$cssFile = false;
    Page::$jsJQuery = false;
    Page::$jsResume = false;
    Page::$canonicalUrl = "/pdf/{$slug}/";
    // per-document page titles
    $docName = false;
    switch ($slug) {
      case 'bs-biology-transcript':
        $docName = 'Undergraduate Transcript - BS Biology';
        break;
      case 'furniture-inventory-scan-sheet':
        $docName = 'Furniture Inventory Scan Sheet';
        break;
      case 'ms-computer-science-transcript':
        $docName = 'Masters Transcript - MS Computer Science';
        break;
      case 'non-degree-transcript':
        $docName = 'Non-Degree Studies Transcript';
        break;
    }
    if($docName) {
      Page::$title = "$docName | PDF Viewer";
      $linkText = "Download <strong>$docName</strong> as PDF";
    } else {
      Page::$title = 'PDF Viewer';
      $linkText = 'Download PDF';
    }
?><!DOCTYPE html>
<html lang="en">
<head>
<?php Page::renderPartial('layout', 'head'); ?>
<style><?php echo(file_get_contents(getcwd().'\assets\css\pdf-viewer.min.css')); ?></style>
</head>
<body>
<?php Page::renderPartial('layout', 'gtm-body'); ?>
  <div class="wrapper">
<?php echoBanner($slug, $linkText, $docName); ?>
    <div class="main">
      <iframe src="http://docs.google.com/gview?url=<?php echo Config::hostUrl() . "/assets/pdfs/{$slug}"; ?>.pdf&amp;embedded=true" frameborder="0"></iframe>
    </div>
<?php echoBanner($slug, $linkText, $docName); ?>
  </div>
<?php Page::renderPartial('layout', 'scripts'); ?>
</body>
</html><?php }

function echoBanner($slug, $linkText, $docName) { ?>
    <div class="banner">
      <a href="/assets/pdfs/<?php echo $slug; ?>.pdf" target="_blank" rel="noopener" data-category="PDF Viewer" data-action="Download Click<?php if(isset($docName) && $docName) echo " - {$docName}"; ?>">
        <p>
          <i class="fa fa-fw fa-download" aria-hidden="true"></i>
          <?php echo $linkText; ?>
          <i class="fa fa-fw fa-file-pdf-o" aria-hidden="true"></i>
        </p>
      </a>
    </div>
<?php }