

<?php

include 'db.php';


if($_POST['Senden'])
{

    $Klasse = $_POST['klasse'];
	
	 $Lehrer = $_POST['lehrer'];
	
	  preg_match("/:(.*)/", $Lehrer, $output_array);

        $LP_ID=$output_array[1];
 
	echo $LP_ID;
 
	echo $Klasse;
    $AnzahlKurse = $_POST['AnzahlKurse'];

  // echo $AnzahlKurse.'  ';
	
	
    for($f = 0; $f < $AnzahlKurse; $f++)

    {



        $KursID = $_POST['KursID1'.$f];

        $Kursname = $_POST['Kursname1'.$f];

        $Startdatum = $_POST['Startdatum1'.$f];

        $Enddatum =$_POST['Enddatum1'.$f];

        $Zimmer = $_POST['Zimmer1'.$f];

        $Uhrzeit =$_POST['Uhrzeit1'.$f];
		
		 $Profil =$_POST['Profil1'.$f];

         $Lehrperson1 =$_POST['Lehrperson1'.$f];
		
		  preg_match("/:(.*)/", $Lehrperson1, $output_array);

        $LP_ID1=$output_array[1];

        $ID = $_POST['ID1'.$f];
		
		$test_datum = $Startdatum;
$wochentage = array ('Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag');
list ($jahr, $monat, $tag) = explode ('-', $test_datum) ;
$datum = getdate(mktime ( 0,0,0, $monat, $tag, $jahr));
$wochentagz = $datum['wday'];
$wochentag= $wochentage[$wochentagz];
		
		
    $isEntryCheck= "Select * From sv_Kurse ";

    $resultCheck = mysqli_query($con, $isEntryCheck);







    while( $valueCheck= mysqli_fetch_array($resultCheck)) {
		
		if (($KursID<>$valueCheck['KursID']) and ($valueCheck['Lehrperson']==$LP_ID1) and ($valueCheck['Uhrzeit']==$Uhrzeit) and ($valueCheck['Tag']==$wochentag) )
		{
			echo "Kurs ".$KursID." ist an diesem Tag und dieser Uhrzeit nicht möglich, da der Lehrer bereits einen Kurs zu diesem Zeitpunkt hat!";
			
        $sql_befehlDel = "Delete From sv_Kurse where ID='$ID' ";
     mysqli_query($con,$sql_befehlDel);
			$isdouble=1;
		}
		
		
	}
		
		 $isEntryCheck1= "Select * From sv_LernendeModule where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'";

    $resultCheck1 = mysqli_query($con, $isEntryCheck1);







    while( $valueCheck1= mysqli_fetch_array($resultCheck1)) {
		
		
			
		$Klasse1=$valueCheck1['Modul1'];
		$Klasse2=$valueCheck1['Modul2'];
		$Klasse3=$valueCheck1['Modul3'];
		$Klasse4=$valueCheck1['Modul4'];
		$Klasse5=$valueCheck1['Modul5'];
		$Klasse6=$valueCheck1['Modul6'];
		$Klasse7=$valueCheck1['Modul7'];
		$Klasse8=$valueCheck1['Modul8'];
		$Klasse9=$valueCheck1['Modul9'];
	    $Klasse10=$valueCheck1['Modul10'];
		$Klasse11=$valueCheck1['Modul11'];
		$Klasse12=$valueCheck1['Modul12'];
		
		$isEntryCheck2= "Select * From sv_Kurse where Klasse='$Klasse1' or Klasse='$Klasse2' or Klasse='$Klasse3' or Klasse='$Klasse4' or Klasse='$Klasse5' or Klasse='$Klasse6' or Klasse='$Klasse7' or Klasse='$Klasse8' or Klasse='$Klasse9' or Klasse='$Klasse10' or Klasse='$Klasse11' or Klasse='$Klasse12'  ";

    $resultCheck2 = mysqli_query($con, $isEntryCheck2);







    while( $valueCheck2= mysqli_fetch_array($resultCheck2)) {
		
		if ( (($Klasse<>'' && $Klasse<>$valueCheck2['Klasse']) and $valueCheck2['Uhrzeit']==$Uhrzeit) and ($valueCheck2['Tag']==$wochentag) )
		{
			echo "Kurs ".$KursID." ist an diesem Tag und dieser Uhrzeit nicht möglich, da ein Lernender bereits einen Kurs zu diesem Zeitpunkt hat!";
			echo $valueCheck1['Name'];
        $sql_befehlDel = "Delete From sv_Kurse where ID='$ID' ";
     mysqli_query($con,$sql_befehlDel);
			$isdouble=1;
		}
		
		
	}
		
	}
	}
	
	if ($isdouble==1){
	
			
			echo "<a href='/stundenplan-2/;'>[Zurück]</a>";
	}
	if ($isdouble<>1){
    for($f = 0; $f < $AnzahlKurse; $f++)

    {



        $KursID = $_POST['KursID1'.$f];

        $Kursname = $_POST['Kursname1'.$f];

        $Startdatum = $_POST['Startdatum1'.$f];

        $Enddatum =$_POST['Enddatum1'.$f];

        $Zimmer = $_POST['Zimmer1'.$f];

        $Uhrzeit =$_POST['Uhrzeit1'.$f];
		
		 $Profil =$_POST['Profil1'.$f];

         $Lehrperson1 =$_POST['Lehrperson1'.$f];
		
		  preg_match("/:(.*)/", $Lehrperson1, $output_array);

        $LP_ID1=$output_array[1];

        $ID = $_POST['ID1'.$f];

			
		 $isEntryLPKurse1 = "SELECT Lehrperson From sv_Kurse Where  KursID='$KursID' ";
    $resultK = mysqli_query($con, $isEntryLPKurse1);


    while( $valueK= mysqli_fetch_array($resultK))
    {
		$LP_IDB=$valueK['Lehrperson'];
	}
		
		
		 $isEntryLPKurse = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where  ID='$LP_IDB' ";
    $result = mysqli_query($con, $isEntryLPKurse);


    while( $value= mysqli_fetch_array($result))
    {
        $isEntryCreated=false;
        $isKursExisting=false;
        for($x = 1; $x <= 30; $x++) {

            $Kurs = "Kurs" . "$x";

            $KursValue = $value[$Kurs];
            if ($KursValue==$KursID)
            {
                
            

           
                $sql_befehlKurse = "UPDATE sv_Lehrpersonen SET $Kurs = ''  where ID ='$LP_IDB' ";
			}
// In die DB-Tabelle eintragen
                mysqli_query($con, $sql_befehlKurse);
                $isEntryCreated=true;
            }
        }
    



//Daten in DB speichern

        $sql_befehl = "UPDATE sv_Kurse SET KursID = '$KursID', Kursname = '$Kursname', Startdatum= '$Startdatum', Enddatum='$Enddatum', Zimmer= '$Zimmer', Uhrzeit='$Uhrzeit', Profil='$Profil', Lehrperson='$LP_ID1' WHERE ID = '$ID' ";

//echo $sql_befehl1;

echo $sql_befehl;

            mysqli_query($con,$sql_befehl);

		
		

    $isEntryLPKurse = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where  ID='$LP_ID1' ";
    $result = mysqli_query($con, $isEntryLPKurse);


    while( $value= mysqli_fetch_array($result))
    {
        $isEntryCreated=false;
        $isKursExisting=false;
        for($x = 1; $x <= 30; $x++) {

            $Kurs = "Kurs" . "$x";

            $KursValue = $value[$Kurs];
            if ($KursValue==$KursID)
            {
                $isKursExisting=true;
            }

            if ($KursValue == "" and !$isEntryCreated and !$isKursExisting)
            {
                $sql_befehlKurse = "UPDATE sv_Lehrpersonen SET $Kurs = '$KursID'  where ID ='$LP_ID1' ";

// In die DB-Tabelle eintragen
                mysqli_query($con, $sql_befehlKurse);
                $isEntryCreated=true;
            }
        }
    }









    }

		if ($Klasse)
{		
    $sql_befehl_del = "Delete From sv_KurseAll where Stundenplan = 1 and Klasse='$Klasse'";
		}
	if ($LP_ID)
{		
    $sql_befehl_del = "Delete From sv_KurseAll where Stundenplan = 1 and LP_ID='$LP_ID'";
		}

// In die DB-Tabelle eintragen

    mysqli_query($con, $sql_befehl_del);

		if ($LP_ID){
    $isEntryStundenplan= "Select * From sv_Kurse where Lehrperson='$LP_ID' ";
		}
			if ($Klasse){
    $isEntryStundenplan= "Select * From sv_Kurse where Klasse='$Klasse' ";
		}
    $resultStundenplan = mysqli_query($con, $isEntryStundenplan);







    while( $valueStundenplan= mysqli_fetch_array($resultStundenplan)) {

        $KursID = $valueStundenplan['KursID'];

        $Tag = $valueStundenplan['Tag'];

        $Klasse = $valueStundenplan['Klasse'];

        $Zimmer= $valueStundenplan['Zimmer'];

        $Kursname = $valueStundenplan['Kursname'];

        $Startdatum = $valueStundenplan['Startdatum'];

        $Enddatum = $valueStundenplan['Enddatum'];

        $Uhr=$valueStundenplan['Uhrzeit'];

        $Farbe=$valueStundenplan['Farbe'];
		
		$LP_IDK=$valueStundenplan['Lehrperson'];

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

       // echo $time;

        if ($time<>null) {



            $Datum = date('Y-m-d', strtotime($Startdatum));

            $Start = date('Y-m-d H:i:s', strtotime($Startdatum . " " . $time));



            $End = date('Y-m-d H:i:s', strtotime($Start . '+45 minutes'));

            $isEntry = "Select * From sv_KurseAll";

            $result = mysqli_query($con, $isEntry);

            $isExisting = false;

            while ($value = mysqli_fetch_array($result)) {

                if (($value['Start'] == $Start) and ($value['Ende'] == $End) and ($value['KursID'] == $KursID)) {

                    $isExisting = true;

                  // echo "line already existing";

                }



            }

            if ($Enddatum == '0000-00-00' || $Enddatum == null || $Enddatum=="") {

          //    echo "Enddatum fehlt. Bitte eintragen!')";

            } else {



                $isEntryLPKurse = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30,ID, Nachname From sv_Lehrpersonen  ";

                $result = mysqli_query($con, $isEntryLPKurse);



                $LP_ID=0;

                $Lehrperson="";

                while( $value= mysqli_fetch_array($result))

                {

                    $isEntryCreated=false;

                    $isKursExisting=false;

                    for($x = 1; $x <= 30; $x++) {



                        $Kurs = "Kurs" . "$x";



                        $KursValue = $value[$Kurs];

                        if ($KursValue == $KursID) {

                            $LP_ID = $value['ID'];

                           $Lehrperson = $value['Nachname'];

                        }







                    }



                }

				
			/*	$isEntryLPKurse1 = "SELECT Nachname From sv_Lehrpersonen Where ID='$LP_IDK'" ;

                $result1 = mysqli_query($con, $isEntryLPKurse1);



                $LP_ID=0;

                $Lehrperson="";

                while( $value2= mysqli_fetch_array($result1))

                {
					$Lehrperson=$value2['Nachname'];
				}
*/
                if (!$isExisting) {

                    $sql_befehl = "INSERT INTO sv_KurseAll (Kursname, KursID, Tag, Klasse, LP_ID,Datum, Start, Ende, Lehrperson,Farbe,Zimmer, Stundenplan ) VALUES ('$Kursname','$KursID','$Tag','$Klasse','$LP_ID','$Datum','$Start','$End','$Lehrperson','$Farbe','$Zimmer', 1)";



// In die DB-Tabelle eintragen

                    mysqli_query($con, $sql_befehl);

                }

                $y = 0;





                if  ($Startdatum<$Enddatum) {

                    $datetime1 = date_create($Startdatum);

                    $datetime2 = date_create($Enddatum);

                    $interval = date_diff($datetime1, $datetime2);

                    $days = $interval->format('%R%a days');

                    $weeks = intval($days / 7);

                  //  echo $weeks;

                    $y = $weeks;



                }
                for ($x = 0; $x < $y; $x++) {

                    $isExisting = false;

                    $Datum = date('Y-m-d', strtotime($Datum . ' + 7 days'));

                    $Start = date('Y-m-d H:i:s', strtotime($Start . ' + 7 days'));

                    $isEntrySet = "Select Ferien1von,Ferien1bis,Ferien2von,Ferien2bis,Ferien3von,Ferien3bis,Ferien4von,Ferien4bis,Ferien5von,Ferien5bis,Semesteranfang,Semesterende From sv_Settings";

                    $resultSet = mysqli_query($con, $isEntrySet);


                    while ($valueSet = mysqli_fetch_array($resultSet)) {
						
                     $ferien1bis= date('Y-m-d', strtotime($valueSet['Ferien1bis'].' + 1 days'));
						 $ferien2bis= date('Y-m-d', strtotime($valueSet['Ferien2bis'].' + 1 days'));
						 $ferien3bis= date('Y-m-d', strtotime($valueSet['Ferien3bis'].' + 1 days'));
						 $ferien4bis= date('Y-m-d', strtotime($valueSet['Ferien4bis'].' + 1 days'));
						 $ferien5bis= date('Y-m-d', strtotime($valueSet['Ferien5bis'].' + 1 days'));
						$Semesteranfang= date('Y-m-d', strtotime($valueSet['Semesteranfang']));
						 $Semesterende= date('Y-m-d', strtotime($valueSet['Semesterende']));
						 

                        if (  ($Start>=$valueSet['Ferien1von'] and $Start<=$ferien1bis) or ($Start>=$valueSet['Ferien2von'] and $Start<=$ferien2bis) or ($Start>=$valueSet['Ferien3von'] and $Start<=$ferien3bis) or ($Start>=$valueSet['Ferien4von'] and $Start<=$ferien4bis) or ($Start>=$valueSet['Ferien5von'] and $Start<=$ferien5bis)) {
                           
                           
                            $isExisting = true;

							}
                        //     echo "line already existing";

                    }

                    $End = date('Y-m-d H:i:s', strtotime($Start . '+45 minutes'));

                    $isEntry = "Select * From sv_KurseAll";

                    $result = mysqli_query($con, $isEntry);



                    while ($value = mysqli_fetch_array($result)) {

                        if (($value['Start'] == $Start) and ($value['Ende'] == $End) and ($value['KursID'] == $KursID)) {

                            $isExisting = true;


                        }
                    }







                    if (!$isExisting) {

                        $sql_befehl = "INSERT INTO sv_KurseAll (Kursname,KursID, Tag, Klasse, LP_ID,Datum, Start, Ende, Lehrperson,Farbe,Zimmer,Stundenplan ) VALUES ('$Kursname','$KursID','$Tag','$Klasse','$LP_ID','$Datum','$Start','$End','$Lehrperson','$Farbe','$Zimmer',1)";





// In die DB-Tabelle eintragen

                        mysqli_query($con, $sql_befehl);

                    }

                }

            }

            $Enddatum = null;





        }

    }

}

}



