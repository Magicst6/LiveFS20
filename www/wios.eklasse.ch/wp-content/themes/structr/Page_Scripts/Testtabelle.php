<style type="text/css">
	.auto-style1 {
		background-color: red;
	}
	
	.auto-style2 {
		color: black;
		background-color: ;
		font-size: large;
	}

</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>DataTables example - Ajax data source (arrays)</title>
	<link rel="stylesheet" type="text/css" href="/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/DataTables-1.10.19/examples/resources/demo.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="/DataTables-1.10.19/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	
//$(document).ready(function() {
//	$('#example').DataTable( {
//		"ajax": "/GetNotenValues.php"
//	} );
//} );
//
//	</script>
	
</head>
<!--
			<div class="demo-html width=50%"></div>
			<table id="example" class="display" style="width:50%">
				<thead>
					<tr>
						<th>Note</th>
						<th>Name</th>
						<th>Gewichtung</th>
						<th>Datum</th>
					</tr>
				</thead>
				
			</table>
			
</html>-->
	
	<script>
	
	$(document).ready(function() {
  
 
	var data= [{"Note":"6","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"2","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"3.7","Name":"dsgs","Gewichtung":"25","Datum":"2019-06-16"}]  ;
	
  
  
  function format (data) {
      return '<div class="details-container">'+
          '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
              '<tr>'+
                  '<td class="title">Person ID:</td>'+
                  '<td>'+data.id+'</td>'+
              '</tr>'+
              '<tr>'+
                  '<td class="title">Name:</td>'+
                  '<td>'+data.Note + ' ' + data.Name +'</td>'+
                  '<td class="title">Email:</td>'+
                  '<td>'+data.Gewichtung+'</td>'+
              '</tr>'+
              '<tr>'+
                  '<td class="title">Country:</td>'+
                  '<td>'+data.country+'</td>'+
                  '<td class="title">IP Address:</td>'+
                  '<td>'+data.ip_address+'</td>'+
              '</tr>'+
          '</table>'+
        '</div>';
  };
  
  var table = $('.datatables').DataTable({
      
	
	   // ajax: {
//            url: "/GetNotenValues.php",
//            dataSrc: ""
//        },
    columns : [
      {
        className      : 'details-control',
        defaultContent : '',
        data           : null,
        orderable      : false
      },
      {data : 'Note'},
      {data : 'Name'},
      {data : 'Gewichtung'},
      {data : 'Datum'}
    ],
    
   data:data,
  });
 
  $('.datatables tbody').on('click', 'td.details-control', function () {
     var tr  = $(this).closest('tr'),
         row = table.row(tr);
    
     if (row.child.isShown()) {
       tr.next('tr').removeClass('details-row');
       row.child.hide();
       tr.removeClass('shown');
     }
     else {
       row.child(format(row.data())).show();
       tr.next('tr').addClass('details-row');
       tr.addClass('shown');
     }
  });
 
});</script>
	
	
<div class="container">
  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatables">
        <thead>
          <tr>
            <th></th>
            <th>Note</th>
            <th>Name</th>
            <th>Gewichtung</th>
			<th>Datum</th>  
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
	</html>
	<style>
.container {
  margin-top: 15px;
}
.container .details-row td {
  padding: 0;
  margin: 0;
}

.details-container {
  width: 100%;
  height: 100%;
  background-color: #FFF;
  padding-top: 5px;
}

.details-table {
  width: 100%;
  background-color: #FFF;
  margin: 5px;
}

.title {
  font-weight: bold;
}

.iconSettings, td.details-control:before, tr.shown td.details-control:before {
  margin-top: 5px;
  margin-bottom: 10px;
  font-size: 12px;
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
}

td.details-control {
  cursor: pointer;
  text-align: center;
}
td.details-control:before {
  content: '\2b';
}

tr.shown td.details-control:before {
  content: '\2212';
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




	$isEntry2 = "SELECT  SchuelerID From sv_LernenderKurs where KursID='$Kursname' ";
	$result2 = mysqli_query( $con, $isEntry2 );
	$s = 0;
	while ( $value0 = mysqli_fetch_array( $result2 ) ) {

		$IDAK = $value0[ 'SchuelerID' ];

		if ( $IDSchueler <> null ) {
			$s++;

			$IDAK = $IDSchueler;
		}
		if ( $s < 2 ) {

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
			$isEntry = "SELECT  Name, Vorname From sv_Lernende Where ID='$IDAK' Order By Name ";
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





mysqli_close( $con );
?>
</form>