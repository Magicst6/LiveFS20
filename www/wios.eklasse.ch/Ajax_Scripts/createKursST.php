<?php
include 'db.php';


$KursKuerzel = $_GET[ 'l' ];

$Kursname = $_GET[ 'k' ];

$Lehrer = $_GET[ 'lp' ];
$Zimmer = $_GET[ 'z' ];
$Farbe = $_GET[ 'f' ];
$Profil = $_GET[ 'p' ];


		 $isdouble=0;
			
		   $isEntry21= "Select KursKuerzel From sv_KurseStammdaten";

            $result21 = mysqli_query($con, $isEntry21);

            while( $line31= mysqli_fetch_array($result21))

            {

                $KK = $line31['KursKuerzel'];

                if ($KK==$KursKuerzel)
				{
					$isdouble=1;
				}



            }

if ($isdouble==0){
$isEntry= "Insert Into sv_KurseStammdaten (KursKuerzel,Kursname,Farbe,Lehrer,Zimmer,Profil) VALUES ('$KursKuerzel','$Kursname','$Farbe','$Lehrer','$Zimmer', '$Profil') ";
 mysqli_query( $con, $isEntry);
}
else echo "Das Kurskürzel gibt es bereits. Bitte ein anderes wählen.";







        
?>
