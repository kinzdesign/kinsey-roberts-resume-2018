:: Stashes unstaged changes
@ECHO OFF
ECHO.
ECHO  + Stashing unstaged changes...
:: Config.php does wonky things if stashed
git add ../src/classes/Config.php
git stash --keep-index --include-untracked
ECHO    ^> Done
ECHO.
