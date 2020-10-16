<?php



include 'db.php';

$sql_befehlD = "Delete From sv_Abwesenheiten";
mysqli_query($con,$sql_befehlD);



$isEntry1= "Select * From sv_Kurse Where 1 Order By Startdatum ASC ";
$result1 = mysqli_query($con,$isEntry1);


while ($row1 = mysqli_fetch_array($result1)) {

$Klasse =  $row1['Klasse'];
$Kursname =  $row1['KursID'];
$Startdatum = $row1['Startdatum'];

$dontFill=0;



$isEntry2= "Select Vorname, Name, ID  From sv_Lernende Where Klasse = '$Klasse' ";

$result2 = mysqli_query($con,$isEntry2);
while ($row2 = mysqli_fetch_array($result2)) {


$dontFill=0;
$Nachname= $row2['Name'];
$Vorname= $row2['Vorname'];
$SchuelerID= $row2['ID'];
$isEntry4= "Select Vorname, Nachname, SchuelerID, KursID, Datum  From sv_Abwesenheiten";
$result4 = mysqli_query($con,$isEntry4);
while ($row4 = mysqli_fetch_array($result4)) {
$NachnameAbw= $row4['Nachname'];
$VornameAbw= $row4['Vorname'];
$ID= $row4['SchuelerID'];
$KursnameAbw =  $row4['KursID'];
$StartdatumAbw =  $row4['Datum'];


if (($Nachname==$NachnameAbw) and ($Vorname==$VornameAbw) and ($SchuelerID==$ID) and ($Kursname==$KursnameAbw))
{
$dontFill=1;
}
}




if ($dontFill == 0){
$sql_befehl = "INSERT INTO sv_Abwesenheiten (Nachname, Vorname, KursID, SchuelerID, Datum) VALUES ('$Nachname', '$Vorname', '$Kursname', '$SchuelerID','$Startdatum')";
mysqli_query($con,$sql_befehl);


}}
}
$isEntry3= "Select * From sv_Kurse Where 1 Order By KursID ASC ";
$result3 = mysqli_query($con,$isEntry3);


while ($row3 = mysqli_fetch_array($result3)) {

$Klasse =  $row3['Klasse'];
$Kursname =  $row3['KursID'];
$Startdatum = $row3['Startdatum'];


$x=0;
$isEntry4= "Select KursID, Datum From sv_Kurshistorie Where KursID= '$Kursname' Order BY Datum ASC ";
$result4 = mysqli_query($con,$isEntry4);
while ($row4 = mysqli_fetch_array($result4))
{

if ($x == 0){
$wert="Datum";
$wert2="abwesend";
$wert3="kommentar";}
else{
$wert="Datum"."$x";
$wert2="abwesend"."$x";
$wert3="kommentar"."$x";
}

$KursnameKH=$row4['KursID'];
$DatumKH=$row4['Datum'];


$sql_befehl2 = "Update sv_Abwesenheiten SET $wert='$DatumKH' Where  KursID='$KursnameKH'";
mysqli_query($con,$sql_befehl2);

$isEntry5= "Select Vorname, Nachname, SchuelerID, Kursname, Datum, Klasse, Kommentar, Abwesenheitsdauer  From sv_AbwesenheitenKompakt Where Datum='$DatumKH' and Kursname='$KursnameKH' ";
$result5 = mysqli_query($con,$isEntry5);
while ($row5 = mysqli_fetch_array($result5))
{
$NachnameAK=$row5['Nachname'];
$VornameAK=$row5['Vorname'];
$SchuelerIDAK=$row5['SchuelerID'];
$KommentarAK=$row5['Kommentar'];
$DauerAK=$row5['Abwesenheitsdauer'];
$KursnameAK=$row5['Kursname'];
$DatumAK=$row5['Datum'];

$sql_befehl1 = "Update sv_Abwesenheiten SET $wert2='$DauerAK' , $wert3='$KommentarAK' Where  KursID='$KursnameKH' and SchuelerID='$SchuelerIDAK' and  $wert='$DatumKH' ";
mysqli_query($con,$sql_befehl1);
}
$x++;
}
}
?>
<meta http-equiv="refresh" content="0; url=/abwesenheiten" />

