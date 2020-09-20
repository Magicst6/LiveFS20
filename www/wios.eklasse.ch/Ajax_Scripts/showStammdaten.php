<?
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
$Schueler=$_GET['q'];
$semester=$_GET['s'];
preg_match( "/:(.*)/", $Schueler, $output_array );
$ID = $output_array[ 1 ];

$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}

$LMArch=$semester."_LernendeModule";


preg_match( "/:(.*)/", $Lehrer, $output_array );
$Lehrer = $output_array[ 1 ];

if ($semester==$semDB || $semester==''){
    $isEntry = "Select * From sv_LernendeModule where ID='$ID'   order by Name asc ";

} else{

    $isEntry = "Select * From $LMArch where ID='$ID' order by Name asc ";

}


$result = mysqli_query( $con, $isEntry );


while ( $line2 = mysqli_fetch_array( $result ) ) {
	
	$Geburtstag=$line2['Geburtsdatum'];
	$Nation=$line2['Nation'];
	$Strasse=$line2['Strasse'];
	$HNummer=$line2['Hausnummer'];
	$Ort=$line2['Wohnort'];
	$PLZ=$line2['PLZ'];
	$Tel=$line2['Telefon'];
	$ElternTel=$line2['ElternTel'];
	$ElternMail=$line2['ElternMail'];
	$Nachname=$line2['Name'];
    $Vorname=$line2['Vorname'];
	$EMail=$line2['EMail'];
	$UserID=$line2['User_ID'];

}
?>
<style>
.data {
            background-color: #fefefe; 
            border: 1px solid #888;
        }
	.datahn {
            background-color: #fefefe; 
            border: 1px solid #888;
		    width:60px;
        }
	.datamail {
            background-color: #fefefe; 
            border: 1px solid #888;
		    width:240px;
        }
	
	</style>



<br><br>
<h5>Stammdaten:</h5>


		
		   <u>Profilbild: </u><br>
	<?  echo get_avatar($UserID,100);?>
		   
		   
		   <br><br>
	  

Vorname:&nbsp;  <input id="Vorname" type="text" class="data" value="<? echo $Vorname; ?>">  &nbsp; &nbsp;&nbsp;     Nachname: &nbsp; <input id="Nachname" type="text" class="data" value="<? echo $Nachname; ?>"> &nbsp; &nbsp; &nbsp;   E-Mail:&nbsp;  <input id="EMail" type="text" class="datamail" value="<? echo $EMail; ?>"><br><br><hr /><br>
Geburtsdatum:&nbsp;  <input id="Geburtstag" type="date" class="data" value="<? echo $Geburtstag; ?>"> &nbsp; &nbsp; &nbsp;  Nationalität: <input id="Nation" type="text" class="data" value="<? echo $Nation; ?>"><br><br><hr /><br>
Strasse:&nbsp;  <input id="Strasse" type="text" class="data" value="<? echo $Strasse; ?>">&nbsp;&nbsp;   Hausnummer:&nbsp;  <input id="HNummer" type="text" class="datahn" value="<? echo $HNummer; ?>">&nbsp; &nbsp; &nbsp; &nbsp; PLZ:&nbsp;  <input id="PLZ" type="text" class="data" value="<? echo $PLZ; ?>">&nbsp;&nbsp;    Wohnort: &nbsp; <input id="Ort" type="text" class="data" value="<? echo $Ort; ?>"><br><br><hr /><br>
Telefon:&nbsp;  <input id="Tel" type="text" class="data" value="<? echo $Tel; ?>"><br><br><hr /><br>
	
<h5>Elternkontakt:</h5>	
E-Mail der Eltern:&nbsp;    <input id="ElternMail" type="text" class="datamail" value="<? echo $ElternMail; ?>"> &nbsp; &nbsp;     Telefon der Eltern: &nbsp; <input id="ElternTel" type="text" class="data" value="<? echo $ElternTel; ?>"><br><br><br>		
	
	<input id="ID" type="hidden" value="<? echo $ID; ?>" />
	<input id="sem" type="hidden" value="<? echo $semester; ?>" />
	
	<input name="Senden" type="button" value="Stammdaten übernehmen" onclick="setStammdaten()" />
<div id="dbres"></div>



