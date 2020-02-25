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
    editor = new $.fn.dataTable.Editor( {
        ajax: "/wp-content/themes/structr/Page_Scripts/getLehrpersonenEdit.php",
        table: "#dtbl",
        fields: [ 
               
			
			{
                label: "Vorname:",
                name: "Vorname"
            }, {
                label: "Nachname:",
                name: "Nachname"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#dtbl').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
  $.fn.dataTable.ext.errMode = 'throw';
     table2 = $('#dtbl').DataTable( {
        dom: "lBfrtip",
        ajax: "/wp-content/themes/structr/Page_Scripts/getLehrpersonenEdit.php",
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
            { data: "User_ID" },
            { data: "EMAIL" },
            { data: "Loginname" }
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor, text:"Neue Lehrperson" },
            { extend: "edit",   editor: editor, text:"Lehrperson bearbeiten" },
            { extend: "remove", editor: editor, text:"Lehrperson löschen" }
        ]
    } );

 
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
        
      
	
	    ajax: {
			
			url: new_url,
			
            dataSrc: ""
			
        },
    columns : [
      {
        className      : 'details-control',
        defaultContent : '',
        data           : null,
        orderable      : false
      },
      {data : 'Vorname'},
		{data : 'Nachname'},
		{data : 'EMAIL'},
		{data : 'Loginname'}
		
			 
			
	
    
			
		
    ],
    
  
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

</script>


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
                <th>User ID</th>
                <th>Email</th>
                <th>Loginname</th>
            </tr>
        </thead>
    </table>


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

     function loadtable(){

     var new_url= "/wp-content/themes/structr/Page_Scripts/GetLehrpersonen_Archiv.php?q="+document.getElementById("Semester").value;
     //	var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende_Archiv.php?q="+document.getElementById("Semester").value;


     $.fn.dataTable.ext.errMode = 'throw';
     table = $('.datatables').DataTable({
       
        dom: 'lrftip',

         ajax: {

             url: new_url,

             dataSrc: ""

         },
         columns : [
             {
                 className      : 'details-control',
                 defaultContent : '',
                 data           : null,
                 orderable      : false
             },
             {data : 'Vorname'},
             {data : 'Nachname'},
             {data : 'EMAIL'},
             {data : 'Loginname'}







         ],


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



     
     }
		
function tableshow(){
		var new_url= "/wp-content/themes/structr/Page_Scripts/GetLehrpersonen_Archiv.php?q="+document.getElementById("Semester").value;
	//var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende_Archiv.php?q="+document.getElementById("Semester").value;

   
 table.clear()
		.draw();

	table.ajax.url( new_url ).load();
//	table1.ajax.url( new_url1 ).load();
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

<br><br>





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

<br><br>



<br><br>

<h4>Kurse der Lehrpersonen (mit + Liste anzeigen)</h4>
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
            <th>Vorname</th>
            <th>Nachname</th>
			<th>EMAIL</th>
	        <th>Loginname</th>
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


