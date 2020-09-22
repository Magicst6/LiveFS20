
<?php

include 'db.php';


$ID = $_GET[ 'k' ];
//$ID = $_GET[ 'k' ];


$isEntry = "Delete From sv_KurseStammdaten where ID ='$ID'";
mysqli_query( $con, $isEntry );
?>

