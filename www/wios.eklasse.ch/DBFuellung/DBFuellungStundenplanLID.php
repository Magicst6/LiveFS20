

<?php
include 'db.php';
//Input-Felder in Tabelle eintragen(außer die Termine der Veranstaltung
if( $_POST['Senden']) {

    $LP_ID = $_POST['lid'];
    $Semester = $_POST['semester'];
    

    $DelZeiten = "Delete From sv_ZeitenStundenplanLID where LP_ID ='$LP_ID'";
    mysqli_query($con, $DelZeiten);


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
                $Kursname = strtolower($_POST['Text' . $x . $y]);
                
				 $isEntry10 = "Select * From sv_KurseStammdaten where KursKuerzel='$Kursname0' ";
                    $result10 = mysqli_query($con, $isEntry10);
                    $n=0;
                    while ($valuecol = mysqli_fetch_array($result10)) {
						
				 $n++;
						
				$Color = '#'.$valuecol['Farbe'];
							$Lehrer = $valuecol['Lehrer'];
						$KursnameStamm= $valuecol['Kursname'];
						$Zimmer= $valuecol['Zimmer'];
						$Profil= $valuecol['Profil'];
						//echo $KursnameStamm.'hhhhhhhhhhh';
						  preg_match("/:(.*)/", $Lehrer, $output_array);

        $LP_ID1=$output_array[1];
					}
				
						$FieldID= $x.$y;
                if ($Kursname==""){
                    $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and Lehrperson='$LP_ID' ";
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

                if ($Kursname <> "") {

					  $Kursarr = explode('.', $Kursname);
                   $Klassenname=$Kursarr[0];

                    //$sql_befehlID = "UPDATE sv_Kurse SET  FieldID='$FieldID' Where Tag='$Tag' and Uhrzeit='$UhrVal'  and KursID='$Kursname'  ";

                     //mysqli_query($con, $sql_befehlID);
                    if (!$Year) {
                        $Year = substr($Startdatum, 2, 2);
                    }






//Daten in DB speichern
                       $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and KursID='$Kursname' ";
                    $result2 = mysqli_query($con, $isEntry2);

                        if (mysqli_num_rows($result2)==0)
                        {
                            $isEntry2 = "Select KursID From sv_Kurse where FieldID='$FieldID' and Tag='$Tag' and Lehrperson='$LP_ID' ";
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
                               if($n!=0){
                               $sql_befehl1 = "INSERT INTO sv_Kurse (KursID, Klasse, Uhrzeit, Tag, Startdatum, Farbe, FieldID,Stundenplan,Lehrperson, Kursname, Zimmer,Profil) VALUES ('$Kursname', '$Klassenname', '$UhrVal', '$Tag','$Datum1','$Color', '$FieldID','1','$LP_ID','$KursnameStamm','$Zimmer','$Profil')";

                           mysqli_query($con, $sql_befehl1);
							   }
                        }else
                        {
							if($n!=0){
                               $sql_befehl2 = "UPDATE sv_Kurse SET  Startdatum='$Datum1', Farbe='$Color' , Uhrzeit='$UhrVal', Lehrperson='$LP_ID1' ,Kursname='$KursnameStamm', Zimmer='$Zimmer', Profil='$Profil' Where Tag='$Tag' and FieldID='$FieldID'  and KursID='$Kursname' and Stundenplan='1'  ";

                           mysqli_query($con, $sql_befehl2);
							}
                        }
                        
                        unset($Kursname0);
                        unset($Kursname);
                        unset($Datum1);
                        unset($Startdatum);


                }
            }

            $sql_befehl2 = "INSERT INTO sv_ZeitenStundenplanLID ( LP_ID, Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10,Tag,Semester) VALUES ('$LP_ID', '$Uhr[0]','$Uhr[1]','$Uhr[2]','$Uhr[3]','$Uhr[4]','$Uhr[5]','$Uhr[6]','$Uhr[7]','$Uhr[8]','$Uhr[9]', '$Tag','$Semester')";
            mysqli_query($con, $sql_befehl2);

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
     echo '<meta http-equiv="refresh"  content="0; url=/kursformular?Klasse='.$Klassenname.'" />';
?>




