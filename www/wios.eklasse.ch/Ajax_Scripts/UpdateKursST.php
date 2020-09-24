



<?php
include 'db.php';




$KursKuerzel = $_GET[ 'l' ];
$ID = $_GET[ 'm' ];
$Kursname = $_GET[ 'k' ];
$Farbe = $_GET[ 'f' ];
//echo $Farbe;
$Lehrer = $_GET[ 'lp' ];
$Zimmer = $_GET[ 'z' ];
$Profil = $_GET[ 'p' ];



		 $isdouble=0;
			
		   $isEntry21= "Select KursKuerzel From sv_KurseStammdaten Where ID<>'$ID'";

            $result21 = mysqli_query($con, $isEntry21);

            while( $line31= mysqli_fetch_array($result21))

            {

                $KK = $line31['KursKuerzel'];

                if ($KK==$KursKuerzel)
				{
					$isdouble=1;
				}



            }

if ($isdouble<>1){
$isEntry = "Update sv_KurseStammdaten SET KursKuerzel='$KursKuerzel', Kursname='$Kursname', Farbe='$Farbe', Lehrer='$Lehrer', Zimmer='$Zimmer', Profil='$Profil'  Where ID='$ID'";
 mysqli_query( $con, $isEntry);
}
else echo "Das Kurskürzel gibt es bereits. Bitte ein anderes wählen."



?>