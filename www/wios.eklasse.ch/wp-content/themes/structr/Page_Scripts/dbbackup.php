
<?php include "../../../../wp-config.php";?>
<?php include "../../../../Eklasse_DB.php";?>
<?php
$dbhost = DB_HOST;
$dbuser =  DB_USER_EKL;
$dbpassword =  DB_PASSWORD_EKL;
$dbname =  DB_NAME_EKL;
 
$dumpfile = "backups/" . $dbname . "_" . date("Y-m-d_H-i-s") . ".sql";
 
echo "Start dump\n";
exec("mysqldump --user=$dbuser --password=$dbpassword --host=$dbhost $dbname > $dumpfile");
echo "-- Dump completed -- ";
echo $dumpfile;


