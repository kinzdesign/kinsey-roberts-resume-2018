:: Builds a static copy of html and assets for upload to S3
@ECHO OFF
ECHO.
CALL gulp critical
git add ../static 2> nul
ECHO.
