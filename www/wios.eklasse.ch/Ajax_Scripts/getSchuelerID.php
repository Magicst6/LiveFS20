<?php
include 'db.php';
$Schueler = $_GET['q'];
 
	 preg_match("/:(.*)/", $Schueler, $output_array);
    $Schueler=$output_array[1];
        echo $Schueler;
?>
