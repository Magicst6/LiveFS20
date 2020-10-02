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

var	editor1;
	var editor2;
	var table2;
	var table1;
		$(document).ready(function() {
			
			loadeditor1();
		});
			

	
	



	function loadeditor1(){
	
	 // Activate an inline edit on click of a table cell
    /*$('#dtbl1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor1.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );*/
		
		 editor1 = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw.php",
            type: 'POST',
            data: {
                  
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
   /* $('#dtbl1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor1.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );*/
		
			table1= $('#dtbl1').DataTable( {
        dom: "lBfrtip",
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw.php",
            type: 'POST',
            data: {
                 
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
            { data: "User_ID",
			"render": function(data, type, row, meta){
            if(data === '0'){
                data ='nicht registriert';
            }

            return data; }
			},
            { data: "EMail",  'render': function(data, type, full, meta) {
   return '<a href="mailto:' + data + '?">'+data+'</a>';
  }
		  },
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
			{ data: "Modul9" },
			{ data:  "ID",
         "render": function(data, type, row, meta){
            if(type === 'display'){
                data = '<button onclick=showoverview('+data+')>Schülerdaten</button>';
            }

            return data; }
			}
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
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

	function showoverview(id){
		
		window.open(
  '/uebersicht-des-schuelers?q=' + id,
  'popup','width=1000,height=1000' // <- This is what makes it open in a new window.
);
	}
	
</script>


<style>
	 button {
          color: white;
        }
	</style>




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
				<th>Übersicht</th>
            </tr>
        </thead>
    </table>

<br><br>
