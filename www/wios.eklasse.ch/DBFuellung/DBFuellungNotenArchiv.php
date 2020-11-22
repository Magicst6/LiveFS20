

<?php
include '../Ajax_Scripts/db.php';

global $current_user;

get_currentuserinfo();

date_default_timezone_set('CET');

if ($_POST['Senden']) {
    $Anzahl = $_POST['Schueler'];
    $Pruefungsname= $_POST['title'];
    $Kursname = $_POST['kursid'];
    $Datum = $_POST['startdate'];
    $Gewicht=$_POST['gewicht'];
    $Comment=$_POST['Comment'];
		$Semester=$_POST['Semester'];
	echo $Semester;
	
	
 $isEntry2 = "Select Semesterkuerzel From sv_Settings";
    $result2 = mysqli_query($con, $isEntry2);

    while ($value3 = mysqli_fetch_array($result2)) {
        $SemesterkuerzelDB = $value3['Semesterkuerzel'];
    }
	if ($Semester==$SemesterkuerzelDB){
		$pruefungen='sv_Pruefungen';
	}
	else{
	$pruefungen=$Semester.'_Pruefungen';
	}
$kurse=$Semester.'_Kurse';
$LM=$Semester.'_LernendeModule';
$Noten=$Semester.'_Noten';
$LK=$Semester.'_LernenderKurs';
	
	 $sql_befehl0 = "Update $pruefungen Set Kommentar='$Comment' where Pruefungsname='$Pruefungsname' and Datum='$Datum' and KursID='$Kursname'";
    mysqli_query($con, $sql_befehl0);
                    echo "Eintrag hinzugefügt.";

        for ($x = 0; $x < $Anzahl; $x++) {
            $y = $x + 1;
             
            $ID = $_POST[$y];
			
            $isEntry = "SELECT  Vorname, Name  From $LM Where ID='$ID'";
            $result = mysqli_query($con, $isEntry);
          
            while ($value = mysqli_fetch_array($result)) {
                $Vorname = $value['Vorname'];
                $Nachname = $value['Name'];
                
            }
           
            $u = "Note" . "$y";
            echo $u.' ';
            $Note = $_POST[$u];
            echo $Note;
//Daten in DB speichern
           
                 $Update = 0;
                
					global $current_user;

                    get_currentuserinfo();
					
					$User_ID =$current_user->ID;
					
					$Zeit= date("Y-m-d H:i:s");
                   
				
                $isEntry1 = "SELECT  Datum,Name From $Noten where KursID='$Kursname' and SchuelerID='$ID' ";
                $result1 = mysqli_query($con, $isEntry1);

                while ($value1 = mysqli_fetch_array($result1)) {

                
                    $IDAK = $value1['SchuelerID'];
                    $DatumAK = $value1['Datum'];
                    $NameAK = $value1['Name'];
                    echo $NameAK;
                    if ( ($Datum == $DatumAK) and ($Pruefungsname == $NameAK)) {
						   $sql_befehl = "UPDATE $Noten SET Note='$Note', User_ID='$User_ID', Zeit='$Zeit' Where KursID='$Kursname' and Datum='$Datum' and SchuelerID='$ID' and Name='$NameAK'";
                        $Update = 1;
                    }
                }
                
                if ($Update == 0) {
					
                                $sql_befehl = "Insert Into $Noten (Note, Name,Gewichtung,Datum,KursID,SchuelerID,User_ID,Zeit) VALUES ('$Note','$Pruefungsname','$Gewicht','$Datum','$Kursname','$ID','$User_ID','$Zeit') ";
                              
                           
                        }

                    
                
                

//echo $sql_befehl1;
               
                if ( ("" == $Kursname) OR ("" == $Datum)) {
                    echo "Fehler: Eintrag unvollständig. Bitte neu beginnen!";
//echo '<meta http-equiv="refresh" content="0; url=/klassenbuch-der-lehrpersonen-ajax" />';
                } else {
                    mysqli_query($con, $sql_befehl);
                   echo "Eintrag hinzugefügt.";

                }
				
			
			}
      }
    

//header('Location:'.$_SERVER['HTTP_REFERER']);
?>
<!--<meta http-equiv="refresh" content="0; url=/klassenbuch-der-lehrpersonen"/>
&nbsp;
