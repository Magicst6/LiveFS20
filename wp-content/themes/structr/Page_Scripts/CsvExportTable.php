<?php


include "db.php";
$isEntry1= "Select KursID,Klasse From sv_LernenderKurs";
$result3 = mysqli_query($con, $isEntry1);
$isEntry2= "Select Nachname,ID From sv_Lehrpersonen";
$result4 = mysqli_query($con, $isEntry2);
$resultKursID = array();
$resultKlasse = array();
$resultLehrperson = array();
$resultLehrpersonID = array();
while( $row3= mysqli_fetch_assoc($result3))
{
    $resultKursID[] = $row3['KursID'];
    $resultKlasse[] = $row3['Klasse'];
}
while( $row4= mysqli_fetch_assoc($result4))
{
    $resultLehrperson[] = $row4['Nachname'];
}


$arrayKursId = array_unique($resultKursID);
asort($arrayKursId);
$arrayKursId= array_merge( array_filter($arrayKursId));




$arrayKlasse = array_unique($resultKlasse);
asort($arrayKlasse);
$arrayKlasse= array_merge( array_filter($arrayKlasse));





$arrayLehrperson = array_unique($resultLehrperson);
asort($arrayLehrperson);
$arrayLehrperson= array_merge( array_filter($arrayLehrperson));




$ExportedArray = array();
$ExportedArray[0]= $arrayKursId;
$ExportedArray[1]= $arrayKlasse;
$ExportedArray[2]= $arrayLehrperson;



// serialize your input array (say $array)
foreach ($ExportedArray[0] as $value) {
    $isEntryKursID = "Select KursID From sv_KursIDStammdaten ";
    $resultKursIDarr = mysqli_query($con, $isEntryKursID);
    while ($rowKursID = mysqli_fetch_assoc($resultKursIDarr)) {
        $resultKursID[] = $rowKursID['KursID'];

    }
    $isExisting = false;
    foreach ($resultKursID as $item) {
        if ($item == $value) {
            $isExisting = true;
        }
    }
    if (!$isExisting) {
        $sql_befehl = "INSERT INTO sv_KursIDStammdaten (KursID) VALUES ('$value')";

// In die DB-Tabelle eintragen
    mysqli_query($con, $sql_befehl);
        }
}

foreach ($ExportedArray[1] as $value)
{
    $isEntryKlasse= "Select Klasse From sv_KlassenStammdaten ";
    $resultKlassenarr = mysqli_query($con, $isEntryKlasse);
    while( $rowKlassen= mysqli_fetch_assoc($resultKlassenarr))
    {
        $resultKlassen[] = $rowKlassen['Klasse'];

    }
    $isExisting=false;
    foreach ($resultKlassen as $item) {
        if ($item == $value) {
            $isExisting = true;
        }
    }
    if (!$isExisting) {
        $sql_befehl = "INSERT INTO sv_KlassenStammdaten (Klasse) VALUES ('$value')";

// In die DB-Tabelle eintragen
        mysqli_query($con, $sql_befehl);
    }
}



