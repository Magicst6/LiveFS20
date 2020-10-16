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
    //Den aktuell eingeloggten Schüler anzeigen


	$isEntry5 = "SELECT * From sv_LernenderKurs";
	
			
        $result5 = mysqli_query($con,$isEntry5);
 
      
        while( $value5= mysqli_fetch_array($result5)){
			
			$ID=$value5['SchuelerID'];
			
			$KursID=$value5['KursID'];
		 
			
          $isEntry2 = "SELECT * From sv_Noten Where SchuelerID='$ID' and KursID='$KursID'  order by Datum asc ";
          $isentall=$isEntry2;
          $result2 = mysqli_query($con,$isEntry2);

          // echo $isentall;
			
			$u=0;
			

          while( $value3= mysqli_fetch_array($result2))
           
			{
         
		  $Note=$value3['Note'];
			    $Gew=$value3['Gewichtung'];
			  
			  if ($Gew>0)
			  {
			  $Notengesamt=$Notengesamt+$Note*$Gew;
			  $Gewges=$Gewges+$Gew;
			  }
        
		 
		
			}
			
			
			$Schuelerschnitt=$Notengesamt/$Gewges;
			if ($Schuelerschnitt>0){
				//echo $Schuelerschnitt;
			  $sql_befehl = "Update sv_LernenderKurs SET Notenschnitt='$Schuelerschnitt' Where  KursID='$KursID' and SchuelerID='$ID'";
               
                    mysqli_query($con, $sql_befehl);
                 
			}
			
            $Notengesamt='';
           $Gewges='';
		   $Schuelerschnitt='-';
       
		
		}
	
	
	
    ?>

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
                label: "SchuelerID:",
                name: "SchuelerID"
            },
				{
                label: "KursID:",
                name: "KursID"
            
            },
				 
				 {
                label: "Notenschnitt:",
                name: "Notenschnitt",
					 type: "readonly"
            }
        ],
			 i18n: {
            remove: {
                button: "Löschen",
                title:  "Eintrag löschen",
                submit: "Endgültig Löschen",
                confirm: {
                    _: 'Sind Sie sicher, dass Sie die %d ausgwählten Zeilen löschen wollen?',
                    1: 'Sind Sie sicher, dass Sie die ausgewählte Zeile löschen wollen?'
                }
            },
            edit: {
                button: "Bearbeiten",
                title:  "Eintrag bearbeiten",
                submit: "Änderungen speichern"
            },
            create: {
                button: "Neuer Eintrag",
                title:  "Neuen Eintrag anlegen",
                submit: "Neuen Eintrag speichern"
            },
            datetime: {
                    previous: 'Zurück',
                    next:     'Weiter',
                    months:   [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
                    weekdays: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
                    amPm:     [ 'am', 'pm' ],
                    unknown:  '-'
            },
            error: {            
                    system: "Ein Systemfehler ist aufgetreten (<a target=\"_blank\" href=\"//datatables.net/tn/12\">Für mehr Informationen</a>)."
            },
            multi: {
                    title: "Mehrere Werte",         
                    info: "Die ausgewählten Elemente enthalten verschiedene Werte für das Feld. Um alle Elemente für diess Feld auf den gleichen Wert zu setzen, klicken Sie bitte hier. Ansonsten werden die Elemente ihren jeweiligen Wert behalten.",
                    restore: "Änderungen rückgängig machen",
                    noMulti: "Dieses Feld kann einzeln bearbeitet werden, aber nicht als Teil einer Gruppe."
            },
        }      
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
            { data: "SchuelerID" },
            { data: "KursID" },
			{ data: "Notenschnitt" }
           
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor2, text:"Neuer Eintrag" },
            { extend: "edit",   editor: editor2, text:"Zeile bearbeiten" },
            { extend: "remove", editor: editor2, text:"Zeile löschen" }
        ],
	   "language": {
            "decimal": ",",
            "thousands": ".",
            "info": "Anzeige _START_ bis _END_ von _TOTAL_ Einträgen",
            "infoEmpty": "Keine Einträge",
            "infoPostFix": "",
            "infoFiltered": "(gefiltert aus insgesamt _MAX_ Einträgen)",
            "loadingRecords": "keine Daten vorhanden...",
            "lengthMenu": "Anzeigen von _MENU_ Einträgen",
            "paginate": {
                "first": "Erste",
                "last": "Letzte",
                "next": "Nächste",
                "previous": "Zurück"
            },
            "processing": "Verarbeitung läuft ...",
            "search": "Suche:",
            "searchPlaceholder": "Suchbegriff",
            "zeroRecords": "Keine Daten! Bitte ändern Sie Ihren Suchbegriff.",
            "emptyTable": "Keine Daten vorhanden",
            "aria": {
                "sortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
                "sortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
            },
            //only works for built-in buttons, not for custom buttons
            "buttons": {
                "create": "Neu",
                "edit": "Ändern",
                "remove": "Löschen",
                "copy": "Kopieren",
                "csv": "CSV-Datei",
                "excel": "Excel-Tabelle",
                "pdf": "PDF-Dokument",
                "print": "Drucken",
                "colvis": "Spalten Auswahl",
                "collection": "Auswahl",
                "upload": "Datei auswählen...."
            },
            "select": {
                "rows": {
                    _: '%d Zeilen ausgewählt',
                    0: 'Zeile anklicken um auszuwählen',
                    1: 'Eine Zeile ausgewählt'
                }
            }
        }            
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
                <th>SchuelerID</th>
				<th>KursID</th>
				<th>Notenschnitt</th>
            </tr>
        </thead>
    </table>