&nbsp;

&nbsp;

&nbsp;

<?php
include 'db.php';
if( $_POST['Senden'])
{

    $Anzahl = $_POST['Schueler'];

    $Kursname = $_POST['Kursnm'];
    $Datum = $_POST['date'];
    $Lehrer = $_POST['lehrer'];
    $Comment = $_POST['Comment'];
    $Lektionen = $_POST['Lektionen'];


    $TookPlace = $_POST['tookplace'];
    if ($Kursname == "-Select-") {
        echo '<meta http-equiv="refresh" content="0; url=/klassenbuch-der-lehrpersonen" />';
    } else {
        if ($TookPlace == '') {
            $TookPlace = 'nein';
        }


        $isEntry2 = "Select Stattgefunden From sv_Kurshistorie Where KursID='$Kursname' and Datum='$Datum'";
        $result2 = mysqli_query($con, $isEntry2);

        while ($value3 = mysqli_fetch_array($result2)) {
            $Stattgefunden = $value3['Stattgefunden'];
        }
        if ($Stattgefunden <> '') {
            $sql_befehl2 = "UPDATE sv_Kurshistorie SET Stattgefunden='$TookPlace', Lehrer='$Lehrer', Kommentar='$Comment' , Lektionen='$Lektionen' Where KursID='$Kursname' and Datum='$Datum'  ";
        } else {
            $sql_befehl2 = "INSERT INTO sv_Kurshistorie (Datum,Stattgefunden ,KursID ,Lehrer, Kommentar,Lektionen) VALUES ('$Datum','$TookPlace','$Kursname','$Lehrer', '$Comment','$Lektionen')";
        }
	}

mysqli_query($con,$sql_befehl2);
for($x = 0; $x < $Anzahl; $x++)
{
$y=$x+1;

$ID= $_POST[$y];
$isEntry = "SELECT  Vorname, Name,Klasse From sv_Lernende Where ID='$ID'";
$result = mysqli_query($con, $isEntry);


while( $value= mysqli_fetch_array($result))
{
$Vorname=$value['Vorname'];
$Nachname=$value['Name'];
$Klassenname=$value['Klasse'];
}
$z="Comment"."$y";
$Kommentar= $_POST[$z];
$u="Dauer"."$y";
$Dauer= $_POST[$u];
//Daten in DB speichern

if ( ($Dauer<>0) or ($Kommentar<>'')) {
$isEntry1 = "SELECT  SchülerID,Datum,Kursname From sv_AbwesenheitenKompakt ";

$result1 = mysqli_query($con, $isEntry1);
$Update=0;
while( $value1= mysqli_fetch_array($result1))
{
$IDAK=$value1['SchülerID'];
$DatumAK=$value1['Datum'];
$KursnameAK=$value1['Kursname'];
if (($ID==$IDAK) and ($Datum==$DatumAK) and ($Kursname==$KursnameAK)){
$Update=1;
}

}
if ($Update==0){
$sql_befehl = "INSERT INTO sv_AbwesenheitenKompakt (Klasse, Kursname, SchülerID, Datum, Kommentar, Abwesenheitsdauer, Nachname, Vorname) VALUES ('$Klassenname','$Kursname', '$ID', '$Datum', '$Kommentar','$Dauer', '$Nachname', '$Vorname')";
//echo $sql_befehl1;
}
else{
if ($Dauer==99){
$sql_befehl = "UPDATE sv_AbwesenheitenKompakt SET Kommentar='', Abwesenheitsdauer='0' Where Kursname='$Kursname' and Datum='$Datum' and SchülerID='$ID' ";
}
else{
$sql_befehl = "UPDATE sv_AbwesenheitenKompakt SET Kommentar='$Kommentar', Abwesenheitsdauer='$Dauer' Where Kursname='$Kursname' and Datum='$Datum' and SchülerID='$ID' ";
}
}

if ((""== $Klassenname) OR (""== $Kursname) OR (""== $Datum)) {
echo "Fehler: Eintrag unvollständig. Bitte neu beginnen!";
//echo '<meta http-equiv="refresh" content="0; url=/abwesenheitseingabe-ajax" />';
}
else {
mysqli_query($con,$sql_befehl);

header('Location:'.$_SERVER['HTTP_REFERER']);
}

}
}
}
?>


&nbsp;

&nbsp;