@ECHO OFF 
ECHO.
ECHO ================================ BUILD PAGES ================================
ECHO.
ECHO -------------------------------- %time% --------------------------------
CALL autoload.cmd 
ECHO -------------------------------- %time% --------------------------------
CALL db_backup.cmd 
ECHO -------------------------------- %time% --------------------------------
ruby compile_assets.rb
ECHO -------------------------------- %time% --------------------------------
CALL static_pages.cmd
ECHO -------------------------------- %time% --------------------------------
CALL critical_css.cmd 
ECHO -------------------------------- %time% --------------------------------
ECHO.
ECHO ================================ PAGES BUILT ================================
ECHO.
