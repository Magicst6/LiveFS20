<?php
include 'db.php';
$q = $_GET['q'];
$semester =$_GET['s'];

$Tab=$semester."_Lehrpersonen";
$Tab="sv_Lehrpersonen";

if ($q<>""){
$isEntry= "Select Lehrperson From sv_Kurse where KursID='$q'  ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['Lehrperson'];
}
$uniquearr = array_unique($resultarr);






        foreach ($uniquearr as $value) {

            $isEntry= "Select Nachname, Vorname From $Tab WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }
			if ($Name<>"" and $value<>""){

            echo "<option>".$Name .":".$value."</option>";
			}

        }






        $isEntry= "Select ID From sv_Lehrpersonen ";

        $result = mysqli_query($con, $isEntry);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





       



        foreach ($uniquearr as $value) {

            $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>". $Name .":".$value."</option>";

        }
}
        ?>

        

