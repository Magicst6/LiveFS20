  <?php
  include 'db.php';



$Klasse = $_POST['Klasse'];   // department id

$sql = "Select KursID From sv_Kurse Where Klasse='$Klasse'";

$result = mysqli_query($con,$sql);

$kurse_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $kursid = $row['KursID'];


    $kurse_arr[] = array("kursid" => $userid);
}
$kurse_unique = array_unique($kurse_arr);

// encoding array to json format
echo json_encode($kurse_unique);

?>