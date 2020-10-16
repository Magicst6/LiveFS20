<?
include 'db.php';
$ID=$_GET['q'];


		



 $isEntry2 = "Select Vorname, Nachname From sv_LernenderKurs where SchuelerID='$ID' ";
    $result2 = mysqli_query($con, $isEntry2);

    while ($value3 = mysqli_fetch_array($result2)) {
          $Vorname=$value3['Vorname'];
		 $Nachname=$value3['Nachname'];
	}

echo $Vorname.' '.$Nachname;