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

<?php
include 'db.php';
    //Den aktuell eingeloggten Schüler anzeigen

    $isEntry= "Select Semesterkuerzel From sv_Settings";
    $result = mysqli_query($con, $isEntry);
  

    while( $line3= mysqli_fetch_array($result))
    {
    $Semester = $line3['Semesterkuerzel'];
    

    }

	
	
	
    ?>
<script>
var editor; // use a global for the submit and return data rendering in the examples
 var table;
		
		$(document).ready(function() {
			loadeditor();
			
			
        var str= '<?		echo $Semester;?>';

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

    

	

        if (str == "") {

            document.getElementById("lehrer").innerHTML = "";

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

                    document.getElementById("lehrer").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getLehrer.php?s="+str,true);

            xmlhttp.send();

        }

    

			
		});
			

	
	function loadeditor(){
    editor = new $.fn.dataTable.Editor( {
		 ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getLernenderKursView.php",
            type: 'POST',
            data: {
                  'KursID': document . getElementById( "Kursname" ) . value
				 
			}
        }, 
        table: "#dtbl",
        fields: [ {
                label: "SchülerID:",
                name: "SchülerID",
			    type: "readonly"
            },			
			{
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
            }
        ]
    } );
	
    // Activate an inline edit on click of a table cell
    $('#dtbl').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
		
	
 
   table= $('#dtbl').DataTable( {
        dom: "lBfrtip",
        ajax:{
            url:  "/wp-content/themes/structr/Page_Scripts/getLernenderKursView.php",
            type: 'POST',
            data: {
                  'KursID': document . getElementById( "Kursname" ) . value
				
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
			 { data: "SchülerID" },
            { data: "Vorname" },
            { data: "Nachname" },
			{ data: "Klasse" },
			{ data: "KursID" }
            
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            
            { extend: "edit",   editor: editor, text:"Schüler bearbeiten" },
            { extend: "remove", editor: editor, text:"Schüler löschen" }
        ]
    } );
		
	  
		
	
} 


	
	function tableshow() {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	
	
	
	
	loadeditor();


	
		
	
	//editor . field( 'KursID' ) . def( document . getElementById( "Kursname" ) . value );
	editor . submit();

	

	
}
	


	

    function getKursname(str){

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

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+str + "&s=" + document.getElementById( "Semester" ).value,true);

            xmlhttp.send();

        }

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

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameAll.php?s="+str,true);

            xmlhttp.send();

        }

    }

	 function getLehrer(str){

        location.reload;

        if (str == "") {

            document.getElementById("lehrer").innerHTML = "";

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

                    document.getElementById("lehrer").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getLehrer.php?s="+str,true);

            xmlhttp.send();

        }

    }




	function checkKurs( str ) {

		if ( str == "-Select-" ) {

			alert( 'Bitte einen Kurs auswählen' )

			return;

		}

	}
	
	function test(){
		
		alert();
	}
	
	 function addSchueler(){

     
            
        

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                  

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/addLKSchueler.php?k="+document.getElementById("schueler").value+"&l="+document.getElementById("Kursname").value,true);

            xmlhttp.send();

		   
		 setTimeout(tableshow,1000);
	
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
 


Semester:<br>
<input id="Semester" name="Semester" value="<? echo $Semester;?>" readonly="readonly"> 
   


<br><br>

Lehrperson:

<br>
 <select name="lehrer" onchange="getKursname(this.value)"  id="lehrer" >



     
    </select>

<br><br>
 
Kursname:
<br>

<select id="Kursname" name="Kursname" required="required"  onchange="tableshow()">  
</select>

<br><br>

Schüler dem ausgewählten Kurs hinzufügen:
<br>
 <?

					
              
					
					echo '<br><select name="schueler" id="schueler" >';



        



        $isEntry= "Select ID From sv_LernendeModule order by Name asc ";

        $result = mysqli_query($con, $isEntry);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





        echo "<option>".'--Select--'. "</option>";



        foreach ($uniquearr as $value) {

            $isEntry= "Select * From sv_LernendeModule WHERE ID='$value' order by Name asc";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];
				
				$Profil= $line3['Profil'];
				
				
				
				$EMail=$line3['EMail'];



            }

            echo "<option>". $Vorname .' '. $Name.' ID:'. $value ."</option>";

        }

        

 echo '</select>';

?>
	
<br><br>
 <input type="button" name="add" id="add" value="Schüler hinzufügen" onclick="addSchueler()"><br><br>
<br><br>

<style>
	 button {
          color: white;
        }
	</style>


<h3>Lernende im Kurs</h3>

<table id="dtbl" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
				<th>SchülerID</th>
                <th>Vorname</th>
                <th>Nachname</th>
				<th>Klasse</th>
                <th>KursID</th>
            </tr>
        </thead>
    </table>



<br><br>
