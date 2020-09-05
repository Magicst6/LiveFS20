<?php
include 'db.php';
$q = $_GET['q'];
$semester =$_GET['s'];
$color=$_GET['c'];

$Tab=$semester."_Lehrpersonen";
$Tab="sv_Lehrpersonen";

if ($q<>""){
$isEntry= "Select Farbe From sv_Kurse where KursID='$q'  ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
   $farbe = $line2['Farbe'];
}
 
}
  
if($color==""){
	if ($farbe==""){
	
	$isEntry= "Select Farbe From sv_Pruefungen where KursID='$q'  ";
$result1 = mysqli_query($con,$isEntry);
$resultarr1 = array();


while( $line3= mysqli_fetch_assoc($result1))
	
{
	
	$farbe = $line3['Farbe'];
}
	echo '<input name="farbe" id="farbe" type="color" value='.$farbe.'>';


	}
	
   else{ 
	   echo '<input name="farbe" id="farbe" type="color" value="'.$farbe.'">';
   }

}
   else{ 
	   	if ($farbe==""){
	
	$isEntry= "Select Farbe From sv_Pruefungen where KursID='$q'  ";
$result1 = mysqli_query($con,$isEntry);
$resultarr1 = array();


while( $line3= mysqli_fetch_assoc($result1))
	
{
	
	$farbe = $line3['Farbe'];
}
	echo '<input name="farbe" id="farbe" type="color" value='.$farbe.'>';

		}else{
			
	   echo '<input name="farbe" id="farbe" type="color" value="'.$farbe.'">';
   }
   }

?>

        

