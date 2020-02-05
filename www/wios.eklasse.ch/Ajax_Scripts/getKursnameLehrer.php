<?php
include 'db.php';
$Lehrer=$_GET['q'];
preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

$y=0;

$semester =$_GET['s'];





$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}

if ($semester==$semDB or $semester==null){
    $Tab='sv_Lehrpersonen';
    $TabKurse="sv_Kurse";

} else{


    $Tab=$semester."_Lehrpersonen";
    $TabKurse=$semester."_Kurse";
}


if ($_GET['q']=="Alle")
{
	
	$isEntry= "Select KursID From $TabKurse order by KursID asc ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['KursID'];
}
$uniquearr = array_unique($resultarr);


echo "<option>" .'-Select-'. "</option>";
foreach ($uniquearr as $value)
{
    echo "<option>" . $value . "</option>";
}
echo '&nsbp;';
	
}else{
$isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From $Tab Where ID = '$Lehrer'";
$result = mysqli_query($con,$isEntry);


 echo "<option>" . '-Select-' . "</option>";
	

while( $line2= mysqli_fetch_array($result))
{
	
for($x = 1; $x <= 30; $x++)
{

$value = $line2['Kurs'.$x];
if ($value<>"") echo "<option>" . $value . "</option>";

}
}
}
?>
