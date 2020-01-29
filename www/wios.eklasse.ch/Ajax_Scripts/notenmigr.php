<?php

include 'db.php';

$isEntry= "Select * From FS19_LernenderKurs";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_array($result)) {


    $Note1 =$line2['Note1'];

    echo $KursID;
    $Note2 =$line2['Note2'];
    $Note3 =$line2['Note3'];
    $Note4 =$line2['Note4'];
    $Note5 =$line2['Note5'];
    $Note6 =$line2['Note6'];
    $Note7 =$line2['Note7'];
    $Note8 =$line2['Note8'];
    $Note9 =$line2['Note9'];

    $SchuelerID=$line2['SchülerID'];
    $KursID=$line2['KursID'];

if ($Note1<>null or $Note1<>'0') {

    $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note1,'1','Note1','$KursID', $SchuelerID)";
    mysqli_query($con, $sql_befehl2);

echo $sql_befehl2;
    }

    if ($Note2<>null or $Note2<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note2,'1','Note2','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note3<>null or $Note3<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note3,'1','Note3','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note4<>null or $Note4<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note4,'1','Note4','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note5<>null or $Note5<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note5,'1','Note5','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note6<>null or $Note6<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note6,'1','Note6',$KursID, $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note7<>null or $Note7<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note7,'1','Note7','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note8<>null or $Note8<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note8,'1','Note8','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);
    }

    if ($Note9<>null or $Note9<>'0') {

        $sql_befehl2 = "INSERT INTO FS19_Noten (Note, Gewichtung, Name, KursID,SchuelerID)
VALUES ($Note9,'1','Note9','$KursID', $SchuelerID)";
        mysqli_query($con, $sql_befehl2);

    }

}