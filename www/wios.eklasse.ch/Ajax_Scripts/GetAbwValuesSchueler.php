<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */
include 'db.php';

$y = 0;
$Kursname = $_GET[ 'q' ];
$ID = '124';
$Lehrer = $_GET[ 'l' ];

$semester='WS19';
$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}

$AbwArch=$semester."_AbwesenheitenKompakt";

$LMArch=$semester."_LernendeModule";

$LArch=$semester."_Lernende";

 

preg_match( "/:(.*)/", $Lehrer, $output_array );
$Lehrer = $output_array[ 1 ];

if ($semester==$semDB){
    $isEntryLM = "Select * From sv_LernendeModule where ID='$ID'  ";

} else{

    $isEntryLM = "Select * From $LMArch where ID='$ID' ";

}

$resultLM = mysqli_query( $con, $isEntryLM );


while ( $lineLM = mysqli_fetch_array( $resultLM ) ) {
	
	$Name=$lineLM['Name'];
	$Vorname=$lineLM['Vorname'];
    $EMail=$lineLM['EMail'];
echo $Name;
	
	if ($semester==$semDB){
    $isEntryL = "Select * From sv_Lernende where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'  ";

} else{

    $isEntryL = "Select * From $LArch where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

}
	
$resultL = mysqli_query( $con, $isEntryL );


while ( $lineL = mysqli_fetch_array( $resultL ) ) {	
	
	$IDL=$lineL['ID'];


if ($semester==$semDB){
    $isEntry = "Select * From sv_AbwesenheitenKompakt where SchuelerID=$IDL  Group by Kursname ";

} else{

    $isEntry = "Select * From $AbwArch where SchuelerID=$IDL  Group by Kursname ";

}

$result = mysqli_query( $con, $isEntry );
$events = array();

while ( $line2 = mysqli_fetch_array( $result ) ) {
	$Kursname = $line2[ 'Kursname' ];

    if ($semester==$semDB){
        $isEntry1 = "Select * From sv_AbwesenheitenKompakt where SchuelerID=$IDL and Kursname ='$Kursname' Order by Datum asc ";

    } else{

        $isEntry1 = "Select * From $AbwArch where SchuelerID=$IDL and Kursname ='$Kursname' Order by Datum asc ";
    }


  
	$result1 = mysqli_query( $con, $isEntry1 );
	$abwges = 0;
	$y = 0;
	$data2 = null;
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {

		${'datac'.$y} = array(
			'Klasse' . $y => $line1[ 'Klasse' ],
			'Datum' . $y => $line1[ 'Datum' ],
			'Kommentar' . $y => $line1[ 'Kommentar' ],
			'KommentVer' . $y => $line1[ 'KommentarVerwaltung' ],
			'Abwesenheitsdauer' . $y => $line1[ 'Abwesenheitsdauer' ],
			'Lehrer' . $y => $line1[ 'Lehrer' ] );
		if ( $y == 0 ) {
			$data2 = $ {
				'datac' . $y
			};
		} else {

			$data2 = array_merge( $data2, $ {
				'datac' . $y
			} );
		}
		$y++;
		$abwges = $abwges + $line1[ 'Abwesenheitsdauer' ];

	}

	$data3 = array(
		'Rows' => $y );
	$data1 = array(
		'Kursname' => $Kursname,
		'AbwesenheitenGesamt' => $abwges );

	$data[] = array_merge( $data1, $data2, $data3 );
}
}
}
echo json_encode( $data );