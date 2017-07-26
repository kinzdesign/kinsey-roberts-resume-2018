:: Dumps structure and contents of database to the file system
:: for inclusion in source control.
:: PREREQ: Copy /sql/mysql.cnf.blank to /sql/mysql.cnf and
::         edit config under [mysqldump] block
@ECHO OFF
ECHO.
ECHO  + Dumping database structure...
mysqldump --defaults-extra-file=..\sql\mysql.cnf ^
  --routines -d --skip-dump-date ^
  --databases %DB_DATABASE% | sed ^
  -e "/-- MySQL dump /d" ^
  -e "/!50003 SET sql_mode/d" ^
  -e "/Host: .* Database: /d" ^
  -e "/Server version/d" ^
  -e "/Dumping routines for database /d" ^
  -e "s$VALUES ($VALUES\n  ($g" ^
  -e "s$),($),\n  ($g" ^
  -e "s/DEFINER[ ]*=[ ]*[\*]*FUNCTION/FUNCTION/" ^
  -e "s/DEFINER[ ]*=[ ]*[\*]*PROCEDURE/PROCEDURE/" ^
  -e "s/AUTO_INCREMENT=[0-9]*\s*//" ^
  -e "s/DEFINER[ ]*=[ ]*[\*]*\*/\*/" ^
  -e "s/`resume`\.//g" > ..\sql\structure.sql
git add ..\sql\structure.sql
ECHO    ^> Wrote to sql/structure.sql
ECHO  + Dumping data...
mysqldump --defaults-extra-file=..\sql\mysql.cnf ^
  --no-create-info --skip-dump-date ^
  --databases %DB_DATABASE% | sed ^
  -e "/-- MySQL dump /d" ^
  -e "/!50003 SET sql_mode/d" ^
  -e "/Host: .* Database: /d" ^
  -e "/Server version/d" ^
  -e "/Dumping routines for database /d" ^
  -e "s$VALUES ($VALUES\n  ($g" ^
  -e "s$),($),\n  ($g" ^
  -e "s/`resume`\.//g" > ..\sql\data.sql
git add ..\sql\data.sql
ECHO    ^> Wrote to sql/data.sql
ECHO.
