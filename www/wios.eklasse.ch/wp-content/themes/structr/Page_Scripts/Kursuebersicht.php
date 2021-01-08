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
<br>Falls ein Kurs fehlerhaft eingetragen wurde, bitte den Kurs unten löschen und neu erstellen. Dies kann im <a href="/stundenplan-2">Stundenplan</a>, <a href="/ausserordentliche-kurseingabe">manuell</a> oder per <a href="/import">Import</a> gemacht werden.<br>
<script>
	var editor1; // use a global for the submit and return data rendering in the examples
	var table21;
	var table22;
	var table23;
	var editor;
	var table;
	var editor2;
	var table24;
	var nnme;
	var vnme;
	$( document ).ready( function () {



		editor1 = new $.fn.dataTable.Editor( {
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/getKursUeb.php",
				type: 'POST',
				data: {



				}
			},
			language: {
				"url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
			},
			table: ".datatables1",
			fields: [


				{
					label: "ID:",
					name: "sv_Kurse_View.ID"
				}, {
					label: "Klasse:",
					name: "sv_Kurse_View.Klasse"
				}, {
					label: "Kursname:",
					name: "sv_Kurse_View.Kursname"
				},

				{
					label: "KursID:",
					name: "sv_Kurse_View.KursID"
				}, {
					label: "Stundenplankurs:",
					name: "sv_Kurse_View.Stundenplan"
				},

				{
					label: "Startdatum:",
					name: "sv_Kurse_View.Startdatum",
					type: "date"

				}, {
					label: "Enddatum:",
					name: "sv_Kurse_View.Enddatum",
					type: "date"
				}, {
					label: "Profil:",
					name: "sv_Kurse_View.Profil"
				}, {
					label: "Lehrperson:",
					name: "sv_Lehrpersonen.Nachname"
				}

			],
			i18n: {
				remove: {
					button: "Löschen",
					title: "Eintrag löschen",
					submit: "Endgültig Löschen",
					confirm: {
						_: 'Sind Sie sicher, dass Sie die %d ausgwählten Zeilen löschen wollen?',
						1: 'Sind Sie sicher, dass Sie die ausgewählte Zeile löschen wollen?'
					}
				},
				edit: {
					button: "Bearbeiten",
					title: "Eintrag bearbeiten",
					submit: "Änderungen speichern"
				},
				create: {
					button: "Neuer Eintrag",
					title: "Neuen Eintrag anlegen",
					submit: "Neuen Eintrag speichern"
				},
				datetime: {
					previous: 'Zurück',
					next: 'Weiter',
					months: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
					weekdays: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
					amPm: [ 'am', 'pm' ],
					unknown: '-'
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

		// Activate an inline edit on click of a table cell
		/*$('.datatables1').on( 'click', 'tbody td:not(:first-child)', function (e) {
		    editor1.inline( this, {
		        buttons: { label: '&gt;', fn: function () { this.submit(); } }
		    } );
		} );*/
		$.fn.dataTable.ext.errMode = 'throw';
		table21 = $( '.datatables1' ).DataTable( {
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
			},
			dom: "lBfrtip",
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/getKursUeb.php",
				type: 'POST',
				data: {




				}
			},
			order: [
				[ 3, 'asc' ]
			],
			columns: [ {
					data: null,
					defaultContent: '',
					className: 'select-checkbox',
					orderable: false
				},

				{
					data: "sv_Kurse_View.ID"
				}, {
					data: "sv_Kurse_View.Klasse"
				}, {
					data: "sv_Kurse_View.Kursname"
				}, {
					data: "sv_Kurse_View.KursID"
				}, {
					data: "sv_Kurse_View.Stundenplan"
				}, {
					data: "sv_Kurse_View.Startdatum"
				}, {
					data: "sv_Kurse_View.Enddatum"
				}, {
					data: "sv_Kurse_View.Profil"
				}, {
					data: "sv_Lehrpersonen.Nachname"
				}, {
					data: "sv_Kurse_View.ID",
					"render": function ( data, type, row, meta ) {

						data = '<button onclick=showoverview(' + data + ')>Kursteilnehmer</button>';


						return data;
					}
				}


			],
			select: {
				style: 'os',
				selector: 'td:first-child'
			},
			buttons: [


			]
		} );


	} );

	//  $('.datatables tbody').on('click', 'td.details-control', function () {
	//     var tr  = $(this).closest('tr'),
	//         row = table.row(tr);
	//    
	//     if (row.child.isShown()) {
	//       tr.next('tr').removeClass('details-row');
	//       row.child.hide();
	//       tr.removeClass('shown');
	//     }
	//     else {
	//       row.child(format(row.data())).show();
	//       tr.next('tr').addClass('details-row');
	//       tr.addClass('shown');
	//     }
	//  });



	function loadeditor( id ) {
		editor = new $.fn.dataTable.Editor( {
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/getLernenderKursViewView.php",
				type: 'POST',
				data: {
					'KursID': id

				}
			},
			table: "#dtbl",
			fields: [ {
				label: "SchuelerID:",
				name: "SchuelerID",
				type: "readonly"
			}, {
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
				label: "KursID:",
				name: "KursID",
				type: "readonly"
			} ],
			i18n: {
				remove: {
					button: "Löschen",
					title: "Eintrag löschen",
					submit: "Endgültig Löschen",
					confirm: {
						_: 'Sind Sie sicher, dass Sie die %d ausgwählten Zeilen löschen wollen?',
						1: 'Sind Sie sicher, dass Sie die ausgewählte Zeile löschen wollen?'
					}
				},
				edit: {
					button: "Bearbeiten",
					title: "Eintrag bearbeiten",
					submit: "Änderungen speichern"
				},
				create: {
					button: "Neuer Eintrag",
					title: "Neuen Eintrag anlegen",
					submit: "Neuen Eintrag speichern"
				},
				datetime: {
					previous: 'Zurück',
					next: 'Weiter',
					months: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
					weekdays: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
					amPm: [ 'am', 'pm' ],
					unknown: '-'
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

		// Activate an inline edit on click of a table cell
		/* $('#dtbl').on( 'click', 'tbody td:not(:first-child)', function (e) {
		     editor.inline( this, {
		         buttons: { label: '&gt;', fn: function () { this.submit(); } }
		     } );
		 } );*/



		table = $( '#dtbl' ).DataTable( {
			dom: "lBfrtip",
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/getLernenderKursViewView.php",
				type: 'POST',
				data: {
					'KursID': id

				}
			},
			order: [
				[ 1, 'asc' ]
			],
			columns: [ {
					data: null,
					defaultContent: '',
					className: 'select-checkbox',
					orderable: false
				}, {
					data: "SchuelerID",
					"render": function ( data, type, row, meta ) {

						document.getElementById( "sid" ).value = data;



						return data;
					}
				}

				, {
					data: "Vorname"
				}, {
					data: "Nachname"
				},


				{
					data: "Klasse"
				}, {
					data: "KursID",
					"render": function ( data, type, row, meta ) {

						document.getElementById( "kid" ).value = data;



						return data;
					}

				}, {
					data: "KursID",
					"render": function ( data, type, row, meta ) {

						var sid = document.getElementById( "sid" ).value;



						data = '<button onclick=showNotenoverview(' + id + ',' + sid + ')>Noten</button>';


						return data;
					}
				}


			],
			select: {
				style: 'os',
				selector: 'td:first-child'
			},
			buttons: [

				{
					extend: "edit",
					editor: editor,
					text: "Schüler bearbeiten"
				}, {
					extend: "remove",
					editor: editor,
					text: "Schüler löschen"
				}
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
					"sortAscending": ": aktivieren, um Spalte aufsteigend zu sortieren",
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

	function loadeditor1( id, kid ) {

		editor2 = new $.fn.dataTable.Editor( {
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/notenvaluesView.php",
				type: 'POST',
				data: {
					'SchID': id,
					'KID': kid

				}
			},

			table: ".dtbl2",
			fields: [ {
					label: "KursID:",
					name: "sv_Noten.KursID",
					type: "readonly",

				}, {
					label: "SchuelerID:",
					name: "sv_Noten.SchuelerID",
					type: "readonly",

				}, {
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

			],
			i18n: {
				remove: {
					button: "Löschen",
					title: "Eintrag löschen",
					submit: "Endgültig Löschen",
					confirm: {
						_: 'Sind Sie sicher, dass Sie die %d ausgwählten Zeilen löschen wollen?',
						1: 'Sind Sie sicher, dass Sie die ausgewählte Zeile löschen wollen?'
					}
				},
				edit: {
					button: "Bearbeiten",
					title: "Eintrag bearbeiten",
					submit: "Änderungen speichern"
				},
				create: {
					button: "Neuer Eintrag",
					title: "Neuen Eintrag anlegen",
					submit: "Neuen Eintrag speichern"
				},
				datetime: {
					previous: 'Zurück',
					next: 'Weiter',
					months: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
					weekdays: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
					amPm: [ 'am', 'pm' ],
					unknown: '-'
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





		table24 = $( '.dtbl2' ).DataTable( {


			dom: "Bfrtip",
			ajax: {
				url: "/wp-content/themes/structr/Page_Scripts/notenvaluesView.php",
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

				}, {
					data: 'sv_Noten.Gewichtung'

				}, {

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
					"sortAscending": ": aktivieren, um Spalte aufsteigend zu sortieren",
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


	function showoverview( kurs ) {


		if ( table ) {
			table.destroy();
		}

		if ( editor ) {
			editor.destroy();
		}




		loadeditor( kurs );






		document.getElementById( "myModal" ).style.display = "block";


		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function ( event ) {
			if ( event.target == document.getElementById( "myModal" ) ) {
				document.getElementById( "myModal" ).style.display = "none";

			}
		}

		//When the user clicks on <span> (x), close the modal
		document.getElementById( "span" ).onclick = function () {
			document.getElementById( "myModal" ).style.display = "none";
		}
	}

	function showNotenoverview( kurs, sid ) {


		if ( table24 ) {
			table24.destroy();
		}

		if ( editor2 ) {
			editor2.destroy();
		}

		getName( sid );


		loadeditor1( sid, kurs );







		document.getElementById( "myModal1" ).style.display = "block";


		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function ( event ) {
			if ( event.target == document.getElementById( "myModal1" ) ) {
				document.getElementById( "myModal1" ).style.display = "none";


				document.getElementById( "nnme" ).value = '';

				document.getElementById( "vnme" ).value = '';
			}
		}

		//When the user clicks on <span> (x), close the modal
		document.getElementById( "span1" ).onclick = function () {
			document.getElementById( "myModal1" ).style.display = "none";
			document.getElementById( "nnme" ).value = '';

			document.getElementById( "vnme" ).value = '';
		}

	}

	function getName( str ) {


		if ( str == "" ) {

			document.getElementById( "Kursname" ).innerHTML = "";

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

					document.getElementById( "Name" ).innerHTML = this.responseText;

				}

			};

			xmlhttp.open( "GET", "/Ajax_Scripts/getName.php?q=" + str, true );

			xmlhttp.send();

		}

	}
</script>

<input type="hidden" id="sid">



<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">




		<div class="container">
			<div class="row">
				<form class="col-md4"></form>
			</div>
			<div class="row">
				<div class="col md12">
					<div class="table-responsive">
						<h3>Lernende im Kurs</h3>


						<table id="dtbl" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th></th>
									<th>SchuelerID</th>
									<th>Vorname</th>
									<th>Nachname</th>
									<th>Klasse</th>
									<th>KursID</th>
									<th>Noten</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>

		<span class="close" id="span">&times;</span>





	</div>

</div>

<div id="myModal1" class="modal">

	<!-- Modal content -->
	<div class="modal-content1">




		<div class="container">
			<div class="row">
				<form class="col-md4"></form>
			</div>
			<div class="row">
				<div class="col md12">
					<div class="table-responsive">
						<h3>Noten des Schülers in diesem Kurs</h3> Kurs: <input type="text" class="inp" id="kid" readonly><br><br> Name:
						<div class="Name" id="Name"></div>

						<table class="table table-striped table-hover dtbl2">
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

		<span class="close" id="span1">&times;</span>





	</div>

</div>



</html>
<style>
body {}
	
	.Name {
		font-style: bold;
		font-size: 23px;
	}
	
	.inp {
		width: 300px;
		border: 0;
	}
	
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0, 0, 0); /* Fallback color */
		background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
	}
	
	.modal1 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0, 0, 0); /* Fallback color */
		background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
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
*/
</style>







<br><br>

<h1>Kursübersicht</h1>
<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
			<table class="table table-striped table-hover datatables1">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Klasse</th>
						<th>Kursname</th>
						<th>KursID</th>
						<th>Stundenplankurs</th>
						<th>Startdatum</th>
						<th>Enddatum</th>
						<th>Profil</th>
						<th>Lehrperson</th>
						<th>Teilnehmer</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>


</form> & nbsp;
<style>
	button {
		color: white;
	}

</style>