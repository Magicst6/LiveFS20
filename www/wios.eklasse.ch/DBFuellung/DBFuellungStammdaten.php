<?php

/**

 * Created by PhpStorm.

 * User: stefa

 * Date: 30.11.2018

 * Time: 16:39

 */





include 'db.php';




if( $_POST['Senden'])
{
  $Nachname= $_POST['Nachname'];

    $Vorname= $_POST['Vorname'];
	
	

    $EMail =$_POST['EMail'];

    $Geburtstag = $_POST['Geburtstag'];

    $Nation=$_POST['Nation'];

    $Strasse = $_POST['Strasse'];

    $HNummer = $_POST['HNummer'];

    $PLZ= $_POST['PLZ'];
	
	$Ort= $_POST['Ort'];
	
	$Tel= $_POST['Tel'];
	
	$ElternTel=$_POST['ElternTel'];
	
	$ElternMail=$_POST['ElternMail'];
	
	$ID=$_POST['ID'];
	
	$semester=$_POST['sem'];

	
$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}


if ($semester==$semDB || $semester==''){
   $LM="sv_LernendeModule";

} else{

   $LM=$semester."_LernendeModule";

}
	
	
	


  




        $query = "Update $LM SET Name='$Nachname', Vorname='$Vorname', EMail='$EMail', Strasse='$Strasse', Hausnummer='$HNummer', PLZ='$PLZ', Wohnort='$Ort', Telefon='$Tel', Nation='$Nation',Geburtsdatum='$Geburtstag', ElternMail='$ElternMail', ElternTel='$ElternTel' where ID='$ID' ";

        mysqli_query($con, $query);

        echo "Eintrag geändert!";
		 

    

  echo $query;
        




        

    }



header('Location:'.$_SERVER['HTTP_REFERER']);



?>