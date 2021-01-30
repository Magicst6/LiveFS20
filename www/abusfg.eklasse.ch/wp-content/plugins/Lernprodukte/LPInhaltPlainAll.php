<html>


	
	
	
	
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
	

		
	let optionsPa = {
    "sScrollX": "100%",
    "sScrollXInner": "110%",
    "bScrollCollapse": true,
    "colReorder": true
};
  var editorPa; // use a global for the submit and return data rendering in the examples
 var table2Pa;
	var table1a;
	var tablea;
		var tablesmPa;
		 
		 var editorsmPa;
  $( document ).ready(function() {
    


$(document).ready(function() {
    $('.datatablesPa').dataTable(optionsPa);
});
	       


			
				  tableloadKPa();
			
					  tableloadKsmPa();
				
			
	  });
	  
	  
		function tableloadKPa(){
    editorPa = new $.fn.dataTable.Editor( {
        ajax: { url: "/Datatables/DataTablesEditor/AjaxScripts/getLPEditAll.php",
            type: 'POST',
            data: {
                  
				
				
			}
        },
		  language: {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        table: ".datatablesPa",
        fields: [ 
               
			
			 {
                label: "ID:",
                name: "ID"
            },
			{
                label: "Beschreibung:",
                name: "Beschreibung"	
            },
			{
                label: "Text:",
                name: "TEXT",
				type: "textarea"
            }, 
			{
                label: "Kommentar:",
                name: "Kommentar",
				type: "textarea"
            },
			{
                label: "Datum:",
                name: "Datum",
				
				type: "readonly"
				
				
				
            },
			{
                label: "URL:",
                name: "URL",
				type: "readonly"  
            }, 
			{
                label: "Nachname:",
                name: "Nachname",
				type: "hidden"
            },
			 {
               label: "Vorname:",
                name: "Vorname",
				 type: "hidden"
			 }
			, {
                label: "User_ID:",
                name: "User_ID",
				type: "hidden"
            },
			 {
               label: "Loginname:",
                name: "Loginname"
			 },
			{
               label: "E-Mail:",
                name: "EMAIL",
				type: "hidden"
			 },
			{
                label: "Korrigierte Datei:",
                name: "Datei",
                type: "upload",
                display: function ( file_id ) {
                    return  '<a href="'+editorPa.file( 'files', file_id ).web_path+'" target=”_blank”>"'+editorPa.file( 'files', file_id ).web_path+'"</a>';
                },
                clearText: "Clear",
                noImageText: 'keine Datei'
            },
			{
               label: "Bewertung:",
                name: "Bewertung"
			
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
    $('.datatablesPa').on( 'click', 'tbody td:not(:first-child)', function (e) {
       rk='';
					var colIdxKPa = table2Pa
        .cell( this )
        .index().column;
		 var rowIdxKPa = table2Pa
        .cell( this )
        .index().row;
		
		if (colIdxKPa == 2 )
			{
				
			
      tinymce.get('lernproduktTextkorrPa').setContent(table2Pa.cell(rowIdxKPa,2).data() );
	   tinymce.get('kommentPa').setContent(table2Pa.cell(rowIdxKPa,5).data() );
	document.getElementById("ID").value = table2Pa.cell(rowIdxKPa,0).data(); 
				
				document.getElementById("beschrTKPa").value = table2Pa.cell(rowIdxKPa,1).data(); 
					document.getElementById("bewPa").value = table2Pa.cell(rowIdxKPa,8).data(); 
	document.getElementById("myModalTPa").style.display = 'block'; 
	 window.onclick = function(event) {
        if (event.target == document.getElementById("myModalTPa")) {
						var result = confirm("Möchten Sie das Fenster wirklich schließen? Der geschriebene Text geht verloren!");
if (result) {
    //Logic to de
         document.getElementById("myModalTPa").style.display = "none";
}
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("spanTPa").onclick = function() {
		 			var result = confirm("Möchten Sie das Fenster wirklich schließen? Der geschriebene Text geht verloren!");
if (result) {
    //Logic to de
       document.getElementById("myModalTPa").style.display = "none";
}
	
    }
	 
	

	
	
	
				

		
			}
       
    } );
  $.fn.dataTable.ext.errMode = 'throw';
     table2Pa = $('.datatablesPa').DataTable( {
		   "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        dom: "lBfrtip",
        ajax:     { 
			url: "/Datatables/DataTablesEditor/AjaxScripts/getLPEditAll.php",
            type: 'POST',
            data: {
                  
				
				
			
			}
        }, 
        order: [[ 3, 'desc' ]],
		 autoWidth: false,
		 responsive:true,
        columns: [
         
			
			{ data: "ID"},
			{ data: "Beschreibung"},
			{ data: "TEXT"},
			{ data: "Datum"},
			{data: "URL", "name": "URL","innerWidth": "10%",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.URL) {
                $(nTd).html("<a href="+oData.URL+" target=”_blank”>"+oData.URL+"</a>");
            }
        },
			
			},
 			{ data: "Kommentar"},
		
			{
                data: "Datei",
                render: function ( file_id ) {
                    return file_id ?
                        '<a href="'+editorPa.file( 'files', file_id ).web_path+'" target=”_blank”>"'+editorPa.file( 'files', file_id ).web_path+'"</a>' :
                        null;
                },
                defaultContent: "keine Datei",
                title: "Korrektur"
            },
	
          	{ data: "Loginname" },
			{ data: "Bewertung" }
			
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editorPa, text:"Neues Lernprodukt" },
            { extend: "edit",   editor: editorPa, text:"Lernprodukt bearbeiten" },
            { extend: "remove", editor: editorPa, text:"Lernprodukt löschen" },
			   
             
                {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
          
                    
        
		]
    } );
		}
 
      function tableloadKsmPa(){
			
	   editorsmPa = new $.fn.dataTable.Editor( {
        ajax: { url: "/Datatables/DataTablesEditor/AjaxScripts/getLPEditAll.php",
            type: 'POST',
            data: {
                  
				
				
			}
        },
		  language: {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        table: ".datatablessmPa",
        fields: [ 
               
			
			 {
                label: "ID:",
                name: "ID"
            },
			{
                label: "Beschreibung:",
                name: "Beschreibung"	
            },
			{
                label: "Text:",
                name: "TEXT",
				type: "textarea"
            }, 
			{
                label: "Kommentar:",
                name: "Kommentar",
				type: "textarea"
            },
			{
                label: "Datum:",
                name: "Datum",
				type: "readonly"
				
				
            },
			{
                label: "URL:",
                name: "URL",
				type: "readonly"  
            }, 
			{
                label: "Nachname:",
                name: "Nachname",
				type: "hidden"
            },
			 {
               label: "Vorname:",
                name: "Vorname",
				 type: "hidden"
			 }
			, {
                label: "User_ID:",
                name: "User_ID",
				type: "hidden"
            },
			 {
               label: "Loginname:",
                name: "Loginname"
			 },
			{
               label: "E-Mail:",
                name: "EMAIL",
				type: "hidden"
			 },
			{
                label: "Korrigierte Datei:",
                name: "Datei",
                type: "upload",
                display: function ( file_id ) {
                    return  '<a href="'+editorsmPa.file( 'files', file_id ).web_path+'" target=”_blank”>"'+editorsmPa.file( 'files', file_id ).web_path+'"</a>';
                },
                clearText: "Clear",
                noImageText: 'keine Datei'
            },
			{
               label: "Bewertung:",
                name: "Bewertung"
			
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
 
	  
		
		$('.datatablessmPa').on( 'click', 'tbody td:not(:first-child)', function (e) {
       
							var colIdxKsmPa = tablesmPa
        .cell( this )
        .index().column;
		 var rowIdxKsmPa = tablesmPa
        .cell( this )
        .index().row;
		
		if (colIdxKsmPa == 1 )
			{
				
			
    tinymce.get('lernproduktTextkorrPa').setContent(table2Pa.cell(rowIdxKsmPa,2).data() );
				 tinymce.get('kommentPa').setContent(table2Pa.cell(rowIdxKsmPa,5).data() );
			document.getElementById("ID").value = table2Pa.cell(rowIdxKsmPa,0).data(); 
				document.getElementById("beschrTKPa").value = table2Pa.cell(rowIdxKsmPa,1).data(); 
				document.getElementById("bewPa").value = table2Pa.cell(rowIdxKsmPa,8).data(); 
	document.getElementById("myModalTPa").style.display = 'block'; 
	 window.onclick = function(event) {
        if (event.target == document.getElementById("myModalTPa")) {
						var result = confirm("Möchten Sie das Fenster wirklich schließen? Der geschriebene Text geht verloren!");
if (result) {
    //Logic to de
         document.getElementById("myModalTPa").style.display = "none";
}
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("spanTPa").onclick = function() {
		 			var result = confirm("Möchten Sie das Fenster wirklich schließen? Der geschriebene Text geht verloren!");
if (result) {
    //Logic to de
       document.getElementById("myModalTPa").style.display = "none";
}
	
    }
	 
	
	
	
	
	  
				

		
			}
    } );
  $.fn.dataTable.ext.errMode = 'throw';
     tablesmPa = $('.datatablessmPa').DataTable( {
		   "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        },
        dom: "lBfrtip",
        ajax:     { 
			url: "/Datatables/DataTablesEditor/AjaxScripts/getLPEditAll.php",
            type: 'POST',
            data: {
                  
				
				
			
			}
        }, 
        order: [[ 6, 'desc' ]],
		 autoWidth: false,
		 responsive:true,
        columns: [
         
			
		
			{ data: "Beschreibung"},
			{ data: "TEXT"},
			
			{data: "URL", "name": "URL","innerWidth": "10%",
        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
            if(oData.URL) {
                $(nTd).html("<a href="+oData.URL+" target=”_blank”>"+oData.URL+"</a>");
            }
        },
			
			},
 			
		
			{
                data: "Datei",
                render: function ( file_id ) {
                    return file_id ?
                        '<a href="'+editorsmPa.file( 'files', file_id ).web_path+'" target=”_blank”>"'+editorsmPa.file( 'files', file_id ).web_path+'"</a>' :
                        null;
                },
                defaultContent: "keine Datei",
                title: "Korrektur"
            },
				{ data: "Loginname" },
			{ data: "Bewertung"},
			{ data: "Datum"}
			
			
		
          
        ],
		 'columnDefs' : [
        //hide the second & fourth column
        { 'visible': false, 'targets': [6] }
    ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editorsmPa, text:"Neuer Eintrag" },
            { extend: "edit",   editor: editorsmPa, text:"Eintrag bearbeiten" },
            { extend: "remove", editor: editorsmPa, text:"Eintrag löschen" },
			    {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
               
        ]
    } );
  }
 
        
		
			


		function uploadTKPa(){


            
		 var fda= new FormData();
        var textPa = tinymce.get('lernproduktTextkorrPa').getContent();
	  var kommentPa =tinymce.get('kommentPa').getContent();
			var bewPa = document.getElementById("bewPa").value;
	  var ID = document.getElementById("ID").value;
	 
	   var beschrTKPa = document.getElementById("beschrTKPa").value;
	  
	  
	  
        fda.append('lpText',textPa);
	   fda.append('komment',kommentPa);
	  fda.append('ID',ID);
	  fda.append('bew',bewPa);
	   fda.append('beschr',beschrTKPa);


$.ajax({
            url: '/wp-content/plugins/Lernprodukte/upload.php',
            type: 'post',
            data: fda,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                   
                }else{
                    //alert('file not uploaded');
                }
            },
});
	  
	 myVarTKa = setTimeout(refreshTableTKmPa, 2000);
			 document.getElementById("myModalTPa").style.display = "none";
			
		}
		
		function refreshTableTKmPa(){
	
		
  
		
		
	
			if(window.innerWidth>800){
				 if ( table2Pa ) {
		table2Pa.destroy();
	}
	
	if ( editorPa ) {
		editorPa.destroy();
	}
				var searchValPa=table2Pa.search(this.value);
				  tableloadKPa();
				table2Pa.search(searchValPa).draw();
			}
			else{
					  if ( tablesmPa ) {
		tablesmPa.destroy();
	}
	
	if ( editorsmPa ) {
		editorsmPa.destroy();
	}
		
			var searchValsmPa=tablesmPa.search(this.value);
				
					  tableloadKsmPa();
				tablesmPa.search(searchValsmPa).draw();
			
			}	
			
			alert('Aktion ausgeführt. Bitte überprüfen Sie den Upload in der Tabelle!');
  }
		
	</script>
	
	<?
	global $current_user;

get_currentuserinfo();
	
	//echo $current_user->ID;
	?>
	
	 <input type="hidden" name="ID" id="ID">		
			
			



	
	<div id="myModalPa"  >

    <!-- Modal content -->
    
<br><br>



<br><br>

<h1>Lernprodukte</h1>
<div class="container" >
  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatablesPa"  >
        <thead>
          <tr>
           
            <th class="small-col" >ID</th>
			  <th class="big-col">Beschreibung</th>
            <th class="big-col">TEXT</th>
			<th class="norm-col">Datum</th>
	        <th class="norm-col">URL</th>
			 <th class="norm-col">Kommentar</th>
			<th class="norm-col">Korrektur</th>
		    <th  class="norm-col">Lernender</th>
			  <th  class="small-col">Bewertung</th>
			<!-- <th>Datei</th> -->
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

			
	</div>
  

		<div id="myModalsmPa" >

    <!-- Modal content -->
    
<br><br>



<br><br>

<h1>Lernprodukte</h1>
<div class="container" >
  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatablessmPa">
        <thead>
          <tr>
			  <th class="norm-colsm">Beschreibung</th>
            <th class="big-colsm">TEXT</th>
	        <th class="norm-colsm">URL</th>
			<th class="norm-colsm">Korrektur</th>
			  <th class="norm-colsm">Lernender</th>
			  <th class="small-col">Bew.</th>
			<!-- <th>Datei</th> -->
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>

			
	</div>
 

		<div id="myModalTPa" class="modal" >

    <!-- Modal content -->
    <div class="modal-content">
		<span class="close"  id="spanTPa">&times;</span>
		<h3>Hier können Sie Ihre Lernprodukte hochladen</h3>
		<form action="" method="post" enctype="multipart/form-data">
Beschreibung*:<br>
		<input name="beschrTKPa" id="beschrTKPa" type=text width=200px  required="required">
		<br><br>
		
		
		
    Hier der Text des Schülers:<br><br>
	
			
   <textarea id="lernproduktTextkorrPa"  height="400px"  ></textarea><br><br>
			Kommentar:<br>
			<textarea id="kommentPa"  height="100px"  ></textarea><br>
			<br><br>
			Bewertung:<br>
			<input id="bewPa"><br><br>
     <input type="button" value="Text hochladen" name="submit1Pa" onClick="uploadTKPa()">
			
</form>
<br><br>





		
	</div>
	</div>
	
	
</form>&nbsp;
<script>
if (window.innerWidth > 800)
		{

			
				document.getElementById("myModalPa").style.display = "block"; 
		
  
   
       document.getElementById("myModalsmPa").style.display = "none";
	
    }
		
		
			else{
				
				document.getElementById("myModalsmPa").style.display = "block"; 
	
         document.getElementById("myModalPa").style.display = "none";
			
        }
  
		
		 </script>
 
<style>
	
         
	 button {
     	background-color:#e91e63;
	border-radius:28px;
	border:0x solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	box-shadow: 3px 3px 3px grey;	 
}button:hover {
	background-color: #18ab29;
}
button:active {
	position:relative;
	top:1px;
		 
        }
        
	
	
	</style>
<style>
        body {}

	.big-col {
  width: 20% !important;
}
	.norm-col {
  width: 10% !important;
}
	
	.big-colsm {
  width: 10% !important;
}
	.norm-colsm {
  width: 8% !important;
}

		.small-col {
  width: 5% !important;
}
	.twidth {
  width: 80% !important;
}
table.datatablesPa{
  table-layout:fixed;
	
}
	
	table.datatablessmPa{
  table-layout:fixed;
	
}

.modal{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 70px; /* Location of the box */
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
            padding: 10px;
            border: 1px solid #888;
            max-width: 1200px;
			border-radius: 7px !important; 
			width: 98%; /* Full width */
			
           height:auto;
}
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