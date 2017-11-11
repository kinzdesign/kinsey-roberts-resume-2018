:: Builds a static copy of html and assets for upload to S3
@ECHO OFF
ECHO.
ECHO  + Inlining critical path CSS
ECHO    ^> Non-skills
CALL gulp --max-old-space-size=8192 --optimize-for-size --max-executable-size=8192  --max_old_space_size=8192 --optimize_for_size --max_executable_size=8192 critical-non-skills
ECHO    ^> Skills A-I
CALL gulp --max-old-space-size=8192 --optimize-for-size --max-executable-size=8192  --max_old_space_size=8192 --optimize_for_size --max_executable_size=8192 critical-skills-a-i
ECHO    ^> Skills J-Z
CALL gulp --max-old-space-size=8192 --optimize-for-size --max-executable-size=8192  --max_old_space_size=8192 --optimize_for_size --max_executable_size=8192 critical-skills-j-z
git add ../static 2> nul
ECHO.