$isEntry= "Select KursID, Klasse, Profil From sv_Kurse";
$result1 = mysqli_query($con, $isEntry);
while( $row5= mysqli_fetch_array($result1))
{

    $Klasse =  $row5['Klasse'];
    $Kursname =  $row5['KursID'];
	
	$Profil =  $row5['Profil'];

    $dontFill=0;
    $isEntry3= "Select KursID From sv_LernenderKurs";
    $result3 = mysqli_query($con, $isEntry3);
    $resultarr3 = array();

    while( $row3= mysqli_fetch_assoc($result3))
    {
        $resultarr3[] = $row3['KursID'];
    }

    $uniquearr3 = array_unique($resultarr3);
    asort($uniquearr3);

    foreach ($uniquearr3 as $value) {
        if ($value==$Kursname)
        {
            $dontFill=1;
        }
    }


    $isEntry2= "Select Name, Vorname, ID, Profil From sv_LernendeModule Where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse' ";


    $result2 = mysqli_query($con, $isEntry2);

    while ($row2 = mysqli_fetch_array($result2)) {
		$isProfil=0;
        $dontFill=0;
        $SchuelerID= $row2['ID'];
        $Vorname= $row2['Vorname'];
        $Nachname= $row2['Name'];
        $Profil1= $row2['Profil'];
		
		$ProfKomma = explode(",", $Profil1);
		
		$ProfDash = explode("/", $Profil1);
		
		foreach ($ProfKomma as $val1) {
            if (strtolower($val1)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }
		
		foreach ($ProfDash as $val2) {
            if (strtolower($val2)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }

       
		if ($isProfil==1 or $Profil==''){
		
            $isEntry4= "Select SchuelerID, Vorname, Nachname, KursID From sv_LernenderKurs";
            $result4 = mysqli_query($con, $isEntry4);

            while ($row4 = mysqli_fetch_array($result4)) {
                $ID1= $row4['SchuelerID'];
                $KursnameAbw =  $row4['KursID'];
                $VornameAbw= $row4['Vorname'];
                $NachnameAbw= $row4['Nachname'];

                if ( ($SchuelerID==$ID1) and ($Kursname==$KursnameAbw) and (($Vorname<>$VornameAbw) or ($Nachname<>$NachnameAbw) ))
                {
                    $sql_befehl = "Update sv_LernenderKurs SET Vorname='$Vorname', Nachname='$Nachname' Where SchuelerID='$ID1' and KursID='$Kursname'";
                    mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
                    $dontFill=1;
                }







                if ( ($SchuelerID==$ID1) and ($Kursname==$KursnameAbw) and  ($Vorname==$VornameAbw) and ($Nachname==$NachnameAbw) )
                {
                    $dontFill=1;
                }
            }

            if ($dontFill == 0 and strpos($Kursname, $Klasse) !== false){
                $sql_befehl = "INSERT INTO sv_LernenderKurs (KursID, SchuelerID, Klasse, Vorname, Nachname) VALUES ('$Kursname', '$SchuelerID', '$Klasse', '$Vorname','$Nachname')";
                mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
            }

        }
    }
}

 







if ($isdouble<>1){
echo '<meta http-equiv="refresh" content="0; url=/kurstermine" />';
}
?>

