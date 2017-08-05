:: Builds a static copy of html and assets for upload to S3
@ECHO OFF
ECHO.
ECHO  + Creating static HTML files
php static_pages.php
git add ../static 2> nul
ECHO.
