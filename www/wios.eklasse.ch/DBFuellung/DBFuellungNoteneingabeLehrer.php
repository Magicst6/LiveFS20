<html>



<head>

    <title>Hello!</title>

</head>



<body>



<?php







if( $_POST['Senden']){





$Kursname =  $_POST['Kursname'];

$Schueler = $_POST['Schueler'];

preg_match("/:(.*)/", $Schueler, $output_array);

$Schueler=$output_array[1];



if ($Kursname == ""  OR $Schueler =="")

{

echo "Bitte alle Felder ausfüllen";

//echo '<meta http-equiv="Refresh" content="1; url=https://schulverwaltungheimtest.ch/Noteneingabe">';



}

else{



    include 'db.php';

echo $Klasse;











for($x = 0; $x <= 9; $x++)

{

if ($x == 0){}

else{

$Note="Note"."$x";



$wert=$_POST[$Note];

//Daten in DB speichern



$sql_befehl1 = "UPDATE sv_LernenderKurs SET $Note = '$wert' WHERE KursID = '$Kursname' AND SchuelerID='$Schueler' ";

//echo $sql_befehl1;

if (("" == $Schueler)  OR(""== $Kursname)) {

echo "Fehler: Eintrag unvollständig. ";

}

else {

mysqli_query($con,$sql_befehl1);

// echo "Ihr Eintrag wurde hinzugefügt. ";

}



}}}

echo '<meta http-equiv="refresh" content="0; url=/Noteneingabe-lehrer" />';



}



?>

</body>

</html>