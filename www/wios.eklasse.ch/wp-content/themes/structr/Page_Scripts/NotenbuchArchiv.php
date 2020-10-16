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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

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


</html> -->
<?
include 'db.php';
$Kursnme=base64_decode($_GET['q']);
$sem=$_GET['sem'];


$lkArch=$sem.'_LernenderKurs';

$select='Select Nachname, Note1, Note2,Note3, Note4, Note5, Note6, Note7, Note8, Note9 From ';
$sel=' Where KursID="';
$sel1=$Kursnme;
$sel2= '" ';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$lkArch$sel$sel1$sel2' where post_id='18106' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	




$select='Select Nachname, Abwesenheiten From ';
$sel=' Where KursID="';
 $sel1=$Kursnme;
		
$sel2= '" ';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$select$lkArch$sel$sel1$sel2' where post_id='18110' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );	

?>
<script>
	var table;
	var table1;
	var tableedit;
	var editor;
	var tableedit1;
	var editor1;
	var table2;
	var table3;
	$(document).ready(function() {
 var urlParams = new URLSearchParams(window.location.search);
	

tableshow();    
	
	});

	 function loadtables(url3,url4){
    $.fn.dataTable.ext.errMode = 'throw';
    table = $( '.datatables' ).DataTable( {


        ajax: {

            url: url3,

            dataSrc: ""
        },
        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false
        },


            {
                data: 'IDSchueler'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'Notenschnitt'
            },
            {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' Noten Bearbeiten'


            },

            {
                className: 'details-control2',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Neue Note erstellen'
            },
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
    table1 = $( '.datatables1' ).DataTable( {


        ajax: {

            url: url4,

            dataSrc: ""
        },

        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false,

        },

            {
                data: 'SchuelerID'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'AbwesenheitenGesamt'
            }


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

    $( '.datatables tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );

        if ( row.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( format( row.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( showNoten( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control2', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( neueNote( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );

    } );


    $( '.datatables1 tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table1.row( tr );

        if ( row.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( format1( row.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );
		    $( '.datatables1 tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( showAbwesenheiten( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );


    }

    function loadtablesUneditable(){
        $.fn.dataTable.ext.errMode = 'throw';
        table = $( '.datatables' ).DataTable( {


            ajax: {

                url: new_url,

                dataSrc: ""
            },
            columns: [ {
                className: 'details-control',
                defaultContent: '',
                data: null,
                orderable: false
            },


                {
                    data: 'IDSchueler'
                },
                {
                    data: 'Nachname'
                },
                {
                    data: 'Vorname'
                },
                {
                    data: 'Notenschnitt'
                },
                {
                     data: 'empty'
                },
                {
                    data: 'empty'
                }


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
        table1 = $( '.datatables1' ).DataTable( {


            ajax: {

                url: new_url1,

                dataSrc: ""
            },

            columns: [ {
                className: 'details-control',
                defaultContent: '',
                data: null,
                orderable: false,

            },

                {
                    data: 'SchuelerID'
                },
                {
                    data: 'Nachname'
                },
                {
                    data: 'Vorname'
                },
                {
                    data: 'AbwesenheitenGesamt'
                }


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

        $( '.datatables tbody' ).on( 'click', 'td.details-control', function () {
            var tr = $( this ).closest( 'tr' ),
                row = table.row( tr );

            if ( row.child.isShown() ) {
                tr.next( 'tr' ).removeClass( 'details-row' );
                row.child.hide();
                tr.removeClass( 'shown' );
            } else {
                row.child( format( row.data() ) ).show();
                tr.next( 'tr' ).addClass( 'details-row' );
                tr.addClass( 'shown' );
            }
        } );




        $( '.datatables1 tbody' ).on( 'click', 'td.details-control', function () {
            var tr = $( this ).closest( 'tr' ),
                row = table1.row( tr );

            if ( row.child.isShown() ) {
                tr.next( 'tr' ).removeClass( 'details-row' );
                row.child.hide();
                tr.removeClass( 'shown' );
            } else {
                row.child( format1( row.data() ) ).show();
                tr.next( 'tr' ).addClass( 'details-row' );
                tr.addClass( 'shown' );
            }
        } );

		
    }






    //var data= [{"Note":"6","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"2","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"3.7","Name":"dsgs","Gewichtung":"25","Datum":"2019-06-16"}]  ;

		$( '#divTable' ).hide();

		function format( data ) {
			var i;
			var note = null;

			for ( i = 1; i < 10; i++ ) {
				var Notedt = data[ "Note" + i ];
				var Namedt = data[ "Name" + i ];
				var Gewichtungdt = data[ "Gewichtung" + i ];
				var Datumdt = data[ "Datum" + i ];

				if ( ( Notedt ) >= 1 && Notedt <= 100 ) {
					var z = null;
					var z = '<div id="noteplus" class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'

					+'<tr>' +
					'<td  class="title" width="10%" >Note' + i + ':</td>' +
						'<td  width="12%">' + Notedt + '</td>' +
						'<td class="title"  width="10%" >Notenname:</td>' +
						'<td  width="12%">' + Namedt + '</td>' +
						'<td class="title"  width="10%" >Gewichtung:</td>' +
						'<td  width="12%">' + Gewichtungdt + '</td>' +
						'<td class="title"  width="10%" >Datum:</td>' +
						'<td  width="12%">' + Datumdt + '</td></tr>' +


						'</table>' +


						'</div>';
					if ( note == null ) {
						note = z;
					} else note = note + z;
				}

			}
     


			
			return note;
		};
		
		
		function showNoten( data ) {
			
	
		if ( tableedit ) {
		tableedit.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
				
	loadtable(data[ "IDSchueler" ]);
	loadeditor(data[ "IDSchueler" ]);
	
       tableedit.clear()
		.draw();


	var str = data[ "IDSchueler" ];
	
		
	editor . field( 'SchuelerID' ) . def( str );
	editor . field( 'KursID' ) . def( document . getElementById( "Kursname" ) . value );
	editor . submit();
			
			

	 document.getElementById("Schuelerlb").value=data['Vorname'] +' '+data['Nachname'];
				document.getElementById("Kurslb").value = document.getElementById("Kursname").value; 
	

			
				document.getElementById("myModal").style.display = "block"; 
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
        // document.getElementById("myModal").style.display = "none";
			
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span").onclick = function() {
       document.getElementById("myModal").style.display = "none";
	 reloadpage1();
    }
			
      
		
		}
	
	function showAbwesenheiten( data ) {
			
		
				

		if ( tableedit1 ) {
		tableedit1.destroy();
	}
	
	if ( editor1 ) {
		editor1.destroy();
	}

	
		
		loadtable1(data[ "SchuelerID" ]);
	loadeditor1(data[ "SchuelerID" ]);
		
       tableedit1.clear()
		.draw();

	
	

	var str = data[ "SchuelerID" ];
	
		
	editor1 . field( 'SchuelerID' ) . def( str );
	editor1 . field( 'Kursname' ) . def( document . getElementById( "Kursname" ) . value );
	editor1 . submit();
			
			

	 document.getElementById("Schuelerlb1").value=data['Vorname'] +' '+data['Nachname'];
				document.getElementById("Kurslb1").value = document.getElementById("Kursname").value; 
	


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
		 reloadpage1();
		
    }
			
      
		
		}

function neueNote( data ) {

			 document.getElementById("Schuelerlb2").value=data['Vorname'] +' '+data['Nachname'];
				document.getElementById("Kurslb2").value = document.getElementById("Kursname").value; 

			 document.getElementById("schid").value=data['IDSchueler'];
				document.getElementById("myModal2").style.display = "block"; 
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal2")) {
 
//			document.getElementById("myModal2").style.display = "none";
			 document.getElementById("Notecr").value = "";
	 document.getElementById("Namecr").value = "";
	 document.getElementById("Gewichtungcr").value = "";
	 document.getElementById("Datumcr").value = "";
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span2").onclick = function() {
       document.getElementById("myModal2").style.display = "none";
		  document.getElementById("Notecr").value = "";
	 document.getElementById("Namecr").value = "";
	 document.getElementById("Gewichtungcr").value = "";
	 document.getElementById("Datumcr").value = "";
		 
		 reloadpage1();
    }
			
       
	 
	 
		
		}
		
	function neueAbw( data ) {
			
		
			
				document.getElementById("Kurslb4").value = document.getElementById("Kursname").value; 

			 
		document.getElementById("Vorname").value=data['Vorname'];
		document.getElementById("Nachname").value=data['Nachname'];
				document.getElementById("myModal4").style.display = "block"; 
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal4")) {
 
			document.getElementById("myModal4").style.display = "none";
			 document.getElementById("Datumcr").value = "";
	 document.getElementById("Klassecr").value = "";
	 document.getElementById("Kommentarcr").value = "";
	 document.getElementById("KommentarVerwcr").value = "";
			document.getElementById("Abwcr").value = "";
	 document.getElementById("Lehrercr").value = "";
	 document.getElementById("Entschcr").value = "";
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span4").onclick = function() {
       document.getElementById("myModal4").style.display = "none";
	 document.getElementById("Datumcr").value = "";
	 document.getElementById("Klassecr").value = "";
	 document.getElementById("Kommentarcr").value = "";
	 document.getElementById("KommentarVerwcr").value = "";
			document.getElementById("Abwcr").value = "";
	 document.getElementById("Lehrercr").value = "";
	 document.getElementById("Entschcr").value = "";
		  reloadpage1();
		
    }
		}
function neueAbw1()  {
			
		
			
				document.getElementById("Kurslb4").value = document.getElementById("Kursname").value; 

			 
		
				document.getElementById("myModal4").style.display = "block"; 
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal4")) {
 
			document.getElementById("myModal4").style.display = "none";
			 document.getElementById("Datumcr").value = "";
	 document.getElementById("Klassecr").value = "";
	 document.getElementById("Kommentarcr").value = "";
	 document.getElementById("KommentarVerwcr").value = "";
			document.getElementById("Abwcr").value = "";
	 document.getElementById("Lehrercr").value = "";
	 document.getElementById("Entschcr").value = "";
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span4").onclick = function() {
       document.getElementById("myModal4").style.display = "none";
	 document.getElementById("Datumcr").value = "";
	 document.getElementById("Klassecr").value = "";
	 document.getElementById("Kommentarcr").value = "";
	 document.getElementById("KommentarVerwcr").value = "";
			document.getElementById("Abwcr").value = "";
	 document.getElementById("Lehrercr").value = "";
	 document.getElementById("Entschcr").value = "";
		 
		 reloadpage1();
    }
		}


		function format1( data ) {
			var i;
			var abw = null;

			for ( i = 0; i < data.Rows; i++ ) {

				var Datumdt = data[ "Datum" + i ];
				var Klassedt = data[ "Klasse" + i ];
				var Kommentardt = data[ "Kommentar" + i ];
				var KommentVerdt = data[ "KommentVer" + i ];
				var Abwesenheitsdauerdt = data[ "Abwesenheitsdauer" + i ];
				var Lehrerdt = data[ "Lehrer" + i ];


				var z = null;
				var z = '<div id="abwplus" class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'

				+'<tr>' +
				'<td class="title"  width="7%">Klasse:</td>' +
				'<td  width="10%">' + Klassedt + '</td></tr>' +
					'<td class="title"  width="7%">Datum:</td>' +
					'<td width="10%">' + Datumdt + '</td></tr>' +
					'<td class="title"  width="7%">Kommentar:</td>' +
					'<td>' + Kommentardt + '</td></tr>' +
					'<td class="title"  width="7%">KmntVerw:</td>' +
					'<td>' + KommentVerdt + '</td></tr>' +
					'<td class="title"  width="7%">DauerAbw:</td>' +
					'<td  width="10%">' + Abwesenheitsdauerdt + '</td></tr>' +
					'<td class="title" width="7%">Lehrer:</td>' +
					'<td  width="10%">' + Lehrerdt + '</td></tr>' +

					'</table>' +


					'::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</div>';
				if ( abw == null ) {
					abw = z;
				} else abw = abw + z;
			}



			return abw;
		};


		var new_url = "/wp-content/themes/structr/Page_Scripts/GetNotenValuesArchiv.php?q=" + document.getElementById( "Kursname" ).value + "&s=" + document.getElementById( "Semester" ).value;
		var new_url1 = "/wp-content/themes/structr/Page_Scripts/GetAbwValuesArchiv.php?k=" + document.getElementById( "Kursname" ).value + "&s=" + document.getElementById( "Semester" ).value;


      
	




    

</script>


<style>
	#tooltip {
  position: absolute;
  z-index: 1001;
  display: none;
  border: 2px solid #ebebeb;
  border-radius: 5px;
  padding: 10px;
  background-color: #fff;
}
	
div.DTE div.DTE_Body div.DTE_Field {
    padding: 0.7em 0 0 0;
}
div.DTE div.DTE_Body div.DTE_Field > label {
    float: none;
    clear: both;
    width: 100%;
}
div.DTE div.DTE_Body div.DTE_Field > div.DTE_Field_Input {
    float: none;
    clear: both;
    width: 100%;
}

div.DTE div.DTE_Header,
div.DTE div.DTE_Footer {
    background-color: transparent;
    border-color: black
}

div.DTE div.DTE_Header {
    height: 60px;
}

p.start-editing,
p.add-new {
    text-align: center;
    font-size: 1.4em;
    line-height: 1.4em;
}


p.start-editing {
    padding-top: 7em;
}

#container {
    display: flex;
    align-items: stretch;
}

#table-container {
    box-sizing: border-box;
    width: 55%;
    padding: 0 1em;
}

#form-container {
    box-sizing: border-box;
    width: 45%;
    padding: 0 1em;
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

	.iconSettings,
	td.details-control1:before,
	tr.shown td.details-control1:before {
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
	
	td.details-control1 {
		cursor: pointer;
		text-align: center;
	}
	
	td.details-control1:before {
		content: '✎';
	}
	
	tr.shown td.details-control1:before {
		content: '✎';
	}
	
	
	
		.iconSettings,
	td.details-control2:before,
	tr.shown td.details-control2:before {
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
	
	td.details-control2 {
		cursor: pointer;
		text-align: center;
	}
	
	td.details-control2:before {
		content: url(/plussmall.png);
	}
	
	tr.shown td.details-control2:before {
		content: url(/plussmall.png);
	}

</style>

<style>
        body {}

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
            width: 1400px;
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
    </style>
<script>
	


		
	

   
		
	
 $('#form-container').on( 'click', 'p.add-new', function (e) {
        e.preventDefault();

        editor.create( {
                title: 'Create new row',
                buttons: [
                    'Save',
                    {
                        label: 'Cancel',
                        fn: function () {
                            editor.close();
                        }
                    }
                ]
        } );
    } );

	
function tableshowne() {
	
	if ( tableedit ) {
		tableedit.destroy();
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

  function onPageDisplay ( elm ) {
    var name = 'onPage'+Math.random();
    var Editor = $.fn.dataTable.Editor;
    var emptyInfo;

    Editor.display[name] = $.extend( true, {}, Editor.models.display, {
        // Create the HTML mark-up needed the display controller
        init: function ( editor ) {
            emptyInfo = elm.html();
            return Editor.display[name];
        },

        // Show the form
        open: function ( editor, form, callback ) {
            elm.children().detach();
            elm.append( form );

            if ( callback ) {
                callback();
            }
        },

        // Hide the form
        close: function ( editor, callback ) {
            elm.children().detach();
            elm.html( emptyInfo );

            if ( callback ) {
                callback();
            }
        }
    } );

    return name;
}



		
 
	



	function checkKurs( str ) {

		if ( str == "-Select-" ) {

			alert( 'Bitte einen Kurs auswählen' )

			return;

		}

	}



 
</script>

	


<html>
<body>
	
<em>Hier können Verwaltungsmitarbeiter Noten für Prüfungen in den Semestern nachtragen</em>
	
	<br><br>
<?php
include 'db.php';


?>
	<br><br>




Semester:<br>
<select id="Semester" name="Semester"  onchange="getKursnameAll(this.value)">
	<option value="<? echo $sem;?>" selected><? echo $sem;?></option>
    <?php

    //Den aktuell eingeloggten Schüler anzeigen

    $isEntry= "Select Semesterkuerzel From sv_SemesterArchiv";
    $result = mysqli_query($con, $isEntry);
    echo "<option>". $_GET['Semester']. "</option>";

    while( $line3= mysqli_fetch_array($result))
    {
    $Semester = $line3['Semesterkuerzel'];
    echo "<option>" . $Semester . "</option>";

    }

    ?>
</select>

<br><br>
 
    Kursname:<br>
    <select name="Kursname" onchange="reloadpage1()"   id="Kursname" >
<?php
include 'db.php';
$q = $_GET['q'];
$semester =$sem;


$Tab=$semester."_Kurse";

$isEntry= "Select KursID From $Tab order by KursID asc ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['KursID'];
}
$uniquearr = array_unique($resultarr);

echo "<option>" .$Kursnme. "</option>";
echo "<option>" .'-Select-'. "</option>";
foreach ($uniquearr as $value)
{
    echo "<option>" . $value . "</option>";
}


?>

    </select>
<br><br>
   
<br><br>

<?
include 'db.php';
$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}

?>
<input id="semDB" type="hidden" value="<? echo $semDB; ?>" >
	


<h1>Noten</h1>


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
						<th>ID</th>
	                    <th>Nachname</th>
						<th>Vorname</th>											 
						<th>Notenschnitt</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<br><br>


<br><br>
<h1>Abwesenheiten</h1>

	<button id="buttonAbw" onclick="neueAbw1()" >Neue Abwesenheit hinzufügen</button>

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
	                    <th>Nachname</th>
						<th>Vorname</th>
						<th>Abwesenheiten Gesamt</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>



<div id="myModal" class="modal" onhide="tableshow()">

    <!-- Modal content -->
    <div class="modal-content">
		
      Schüler:     <input id="Schuelerlb"  readonly>
	  Kurs:        <input id="Kurslb" readonly><br><br>
		
		   
            <p>Unten werden die Noten des Schülers angezeigt. In die Tabelle klicken um die jeweilige Note zu bearbeiten</p>
<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
			<div class="table-responsive">
			<table  class="table table-striped table-hover datatablesmod">
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
            
      <span class="close"  id="span">&times;</span>
    
          

           
          
    </div>

</div>
	
	
<div id="myModal3" class="modal" onhide="tableshow()">

    <!-- Modal content -->
    <div class="modal-content">
		
      Schüler:     <input id="Schuelerlb1"  readonly>
	  Kurs:        <input id="Kurslb1" readonly><br><br>
		
		   
                       <p>Unten werden die Abwesenheiten des Schülers angezeigt. In die Tabelle klicken um die jeweilige Abwesenheit zu bearbeiten. Doppelclick auf eine Zeile löscht diese.</p>
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


<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
       

Schüler:     <input id="Schuelerlb2" readonly>                       
Kurs:        <input id="Kurslb2" readonly><br><br>
            
          

            
            <p>Bitte hier eine neue Note eintragen..</p>
            
			<input id="schid" type="hidden"  />
            <input id="Notecr" type="Text" onchange="iskomma(this)" required="required" />
            <br><br>
			Prüfungsname:<br>
            <input id="Namecr" type="Text"  required="required" />
            <br><br>
			Gewichtung(1 => Normalnote):<br>
            <input id="Gewichtungcr" type="number"  required="required" />
            <br><br>
			Datum:<br>
            <input id="Datumcr" type="date"  required="required" />
             <br><br>
            <input name="Speichern" type="button" value="Senden" onclick="sendNote()" />

        <span class="close" onclick="reloadpage1()"  id="span2">&times;</span>


        
    </div>

</div>
	
	<div id="myModal4" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
       

                 

            
          

            
            <p>Bitte hier eine neue Abwesenheit eintragen..</p>
            
			KursID:        <input id="Kurslb4" ><br><br>
		    Vorname:<br>
		    <input id="Vorname" type="Text"  />
		    <br><br> 
		    Nachname:<br>
		    <input id="Nachname" type="Text"  />
		    <br><br> 
            Datum:<br>    
		    <input id="Datum1cr" type="Date"  required="required" />
            <br><br>
			Klasse:<br>
            <input id="Klassecr" type="Text"   />
            <br><br>
			Kommentar:<br>
            <input id="Kommentarcr" type="Text"   />
            <br><br>
			Kommentar Verwaltung:<br>
            <input id="KommentarVerwcr" type="Text"   />
		 <br><br>
		    Abwesenheitsdauer(Zahl der Lektionen):<br>
            <input id="Abwcr" type="number"  required="required" />
            <br><br>
			Lehrer(->Max Muster ID:12):<br>
            <input id="Lehrercr" type="Text"  />
		 <br><br>
		    Entschuldigt:<br>
            <input id="Entschcr" type="Text"   />
		 <br><br>
             <br><br>
            <input name="Speichern" type="button" value="Senden" onclick="sendAbw()" />

        <span class="close" onclick="reloadpage1()"  id="span4">&times;</span>


        
    </div>

</div>


<script>
	function getKursnameAll(str){

      
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

                    document.getElementById("Kursname").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameAll.php?s="+str,true);

            xmlhttp.send();

        }

    }

	
	 function test(){

        
            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("test").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/wp-content/themes/structr/Page_Scripts/GetNotenValuesArchiv.php?q=" +  document.getElementById( "Kursname" ).value + "&s=" + document.getElementById( "Semester" ).value,true);

            xmlhttp.send();

        

    }
	
	 function test1(){

        
            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("test").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/wp-content/themes/structr/Page_Scripts/GetAbwValuesArchiv.php?k=" +  document.getElementById( "Kursname" ).value + "&s=" + document.getElementById( "Semester" ).value,true);

            xmlhttp.send();

        

    }
	
	
	function iskomma(str) {
	  
  if (str.value.indexOf(",")>0)
    {
	 x = str.value;
  	 y = x.replace(",", ".");				  
     alert( 'Bitte "." statt "," verwenden!');
	 str.value=y;				  															 
	}
}
	
	function timeout(){
			setTimeout(function(){
		
	tableshow();
    //do what you need here
}, 2000);
		
	}
		function loadeditor(str){	
		
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/notenvaluesArchiv.php",
            type: 'POST',
            data: {
              'SchIDnr': str,
				'KID': document . getElementById( "Kursname" ) . value, 
				'UID': 1, 
				'sem': document . getElementById( "Semester" ) . value 
				
			
			}
        }, 
		
        table: ".datatablesmod",
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
		
		
		  // Activate an inline edit on click of a table cell
    $('.datatablesmod').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit();
													  
													  
													  } }
        } );
    } );
		
 
	 
	}
	
	
	function loadtable(str){
		
			tableedit = $( '.datatablesmod' ).DataTable( {


			dom: "Bfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/notenvaluesArchiv.php",
            type: 'POST',
            data: {
                  'SchIDnr': str,
					'KID': document . getElementById( "Kursname" ) . value,
				'UID': 1, 
				'sem': document . getElementById( "Semester" ) . value 
				
			
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
           
        ]


		} );
	
	  

	tableedit
        .on( 'select', function ( e, dt, type, indexes ) {
            editor.edit( indexes, {
                title: 'Note bearbeiten',
                buttons: [
					  {
						
							
                        label: 'Speichern',
                        fn: function () {
							setTimeout(function(){
		 
	tableshow();
    //do what you need here
}, 2000);
                            editor
                             
                                .submit();
							
                        }
                    },
					
                   
                
                    
					
                    {
						
							
                        label: 'Löschen',
                        fn: function () {
							setTimeout(function(){
		 
	tableshow();
    //do what you need here
}, 2000);
                            editor
                                .remove( indexes, false )
                                .submit();
							
                        }
                    }
					
                ]
            } );
        } )
        .on( 'deselect', function () {
			
		
            editor.close();
		
        } );

  
}
	
	

		
		function loadeditor1(str){	
			
				
	
	
		
	
		
    editor1 = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/abwvaluesArchiv.php",
            type: 'POST',
            data: {
              'SchIDnr': str,
				'KID': document . getElementById( "Kursname" ) . value, 
				'sem': document . getElementById( "Semester" ) . value 
				
			
			}
        }, 
		
        table: ".datatablesmod3",
        fields: [ {
			 label: "KursID:",
                name: "Kursname",
                type: "readonly",
                def: document.getElementById( "Kursname" ).value
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
		
		
		  // Activate an inline edit on click of a table cell
    $('.datatablesmod3').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor1.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit();
													  tableshow();
													  
													  } }
        } );
    } );
		
 
	 
	}
	
	
	function loadtable1(str){
			
	
	
	
		
			tableedit1 = $( '.datatablesmod3' ).DataTable( {


			dom: "lBfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/abwvaluesArchiv.php",
            type: 'POST',
            data: {
                  'SchIDnr': str,
					'KID': document . getElementById( "Kursname" ) . value, 
				'sem': document . getElementById( "Semester" ) . value 
				
			
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

           
        
tableedit1
        .on('dblclick', 'tbody tr', function () {
    tableedit1.row( this ).delete();
	tableshow();
} );
  
	
	  
 
	


}
	
	

	


	function reloadpage1()
{
 	 
var Kursnme = document.getElementById( "Kursname" ).value;
	
var encrypted = btoa(Kursnme);
	
	test();
	test1();
	
//U2FsdGVkX18ZUVvShFSES21qHsQEqZXMxQ9zgHy+bu0=

window.location.href= "/notenbuch-archiv?q="+  encrypted + "&sem=" +  document.getElementById( "Semester" ).value ;

}
	 function tableshow() {
 
		 var urlParams = new URLSearchParams(window.location.search);
		var Kursnameenc = urlParams.get('q');	
		var Kursname = atob(Kursnameenc);
		
		
	
		
		 if (table1)
			 {
		 table1.destroy();
			 }
		 if (table)
			 {
		 table.destroy();
			 }

		 var url3 = "/wp-content/themes/structr/Page_Scripts/GetNotenValuesArchiv.php?q=" + Kursname + "&s=" + document.getElementById( "Semester" ).value;
		var url4 = "/wp-content/themes/structr/Page_Scripts/GetAbwValuesArchiv.php?k=" +Kursname + "&s=" + document.getElementById( "Semester" ).value;
         $.fn.dataTable.ext.errMode = 'throw';
    table = $( '.datatables' ).DataTable( {


        ajax: {

            url: url3,

            dataSrc: ""
        },
        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false
			
        },


            {
                data: 'IDSchueler'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'Notenschnitt'
            },
            {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' Noten Bearbeiten'


            },

            {
                className: 'details-control2',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Neue Note erstellen'
            },
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
  

		 
		
			 
    $( '.datatables tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );

        if ( row.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
             row.child.hide();
			
            tr.removeClass( 'shown' );
        } else {
            row.child( format( row.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( showNoten( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control2', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( neueNote( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );

    } );

		 
		 table1 = $( '.datatables1' ).DataTable( {


        ajax: {

            url: url4,

            dataSrc: ""
        },

        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false
			

        },

            {
                data: 'SchuelerID'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'AbwesenheitenGesamt'
            },
				   {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Abwesenheiten bearbeiten'


            },
				  {
                className: 'details-control2',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Neue Abwesenheit erstellen'
            }



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


    $( '.datatables1 tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );

        if ( row1.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
             row1.child.hide();
			
			
            tr.removeClass( 'shown' );
        } else {
            row1.child( format1( row1.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );
		   $( '.datatables1 tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );



        row1.child( showAbwesenheiten( row1.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );
		     $( '.datatables1 tbody' ).on( 'click', 'td.details-control2', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );



        row1.child( neueAbw( row1.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );

    } );


		
		 
		
    }

	function tableshow1() {

		 
		
		
		
		
			 
		
		 if (table1)
			 {
		 table1.destroy();
			 }
		 if (table)
			 {
		 table.destroy();
			 }

		 var url3 = "/wp-content/themes/structr/Page_Scripts/GetNotenValuesArchiv.php?q=" + "-Select-" + "&s=" + document.getElementById( "Semester" ).value;
		var url4 = "/wp-content/themes/structr/Page_Scripts/GetAbwValuesArchiv.php?k=" + "-Select-" + "&s=" + document.getElementById( "Semester" ).value;
         $.fn.dataTable.ext.errMode = 'throw';
    table = $( '.datatables' ).DataTable( {


        ajax: {

            url: url3,

            dataSrc: ""
        },
        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false
			
        },


            {
                data: 'IDSchueler'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'Notenschnitt'
            },
            {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' Noten Bearbeiten'


            },

            {
                className: 'details-control2',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Neue Note erstellen'
            },
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
  

		 
		
			 
    $( '.datatables tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );

        if ( row.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
             row.child.hide();
			
            tr.removeClass( 'shown' );
        } else {
            row.child( format( row.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( showNoten( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );

    $( '.datatables tbody' ).on( 'click', 'td.details-control2', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( neueNote( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );

    } );

		 
		 table1 = $( '.datatables1' ).DataTable( {


        ajax: {

            url: url4,

            dataSrc: ""
        },

        columns: [ {
            className: 'details-control',
            defaultContent: '',
            data: null,
            orderable: false
			

        },

            {
                data: 'SchuelerID'
            },
            {
                data: 'Nachname'
            },
            {
                data: 'Vorname'
            },
            {
                data: 'AbwesenheitenGesamt'
            }, {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' Abwesenheiten Bearbeiten'


            },
				  {
                className: 'details-control2',
                defaultContent: '',
                data: null,
                orderable: false,
                title:'Neue Abwesenheit erstellen'
            },


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


    $( '.datatables1 tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );

        if ( row1.child.isShown() ) {
            tr.next( 'tr' ).removeClass( 'details-row' );
             row1.child.hide();
			
			
            tr.removeClass( 'shown' );
        } else {
            row1.child( format1( row1.data() ) ).show();
            tr.next( 'tr' ).addClass( 'details-row' );
            tr.addClass( 'shown' );
        }
    } );

		   $( '.datatables1 tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );



        row1.child( showAbwesenheiten( row1.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );
		   $( '.datatables1 tbody' ).on( 'click', 'td.details-control2', function () {
        var tr = $( this ).closest( 'tr' ),
            row1 = table1.row( tr );



        row1.child( neueAbw( row1.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );

    } );

		 
		
    }

	function sleep(miliseconds) {
   var currentTime = new Date().getTime();

   while (currentTime + miliseconds >= new Date().getTime()) {
   }
}
	
function sendNote(){
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}


			
			xmlhttp.open( "GET", "/Ajax_Scripts/createNoteArchiv.php?q=" + document.getElementById( "Kursname" ).value+"&k="+ document.getElementById("schid").value +"&l=" +document.getElementById("Notecr").value +"&m="+ document.getElementById("Namecr").value +"&n=" +document.getElementById("Gewichtungcr").value +"&o="+document.getElementById("Datumcr").value+"&s="+document.getElementById("Semester").value, true );

			xmlhttp.send();
	
	setTimeout(function(){
		 document.getElementById("Notecr").value = "";
	 document.getElementById("Namecr").value = "";
	 document.getElementById("Gewichtungcr").value = "";
	 document.getElementById("Datumcr").value = "";
	tableshow();
    //do what you need here
}, 2000);
		
	
	
	}
	
	function sendAbw(){
		
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}


		
			xmlhttp.open( "GET", "/Ajax_Scripts/createAbwArchiv.php?q=" + document.getElementById( "Kursname" ).value+  "&l=" +document.getElementById("Vorname").value + "&m=" + document.getElementById("Nachname").value+ "&n=" +document.getElementById("Datum1cr").value + "&o=" +document.getElementById("Klassecr").value +"&p=" + document.getElementById("Kommentarcr").value + "&j=" + document.getElementById("KommentarVerwcr").value + "&r=" + document.getElementById("Abwcr").value + "&u=" + document.getElementById("Lehrercr").value +"&t="+document.getElementById("Entschcr").value+ "&s=" + document.getElementById("Semester").value, true );
            	
			xmlhttp.send();
	
	setTimeout(function(){
		  document.getElementById("Datumcr").value = "";
	 document.getElementById("Klassecr").value = "";
	 document.getElementById("Kommentarcr").value = "";
	 document.getElementById("KommentarVerwcr").value = "";
			document.getElementById("Abwcr").value = "";
	 document.getElementById("Lehrercr").value = "";
	 document.getElementById("Entschcr").value = "";
	tableshow();
    //do what you need here
}, 2000);
		
	
	
	}

        function getK() {

            alert();
        }

        function getKursname(){


            
		 
		


            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("Kursname").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+ document.getElementById('lehrer').value + "&s="  +  document.getElementById('Semester').value,true);

            xmlhttp.send();

        }
  

</script>


<style>
	body {
		font-family: "Dosis", "Helvetica Neue", sans-serif;
		color: #232323;
	}
	
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>