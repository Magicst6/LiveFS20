<?php

echo "test";
include "db.php";
$isEntry3= "Select KursID From sv_LernenderKurs";
$result3 = mysqli_query($con, $isEntry3);
$resultarr3 = array();

while( $row3= mysqli_fetch_assoc($result3))
{
    $resultarr3[] = $row3['KursID'];
}

$array = array_unique($resultarr3);
asort($array);

echo "test";

$array= array_merge( array_filter($array));

for ($x = 0; $x < count($array); $x++)
{
    echo "<li>Eintrag von $x ist $array[$x] </li>";

}

    $df = fopen('file.csv', 'w');

    foreach ($array as $row) {
        echo $row;
        fputcsv($df, $row);
    }
    fclose($df);
echo "test";
?>