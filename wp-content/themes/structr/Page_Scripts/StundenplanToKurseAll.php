<?php
include "db.php";
$isEntryStundenplan= "Select * From sv_Kurse";
$resultStundenplan = mysqli_query($con, $isEntryStundenplan);



while( $valueStundenplan= mysqli_fetch_array($resultStundenplan)) {
    $KursID = $valueStundenplan['KursID'];
    $Tag = $valueStundenplan['Tag'];
    $Klasse = $valueStundenplan['Klasse'];
    $LP_ID = $valueStundenplan['Lehrperson'];
    $Kursname = $valueStundenplan['Kursname'];
    $Startdatum = $valueStundenplan['Startdatum'];
    $Enddatum = $valueStundenplan['Enddatum'];
    $Uhr=$valueStundenplan['Uhrzeit'];
    $Farbe=$valueStundenplan['Farbe'];
  $time= null;
    if ($Uhr== '815')
    {
        $time= "08:15:00";
    }
    else if ($Uhr== '905')
    {
        $time= "09:05:00";
    }
    else if ($Uhr== '1010')
    {
        $time= "10:10:00";
    }
    else if ($Uhr== '1100')
    {
        $time= "11:00:00";
    }
    else if ($Uhr== '1145')
    {
        $time= "11:45:00";
    }
    else if ($Uhr== '1315')
    {
        $time= "13:15:00";
    }
    else if ($Uhr== '1405')
    {
        $time= "14:05:00";
    }
    else if ($Uhr== '1510')
    {
        $time= "15:10:00";
    }
    else if ($Uhr== '1600')
    {
        $time= "16:00:00";
    }

    else if ($Uhr== '1645')
    {
        $time= "16:45:00";
    }
    else $time=$Uhr.":00";
       echo $time;
    if ($time<>null) {

        $Datum = date('Y-m-d', strtotime($Startdatum));
        $Start = date('Y-m-d H:i:s', strtotime($Startdatum. " " . $time));

        $End = date('Y-m-d H:i:s', strtotime($Start .'+45 minutes'));
        $isEntry= "Select * From sv_KurseAll";
        $result = mysqli_query($con, $isEntry);
        $isExisting=false;
        while( $value= mysqli_fetch_array($result))
        {
            if (($value['Start']==$Start) and ($value['Ende']==$End) and ($value['KursID']==$KursID))
            {
                $isExisting=true;
                echo "line already existing";
            }

        }


        $isEntryLP= "Select Nachname From sv_Lehrpersonen Where ID='$LP_ID'";
        $resultLP = mysqli_query($con, $isEntryLP);

        while( $valueLP= mysqli_fetch_array($resultLP))
        {
            $Lehrperson=$valueLP['Nachname'];
        }
        if (!$isExisting){
            $sql_befehl = "INSERT INTO sv_KurseAll (Kursname, KursID, Tag, Klasse, LP_ID,Datum, Start, Ende, Lehrperson,Farbe, Startdatum, Enddatum ) VALUES ('$Kursname','$KursID','$Tag','$Klasse','$LP_ID','$Datum','$Start','$End','$Lehrperson','$Farbe' ,'$Startdatum','$Enddatum')";

// In die DB-Tabelle eintragen
            mysqli_query($con,$sql_befehl);
        }
        $y=0;

        if ($Enddatum=='0000-00-00' || $Enddatum==null){$y=0;}
        else {

            $datetime1 = date_create($Startdatum);
            $datetime2 = date_create($Enddatum);
            $interval = date_diff($datetime1, $datetime2);
            $days= $interval->format('%R%a days');
            $weeks= intval($days/7);
            echo $weeks;
            $y=$weeks;
        }
        for ($x = 0; $x < $y; $x++) {
            echo "hddddd";
            $Datum = date('Y-m-d', strtotime($Datum . ' + 7 days'));
            $Start = date('Y-m-d H:i:s', strtotime($Start .' + 7 days'));

            $End = date('Y-m-d H:i:s', strtotime($Start .'+45 minutes'));
            $isEntry= "Select * From sv_KurseAll";
            $result = mysqli_query($con, $isEntry);
            $isExisting=false;
            while( $value= mysqli_fetch_array($result))
            {
                if (($value['Start']==$Start) and ($value['Ende']==$End) and ($value['KursID']==$KursID))
                {
                    $isExisting=true;
                    echo "line already existing";
                }

            }


            $isEntryLP= "Select Nachname From sv_Lehrpersonen Where ID='$LP_ID'";
            $resultLP = mysqli_query($con, $isEntryLP);

            while( $valueLP= mysqli_fetch_array($resultLP))
            {
                $Lehrperson=$valueLP['Nachname'];
            }
            if (!$isExisting){
                $sql_befehl = "INSERT INTO sv_KurseAll (Kursname, KursID, Tag, Klasse, LP_ID,Datum, Start, Ende, Lehrperson,Farbe, Startdatum, Enddatum ) VALUES ('$Kursname','$KursID','$Tag','$Klasse','$LP_ID','$Datum','$Start','$End','$Lehrperson','$Farbe' ,'$Startdatum','$Enddatum')";



// In die DB-Tabelle eintragen
                mysqli_query($con,$sql_befehl);
            }
        }
    }


    $Enddatum=null;
}