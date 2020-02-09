<?php
include 'db.php';
$q = $_GET['q'];
$semester =$_GET['s'];
$color=$_GET['c'];

$Tab=$semester."_Lehrpersonen";
$Tab="sv_Lehrpersonen";

if ($q<>""){
$isEntry= "Select Farbe From sv_KurseAll where KursID='$q'  ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
   $farbe = $line2['Farbe'];
}
 
}
  
if($color==""){
echo '<input name="farbe" id="farbe" type="color" value='.$farbe.'>';
}
   else{ 
	   echo '<input name="farbe" id="farbe" type="color" value="#'.$color.'">';
   }
?>

        

