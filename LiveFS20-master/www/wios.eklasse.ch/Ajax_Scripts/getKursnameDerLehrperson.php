<?php
     include 'db.php';
$Lehrer=$_GET['q'];
$Kurse=$_GET['k'];
preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

$isEntry = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25, Kurs26, Kurs27, Kurs28, Kurs29, Kurs30 From sv_Lehrpersonen Where  ID='$Lehrer' ";
$result = mysqli_query($con, $isEntry);
$y=0;

while( $value= mysqli_fetch_array($result))
{

for($x = 1; $x <= $Kurse; $x++)
{

$Kurs = "Kurs"."$x";
$KursValue= $value[$Kurs];
echo '<br/>';
echo $Kurs.': ';
echo '<select Name='.$Kurs.'  id='.$Kurs.' >';

$isEntry1= "Select KursID From sv_Kurse order by KursID asc";
$result1 = mysqli_query($con,$isEntry1);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result1))
{
  $resultarr[] = $line2['KursID'];
}
$uniquearr = array_unique($resultarr);
foreach ($uniquearr as $value2) {
if ($value2 == $_GET['.$Kurs.'])
 {
//echo "<option>" . $_GET['.$Kurs.'] . "</option>";
 }
else{
}

}
echo "<option>" .$KursValue. "</option>";
echo "<option>" .''. "</option>";

foreach ($uniquearr as $value1)
{
echo "<option>" . $value1 . "</option>";
}
$isEntry1= "Select KursID From sv_ExtraKurse";
$result1 = mysqli_query($con,$isEntry1);
$resultarr1 = array();


while( $line3= mysqli_fetch_assoc($result1))
{
  $resultarr1[] = $line3['KursID'];
}
$uniquearr1 = array_unique($resultarr1);

foreach ($uniquearr1 as $value3) {
if ($value3 == $_GET['.$Kurs.'])
 {
echo "<option>" . $_GET['.$Kurs.'] . "</option>";
 }
else{}

}
foreach ($uniquearr1 as $value3)
{
echo "<option>" . $value3 . "</option>";
}
echo '&nsbp;';


echo '</select><br/>';

}

}
?>
