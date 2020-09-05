<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 16:39
 */


//delete.php

if(isset($_GET["f"]))
{

    include 'db.php';
    $id = $_GET['f'];

	$isEntry4 = "SELECT  Pruefungsname,Datum From sv_Pruefungen where id='$id'";
                $result4 = mysqli_query($con, $isEntry4);

                while ($value4 = mysqli_fetch_array($result4)) {
				 $NamePr = $value4['Pruefungsname'];
                   
				}

	
	
	$isEntry1 = "SELECT  * From sv_Noten where Name='$NamePr'";
                $result1 = mysqli_query($con, $isEntry1);

                while ($value1 = mysqli_fetch_array($result1)) {

				
                
                    $IDS = $value1['SchuelerID'];
                    $Datum = $value1['Datum'];
                    $Note = $value1['Note'];
					$Zeit = $value1['Zeit'];
					$User_ID = $value1['User_ID'];
					$Gewicht = $value1['Gewichtung'];
                    $KursID = $value1['KursID'];
                  
						$sql_befehl = "Insert Into sv_NotenDel (Note, Name,Gewichtung,Datum,KursID,SchuelerID,User_ID,Zeit) VALUES ('$Note','$NamePr','$Gewicht','$Datum','$KursID','$IDS','$User_ID','$Zeit') ";
                    
                               mysqli_query($con, $sql_befehl);
                        }


 $query = "DELETE from sv_Pruefungen WHERE ID='$id'";

    mysqli_query($con,$query);
	
	$query = "DELETE from sv_Noten WHERE Name='$NamePr'";

    mysqli_query($con,$query);
}

?>




















