

<?php
include 'db.php';
//Input-Felder in Tabelle eintragen(außer die Termine der Veranstaltung
if( $_POST['Senden']) {

    $Lehrer = $_POST['lehrer'];
    $Semester = $_POST['semester'];
    

   preg_match("/:(.*)/", $Lehrer, $output_array);

        $lid=$output_array[1];


        for ($y = 1; $y < 7; $y++) {
            $Uhr = array(9);
            switch ($y) {
                case 1:
                    $Tag = 'Montag';
                    break;
                case 2:
                    $Tag = 'Dienstag';
                    break;
                case 3:
                    $Tag = 'Mittwoch';
                    break;
                case 4:
                    $Tag = 'Donnerstag';
                    break;
                case 5:
                    $Tag = 'Freitag';
                    break;
                case 6:
                    $Tag = 'Samstag';
                    break;
            }
            for ($x = 1; $x < 11; $x++) {


                $Startdatum = $_POST['Date' . $x . $y];
                echo $Startdatum;
                $UhrVal = $Uhr[$x - 1] = $_POST['Uhr' . $x . $y];
                $Date1 = new Datetime($Startdatum);
                $Datum1 = $Date1->format('Y-m-d');
                $KursID = $_POST['Text' . $x . $y];
                
				 $isEntry10 = "Select * From sv_Kurse where KursID='$KursID' ";
                    $result10 = mysqli_query($con, $isEntry10);
                    
                    while ($valuecol = mysqli_fetch_array($result10)) {
						
				$Klassenname=$valuecol['Klasse'];
				$Color = $valuecol['Farbe'];
							$Lehrer = $valuecol['Lehrperson'];
						$KursnameStamm= $valuecol['Kursname'];
						$Zimmer= $valuecol['Zimmer'];
						$Profil= $valuecol['Profil'];
						//echo $KursnameStamm.'hhhhhhhhhhh';
						  

        $LP_ID1=$Lehrer;
					}
						$FieldID= $x.$y;
                if ($KursID==""){
                    $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and Lehrperson='$lid'";
                    $result2 = mysqli_query($con, $isEntry2);
                    $KursIDDel="";
                    while ($valueDel = mysqli_fetch_array($result2)) {
                        if(substr($valueDel['KursID'], -4)==$Semester) {
                            $KursIDDel=$valueDel['KursID'];
							
                        }
                    }
                   if ($KursIDDel<>"") {
                    $sql_befehldel = "delete from sv_Kurse  Where Tag='$Tag' and FieldID='$FieldID' and KursID='$KursIDDel'";

                       mysqli_query($con, $sql_befehldel);
                   }
                }

              






//Daten in DB speichern
                       $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and KursID='$KursID'";
                    $result2 = mysqli_query($con, $isEntry2);

                        if (mysqli_num_rows($result2)==0)
                        {
                            $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and Lehrperson='$lid' ";
                            $result2 = mysqli_query($con, $isEntry2);
                            $KursIDDel="";
                            while ($valueDel = mysqli_fetch_array($result2)) {
                                if(substr($valueDel['KursID'], -4)==$Semester) {
                                    $KursIDDel=$valueDel['KursID'];
                                }
                            }
                            if ($KursIDDel<>"") {
                               $sql_befehldel = "delete from sv_Kurse  Where Tag='$Tag' and FieldID='$FieldID' and KursID='$KursIDDel'";

                                mysqli_query($con, $sql_befehldel);
                            }
                                if($KursID<>""){
                               $sql_befehl1 = "INSERT INTO sv_Kurse (KursID, Klasse, Uhrzeit, Tag, Startdatum, Farbe, FieldID,Stundenplan,Lehrperson, Kursname, Zimmer,Profil) VALUES ('$KursID', '$Klassenname', '$UhrVal', '$Tag','$Datum1','$Color', '$FieldID','1','$LP_ID1','$KursnameStamm','$Zimmer','$Profil')";

                           mysqli_query($con, $sql_befehl1);
								}
                        }else
                        {
                               $sql_befehl2 = "UPDATE sv_Kurse SET  Startdatum='$Datum1', Farbe='$Color' , Uhrzeit='$UhrVal', Lehrperson='$LP_ID1' ,Kursname='$KursnameStamm', Zimmer='$Zimmer', Profil='$Profil' Where Tag='$Tag' and FieldID='$FieldID'  and KursID='$KursID' and Stundenplan='1'  ";

                           mysqli_query($con, $sql_befehl2);
                        }
                        
                        unset($KursID);
                       
                        unset($Datum1);
                        unset($Startdatum);


                }
            }

         
        


    $isEntry2 = "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30,Nachname,ID From sv_Lehrpersonen  ";
    $result2 = mysqli_query($con, $isEntry2);

    while ($value3 = mysqli_fetch_array($result2)) {
        for ($y = 1; $y <= 30; $y++) {
            $Kurs1 = "Kurs" . "$y";
            $dbwert = $value3[$Kurs1];
            $LP_ID=$value3['ID'];
          $sql_befehl2 = "UPDATE sv_Kurse SET Lehrperson = '$LP_ID'  where KursID ='$dbwert' ";
          mysqli_query($con, $sql_befehl2);
        }

    }
}
     echo '<meta http-equiv="refresh"  content="0; url=/kursformular-lehrer?Lehrer='.$lid.'" />';
?>




