:: Restores stashed changes
@ECHO OFF
ECHO.
ECHO  + Restoring stashed changes...
git stash pop build-script
ECHO    ^> Done
ECHO.
