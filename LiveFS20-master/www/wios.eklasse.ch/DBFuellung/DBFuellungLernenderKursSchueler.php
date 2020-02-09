&nbsp;

&nbsp;

&nbsp;

<?php
include 'db.php';
if( $_POST['Senden'])
{
   
	$Schueler =  $_POST['schueler'.$x];
	$Kursname =   $_POST['Kursname'];
	

        preg_match("/:(.*)/", $Schueler, $output_array);

        $SchuelerID=$output_array[1];

	 $isEntry1= "Select *  From sv_LernendeModule where ID='$SchuelerID'";

    $result1 = mysqli_query($con, $isEntry1);
    
    while ($row1= mysqli_fetch_array($result1)) {
	
	 $UserID= $row1['User_ID'];
	 $Vorname =  $row1['Vorname'];
        $Nachname = $row1['Name'];
        $EMail = $row1['EMail'];
        $Loginname = $row1['Loginname'];
        $Profil= $row1['Profil'];
	 $WinLogin = $row1['WinLogin'];
    $SchulMail= $row1['SchulMail'];
	}



//Daten in DB speichern
        $sql_befehl = "INSERT INTO sv_LernenderKurs (Nachname, Vorname, Klasse, Profil,KursID) VALUES ('$Nachname', '$Vorname', '$Klasse', '$Profil','$Kursname' )";
//echo $sql_befehl1;
        if (("" == $Vorname) OR (""== $Nachname) ) {
            echo "Fehler: Eintrag unvollständig. Bitte neu beginnen!";
			header('Location:'.$_SERVER['HTTP_REFERER']);
//echo '<meta http-equiv="refresh" content="0; url=http://wios.eklasse.ch/Klassenverwaltung" />';

        }
        else {
            mysqli_query($con,$sql_befehl);
//echo "Eintrag hinzugefügt.";
           header('Location:'.$_SERVER['HTTP_REFERER']);



        }
    }




header('Location:'.$_SERVER['HTTP_REFERER']);


?>


&nbsp;