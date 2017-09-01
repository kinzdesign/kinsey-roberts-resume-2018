:: Builds a static copy of html and assets for upload to S3
@ECHO OFF
ECHO.
ECHO  + Creating static HTML files
:: delete existing files
del /q "..\static\*"
FOR /D %%p IN ("..\static\*.*") DO rmdir "%%p" /s /q
:: build new files
php static_pages.php
git add ../static 2> nul
ECHO.
