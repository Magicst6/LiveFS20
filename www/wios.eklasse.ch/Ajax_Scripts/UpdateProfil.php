



<?php
include 'db.php';




$Beschreibung = $_GET[ 'l' ];
$ID = $_GET[ 'm' ];
$Profil = $_GET[ 'k' ];





$isEntry = "Update sv_Profile SET Beschreibung='$Beschreibung', Profil='$Profil'  Where ID='$ID'";
 mysqli_query( $con, $isEntry);




?>