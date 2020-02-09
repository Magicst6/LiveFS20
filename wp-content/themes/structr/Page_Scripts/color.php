<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */

include 'db.php';
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];
$Lehrer=$_GET['q'];
$y=0;



$isEntry= "Select * From sv_KurseAll";
$result = mysqli_query($con,$isEntry);
$events = array();




while( $line2= mysqli_fetch_array($result))
{
    $data[]= array(
        'id' => $line2['ID'],
        'title' => $line2['Kursname'],
        'start' => $line2['Start'],
        'end' => $line2['Ende']);



}


// Output json for our calendar
echo "#378006";


?>


