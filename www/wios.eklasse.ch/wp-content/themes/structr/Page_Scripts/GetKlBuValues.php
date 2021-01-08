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



        $isEntry1 = "Select ID From sv_Lehrpersonen where User_ID=$userID";
        $result1 = mysqli_query($con, $isEntry1);

        while ($line1 = mysqli_fetch_array($result1)) {
            $LP_ID = $line1['ID'];

        }
      
            $isEntry = "Select * From sv_KurseAll Where LP_ID = $LP_ID order by Datum ";
            $result = mysqli_query($con, $isEntry);
                $i=0;

            while ($line2 = mysqli_fetch_array($result)) {
				$isEntered="nein";
				$Datum1= $line2['Datum'];
				$KursID1=$line2['KursID'];
				$isEntry1 = "Select * From sv_Kurshistorie Where KursID='$KursID1' and Datum='$Datum1'  ";
            $result1 = mysqli_query($con, $isEntry1);
               

            while ($line3 = mysqli_fetch_array($result1)) {
				$isEntered="ja";
				
			}
				
				$isEntry5 = "Select * From sv_KurseAll Where KursID='$KursID1' and Datum='$Datum1' order by Start ";
            $result5 = mysqli_query($con, $isEntry5);
               $z=0;

            while ($line5 = mysqli_fetch_array($result5)) {
				if ($z==0){
					$startday=$line5['Start'];
				}
				$z++;
				$endday=$line5['Ende'];
			}
				
				
				
				if ($isEntered=='ja')
				{$bcol='green';
				}				
				else{
					$bcol='orange';
				}
				if (!in_array($line2['Datum'], $Datum)){ 
					
					unset($KursID);}
				
				if (in_array($line2['Datum'], $Datum) and  in_array($line2['KursID'], $KursID) )
				{
				}
				else{
					if ($line2['Lektionen']){
						$z=$line2['Lektionen'];
					}
						
                $data[] = array(
					'lektionen' => $z,
                   'isent' => $isEntered,
					'id' => $line2['ID'],
                    'title' => "<ax>".$line2['Kursname'] . " Klasse: " . $line2['Klasse'] . " Zimmer: " . $line2['Zimmer'] . " Eingetragen: <a style='color:".$bcol."'>" . $isEntered. "</a></ax>",
                    'start' => $startday,
                    'end' => $endday,
					 'datum' => $line2['Datum'],
                    'textColor' => $bcol,
                    'backgroundColor' => $line2['Farbe'],
                    'zimmer' => $line2['Zimmer'],
                    'klasse' => $line2['Klasse'],
                    'kursname' => $line2['Kursname'],
                    'kursid' => $line2['KursID'],
                    'lehrperson' => $line2['Lehrperson']);
                  
					
					$i=0;
				}
				
				$Datum[] = $line2['Datum'];
				$KursID[]= $line2['KursID'];
            }
            echo json_encode($data);
        

       


?>





