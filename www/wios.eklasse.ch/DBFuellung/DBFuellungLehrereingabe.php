&nbsp;

&nbsp;

&nbsp;

<?php
include 'db.php';
if( $_POST['Senden'])
{
$AnzahlSch = $_POST['AnzahlSch'];

for($x = 0; $x < $AnzahlSch; $x++)
{
$Vorname = $_POST['Vorname'.$x];
$Nachname = $_POST['Nachname'.$x];
$EMail = $_POST['EMail'.$x];
$Loginname = $_POST['Loginname'.$x];
$User_ID = $_POST['User_ID'.$x];


//Daten in DB speichern
$sql_befehl = "INSERT INTO sv_Lehrpersonen (Nachname, Vorname, Loginname, EMAIL, User_ID) VALUES ('$Nachname', '$Vorname','$Loginname', '$EMail', '$User_ID')";
//echo $sql_befehl1;
if (("" == $Vorname) OR (""== $Nachname) ) {
echo "Fehler: Eintrag unvollständig. Bitte neu beginnen!";
//echo '<meta http-equiv="refresh" content="0; url=http://schulverwaltungheimtest.ch/klassenverwaltung" />';

}
else {
mysqli_query($con,$sql_befehl);
//echo "Eintrag hinzugefügt.";
echo '<meta http-equiv="refresh" content="0; url=/lehrerverwaltung" />';


}
}
}
?>

&nbsp;

&nbsp;