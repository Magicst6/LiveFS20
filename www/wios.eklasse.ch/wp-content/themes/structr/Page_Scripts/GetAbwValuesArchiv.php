<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */


include 'db.php';

$y = 0;
$Kursname = $_GET[ 'k' ];
//$ID = $_GET[ 'k' ];
$Lehrer = $_GET[ 'l' ];

$semester=$_GET['s'];

$LM=$semester.'_LernendeModule';
$LK=$semester.'_LernenderKurs';
$Lernende=$semester.'_Lernende';

$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}

$AbwArch=$semester."_AbwesenheitenKompakt";


preg_match( "/:(.*)/", $Lehrer, $output_array );
$Lehrer = $output_array[ 1 ];




    $isEntry = "Select * From $AbwArch where Kursname='$Kursname'  Group by SchuelerID order by Nachname asc ";




$result = mysqli_query( $con, $isEntry );
$events = array();

while ( $line2 = mysqli_fetch_array( $result ) ) {
	$ID = $line2[ 'SchuelerID' ];
	$Vorname = $line2[ 'Vorname' ];
	$Nachname = $line2[ 'Nachname' ];
    

        $isEntry1 = "Select * From $AbwArch where SchuelerID=$ID and Kursname ='$Kursname' Order by Datum asc ";

    

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
		'SchuelerID' => $ID,
		'Vorname' => $Vorname,
		'Nachname' => $Nachname,
		'AbwesenheitenGesamt' => $abwges );
	
	$data[] = array_merge( $data1, $data2, $data3 );
	
	 $isEntry1 = "Select * From $Lernende where ID='$ID'  ";
	$result1 = mysqli_query( $con, $isEntry1 );
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {

		$EMail=$line1['EMail'];
		$Vorname=$line1['Vorname'];
		$Nachname=$line1['Name'];
		$Klasse=$line1['Klasse'];
	}
	if ($EMail==''){
		$EMail='nomail';
	}

	$isEntry1 = "Select * From $LM where EMail='$EMail' or ((Vorname='$Vorname' and Name='$Nachname' ) and (Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'))";
	$result1 = mysqli_query( $con, $isEntry1 );
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {
      
		$SchID=$line1['ID'];
	}

	if ($EMail==""){
		$SchID=$ID;
	}
	
	$isEntryUpd = "UPDATE $LK SET Abwesenheiten = '$abwges' where SchuelerID='$SchID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	

}

	
echo json_encode( $data );


