:: Stashes unstaged changes
@ECHO OFF
ECHO.
ECHO  + Stashing unstaged changes...
:: Stage things that will be overwritten by build script (Config.php and /static/)
git add ../src/classes/Config.php
git add ../static
git stash --keep-index --include-untracked build-script
ECHO    ^> Done
ECHO.
