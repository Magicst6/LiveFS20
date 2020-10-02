
<html>
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
	 var table;
		var table1;
	$(document).ready(function() {
		
		loadtable();
  
	});
	//var data= [{"Note":"6","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"2","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"3.7","Name":"dsgs","Gewichtung":"25","Datum":"2019-06-16"}]  ;
	
 
  
 // function format (data) {
//	  var i;  
//	  var note=null;
//	  
//	  for(i=1; i<10; i++){
//		var Notedt= data["Note"+i];
//		var  Namedt=data["Name"+i];
//		var  Gewichtungdt= data["Gewichtung"+i];
//		var  Datumdt=data["Datum"+i];
//		 
//		if ((Notedt)>1 && Notedt<=6){
//	  var z=null;
//	 var z= '<div class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'
//            
//		  +'<tr>'+
//                  '<td class="title">Note'+i+':</td>'+
//                  '<td>'+Notedt+'</td>'+
//		     '<td class="title">Notenname:</td>'+
//		  '<td>'+Namedt+'</td>'+
//		    '<td class="title">Gewichtung:</td>'+
//		   '<td>'+Gewichtungdt+'</td>'+
//		   '<td class="title">Datum:</td>'+
//		   '<td>'+Datumdt+'</td></tr>'+
//			 
//          '</table>'+
//     
//
//		    '</div>';
//		if (note==null){
//	       note=z;
//		}
//			else note=note+z;
//		  }
//		  
//  }
//	  
//	  return note;
//  };
//  
		function loadtable(){
		var new_url= "/wp-content/themes/structr/Page_Scripts/GetLernendeModule.php?q="+document.getElementById("Kursname").value;
			var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende.php?q="+document.getElementById("Kursname").value;
                   
		
      
		 table1 = $('.datatables1').DataTable({
      
	     dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
         
	    responsive:true,
	
	    ajax: {
			
			url: new_url1,
			
            dataSrc: ""
			
        },
    columns : [
		{
     className      : 'details-control',
        defaultContent : '',
        data           : null,
        orderable      : false
		
		},
      
		{data : 'ID'},
		{data : 'Klasse'},
		{data : 'Name'},
		{data : 'Vorname'},
		{data : 'User ID'},
		{data : 'EMail'},
		{data : 'Loginname'},
		{data : 'Profil'},
		{data : 'Status'}
		
			
		
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
		}

	
	
		
function tableshow(){
	//	var new_url= "/wp-content/themes/structr/Page_Scripts/GetLernendeModule.php?q="+document.getElementById("Kursname").value;
	//var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende.php?q="+document.getElementById("Kursname").value;
	
		
        getMailArray();            
		table1.destroy();
	loadtable();
	//table1.ajax.url( new_url1 ).load();
}		
	
		
		function sendMail() {
 

	window.location.href = "mailto:" + document.getElementById('Mails').value;
			
		
}
		
	</script>
	
	

	
	
	</html>
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
  content: /*'\2b'*/;
}
/*
tr.shown td.details-control:before {
  content: '\2212';
}
*/	</style>
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

  
	
    function getMailArray(){

      


            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {
				

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("Mails").value = this.responseText;
					       
                          

                }

            };

		 
            xmlhttp.open("GET","/Ajax_Scripts/getMailArray.php?q="+ document.getElementById('Kursname').value,true);

            xmlhttp.send();

        }

    

			
  

    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

</script>

<input id="Mails" type="hidden">



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



Lehrperson:

<br>

<?php



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
 
<select id="Kursname" name="Kursname" required="required"  onchange="tableshow()">

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
<button id=send onclick="sendMail()">Rundmail an Kursteilnehmer senden</button>
	

<br><br>

<h1>Lernende</h1>

<div class="container">
  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatables1" width="auto">
        <thead>
          <tr>
			   <th></th>
            <th>ID</th>
            <th>Klasse</th>
			<th>Name</th>
	        <th>Vorname</th>
			  <th>User ID</th>
            <th>EMail</th>
			<th>Loginname</th>
			  <th>Profil</th>
			  <th>Status</th>
			  
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
 
<br><br>




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
	
	button {
		color: white;
	}

</style>


