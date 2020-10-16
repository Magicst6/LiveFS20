
    <style>

        body {
            font-family:"Dosis", "Helvetica Neue", sans-serif;
            color:#232323;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>


<b> Unten die Noten der Kursteilnehmer...</b>
<br><br>
<?php
include 'db.php';

$Kursname = $_GET[ 'q' ];
$IDSchueler = $_GET[ 'z' ];


preg_match( "/:(.*)/", $IDSchueler, $output_array );

$IDSchueler = $output_array[ 1 ];


if ( $Kursname <> '' && $Kursname <> "-Select-" ) {

if ( $IDSchueler <> null or $IDSchueler <>0 ) {
$IDAK = $IDSchueler;

				
echo '<table id="table_id" class="blueTable">';
			echo "<thead>";
			echo "<tr>";
			echo "<th width=240>" . 'Note' . "</th>";
			echo "<th width= 240>" . 'Name' . "</th>";
			echo "<th width=240>" . 'Gewichtung (in %)' . "</th>";
			echo "<th width=240>" . 'Datum' . "</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			
			$isEntry = "SELECT  Name, Vorname From sv_LernendeModule Where ID='$IDAK' ";
			$result = mysqli_query( $con, $isEntry );
			$y = 0;

			while ( $value = mysqli_fetch_array( $result ) ) {


				$Name = $value[ 'Name' ];
				$Vorname = $value[ 'Vorname' ];
					if ( $IDSchueler == null ){
			
							echo "<br><br>";
		echo '<p style="font-size: 32px; font-weight:bold;">'.$Name.' '.$Vorname.':</p> ';
				
			}
				echo "<h3>Gesamtnote:<h3>";
				$Notegesamt = 0;
				$c = 0;
				for ( $b = 1; $b < 10; $b++ ) {
					$Dateb = "Datum" . $b;
					$Noteb = "Note" . $b;
					$Gewb = "Gewichtung" . $b;
					$Nameb = "Name" . $b;


					$isEntry1 = "SELECT  $Noteb,$Dateb,$Nameb,$Gewb From sv_LernenderKurs where SchuelerID='$IDAK' and KursID='$Kursname' ";
					$result1 = mysqli_query( $con, $isEntry1 );

					while ( $value1 = mysqli_fetch_array( $result1 ) ) {
						$DatumAK = $value1[ $Dateb ];
						$NameAK = $value1[ $Nameb ];
						$GewAK = $value1[ $Gewb ];
						$NoteAK = $value1[ $Noteb ];



						//Schreibe Spaltennamen

						if ( $NoteAK >= 1 and $NoteAK <= 6 and $GewAK <= 100 and $GewAK > 0 and $DatumAK <> null and $NameAK <> null ) {
							$Notegesamt = $Notegesamt + ( $NoteAK * $GewAK / 100 );
							$c = $c + $GewAK / 100;


												
							echo "<tr>";

							echo '<td>'.$NoteAK .'</td>';
							echo '<td>' . $NameAK . '</td>';
							echo '<td>' . $GewAK . '</td>';
							echo '<td>' . $DatumAK . '</td>';
							echo "</tr>";

						}
					}

				}




			}
			if ( $c > 0 ) {
				$Notenschnitt = $Notegesamt / $c;
				echo "</tbody>";
				echo '<input name="Gesnote" type="text" style="width: 240px" readonly value=' . $Notenschnitt . '   >';
			}
}
	
{
	$isEntry2 = "SELECT  SchuelerID From sv_LernenderKurs where KursID='$Kursname' Group By SchuelerID  ";
	$result2 = mysqli_query( $con, $isEntry2 );
	
	while ( $value0 = mysqli_fetch_array( $result2 ) ) {

		$IDAK = $value0[ 'SchuelerID' ];

			

			
		
			
echo '<table style="width:100%" id="table_id" class="blueTable">';
			echo "<thead>";
			echo "<tr>";
			echo "<th width=240>" . 'Note' . "</th>";
			echo "<th width=240>" . 'Name' . "</th>";
			echo "<th width=240>" . 'Gewichtung (in %)' . "</th>";
			echo "<th width=240>" . 'Datum' . "</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

			
			$isEntry = "SELECT  Name, Vorname From sv_Lernende Where ID='$IDAK' ";
			$result = mysqli_query( $con, $isEntry );
			$y = 0;

			while ( $value = mysqli_fetch_array( $result ) ) {


				$Name = $value[ 'Name' ];
				$Vorname = $value[ 'Vorname' ];

			
							echo "<br><br>";
		echo '<p style="font-size: 32px; font-weight:bold;">'.$Name.' '.$Vorname.':</p> ';
				
			
				echo "<h3>Gesamtnote:<h3>";
				$Notegesamt = 0;
				$c = 0;
				for ( $b = 1; $b < 10; $b++ ) {
					$Dateb = "Datum" . $b;
					$Noteb = "Note" . $b;
					$Gewb = "Gewichtung" . $b;
					$Nameb = "Name" . $b;


					$isEntry1 = "SELECT  $Noteb,$Dateb,$Nameb,$Gewb From sv_LernenderKurs where SchuelerID='$IDAK' and KursID='$Kursname' ";
					$result1 = mysqli_query( $con, $isEntry1 );

					while ( $value1 = mysqli_fetch_array( $result1 ) ) {
						$DatumAK = $value1[ $Dateb ];
						$NameAK = $value1[ $Nameb ];
						$GewAK = $value1[ $Gewb ];
						$NoteAK = $value1[ $Noteb ];



						//Schreibe Spaltennamen

						if ( $NoteAK >= 1 and $NoteAK <= 6 and $GewAK <= 100 and $GewAK > 0 and $DatumAK <> null and $NameAK <> null ) {
							$Notegesamt = $Notegesamt + ( $NoteAK * $GewAK / 100 );
							$c = $c + $GewAK / 100;


							//					
							echo "<tr>";

							echo '<td>'.$NoteAK .'</td>';
							echo '<td>' . $NameAK . '</td>';
							echo '<td>' . $GewAK . '</td>';
							echo '<td>' . $DatumAK . '</td>';
							echo "</tr>";

						}
					}

				}




			}
			if ( $c > 0 ) {
				$Notenschnitt = $Notegesamt / $c;
				echo "</tbody>";
				echo '<input name="Gesnote" type="text" style="width: 240px" readonly value=' . $Notenschnitt . '   >';
			}
		}
	

}
if ( $Kursname == "alle Kurse" ) {





	$isEntry2 = "SELECT  KursID From sv_LernenderKurs where SchuelerID='$IDSchueler' ";
	$result2 = mysqli_query( $con, $isEntry2 );
	$s = 0;
	while ( $value0 = mysqli_fetch_array( $result2 ) ) {

		$KursIDAK = $value0[ 'KursID' ];



		echo '<table id="table_id" class="blueTable">';
		echo "<thead>";
		echo "<tr>";
		echo "<th width=240>" . 'Note' . "</th>";
		echo "<th width= 240>" . 'Name' . "</th>";
		echo "<th width=240>" . 'Gewichtung (in %)' . "</th>";
		echo "<th width=240>" . 'Datum' . "</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";




		echo "<br>";
		echo '<p style="font-size: 32px; font-weight:bold;">' . $KursIDAK . ':</p> >';
echo "<h3>Gesamtnote:<h3>";
		$Notegesamt = 0;
		$c = 0;
		for ( $b = 1; $b < 10; $b++ ) {
			$Dateb = "Datum" . $b;
			$Noteb = "Note" . $b;
			$Gewb = "Gewichtung" . $b;
			$Nameb = "Name" . $b;


			$isEntry1 = "SELECT  $Noteb,$Dateb,$Nameb,$Gewb From sv_LernenderKurs where SchuelerID='$IDSchueler' and KursID='$KursIDAK' ";
			$result1 = mysqli_query( $con, $isEntry1 );

			while ( $value1 = mysqli_fetch_array( $result1 ) ) {
				$DatumAK = $value1[ $Dateb ];
				$NameAK = $value1[ $Nameb ];
				$GewAK = $value1[ $Gewb ];
				$NoteAK = $value1[ $Noteb ];



				//Schreibe Spaltennamen

				if ( $NoteAK >= 1 and $NoteAK <= 6 and $GewAK <= 100 and $GewAK > 0 and $DatumAK <> null and $NameAK <> null ) {
					$Notegesamt = $Notegesamt + ( $NoteAK * $GewAK / 100 );
					$c = $c + $GewAK / 100;



					//					
					echo "<tr>";

					echo '<td>'.$NoteAK .'</td>';
							echo '<td>' . $NameAK . '</td>';
							echo '<td>' . $GewAK . '</td>';
							echo '<td>' . $DatumAK . '</td>';
					echo "</tr>";

				}
			}

		}
		if ( $c > 0 ) {
			$Notenschnitt = $Notegesamt / $c;
			echo "</tbody>";

			echo '<input name="Gesnote" type="text" style="width: 240px" readonly value=' . $Notenschnitt . '   >';



		}

	}
}


}


mysqli_close( $con );
?>






