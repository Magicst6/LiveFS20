
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


    <script type='text/javascript'>
		
		
   var editor;
 var table;
	$(document).ready(function() {
		
	
	
	});
		
	function loadeditor(){	
		
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/pruefungenvaluesArchiv.php",
            type: 'POST',
            data: {
             
				'KID':  document.getElementById( "Kursname" ).value,
				'sem':  document.getElementById( "Semester" ).value
			
			}
        }, 
		
        table: ".datatables",
        fields: [
			
			{
			 label: "Pruefungsname:",
                name: "Pruefungsname"
                
		},		
			{
			 label: "KursID:",
                name: "KursID",
                def: document.getElementById( "Kursname" ).value
		}, {
                label: "Datum:",
                name: "Datum",
				 type: "date"
            },	 {
                label: "Start(Format: YYYY-MM-DD HH:mm:ss):",
                name: "Start",
				 
				
            }	
			, {
                label: "Ende(Format: YYYY-MM-DD HH:mm:ss):",
                name: "Ende",
				
                
            },	  {
			 label: "Klasse:",
                name: "Klasse",
               
              
		},			
				 { 
                label: "Lehrperson:",
                name: "Lehrperson"
            }, {
                label: "Lehrperson ID:",
                name: "LP_ID"
            }, {
                label: "Zimmer:",
                name: "Zimmer"
               
            }, {
                label: "Gewichtung:",
                name: "Gewichtung"
               
            }, {
                label: "Kommentar:",
                name: "Kommentar"
               
            }
				
        ]
    } );
		
		
		  // Activate an inline edit on click of a table cell
    $('.datatables').on( 'click', 'tbody td:not(:first-child)', function (e) {
       
    } );
		
 
	 
	}
	
		
	
function loadtable(){
		
			table = $( '.datatables' ).DataTable( {


			dom: "lBfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/pruefungenvaluesArchiv.php",
            type: 'POST',
            data: {
				'KID':  document.getElementById( "Kursname" ).value,
				'sem':  document.getElementById( "Semester" ).value
				
				
			
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
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' Noten Bearbeiten'


            },

	{
	
					data: 'Pruefungsname'
				
				},
					  {
					      data: 'KursID'
						 
				},
					  {
				
						  data: 'Datum'
						
				},
					 
					  {
		
						  data: 'Start'
						 
				},{
		
						  data: 'Ende'
						 
				},
					  {
					      data: 'Klasse'
						 
				},
					  {
				
						  data: 'Lehrperson'
						
				},
					 
					  {
		
						  data: 'LP_ID'
						 
				},
					  {
					      data: 'Zimmer'
						 
				},
					  {
				
						  data: 'Gewichtung'
						
				},
					 
					  {
		
						  data: 'Kommentar'
						 
				}
					 
			],
			select: true,
				order: [[ 4, "desc" ]],
        buttons: [
           
        ]

		} );
	
	
    $( '.datatables tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( neueNote( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );
	
}
 function neueNote( data ) {
			 document.getElementById("Pruefunglb1").value=data['Pruefungsname'];
				document.getElementById("Kurslb1").value = data['KursID']; 

			 document.getElementById("Datumlb1").value=data['Datum'];
			document.getElementById("Gewichtunglb1").value=data['Gewichtung'];
		
	 
	 	 if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("Noten").innerHTML = this.responseText;

                        }

                    };



                    xmlhttp.open("GET", "/Ajax_Scripts/showschuelernotenlisteArchiv.php?f=" + data['Klasse'] +  "&e=" + data['Gewichtung'] + "&g=" + data['KursID'] +"&h=" + data['Datum'] +"&i=" + data['Pruefungsname']  + "&k=" + data['Ende'] + "&n=" + data['Start'] + "&m=" + data['Zimmer'] +  "&o=" + data['Lehrperson'] +  "&sem=" + document.getElementById("Semester").value, true);

                    xmlhttp.send();
	document.getElementById("myModal2").style.display = "block"; 
	 
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal2")) {
 
			document.getElementById("myModal2").style.display = "none";
			 document.getElementById("Pruefunglb1").value = "";
	 document.getElementById("Kurslb1").value = "";
	 document.getElementById("Gewichtunglb1").value = "";
	 document.getElementById("Datumlb1").value = "";
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span2").onclick = function() {
       document.getElementById("myModal2").style.display = "none";
	document.getElementById("Pruefunglb1").value = "";
	 document.getElementById("Kurslb1").value = "";
	 document.getElementById("Gewichtunglb1").value = "";
	 document.getElementById("Datumlb1").value = "";
			
		 
		
    }
			
       
	 
	 
		
		}
		
			
	
	
function tableshow() {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	loadeditor();
	
	
	loadtable();



	editor . field( 'KursID' ) . def( document . getElementById( "Kursname" ) . value );
	editor . submit();

	
	


	
}

  
 function getKursnameAll(str){

        location.reload;

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

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameAllAll.php?s="+str,true);

            xmlhttp.send();

        }

    }

		function tableshow1(str) {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	loadeditor();
	
	
	loadtable();



	editor . field( 'KursID' ) . def( document . getElementById( "Kursname" ) . value );
	editor . submit();

	
	
    showtable(str);

	
}

		function showtable(str) {
	
	

		
		

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("tabpruefungen").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/showtable.php?k="+str+"&s="+ document.getElementById( "Semester" ).value ,true);

            xmlhttp.send();

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
<select id="Semester" name="Semester" onchange="getKursnameAll(this.value)">
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
    <select name="Kursname" onchange="tableshow1(this.value)"  id="Kursname" >
		


    </select>
<br><br>
   

        

	


	<html>
		
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
<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
     

Prüfungsname:     <input id="Pruefunglb1" readonly>                       
Kurs:        <input id="Kurslb1" readonly><br><br>
Datum:        <input id="Datumlb1" readonly><br><br>
Gewichtung:        <input id="Gewichtunglb1" readonly><br><br>

            
            <p>Bitte hier eine die Noten eintragen..</p>
		   
		   <div id="Noten"></div>
            
			
           

        <span class="close" onclick="reload.location()"  id="span2">&times;</span>


        
    </div>

</div>


<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
			<table class="table table-striped table-hover datatables" width=1500px>
				<thead>
					<tr>	
						<th></th>
						<th></th>
						<th>Pruefungsname</th>
	                    <th>KursID</th>
						<th>Datum</th>
						<th>Start</th>
						<th>Ende</th>
	                    <th>Klasse</th>
						<th>Lehrperson</th>
						<th>Lehrperson ID</th>
						<th>Zimmer</th>
	                    <th>Gewichtung</th>
						<th>Kommentar</th>
						
						
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<div id="tabpruefungen"></div>
		
	</body>
</html>
	

