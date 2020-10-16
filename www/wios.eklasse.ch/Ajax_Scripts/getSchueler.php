<?php
include 'db.php';
$Kursname = $_GET['q'];
$semester =$_GET['s'];

$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}


if ($semester==$semDB || $semester==''){
	$TabLK="sv_LernenderKurs";
	$TabLM="sv_LernendeModule";
	
}
else{
$TabLM=$semester."_LernendeModule";
	$TabLK=$semester."_LernenderKurs";
}
if ($Kursname=="Alle") 

{
	$isEntry= "Select ID From $TabLM  order by Name";
	
	$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['ID'];
}
$uniquearr = array_unique($resultarr);


echo "<option>" .'-Select-'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Name, Vorname From sv_LernendeModule WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

	
}else
{
$isEntry= "Select SchuelerID From $TabLK Where KursID='$Kursname' order by Nachname ";

$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['SchuelerID'];
}
$uniquearr = array_unique($resultarr);


echo "<option>" .'-Select-'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Name, Vorname From sv_LernendeModule WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

}
?>
