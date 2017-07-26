:: Runs 'composer install' to rebuild autoloader files
@ECHO OFF
ECHO.
ECHO  + Rebuilding Composer autoloader files...
cd ..
CALL composer install 2> nul
cd tasks
ECHO    ^> Done
ECHO.
