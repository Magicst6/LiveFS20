<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 12:09
 */
include 'db.php';
//$Lehrer=$_GET['lehrer'];
//preg_match("/:(.*)/", $Lehrer, $output_array);
//$Lehrer=$output_array[1];

$y=0;
$Kursname=$_GET['q'];
$KlasseInput=$_GET['k'];
$Lehrer=$_GET['l'];
$semester=$_GET['s'];


$lkArch=$semester."_LernenderKurs";
$notenArch=$semester."_Noten";

$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }

preg_match("/:(.*)/", $Lehrer, $output_array);
$Lehrer=$output_array[1];

if ($semester==$semDB || $semester==''){
    $isEntry = "Select * From sv_LernenderKurs where KursID='$Kursname' order by Nachname asc ";

} else{

    $isEntry = "Select * From $lkArch where KursID='$Kursname' order by Nachname asc ";

}


    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Kursname<>"-Select-"){
	
	$Notenschnitt=null;
		$Notegesamt=0;	
$c=0;
	
	$a=0;
    while ($line1 = mysqli_fetch_array($result)) {
		$ID=$line1['SchuelerID'];
		
		$data0 = array(
			
		  'Vorname' => $line1['Vorname'],
			 'Nachname' => $line1['Nachname'],
			 'IDSchueler' => $line1['SchuelerID']
			);
          
		$isEntryUpdNull = "UPDATE sv_LernenderKurs SET Note1  = '',Note2  = '',Note3  = '',Note4  = '',Note5  = '',Note6  = '',Note7  = '',Note8  = '',Note9  = '' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpdNull );	

		

         if ($semester==$semDB){
            
			 
			 $isEntry1 = "Select * From sv_Noten where KursID='$Kursname' and SchuelerID='$ID'   ";
			
			
			
			
        } else{

            $isEntry1 = "Select * From $notenArch where KursID='$Kursname' and SchuelerID='$ID'  ";

        }


    $result1 = mysqli_query($con, $isEntry1);
    $events = array();

	
	$Notenschnitt=null;
		$Notegesamt=0;	
$c=0;
	
	$a=0;
		$data11 = null;
		
		
		
    while ($line2 = mysqli_fetch_array($result1)) {
		
		
	
		if ($a<9){
		
				
		$a++;
					$Dateb = "Datum"; 
					$Noteb = "Note";
					$Gewb = "Gewichtung";
					$Nameb = "Name";
						$DatumAK = $line2[ $Dateb ];
						$NameAK = $line2[ $Nameb ];
						$GewAK = $line2[ $Gewb ];
						$NoteAK = $line2[ $Noteb ];



						//Schreibe Spaltennamen

						if ( $NoteAK >= 1  and $GewAK <= 100 and $GewAK > 0   ) {
							$Notegesamt = $Notegesamt + ( $NoteAK * $GewAK / 100 );
							$c = $c + $GewAK / 100;
						}
						
		
		
			
			${"data".$a}=array(
           	'Datum'.$a => $line2['Datum' ],
		    'Name'.$a => $line2[ 'Name' ],
		  'Gewichtung'.$a => $line2[ 'Gewichtung' ],
			'Note'.$a => $line2[ 'Note' ]);
			
			if ( $a == 1 ) {
			$data11 = $ {
				'data' . $a
			};
		} else {

			$data11 = array_merge( $data11, $ {
				'data' . $a
			} );
		}
			if ($NoteAK){ 
			switch ($a) {
    case 1:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note1  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 2:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note2  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 3:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note3  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
	case 4:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note4  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 5:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note5  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 6:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note6  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
	case 7:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note7  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 8:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note8  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 9:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note9  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
}
	
		}
		
    }
	}
		
			do {
				$a++;
				${"data".$a}=array(
           	'Datum'.$a => null,
		    'Name'.$a => null,
		  'Gewichtung'.$a => null,
			'Note'.$a => null);
			
			if ( $a == 1 ) {
			$data11 = $ {
				'data' . $a
			};
		} else {

			$data11 = array_merge( $data11, $ {
				'data' . $a
			} );
		}
			}while ($a<=9);
		

		if ($c>0){
		$Notenschnitt=$Notegesamt/$c;
			$Notenschnitt=round($Notenschnitt, 2);
		}
		$data10=array('Notenschnitt' => $Notenschnitt);
        $data12=array('empty' => '');
		
		
		$data[] = array_merge( $data0,$data11,$data10,$data12);
			
	}
	

}
$KN=$Kursname;


	echo json_encode($data);



