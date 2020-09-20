 <?php
  include 'db.php'; 
 $KID=$_GET['q'];
$isEntry= "Delete From sv_Kurse where KursID='$KID'";
    mysqli_query($con,$isEntry);
$isEntry= "Delete From sv_LernenderKurs where KursID='$KID'";
    mysqli_query($con,$isEntry);
$isEntry= "Delete From sv_KurseAll where KursID='$KID'";
    mysqli_query($con,$isEntry);
echo "Kurs ".$KID." gelöscht!";
    ?>