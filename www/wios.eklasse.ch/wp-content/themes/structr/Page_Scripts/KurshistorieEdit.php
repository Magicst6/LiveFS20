
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
	
	<script>
	
  var editor; // use a global for the submit and return data rendering in the examples
 var table2;
	var table1;
	var table;
  $(document).ready(function() {
    


    editor = new $.fn.dataTable.Editor( {
        ajax: { url: "/wp-content/themes/structr/Page_Scripts/getKursHist.php",
            type: 'POST',
            data: {
                  
				
			
			}
        },
		  language: {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        table: ".datatables",
        fields: [ 
               
			
			 {
                label: "ID:",
                name: "ID"
            },
			{
                label: "Stattgefunden:",
                name: "Stattgefunden"
            }, {
                label: "Datum:",
                name: "Datum",
				type: "date"
            },
			
			 {
               label: "KursID:",
                name: "KursID"
			 },
			 {
                label: "Lehrer:",
                name: "Lehrer"
            },
			{
                label: "Kommentar:",
                name: "Kommentar"
            },
			{
                label: "Lektionen:",
                name: "Lektionen"
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
    $('.datatables').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
  $.fn.dataTable.ext.errMode = 'throw';
     table2 = $('.datatables').DataTable( {
		   "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        dom: "lBfrtip",
        ajax:     { 
			url: "/wp-content/themes/structr/Page_Scripts/getKursHist.php",
            type: 'POST',
            data: {
                  
				
				
			
			}
        }, 
        order: [[ 3, 'desc' ]],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
			
			{ data: "ID"},
			{ data: "Stattgefunden"},
			{ data: "Datum"},
			{ data: "KursID"},
			{ data: "Lehrer"},
			{ data: "Kommentar"},
			{ data: "Lektionen"}
           
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor, text:"Neuer Eintrag" },
            { extend: "edit",   editor: editor, text:"Eintrag bearbeiten" },
            { extend: "remove", editor: editor, text:"Eintrag löschen" }
        ]
    } );

 
        });
 
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
 



		
function tableshow(){
	

        if ( table2 ) {
            table2.destroy();
        }
	 if ( editor ) {
           editor.destroy();
        }





        loadtable();




   
//	table1.ajax.url( new_url1 ).load();
}		
		
		
	</script>
	
	

	
	
	</html>
	<style>/*
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

	

   



<br><br>

<h1>Kurshistorie</h1>
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
            <th>Stattgefunden</th>
			<th>Datum</th>
	        <th>KursID</th>
			  <th>Lehrer</th>
            <th>Kommentar</th>
			<th>Lektionen</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>


</form>&nbsp;
<style>
	 button {
          color: white;
        }
	</style>


