:: Dumps structure and contents of database to the file system
:: for inclusion in source control.
:: PREREQ: Copy /sql/mysql.cnf.blank to /sql/mysql.cnf and complete values
@ECHO OFF
ECHO.
ECHO Restoring database structure...
mysql --defaults-extra-file=..\sql\mysql.cnf ^
	--comments < ..\sql\structure.sql
ECHO Restoring database data...
mysql --defaults-extra-file=..\sql\mysql.cnf ^
	--comments < ..\sql\data.sql
ECHO.
ECHO Done!
