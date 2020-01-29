<?php
include 'db.php';
$q = $_GET['q'];
$semester =$_GET['s'];

$Tab=$semester."_Lehrpersonen";

if ($semester==""){
	$Tab="sv_Lehrpersonen";
}

$isEntry= "Select ID From $Tab ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['ID'];
}
$uniquearr = array_unique($resultarr);


echo "<option>" .'-Select-'. "</option>";
echo "<option>" .'Alle'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Nachname, Vorname From $Tab WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        
?>
