:: Syncs static files with S3 server
@ECHO OFF
ECHO.
ECHO  + Syncing /static/ to S3...
aws s3 sync ../static s3://resume.kinzdesign.com
ECHO    ^> Done
ECHO.
