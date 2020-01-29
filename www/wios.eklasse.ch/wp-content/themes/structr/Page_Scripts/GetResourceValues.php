<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */

$con = @mysqli_connect('9b1qp.myd.infomaniak.com', "9b1qp_heimmart", "St1180!!ST");

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//echo 'Connected to MySQL';


$verbunden=mysqli_select_db($con, "9b1qp_heimmart_test");
if($verbunden)
    echo '';
else
    die('DB-Verbindung fehlgeschlagen! ');
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];

$y=0;
$userID=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];

preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

if ($userID=="1000000") {
    $isEntry = "Select * From sv_KurseAll  Order by Zimmer Asc";
    $result = mysqli_query($con, $isEntry);
    $events = array();


    while ($line2 = mysqli_fetch_array($result)) {
        $data[] = array(
            'id' =>  $line2['Zimmer'],
            'title' => "Zimmer: " . $line2['Zimmer']);



    }
    echo json_encode($data);
}
else {
    if ($KlasseInput == "" and $Lehrer == "") {

        $isEntry1 = "Select ID From sv_Lehrpersonen where User_ID=$userID  Order by Zimmer Asc";
        $result1 = mysqli_query($con, $isEntry1);

        while ($line1 = mysqli_fetch_array($result1)) {
            $LP_ID = $line1['ID'];

        }
        if ($LP_ID) {
            $isEntry = "Select * From sv_KurseAll Where LP_ID = $LP_ID ";
            $result = mysqli_query($con, $isEntry);


            while ($line2 = mysqli_fetch_array($result)) {
                $data[] = array(
                    'id' =>  $line2['Zimmer'],
                    'title' => "Zimmer: " . $line2['Zimmer']);


            }
            echo json_encode($data);
        } // Output json for our calendar

        else {
            $isEntryLP = "Select Modul1,Modul2,Modul3,Modul4,Modul5,Modul6,Modul7,Modul8,Modul9,Modul10,Modul11,Modul12 From sv_LernendeModule Where User_ID =$userID  Order by Zimmer Asc";
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
                                'id' =>  $line2['Zimmer'],
                                'title' => "Zimmer: " . $line2['Zimmer']);


                        }

                    }

                }
                echo json_encode($data);
            }

        }
    }
    if ($Lehrer <> "" and $KlasseInput == "") {

        $isEntry = "Select * From sv_KurseAll Where LP_ID = $Lehrer   Order by Zimmer Asc";
        $result = mysqli_query($con, $isEntry);


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' =>  $line2['Zimmer'],
                'title' => "Zimmer: " . $line2['Zimmer']);


        }
        echo json_encode($data);
        // Output json for our calendar
    }
    if ($KlasseInput <> "" and $Lehrer == "") {
        $isEntry = "Select * From sv_KurseAll Where Klasse='$KlasseInput'  Order by Zimmer Asc ";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' =>  $line2['Zimmer'],
                'title' => "Zimmer: " . $line2['Zimmer']);

        }
        echo json_encode($data);

    }
    if ($KlasseInput <> "" and $Lehrer <> "") {
        $isEntry = "Select * From sv_KurseAll Where Klasse='$KlasseInput' AND LP_ID='$Lehrer' Order by Zimmer Asc";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' =>  $line2['Zimmer'],
                'title' => "Zimmer: " . $line2['Zimmer']);

        }
        echo json_encode($data);
    }


}
?>





