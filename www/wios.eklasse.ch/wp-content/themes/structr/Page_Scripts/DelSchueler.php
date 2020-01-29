
<?php

include 'db.php';

$y = 0;
$ID = $_GET[ 'k' ];
//$ID = $_GET[ 'k' ];


$isEntry = "Delete * From sv_Lernende where ID ='$ID'";
mysqli_query( $con, $isEntry );
?>