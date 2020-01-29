

<?php

include 'db.php';


if (isset($_POST['klasse'])) {
	
	$qry = "select KursID from sv_Kurse where Klasse=".mysqli_real_escape_string($con,$_POST['Klasse'])."";
	$res = mysqli_query($con, $qry);
	if(mysqli_num_rows($res) > 0) {
		echo '<option value="">------- Select -------</option>';
		while($row = mysqli_fetch_object($res)) {
			echo '<option>'.$row->KursID.'</option>';
		}
	} else {
		echo '<option value="">No Record</option>';
	}


}

?>