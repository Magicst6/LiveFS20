
<head>

<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<!--	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.css">-->
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	</script>
</head>

<?php
include 'db.php';
 $Kursname=$_GET['Kursname'];
 $Schueler=$_GET['Schueler'];
 
	 preg_match("/:(.*)/", $Schueler, $output_array);
    $SchuelerID=$output_array[1];
?>

    <script type='text/javascript'>
		 function myFunction(){
            var x   = document.querySelector("#Kursname").value;
	
	  
            var y   = document.querySelector("#Schueler").value;
	
            window.location.href = "?&Schueler="+y+"&Kursname="+x;
        }

		
   var editor;
 var table;
	$(document).ready(function() {
		
	
	
	});
		
	function loadeditor(){	
		
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/notenvalues.php",
            type: 'POST',
            data: {
              'SchID': document . getElementById( "Schueler" ) . value,
				'KID':  document.getElementById( "Kursname" ).value
				
			
			}
        }, 
		
        table: ".datatables",
        fields: [ {
			 label: "KursID:",
                name: "KursID",
                type: "readonly",
                def: document.getElementById( "Kursname" ).value
		},		
				  {
			 label: "SchuelerID:",
                name: "SchuelerID",
                type: "readonly",
              
		},			
				 { 
                label: "Name:",
                name: "Name"
            }, {
                label: "Gewichtung:",
                name: "Gewichtung"
            }, {
                label: "Note:",
                name: "Note",
               
            }, {
                label: "Datum:",
                name: "Datum",
				 type: "date"
            }
				
        ]
    } );
		
		
		  // Activate an inline edit on click of a table cell
    $('.datatables').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit();
													  
													  
													  } }
        } );
    } );
		
 
	 
	}
	
		
	
function loadtable(){
		
			table = $( '.datatables' ).DataTable( {


			dom: "Bfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/notenvalues.php",
            type: 'POST',
            data: {
                  'SchID': document . getElementById( "Schueler" ) . value,
				'KID':  document.getElementById( "Kursname" ).value
				
				
			
			}
        }, 
		
				 columns: [
           
				 {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },


	{
					data: 'Name'
				
				},
					  {
					      data: 'Gewichtung'
						 
				},
					  {
				
						  data: 'Note'
						
				},
					 
					  {
		
						  data: 'Datum'
						 
				}
			],
			select: true,
        buttons: [
            { extend: "create", editor: editor ,text: 'Neue Note' },
            { extend: "edit",   editor: editor,text: 'Note bearbeiten' },
            { extend: "remove", editor: editor,text: 'Note löschen' }
        ]

		} );
	
}
   
		
	function getSchueler( str ) {

		

		if ( str == "" ) {

			document.getElementById( "Schueler" ).innerHTML = "";

			return;

		} else {

			if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}

			xmlhttp.onreadystatechange = function () {

				if ( this.readyState == 4 && this.status == 200 ) {

					document.getElementById( "Schueler" ).innerHTML = this.responseText;

				}

			};

			xmlhttp.open( "GET", "/Ajax_Scripts/getSchueler.php?q=" + document.getElementById( "Kursname" ).value, true );

			xmlhttp.send();

		}

	}
function tableshow() {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	loadeditor();
	
	
	loadtable();


	var str = document . getElementById( "Schueler" ) . value;
	var patt = /:(.*)/;
	var result = str . match( patt );
		
	editor . field( 'SchuelerID' ) . def( result[ 1 ] );
	editor . field( 'KursID' ) . def( document . getElementById( "Kursname" ) . value );
	editor . submit();

	
	


	
}

  


 
</script>

	

<br><br>
<html>
<body>
<?
include 'db.php';



global $current_user;

get_currentuserinfo();



/* echo 'Username: ' . $current_user-&gt;user_login . "\n";

echo 'User email: ' . $current_user-&gt;user_email . "\n";

echo 'User level: ' . $current_user-&gt;user_level . "\n";

echo 'User first name: ' . $current_user-&gt;user_firstname . "\n";

echo 'User last name: ' . $current_user-&gt;user_lastname . "\n";

echo 'User display name: ' . $current_user-&gt;display_name . "\n";

echo 'User ID: ' . $current_user-&gt;ID . "\n";



*/

$heute=date("Y-m-d");



?>

<br><br>

Lehrperson:

<br>

<?php



$isEntry= "Select ID From sv_Lehrpersonen where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_assoc($result))

{

    $value=$line2['ID'];



    $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Nachname'];

        $Vorname = $line3['Vorname'];



    }







    



    echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>

<?php
include 'db.php';


?>
 
 <br><br>Kursname:<br>
    <select name="Kursname" onchange="getSchueler(this.value)" id="Kursname" >

    <?php

    include 'db.php';

    

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);

if ($Kursname==null)
{
	 echo "<option>" . '-Select-' . "</option>";
}
else{
 echo "<option>" . $Kursname . "</option>";
		}
   



    while( $line2= mysqli_fetch_array($result))

    {

        for($x = 1; $x <= 30; $x++)

        {



            $value = $line2['Kurs'.$x];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    }

    ?>



</select>

<br><br>
    Schüler:<br>
 
<select name="Schueler"   id="Schueler" onChange="tableshow()" >
<?php
	$Tab="sv_LernenderKurs";

$isEntry= "Select SchuelerID From $Tab Where KursID='$Kursname' ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['SchuelerID'];
}
$uniquearr = array_unique($resultarr);

echo "<option>" .$Schueler. "</option>";
echo "<option>" .'-Select-'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Name, Vorname From sv_Lernende WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        
?>

       
    </select><br><br>
	
	


	<html>
	<style>
		
		
	 button {
          color: white;
        }
	
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
	
	.iconSettings,
	td.details-control:before,
	tr.shown td.details-control:before {
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
						<th>Name</th>
	                    <th>Gewichtung</th>
						<th>Note</th>
						<th>Datum</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>


		
	</body>
</html>
	

