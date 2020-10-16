<?php
include 'db.php';
//Kurse des ausgewählten Schülers anzeigen

$Schueler=$_GET['q'];





preg_match("/:(.*)/", $Schueler, $output_array);
$Schueler=$output_array[1];
$inhalt = $Schueler;
$handle = fopen ("schueler.txt", w);
fwrite ($handle, $inhalt);
fclose ($handle);
$y=0;


$isEntry= "Select KursID From sv_LernenderKurs Where SchuelerID = $Schueler";
$result = mysqli_query($con,$isEntry);


echo "<option>" . ' ' . "</option>";

while( $line2= mysqli_fetch_array($result))
{



    $value = $line2['KursID'];
    if ($value<>"") echo "<option>" . $value . "</option>";


}




?>

