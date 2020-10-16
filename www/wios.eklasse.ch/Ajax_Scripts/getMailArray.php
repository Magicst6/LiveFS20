<?

include 'db.php';

$Kursname = $_GET[ 'q' ];
///$Kursname= 'KV3.rw.FS20';

$isEntry = "Select SchuelerID From sv_LernenderKurs where KursID='$Kursname'";

$result = mysqli_query( $con, $isEntry );
$EMailall = '';
while ( $line3 = mysqli_fetch_array( $result ) )

{

	$ID = $line3[ 'SchuelerID' ];


	$isEntry1 = "Select EMail From sv_LernendeModule where ID='$ID'";

	$result1 = mysqli_query( $con, $isEntry1 );

	while ( $line1 = mysqli_fetch_array( $result1 ) )



	{

		$EMail = $line1[ 'EMail' ];

	if ( strpos($EMail, '@') !== false )
		$EMailall=$EMailall.$EMail.',';
		
	}
		
}
//$EMailall=substr($EMailall, 0, -4);	
			
	echo $EMailall;


?>