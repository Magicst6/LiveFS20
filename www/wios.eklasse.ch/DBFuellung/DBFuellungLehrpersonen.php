<html>

<head>
    <title>Hello!</title>
</head>

<body>

<?php



if( $_POST['Senden']){


$Lehrer = $_POST['lehrer'];
preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];


if ( $Lehrer =="")
{
echo "Bitte alle Felder ausfüllen";
//echo '<meta http-equiv="Refresh" content="1; url=http://schulverwaltungheimtest.ch/kurselehrpersonen">';

}
else{


    include 'db.php';
echo $Klasse;

$isdouble=0;

for($x = 1; $x <= 30; $x++)
{
$Kurs="Kurs"."$x";

$wert=$_POST[$Kurs];


$isEntry2 = "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30,Nachname From sv_Lehrpersonen Where ID != '$Lehrer' ";
$result2 = mysqli_query($con, $isEntry2);

while( $value3= mysqli_fetch_array($result2))
{

for($y = 1; $y <= 30; $y++)
{
$Kurs1="Kurs"."$y";
$dbwert=$value3[$Kurs1];


if (($dbwert==$wert) and ($wert<>''))
{
$isdouble=1;
echo '<script type="text/javascript">alert("Ein Kurs wurde zwei verschiedenen Lehrern zugeordnet. Bitte das Formular nochmal korrekt ausfüllen "); window.location.href = "\ksdlpsc";</script>';
//header('Location:'.$_SERVER['HTTP_REFERER']);


}
}
}
}
if ($isdouble==0){
	$isdouble1=0;
for($x = 1; $x <= 30; $x++)
{
$Kurs="Kurs"."$x";

$wert=$_POST[$Kurs];
	
	
	   $isEntryCheck= "Select * From sv_Kurse where Lehrperson='$Lehrer' and KursID='$wert'";

    $resultCheck = mysqli_query($con, $isEntryCheck);







    while( $valueCheck= mysqli_fetch_array($resultCheck)) {
		
		 $isEntryCheck1= "Select * From sv_Kurse where Lehrperson='$Lehrer'";

    $resultCheck1 = mysqli_query($con, $isEntryCheck1);



        



    while( $valueCheck1= mysqli_fetch_array($resultCheck1)) {
		
		//  echo $Lehrer;
		
		if (($wert<>$valueCheck1['KursID']) and  ($valueCheck['Uhrzeit']==$valueCheck1['Uhrzeit']) and ($valueCheck['Tag']==$valueCheck1['Tag']) )
		{
			echo "Kurs ".$wert." ist an diesem Tag(".$valueCheck['Tag'].") und dieser Uhrzeit(".$valueCheck['Uhrzeit'].") nicht möglich, da der Lehrer bereits einen Kurs zu diesem Zeitpunkt hat! Bitte korrigieren und aktion nochmals ausführen!";
			
     
			$isdouble1=1;
		}
		
		
	}
	}
if ($isdouble1<>1){
//Prüfen ob das Feld Kurs bereits befüllt ist und leer überschrieben werden muss

$kursaktuell = "Select $Kurs, Nachname From sv_Lehrpersonen Where ID = '$Lehrer' ";
$result3 = mysqli_query($con, $kursaktuell);
while( $line= mysqli_fetch_assoc($result3))
{

    $Lehrperson=$line['Nachname'];
    $dbwert = $line[$Kurs];
    $isEntry3 = "Select KursID From sv_KurseAll where KursID='$dbwert'";
    $result3 = mysqli_query($con, $isEntry3);

    while( $value4= mysqli_fetch_array($result3))
    {
        $KursID=$value4['KursID'];
        
            $updateKALL = "UPDATE sv_KurseAll SET LP_ID = '$Lehrer', Lehrperson = '$Lehrperson'  where KursID ='$wert' ";
            
            if($wert == ""){
                $updateKALL = "UPDATE sv_KurseAll SET LP_ID = '', Lehrperson = ''  where KursID ='$dbwert' ";
            }
            if ("" == $Lehrer)  {
                echo "Fehler: Eintrag unvollständig. ";
            }
            else {

                mysqli_query($con,$updateKALL);
             //   echo "Ihr Eintrag wurde hinzugefügt. ";
            }
        }
    

}


//Daten in DB speichern

$sql_befehl1 = "UPDATE sv_Lehrpersonen SET $Kurs = '$wert'  where ID ='$Lehrer' ";
//echo $sql_befehl1;

//Update der Lehrperson Kurse

$sql_befehl2 = "UPDATE sv_Kurse SET Lehrperson = '$Lehrer'  where KursID ='$wert' ";

$sql_befehl21 = "UPDATE sv_Kurse SET Lehrperson = ''  where KursID ='$dbwert' ";
//Leer überschreiben von Kursen, die neu leer sind
$sql_befehl3 = "UPDATE sv_Kurse SET Lehrperson = ''  where KursID ='$dbwert;' ";


//Update der Lehrperson Extrakurse



//Prüfungen wann welches Update ausgeführt wird

if ("" == $Lehrer)  {
echo '<script type="text/javascript">alert("Eintrag unvollständig"); window.location.href = "\ksdlpsc";</script>';
}
else {
mysqli_query($con,$sql_befehl1);
//echo "Ihr Eintrag wurde hinzugefügt. ";
}
if ("" == $wert )  {
    mysqli_query($con,$sql_befehl21);
}
else {
mysqli_query($con,$sql_befehl2);
mysqli_query($con,$sql_befehl4);

//echo "Ihr Eintrag wurde hinzugefügt. ";

}
if ($wert != $dbwert && "" != $dbwert)  {
mysqli_query($con,$sql_befehl3);
mysqli_query($con,$sql_befehl31);
//echo "Ihr Eintrag wurde hinzugefügt. ";

}
else {

//echo "Fehler: Eintrag unvollständig. ";


}}}}}


}
if ($isdouble1==1){
	
			
			echo "<a href='/ksdlpsc/;'>[Zurück]</a>";
	}

	if ($isdouble1<>1){
	echo '<script>window.location.href = "\ksdlpsc";</script>';
	}
	?>
</body>
</html>