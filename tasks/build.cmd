@ECHO OFF
ECHO.
ECHO ================================ BUILD SITE ================================
:: CALL stash_push.cmd 
:: ECHO ============================================================================
CALL autoload.cmd 
ECHO ============================================================================
CALL db_backup.cmd 
ECHO ============================================================================
ruby compile_assets.rb
ECHO ============================================================================
CALL static_pages.cmd
ECHO ============================================================================
CALL critical_css.cmd 
ECHO ================================ SITE BUILT ================================
ECHO.
