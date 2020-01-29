<?php
include 'db.php';
$Kursname = $_GET['q'];
$semester =$_GET['s'];

$Tab="sv_LernenderKurs";

$isEntry= "Select SchülerID From $Tab Where KursID='$Kursname' ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['SchülerID'];
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

        
?>
