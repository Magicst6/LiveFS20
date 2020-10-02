<head>

 <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	
	
	
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
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

	
	<script type="text/javascript" language="javascript" class="init">
	</script>
</head>

<script>
var editor; // use a global for the submit and return data rendering in the examples
 var table2;
	var table1;
	var table;
$(document).ready(function() {
	
	
   

 
	//var data= [{"Note":"6","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"2","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"3.7","Name":"dsgs","Gewichtung":"25","Datum":"2019-06-16"}]  ;
	
 
  
  function format (data) {
	  var i;  
	  var kurs=null;
	  
	  for(i=1; i<31; i++){
		var Kursdt= data["Kurs"+i];
		
		 
		if ((Kursdt)){
	  var z=null;
	 var z= '<div class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'
            
		  +'<tr>'+
                  '<td class="title"  width="1%">Kurs'+i+':</td>'+
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
  };
  
		var new_url= "/wp-content/themes/structr/Page_Scripts/GetLehrpersonen_Archiv.php?q="+document.getElementById("Semester").value;
		//	var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende_Archiv.php?q="+document.getElementById("Semester").value;
                   
		
      $.fn.dataTable.ext.errMode = 'throw';
  table = $('.datatables').DataTable({
	      dom: 'lrftip',
        
	  responsive:true,
     
	    ajax: {
			
			url: new_url,
			
            dataSrc: ""
			
        },
	  
	  
    columns : [
        
		 {
        className      : '',
        defaultContent : '',
        data           : null,
        orderable      : false
      },
      {
        className      : 'details-control',
        defaultContent : '',
        data           : 'cb',
        orderable      : false
      },
      {data : 'Vorname'},
	  {data : 'Nachname'},
      {data : 'EMAIL',
		 'render': function(data, type, full, meta) {
   return '<a href="mailto:' + full.EMAIL + '?">'+full.EMAIL+'</a>';
  }
		 
		}
		
		
		
			 
			
	
    
			
		
    ],
	  order : [[ 1, "asc"]],
                    columnDefs : [
                        {
                            orderable : false,
                            className : 'select-checkbox',
                            targets : 0
                        },
                    ],
                    retrieve : true,
                    select: {
                        style: 'os',
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
    
  
  });
	
	
     
 
	
   
  

	
			
			
		
	
 
  $('.datatables tbody').on('click', 'td.details-control', function () {
     var tr  = $(this).closest('tr'),
         row = table.row(tr);
    
     if (row.child.isShown()) {
       tr.next('tr').removeClass('details-row');
       row.child.hide();
       tr.removeClass('shown');
     }
     else {
       row.child(format(row.data())).show();
       tr.next('tr').addClass('details-row');
       tr.addClass('shown');
     }
  });
 

	
} );
	
	
	function sendMail() {
     var MultiMail='';
		
	  var data = table.rows({selected:  true}).data();
      
        for (var i=0; i < data.length ;i++){
           
	 	MultiMail= MultiMail + data[i].EMAIL+';';
			
           
        }
		//alert (MultiMail);

	window.location.href = "mailto:" +MultiMail;
			
		
}

</script>


<style>
	 button {
          color: white;
        }
	</style>




<script>
	





     function format (data) {
         var i;
         var kurs=null;

         for(i=1; i<17; i++){
             var Kursdt= data["Kurs"+i];


             if ((Kursdt)){
                 var z=null;
                 var z= '<div class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'

                     +'<tr>'+
                     '<td class="title">Kurs'+i+':</td>'+
                     '<td>'+Kursdt+'</td>'+
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
<script>
	

    function getKursname(str){

        location.reload;

        if (str == "") {

            document.getElementById("Kursnm").innerHTML = "";

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

                    document.getElementById("Kursnm").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+str,true);

            xmlhttp.send();

        }

    }

  
  

    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

</script>

<?php

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







    <?php

    //Den aktuell eingeloggten Schüler anzeigen

    $isEntry= "Select Semesterkuerzel From sv_Settings";
    $result = mysqli_query($con, $isEntry);
    

    while( $line3= mysqli_fetch_array($result))
    {
    $Semester = $line3['Semesterkuerzel'];
   

    }

    ?>

<input type="hidden" id="Semester" value="<? echo $Semester; ?>">

<button id="sendmail"  onclick="sendMail()">Mail an Auswahl senden</button>





<h4>mit + Liste der Kurse anzeigen</h4>
<div class="container">
  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatables" width="auto" >
        <thead>
          <tr>
			 <th></th>
            <th></th>
            <th>Vorname</th>
            <th>Nachname</th>
			  <th>EMAIL</th>
			 
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
  
		
			 

</form>&nbsp;

<style>

    body {
        font-family:"Dosis", "Helvetica Neue", sans-serif;
        color:#232323;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>


