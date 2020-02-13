<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */
include 'db.php';

function removeUglyChars($phrase) {

    // characters to remove
    $remove = array(' ', '-', ':');

    // remove to ugly chars
    $phrase = str_replace($remove, " ", $phrase);

    // remove all double white-spaces
    while (strpos($phrase, " ") !== false) $phrase = str_replace(" ", "", $phrase);

    $phrase= trim($phrase);

    $phrase=substr($phrase,0,8)."T".substr($phrase,8,6);

    return $phrase;

}
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];

$y=0;
$userID=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];

$Mailaddress=$_GET['m'];

preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];
$ical_content = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN';
if ($userID=="1000000" and $KlasseInput == "" and $Lehrer == "") {
    $isEntry = "Select * From sv_Pruefungen";
    $result = mysqli_query($con, $isEntry);
    $events = array();


    while ($line2 = mysqli_fetch_array($result)) {
        $data[] = array(
            'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
				'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);
        $start=$line2['Start'];
        $end =$line2['Ende'];

        $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';
    }
    //echo json_encode($data);
}
else {
    if ($KlasseInput == "" and $Lehrer == "") {

        $isEntry1 = "Select ID From sv_Lehrpersonen where User_ID=$userID";
        $result1 = mysqli_query($con, $isEntry1);

        while ($line1 = mysqli_fetch_array($result1)) {
            $LP_ID = $line1['ID'];

        }
        if ($LP_ID) {
            $isEntry = "Select * From sv_Pruefungen Where LP_ID = $LP_ID ";
            $result = mysqli_query($con, $isEntry);


            while ($line2 = mysqli_fetch_array($result)) {
                $data[] = array(
                 'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
			    'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);
                $start=$line2['Start'];
                $end =$line2['Ende'];

                $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';

            }
            // echo json_encode($data);
        } // Output json for our calendar

        else {
            $isEntryLP = "Select Modul1,Modul2,Modul3,Modul4,Modul5,Modul6,Modul7,Modul8,Modul9,Modul10,Modul11,Modul12 From sv_LernendeModule Where User_ID =$userID";
            $resultLP = mysqli_query($con, $isEntryLP);

            while ($line1 = mysqli_fetch_array($resultLP)) {
                for ($x = 1; $x <= 12; $x++) {
                    $Modul = "Modul" . "$x";

                    $wert = $line1[$Modul];

                    if ($wert <> "") {
                        $isEntry = "Select * From sv_Pruefungen Where Klasse='$wert' ";
                        $result = mysqli_query($con, $isEntry);


                        while ($line2 = mysqli_fetch_array($result)) {
                            $data[] = array(
                             'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
				'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);

                            $start=$line2['Start'];
                            $end =$line2['Ende'];

                            $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';
                        }

                    }

                }
                //      echo json_encode($data);
            }

        }
    }
    if ($Lehrer <> "" and $KlasseInput == "") {

        $isEntry = "Select * From sv_Pruefungen Where LP_ID = $Lehrer ";
        $result = mysqli_query($con, $isEntry);


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
				'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);
            $start=$line2['Start'];
            $end =$line2['Ende'];

            $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';
        }
        //echo json_encode($data);
        // Output json for our calendar
    }
    if ($KlasseInput <> "" and $Lehrer == "") {
        $isEntry = "Select * From sv_Pruefungen Where Klasse='$KlasseInput'";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
				'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);
            $start=$line2['Start'];
            $end =$line2['Ende'];

            $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';
        }
        //echo json_encode($data);

    }
    if ($KlasseInput <> "" and $Lehrer <> "") {
        $isEntry = "Select * From sv_Pruefungen Where Klasse='$KlasseInput' AND LP_ID='$Lehrer'";
        $result = mysqli_query($con, $isEntry);
        $events = array();


        while ($line2 = mysqli_fetch_array($result)) {
            $data[] = array(
                'id' => $line2['ID'],
				'resourceId' => $line2['Zimmer'],
				'title' => $line2['Pruefungsname'],
				'start' => $line2['Start'],
				'end' => $line2['Ende'],
				'color' => $line2['Farbe'],
				'gewichtung' => $line2['Gewichtung'],
				'zimmer' => $line2['Zimmer'],
				'klasse' => $line2['Klasse'],
				'kursname' => $line2['Kursname'],
				'kursid' => $line2['KursID'],
				'lernziele' => $line2['Lernziele'],
				'lehrperson' => $line2['Lehrperson']);
            $start=$line2['Start'];
            $end =$line2['Ende'];

            $ical_content = $ical_content.' 
BEGIN:VEVENT
UID:http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd
DTSTAMP:20170203T045941Z
DTSTART:'.removeUglyChars($start).'
DTEND:'.removeUglyChars($end).'
SUMMARY:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
LOCATION:'. "Zimmer:" .$line2['Zimmer'].'
DESCRIPTION:'.$line2['Pruefungsname'] . " Klasse: " . $line2['Klasse'] .'
END:VEVENT';
        }
        //  echo json_encode($data);
    }


}

$ical_content =$ical_content.' END:VCALENDAR';

date_default_timezone_set('Europe/Berlin');

require_once('../../../../phpmailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = "Hier Ihre Pruefungstermine fuer den Outlook Kalender. Füuehren Sie die Datei im Anhang aus, um Ihre Pruefungstermine dem Outlook Kalender hinzuzufuegen.";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "mail.infomaniak.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server

$mail->Username   = "noreplyeventmailer@schulverwaltungheimtest.ch";  // GMAIL username info@gaming-machines.net

$mail->Password   = "EklasseMail1";            // GMAIL password

$mail->SetFrom('noreplyeventmailer@schulverwaltungheimtest.ch', 'Schulverwaltung');

$mail->AddReplyTo("noreplyeventmailer@schulverwaltungheimtest.ch","Schulverwaltung");

$mail->Subject    = "Schulverwaltungssystem - Ihre Pruefungstermine";

$mail->AltBody    = "Schulverwaltungssystem - Ihre Pruefungstermine"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $Mailaddress;
$mail->AddAddress($address, "Schulverwaltung");



$mail->addStringAttachment($ical_content,'Pruefungstermine.ics','base64','text/calendar');


if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}



?>





