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

<script>
var editor; // use a global for the submit and return data rendering in the examples
 var table;
var	editor1;
	var editor2;
	var table2;
	var table1;
		$(document).ready(function() {
			loadeditor();
			loadeditor1();
		});
			

	
	function loadeditor(){
   
	    editor2 = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getLernenderKurs.php",
            type: 'POST',
            data: {
                  'klasse': document . getElementById( "klasse1" ) . value
			}
        }, 
        table: "#dtbl2",
        fields: [ {
                label: "ID:",
                name: "ID",
			    type: "readonly"
            },
			
			{
                label: "Vorname:",
                name: "Vorname"
            }, {
                label: "Nachname:",
                name: "Nachname"
            }, {
                label: "Klasse:",
                name: "Klasse",
			    type: "readonly"
            }, {
                label: "SchülerID:",
                name: "SchülerID"
            },
				{
                label: "KursID:",
                name: "KursID"
            },
				 {
                label: "Profil:",
                name: "Profil"
            }
        ]
    } );
	editor2.on( 'edit', function ( e, json, data ) {
    
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}


			
			xmlhttp.open( "GET", "/Ajax_Scripts/updateLernendeModule.php",true );

			xmlhttp.send();
} );
	editor2.on( 'create', function ( e, json, data ) {
    
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}


			
			xmlhttp.open( "GET", "/Ajax_Scripts/updateLernendeModule.php",true );

			xmlhttp.send();
} );
	
	editor2.on( 'remove', function ( e, json, data ) {
    
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}


			
			xmlhttp.open( "GET", "/Ajax_Scripts/updateLernendeModule.php",true );

			xmlhttp.send();
} );
 
    // Activate an inline edit on click of a table cell
    $('#dtbl2').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
		
	
 
   table2= $('#dtbl2').DataTable( {
        dom: "lBfrtip",
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getLernenderKurs.php",
            type: 'POST',
            data: {
                  'klasse': document . getElementById( "klasse1" ) . value
			}
        }, 
        order: [[ 1, 'asc' ]],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
			 { data: "ID" },
            { data: "Vorname" },
            { data: "Nachname" },
			{ data: "Klasse" },
            { data: "SchülerID" },
            { data: "KursID" },
			{ data: "Profil" }
           
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor2, text:"Neuer Eintrag" },
            { extend: "edit",   editor: editor2, text:"Zeile bearbeiten" },
            { extend: "remove", editor: editor2, text:"Zeile löschen" }
        ]
    } );
		
	
} 


	
	function tableshow() {
	
	
	if ( table2 ) {
		table2.destroy();
	}
	
	if ( editor2 ) {
		editor2.destroy();
	}
		
	
	
	
	loadeditor();


	
		
	
	

	editor2 . field( 'Klasse' ) . def( document . getElementById( "klasse1" ) . value );
	editor2 . submit();
	


	
}


</script>


 Bestehende Klasse wählen:<br />

    <br>

    <select name="klasse1" id="klasse1" onchange="tableshow()" onload="tableshow()" required="required" >



        <?php

        include 'db.php';


        $isEntry= "Select Klasse From sv_Lernende";

        $result1 = mysqli_query($con, $isEntry);

        $resultarr1 = array();

        echo "<option></option>";



        while( $line2= mysqli_fetch_assoc($result1))

        {

        $resultarr1[] = $line2['Klasse'];

        }

        $uniquearr1 = array_unique($resultarr1);

        asort($uniquearr1);

        echo "<option>" . '' . "</option>";





        foreach ($uniquearr1 as $value)

        {

        if ($value == $_GET['klasse']){}

        else

        {

        echo "<option>" . $value . "</option>";

        }

        }

        ?>



    </select>

<br><br>

<style>
	 button {
          color: white;
        }
	</style>




<br><br>


<table id="dtbl2" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
				<th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
				<th>Klasse</th>
                <th>SchülerID</th>
				<th>KursID</th>
				<th>Profil</th>
            </tr>
        </thead>
    </table>