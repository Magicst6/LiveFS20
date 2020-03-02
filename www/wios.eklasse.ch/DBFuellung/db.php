<?php include "../wp-config.php";?>
<?php include "../Eklasse_DB.php";?>

<?php
$con = @mysqli_connect(DB_HOST, DB_USER_EKL, DB_PASSWORD_EKL);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//echo 'Connected to MySQL';
$verbunden=mysqli_select_db($con, DB_NAME_EKL);
if($verbunden)
//echo('DB-Verbindung hergestellt! ');
    $dummy=1;
else
    die('DB-Verbindung fehlgeschlagen! ');

?>

<?php
$con1 = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$con1) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//echo 'Connected to MySQL';
$verbunden=mysqli_select_db($con1, DB_NAME);
if($verbunden)
//echo('DB-Verbindung hergestellt! ');
    $dummy=1;
else
    die('DB-Verbindung fehlgeschlagen! ');

date_default_timezone_set('CET');

global $current_user;

get_currentuserinfo();

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$UserID=$current_user->ID;

$Zeit= date("Y-m-d H:i:s");

$sql_befehl = "INSERT INTO sv_Log (URL,User_ID,Datum) VALUES ('$actual_link','$UserID','$Zeit')";

mysqli_query($con, $sql_befehl);

                
?>

