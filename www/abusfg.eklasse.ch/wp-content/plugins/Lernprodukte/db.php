

<?php
$con = @mysqli_connect("heimmart.mysql.db.internal", "heimmart_abu", "Triangl123");

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//echo 'Connected to MySQL';
$verbunden=mysqli_select_db($con, "heimmart_abusfgeklasse");
if($verbunden)
//echo('DB-Verbindung hergestellt! ');
    $dummy=1;
else
    die('DB-Verbindung fehlgeschlagen! ');

?>



