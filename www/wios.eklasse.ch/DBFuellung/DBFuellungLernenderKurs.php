<html>



<head>

    <title>Hello!</title>

</head>



<body>



<?php







if( $_POST['Speichern']){





$Kursname =  $_POST['Kursname'];

$Schueler = $_POST['Schueler'];



echo $Kursname;
    echo $Schueler;
if ($Kursname == ""  OR $Schueler =="")

{

echo "Bitte alle Felder ausfüllen";

echo '<meta http-equiv="Refresh" content="1; url=/Noteneingabe">';



}

else{





    include 'db.php';








echo "test";
$x =$_POST['count'];


$Note="Note"."$x"."m";



$NoteWert=$_POST[$Note];


    $Name="Name"."$x"."m";



    $NameWert=$_POST[$Name];

    $Gewichtung="Gewichtung"."$x"."m";



    $GewichtungWert=$_POST[$Gewichtung];

    $Datum="Datum"."$x"."m";



    $DatumWert=$_POST[$Datum];


echo $Note;




//Daten in DB speichern



$sql_befehl1 = "UPDATE sv_LernenderKurs SET Note$x = '$NoteWert', Name$x = '$NameWert' ,Gewichtung$x = '$GewichtungWert', Datum$x = '$DatumWert' WHERE KursID = '$Kursname' AND SchuelerID='$Schueler' ";

//echo $sql_befehl1;

if (("" == $Schueler)  OR(""== $Kursname)) {

echo "Fehler: Eintrag unvollständig. ";

}

else {

mysqli_query($con,$sql_befehl1);

echo "Ihr Eintrag wurde hinzugefügt. ";

}



}}








header('Location:'.$_SERVER['HTTP_REFERER']);
?>

</body>



</html>