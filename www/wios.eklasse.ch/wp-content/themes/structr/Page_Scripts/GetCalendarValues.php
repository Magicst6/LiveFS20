<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */
include 'db.php';
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];

$y=0;
$userID=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];

preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

if ($userID=="1000000" and $KlasseInput == "" and $Lehrer == "") {
    $isEntry = "Select * From sv_KurseAll";
    $result = mysqli_query($con, $isEntry);
    $events = array();


    while ($line2 = mysqli_fetch_array($result)) {
        $data[] = array(
            'id' => $line2['ID'],
            'resourceId' => $line2['Zimmer'],
            'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
            'start' => $line2['Start'],
            'end' => $line2['Ende'],
            'color' => $line2['Farbe'],
            'zimmer' => $line2['Zimmer'],
            'klasse' => $line2['Klasse'],
            'kursname' => $line2['Kursname'],
            'kursid' => $line2['KursID'],
            'lehrperson' => $line2['Lehrperson']);


    }
    echo json_encode($data);
}
else {
    if ($KlasseInput == "" and $Lehrer == "") {

        $isEntry1 = "Select ID From sv_Lehrpersonen where User_ID=$userID";
        $result1 = mysqli_query($con, $isEntry1);

        while ($line1 = mysqli_fetch_array($result1)) {
            $LP_ID = $line1['ID'];

        }
        if ($LP_ID) {
            $isEntry = "Select * From sv_KurseAll Where LP_ID = $LP_ID ";
            $result = mysqli_query($con, $isEntry);


            while ($line2 = mysqli_fetch_array($result)) {
                $data[] = array(
                    'id' => $line2['ID'],
                    'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
                    'start' => $line2['Start'],
                    'end' => $line2['Ende'],
                    'color' => $line2['Farbe'],
                    'zimmer' => $line2['Zimmer'],
                    'klasse' => $line2['Klasse'],
                    'kursname' => $line2['Kursname'],
                    'kursid' => $line2['KursID'],
                    'lehrperson' => $line2['Lehrperson']);


            }
            echo json_encode($data);
        } // Output json for our calendar

        else {
            $isEntryLP = "Select Modul1,Modul2,Modul3,Modul4,Modul5,Modul6,Modul7,Modul8,Modul9,Modul10,Modul11,Modul12 From sv_LernendeModule Where User_ID =$userID";
            $resultLP = mysqli_query($con, $isEntryLP);

            while ($line1 = mysqli_fetch_array($resultLP)) {
                for ($x = 1; $x <= 12; $x++) {
                    $Modul = "Modul" . "$x";

                    $wert = $line1[$Modul];

                    if ($wert <> "") {
                        $isEntry = "Select * From sv_KurseAll Where Klasse='$wert' ";
                        $result = mysqli_query($con, $isEntry);


                        while ($line2 = mysqli_fetch_array($result)) {
                            $data[] = array(
                                'id' => $line2['ID'],
                                'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
                                'start' => $line2['Start'],
                                'end' => $line2['Ende'],
                                'color' => $line2['Farbe'],
                                'zimmer' => $line2['Zimmer'],
                                'klasse' => $line2['Klasse'],
                                'kursname' => $line2['Kursname'],
                                'kursid' => $line2['KursID'],
                                'lehrperson' => $line2['Lehrperson']);


                        }

                    }

                }
                echo json_encode($data);
            }

        }
    }
    if ($Lehrer <> "" and $KlasseInput == "") {

        $isEntry = "Select * From sv_KurseAll Where LP_ID = $Lehrer ";
        $result = mysqli_query($con, $isEntry);


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
                'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
                'start' => $line2['Start'],
                'end' => $line2['Ende'],
                'color' => $line2['Farbe'],
                'zimmer' => $line2['Zimmer'],
                'klasse' => $line2['Klasse'],
                'kursname' => $line2['Kursname'],
                'kursid' => $line2['KursID'],
                'lehrperson' => $line2['Lehrperson']);


        }
        echo json_encode($data);
        // Output json for our calendar
    }
    if ($KlasseInput <> "" and $Lehrer == "") {
        $isEntry = "Select * From sv_KurseAll Where Klasse='$KlasseInput'";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
                'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
                'start' => $line2['Start'],
                'end' => $line2['Ende'],
                'color' => $line2['Farbe'],
                'zimmer' => $line2['Zimmer'],
                'klasse' => $line2['Klasse'],
                'kursname' => $line2['Kursname'],
                'kursid' => $line2['KursID'],
                'lehrperson' => $line2['Lehrperson']);


        }
        echo json_encode($data);

    }
    if ($KlasseInput <> "" and $Lehrer <> "") {
        $isEntry = "Select * From sv_KurseAll Where Klasse='$KlasseInput' AND LP_ID='$Lehrer'";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
                'title' => $line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'],
                'start' => $line2['Start'],
                'end' => $line2['Ende'],
                'color' => $line2['Farbe'],
                'zimmer' => $line2['Zimmer'],
                'klasse' => $line2['Klasse'],
                'kursname' => $line2['Kursname'],
                'kursid' => $line2['KursID'],
                'lehrperson' => $line2['Lehrperson']);


        }
        echo json_encode($data);
    }


}
?>





