:: Uploads html and assets to S3
@ECHO OFF
ECHO.
ECHO  + Uploading static contents to S3
php s3_sync.php
ECHO  + Done!
ECHO.
