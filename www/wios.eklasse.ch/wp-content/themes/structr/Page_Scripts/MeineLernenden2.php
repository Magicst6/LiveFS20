<head>

<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
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
	
	
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

	
	<script type="text/javascript" language="javascript" class="init">
	</script>
</head>

<script>

var	editor1;
	var editor2;
	var table2;
	var table1;
		$(document).ready(function() {
			
			tableshow();
		});
			

	
	function tableshow(){
		
		 var urlParams = new URLSearchParams(window.location.search);
		var Kursnameenc = urlParams.get('q');	
		var Kursname = atob(Kursnameenc);
		
		document.getElementById( "Kursname" ).value=Kursname;
			
	if ( table1 ) {
		table1.destroy();
	}
	
	if ( editor1 ) {
		editor1.destroy();
	}
		loadeditor1(Kursname);
	}

  

	function loadeditor1(Kursname){
	
	 // Activate an inline edit on click of a table cell
    /*$('#dtbl1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor1.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );*/
		
		 editor1 = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw1.php",
            type: 'POST',
            data: {'KID':  Kursname
                  
			}
        }, 
        table: "#dtbl1",
        fields: [ {
                label: "ID:",
                name: "sv_LernendeModule.ID",
			    type: "readonly"
            },
			
			{
                label: "Vorname:",
                name: "sv_LernendeModule.Vorname"
            }, {
                label: "Nachname:",
                name: "sv_LernendeModule.Name"
            },  {
                label: "User_ID:",
                name: "sv_LernendeModule.User_ID",
				  type: "readonly"
            },
				{
                label: "Email:",
                name: "sv_LernendeModule.EMail",
			      type: "readonly"
            }, 
				 {
                label: "Profil:",
                name: "sv_LernendeModule.Profil"
					 
            },{
                label: "Loginname:",
                name: "sv_LernendeModule.Loginname",
				  type: "readonly"
            },
				  {
                label: "Modul1:",
                name: "sv_LernendeModule.Modul1",
				 type: "readonly"
            },
				  {
                label: "Modul2:",
                name: "sv_LernendeModule.Modul2"
            },
				 
				  {
                label: "Modul3:",
                name: "sv_LernendeModule.Modul3"
            },
				 
				  {
                label: "Modul4:",
                name: "sv_LernendeModule.Modul4"
            },
				 
				  {
                label: "Modul5:",
                name: "sv_LernendeModule.Modul5"
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
				
				responsive: true,
        dom: "lBfrtip",
				 buttons: [
                {
                extend: 'collection',
                text: 'Export',
                buttons: [
                   'copy',
                    'excel',
                    'csv',
                    'print'
                ]
            } 
            ],
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getlernendeModuleKw1.php",
            type: 'POST',
            data: {'KID': Kursname
                 
			}
        }, 
        order: [[ 1, 'asc' ]],
        columns: [
             {
        className      : 'select-checkbox',
        defaultContent : '',
        data           : '',
        orderable      : false
      },
			 {
        className      : 'details-control',
        defaultContent : '',
        data           : 'cb',
        orderable      : false
      },
			 { data: "sv_LernendeModule.ID" },
            { data: "sv_LernendeModule.Vorname" },
            { data: "sv_LernendeModule.Name" },
            { data: "sv_LernendeModule.User_ID",
			"render": function(data, type, row, meta){
            if(data === '0'){
                data ='nicht registriert';
            }

            return data; }
			},
            { data: "sv_LernendeModule.EMail",  'render': function(data, type, full, meta) {
   return '<a href="mailto:' + data + '?">'+data+'</a>';
  }
		  },
			{ data: "sv_LernendeModule.Profil" },
			{ data: "sv_LernendeModule.Loginname" },
			
			
			{ data:  "sv_LernendeModule.ID",
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
		
		
		
	
	$('#dtbl1 tbody').on('click', 'td.details-control', function () {
     var tr  = $(this).closest('tr'),
         row = table1.row(tr);
    
     if (row.child.isShown()) {
       tr.next('tr').removeClass('details-row');
       row.child.hide();
       tr.removeClass('shown');
     }
     else {
       row.child(format(row.index())).show();
       tr.next('tr').addClass('details-row');
       tr.addClass('shown');
     }
  });

	
} 


 
	
	function reloadpage1()
{
 	 
var Kursnme = document.getElementById( "Kursname" ).value;
	
var encrypted = btoa(Kursnme);
	
	
//U2FsdGVkX18ZUVvShFSES21qHsQEqZXMxQ9zgHy+bu0=

window.location.href= "/meine-lernenden?q=" + encrypted;

}
	
	function showoverview(id){
		
		window.open(
  '/uebersicht-des-schuelers?q=' + id,
  'popup','width=1000,height=1000' // <- This is what makes it open in a new window.
);
	}
	
	function sendMail() {
     var MultiMail='';
		
	  var data = table1.rows({selected:  true}).data();
      
        for (var i=0; i < data.length ;i++){
           
	 	MultiMail= MultiMail + data[i].sv_LernendeModule.EMail+';';
			
           
        }
		//alert (MultiMail);

	window.location.href = "mailto:" +MultiMail;
			
		
}
	
	 function format (ind) {
		 var modul=null;
		 var data = table1.rows().data();
		//alert(data[ind].sv_LernendeModule.Modul1);
	  var i;  
	  var kurs=null;
	  
	  for(i=1; i<10; i++){
		switch(i){
			case 1:		
				modul=data[ind].sv_LernendeModule.Modul1;
				break;
				case 2:		
				 modul=data[ind].sv_LernendeModule.Modul2;
				break;
				case 3:		
				modul=data[ind].sv_LernendeModule.Modul3;
				break;
				case 4:		
				modul=data[ind].sv_LernendeModule.Modul4;
				break;
			    case 5:		
				modul=data[ind].sv_LernendeModule.Modul5;
				break;
				case 6:		
				modul=data[ind].sv_LernendeModule.Modul6;
				break;
			    case 7:		
				modul=data[ind].sv_LernendeModule.Modul7;
				break;
				case 8:		
				modul=data[ind].sv_LernendeModule.Modul8;
				break;
				case 9:		
				modul=data[ind].sv_LernendeModule.Modul9;
				break;
			 
		}
				var Kursdt= modul;
		
		 
		if ((Kursdt)){
	  var z=null;
	 var z= '<div class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'
            
		  +'<tr>'+
                  '<td class="title"  width="1%">Modul'+i+':</td>'+
                  '<td  width="12%"">'+Kursdt+'</td>'+
          '</table>'+   
		    '</div>';
		if (kurs==null){
	       kurs=z;
		}
			else kurs=kurs+z;
		  }
		  
  }
	  
	  return kurs;
  }
	
</script>


Lehrperson:

<br>

<?php

include 'db.php';

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

<br><br>


Kursname:
<br>
 
<select id="Kursname" name="Kursname" required="required"  onchange="reloadpage1()">

    <?php

    include 'db.php';

    

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);





    echo "<option>" . '-Select-' . "</option>";



    while( $line2= mysqli_fetch_array($result))

    {

        for($x = 1; $x <= 16; $x++)

        {



            $value = $line2['Kurs'.$x];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    }

    ?>
</select>

<br><br>
<button id="sendmail"  onclick="sendMail()">Mail an Auswahl senden</button>
<br><br>
<style>
	 button {
          color: white;
        }
	
	</style>
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



<table id="dtbl1" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th></th>
				<th>Module</th>
				<th>ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>User ID</th>
				<th>Email</th>
				<th>Profil</th>
				<th>Loginname</th>
				<th>Übersicht</th>
            </tr>
        </thead>
    </table>

<br><br>
