

<?php

include 'db.php';


$ID = $_GET[ 'k' ];
//$ID = $_GET[ 'k' ];

echo "";

$isEntry = "Delete From sv_Profile where ID ='$ID'";
mysqli_query( $con, $isEntry );
?>

