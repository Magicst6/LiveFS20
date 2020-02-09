

<?php
include '../Ajax_Scripts/db.php';
if ($_POST['Senden']) {
    $Anzahl = $_POST['Schueler'];
    $Pruefungsname= $_POST['title'];
    $Kursname = $_POST['kursid'];
    $Datum = $_POST['startdate'];
    $Gewicht=$_POST['gewicht'];
    $Comment=$_POST['Comment'];
	
	
	
	 $sql_befehl0 = "Update sv_Pruefungen Set Kommentar='$Comment' where Pruefungsname='$Pruefungsname' and Datum='$Datum' and KursID='$Kursname'";
    mysqli_query($con, $sql_befehl0);
                    echo "Eintrag hinzugefügt.";

        for ($x = 0; $x < $Anzahl; $x++) {
            $y = $x + 1;
             
            $ID = $_POST[$y];
			
            $isEntry = "SELECT  Vorname, Name  From sv_LernendeModule Where ID='$ID'";
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
                
				
				
                $isEntry1 = "SELECT  Datum,Name From sv_Noten where KursID='$Kursname' and SchuelerID='$ID' ";
                $result1 = mysqli_query($con, $isEntry1);

                while ($value1 = mysqli_fetch_array($result1)) {

                
                    $IDAK = $value1['SchuelerID'];
                    $DatumAK = $value1['Datum'];
                    $NameAK = $value1['Name'];
                    echo $NameAK;
                    if ( ($Datum == $DatumAK) and ($Pruefungsname == $NameAK)) {
						   $sql_befehl = "UPDATE sv_Noten SET Note='$Note' Where KursID='$Kursname' and Datum='$Datum' and SchuelerID='$ID' and Name='$NameAK'";
                        $Update = 1;
                    }
                }
                
                if ($Update == 0) {
					
                   
                                $sql_befehl = "Insert Into sv_Noten (Note, Name,Gewichtung,Datum,KursID,SchuelerID) VALUES ('$Note','$Pruefungsname','$Gewicht','$Datum','$Kursname','$ID') ";
                              
                           
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
    

header('Location:'.$_SERVER['HTTP_REFERER']);
?>
<!--<meta http-equiv="refresh" content="0; url=/klassenbuch-der-lehrpersonen"/>
&nbsp;
