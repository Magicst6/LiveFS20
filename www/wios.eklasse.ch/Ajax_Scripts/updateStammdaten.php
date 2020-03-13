
<?

include 'db.php';

$Nachname= $_GET['Nachname'];

    $Vorname= $_GET['Vorname'];
	
	

    $EMail =$_GET['EMail'];

    $Geburtstag = $_GET['Geburtstag'];

    $Nation=$_GET['Nation'];

    $Strasse = $_GET['Strasse'];

    $HNummer = $_GET['HNummer'];

    $PLZ= $_GET['PLZ'];
	
	$Ort= $_GET['Ort'];
	
	$Tel= $_GET['Tel'];
	
	$ElternTel=$_GET['ElternTel'];
	
	$ElternMail=$_GET['ElternMail'];
	
	$ID=$_GET['ID'];
	
	$semester=$_GET['sem'];

	
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
		 




 
        




        

   

?>