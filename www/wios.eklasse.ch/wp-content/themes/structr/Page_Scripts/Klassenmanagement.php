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
    editor = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getKlassenEdit.php",
            type: 'POST',
            data: {
                  'klasse': document . getElementById( "klasse1" ) . value
			}
        }, 
        table: "#dtbl",
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
                name: "Name"
            }, {
                label: "Klasse:",
                name: "Klasse",
			    type: "readonly"
            }, {
                label: "User_ID:",
                name: "User_ID",
				  type: "readonly"
            },
				{
                label: "Email:",
                name: "EMail",
					  type: "readonly"
            }, {
                label: "Loginname:",
                name: "Loginname",
				  type: "readonly"
            },
				 {
                label: "Profil:",
                name: "Profil"
            }
        ]
    } );
	editor.on( 'edit', function ( e, json, data ) {
    
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
	editor.on( 'create', function ( e, json, data ) {
    
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
	
	editor.on( 'remove', function ( e, json, data ) {
    
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
    $('#dtbl').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
		
	
 
   table= $('#dtbl').DataTable( {
        dom: "lBfrtip",
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getKlassenEdit.php",
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
            { data: "Name" },
			{ data: "Klasse" },
            { data: "User_ID" },
            { data: "EMail" },
            { data: "Loginname" },
			{ data: "Profil" }
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor, text:"Neuer Schüler" },
            { extend: "edit",   editor: editor, text:"Schüler bearbeiten" },
            { extend: "remove", editor: editor, text:"Schüler löschen" }
        ]
    } );
		
	  
		
	
} 


	
	function tableshow() {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	
	
	
	
	loadeditor();


	
		
	
	editor . field( 'Klasse' ) . def( document . getElementById( "klasse1" ) . value );
	editor . submit();

	

	
}
	function loadeditor1(){
	
	 // Activate an inline edit on click of a table cell
    $('#dtbl1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
		
		 editor1 = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw.php",
            type: 'POST',
            data: {
                  'klasse': document . getElementById( "klasse1" ) . value
			}
        }, 
        table: "#dtbl1",
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
                name: "Name"
            },  {
                label: "User_ID:",
                name: "User_ID",
				  type: "readonly"
            },
				{
                label: "Email:",
                name: "EMail",
			      type: "readonly"
            }, 
				 {
                label: "Profil:",
                name: "Profil"
					 
            },{
                label: "Loginname:",
                name: "Loginname",
				  type: "readonly"
            },
				  {
                label: "Modul1:",
                name: "Modul1",
				 type: "readonly"
            },
				  {
                label: "Modul2:",
                name: "Modul2"
            },
				 
				  {
                label: "Modul3:",
                name: "Modul3"
            },
				 
				  {
                label: "Modul4:",
                name: "Modul4"
            },
				 
				  {
                label: "Modul5:",
                name: "Modul5"
            },
				 
				  {
                label: "Modul6:",
                name: "Modul6"
            },
				 
				  {
                label: "Modul7:",
                name: "Modul7"
            },
				  {
                label: "Modul8:",
                name: "Modul8"
            },
				 
				  {
                label: "Modul9:",
                name: "Modul9"
            },
				 
				 
				 
        ]
    } );
  // Activate an inline edit on click of a table cell
    $('#dtbl1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
		
			table1= $('#dtbl1').DataTable( {
        dom: "lBfrtip",
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw.php",
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
            { data: "Name" },
            { data: "User_ID" },
            { data: "EMail" },
			{ data: "Profil" },
			{ data: "Loginname" },
			{ data: "Modul1" },
			{ data: "Modul2" },
			{ data: "Modul3" },
			{ data: "Modul4" },
			{ data: "Modul5" },
			{ data: "Modul6" },
			{ data: "Modul7" },
			{ data: "Modul8" },
			{ data: "Modul9" }
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor1, text:"Neuer Schüler" },
            { extend: "edit",   editor: editor1, text:"Schüler bearbeiten" },
            { extend: "remove", editor: editor1, text:"Schüler löschen" }
        ]
    } );
		
	}

</script>
<h3>Lernende in den Klassen</h3>

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




<table id="dtbl" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
				<th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
				<th>Klasse</th>
                <th>User ID</th>
                <th>Email</th>
                <th>Loginname</th>
				<th>Profil</th>
            </tr>
        </thead>
    </table>

<br><br>
<h3>Module der Lernenden</h3>

<table id="dtbl1" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
				<th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>User ID</th>
				<th>Email</th>
				<th>Profil</th>
				<th>Loginname</th>
				<th>Modul1</th>
				<th>Modul2</th>
				<th>Modul3</th>
				<th>Modul4</th>
				<th>Modul5</th>
				<th>Modul6</th>
				<th>Modul7</th>
				<th>Modul8</th>
				<th>Modul9</th>
            </tr>
        </thead>
    </table>

<br><br>
