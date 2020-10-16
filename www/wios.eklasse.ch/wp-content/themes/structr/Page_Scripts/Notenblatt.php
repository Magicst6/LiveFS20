<html>
	
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
	
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>


	
	<script type="text/javascript" language="javascript" class="init">
	</script>
</head>


<?php
include 'db.php';
  
		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }
?>
<script>
	var table2, editor2, tableedit1,editor1;
	
	function loadeditor1(id,kid){
	
		//var Kiid='KV1.it.FS20';
		
    editor2 = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/notenvaluesView1.php",
            type: 'POST',
            data: {
              'SchID': id,
				'KID': kid
			
			}
        }, 
		
        table: ".dtbl1",
        fields: [ {
			 label: "KursID:",
                name: "sv_Noten.KursID",
                type: "readonly",
                
		},		
				  {
			 label: "SchuelerID:",
                name: "sv_Noten.SchuelerID",
                type: "readonly",
              
		},			
				 { 
                label: "Name:",
                name: "sv_Noten.Name"
            }, {
                label: "Gewichtung:",
                name: "sv_Noten.Gewichtung"
            }, {
                label: "Note:",
                name: "sv_Noten.Note",
               
            }, {
                label: "Datum:",
                name: "sv_Noten.Datum",
				 type: "date",
            }
				
        ],i18n: {
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
		
		
		/*  // Activate an inline edit on click of a table cell
    $('.datatables').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit();
													  
													  
													  } }
        } );
    } );*/
		
 
	 

		
			table2 = $( '.dtbl1' ).DataTable( {


			dom: "Bfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/notenvaluesView1.php",
            type: 'POST',
            data: {
                  'SchID': id,
				'KID': kid
				
				
			
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
					data: 'sv_Noten.Name'
				
				},
					  {
					      data: 'sv_Noten.Gewichtung'
						 
				},
					  {
				
						  data: 'sv_Noten.Note'
						
				},
					 
					  {
		
						  data: 'sv_Noten.Datum'
						 
				},
				
			],
			select: true,
        buttons: [
            
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
		function loadeditor2(kid,Name, Vorname){	
			
				
	
	
		
	
		
    editor1 = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/abwvalues.php",
            type: 'POST',
            data: {
              'Name': Name,
				 'Vorname': Vorname,
					'KID': kid
				
			
			}
        }, 
		
        table: ".datatablesmod3",
        fields: [ {
			 label: "KursID:",
                name: "Kursname",
                type: "readonly",
               
		},		
				  {
			 label: "SchuelerID:",
                name: "SchuelerID",
                type: "readonly"
              
		},			
				 { 
                label: "Datum:",
                name: "Datum",
			    type: "date"
            },
				  {
                label: "Klasse:",
                name: "Klasse"
            },{
                label: "Kommentar:",
                name: "Kommentar"
            }, {
                label: "Kommentar Verwaltung:",
                name: "KommentVerw"
               
            }, {
                label: "Abwesenheitsdauer:",
                name: "Abwesenheitsdauer"
				 
            }, {
                label: "Lehrer:",
                name: "Lehrer"
				 
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
		
		}
	
	function loadtable2(kid,Name, Vorname){
			
	
	
	
		
			tableedit1 = $( '.datatablesmod3' ).DataTable( {


			dom: "lBfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/abwvalues.php",
            type: 'POST',
            data: {
                  'Name': Name,
				 'Vorname': Vorname,
					'KID': kid
				
			
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
					data: 'Datum'
				
				},
					  {
					      data: 'Klasse'
						 
				},
					  {
				
						  data: 'Kommentar'
						
				},
					 
					  {
		
						  data: 'KommentVerw'
						 
				},
					 {
		
						  data: 'Abwesenheitsdauer'
						 
				},
					 {
		
						  data: 'Lehrer'
						 
				}
			],
			select: true,
        
        buttons: [
           
        ], "language": {
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
	

	function showNotenoverview(kurs,sid){
	
		document.getElementById('kid').value=kurs;
	
if ( table2 ) {
		table2.destroy();
	}
	
	if ( editor2 ) {
		editor2.destroy();
	}
	
		//var kuid = kurs.replace("zz", ".");
			getName(sid);
	
		
		
	loadeditor1(sid,kurs);
			
			
		
      
	


			document.getElementById("myModal1").style.display = "block"; 
				
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal1")) {
         document.getElementById("myModal1").style.display = "none";
		
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span1").onclick = function() {
       document.getElementById("myModal1").style.display = "none";
  
			
			 
 }		

}	
	
	 function getName(str){

       
        if (str == "") {

            document.getElementById("Kursname").innerHTML = "";

            return;

        } else {

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("Name").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getName.php?q="+str,true);

            xmlhttp.send();

        }

    }
	


	
    function getKlasse(str){
        if (str == "") {
            document.getElementById("stundenplan").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("notenblatt").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET"," /Ajax_Scripts/showtableNotenblatt.php?k="+document.getElementById('klasse').value+"&s=" + document.getElementById('semester').value,true);
            xmlhttp.send();
        }
    }
	
	function showAbwesenheiten( kid,schid,Name, Vorname ) {
			
		
				

		if ( tableedit1 ) {
		tableedit1.destroy();
	}
	
	if ( editor1 ) {
		editor1.destroy();
	}

	
		
		loadtable2(kid,Name,Vorname);
	loadeditor2(kid,Name,Vorname);
		
       tableedit1.clear()
		.draw();

	
	

	var Vornameg = Vorname.replace('?',' ');
			
		var Nameg = Name.replace('?',' ');		

	 document.getElementById("Schuelerlb1").value=Vornameg+' '+Nameg;
				document.getElementById("Kurslb1").value = kid; 
	


			document.getElementById("myModal3").style.display = "block"; 
				
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal3")) {
         document.getElementById("myModal3").style.display = "none";
			
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span3").onclick = function() {

	
       document.getElementById("myModal3").style.display = "none";
	
    }
			
      
		
		}
</script>

<select name="klasse" id="klasse" onchange="getKlasse(this.value)" required="required">
    <?php
    $isEntry= "Select Klasse From sv_Lernende";
    $result1 = mysqli_query($con,$isEntry);
    $resultarr1 = array();
    echo "<option>" . $_GET['klasse'] . "</option>";

    while( $line2= mysqli_fetch_assoc($result1))
    {
        $resultarr1[] = $line2['Klasse'];
    }
    $uniquearr1 = array_unique($resultarr1);
    asort($uniquearr1);


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
<br>
<br>
Semester:
<br>
<input name="semester" id="semester"   value="<?php echo $semDB;?>" readonly=readonly >
      

<div id="notenblatt"><b></b></div>



	<div id="myModal1" class="modal" >

    <!-- Modal content -->
    <div class="modal-content1">
		
		
		   
         
<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
			<div class="table-responsive">
		<h3>Noten des Schülers in diesem Kurs</h3>

					 Kurs:        <input type="text" class="inp"  id="kid" readonly><br><br>
				
				Name:        <div class="Name" id="Name" ></div>    
				
	<table class="table table-striped table-hover dtbl1">
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
</div>
            
      <span class="close"  id="span1">&times;</span>
    
          

           
          
    </div>

</div>
	
	<div id="myModal3" class="modal" onhide="tableshow()">

    <!-- Modal content -->
    <div class="modal-content1">
		
      Schüler:     <input id="Schuelerlb1"  readonly>
	  Kurs:        <input id="Kurslb1" readonly><br><br>
		
		   
                       <p>Unten werden die Abwesenheiten des Schülers angezeigt.</p>
<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
	<div class="table-responsive">
			<table  class="table table-striped table-hover datatablesmod3">
				<thead>
					<tr>	
						<th></th>
						<th>Datum</th>
	                    <th>Klasse</th>
						<th>Kommentar</th>
						<th>Kommentar Verwaltung</th>
						<th>Abwesenheitsdauer</th>
						<th>Lehrer</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			</div>
		</div>
	</div>
</div>
            
      <span class="close"  id="span3">&times;</span>
    
          

        
          
    </div>

</div>

<style>
		  body {}
		
		
		.Name{
			  font-style: bold;
			font-size: 23px;
			
		}
		.inp{
			width:300px;
			
            border:0;

		}

        .modal{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
		.modal1{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }


        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 1200px;
        }
		
		.modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 1200px;
        }


        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        button {
          color: white;
        }
		.fixed_header tbody{
  
  overflow:auto;

  width:100%
}
.fixed_header {
	
 width: 1100px;
	font-size:12px;
}
	
		
		/*
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
  content: /*'\2b'*/;
}
/*
tr.shown td.details-control:before {
  content: '\2212';
}
*/	</style>
	
	
	
