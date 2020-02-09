<?php


include "db.php";
echo "test";
global $current_user;
get_currentuserinfo();


$isEntry1= "Select ID From sv_Lehrpersonen where User_ID=$current_user->ID";
$result1 = mysqli_query($con,$isEntry1);

while( $line1= mysqli_fetch_array($result1)) {
    $LP_ID = $line1['ID'];
    echo $LP_ID;
    echo "<br>";

}
?>
