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

	$isEntry5 = "SELECT * From sv_LernenderKurs";
	
			
        $result5 = mysqli_query($con,$isEntry5);
 
      
        while( $value5= mysqli_fetch_array($result5)){
			
			$ID=$value5['SchuelerID'];
			
			$KursID=$value5['KursID'];
		 
			
          $isEntry2 = "SELECT * From sv_Noten Where SchuelerID='$ID' and KursID='$KursID'  order by Datum asc ";
          $isentall=$isEntry2;
          $result2 = mysqli_query($con,$isEntry2);

          // echo $isentall;
			
			$u=0;
			

          while( $value3= mysqli_fetch_array($result2))
           
			{
         
		  $Note=$value3['Note'];
			    $Gew=$value3['Gewichtung'];
			  
			  if ($Gew>0)
			  {
			  $Notengesamt=$Notengesamt+$Note*$Gew;
			  $Gewges=$Gewges+$Gew;
			  }
        
		 
		
			}
			
			
			$Schuelerschnitt=$Notengesamt/$Gewges;
			if ($Schuelerschnitt>0){
				//echo $Schuelerschnitt;
			  $sql_befehl = "Update sv_LernenderKurs SET Notenschnitt='$Schuelerschnitt' Where  KursID='$KursID' and SchuelerID='$ID'";
               
                    mysqli_query($con, $sql_befehl);
                 
			}
			
            $Notengesamt='';
           $Gewges='';
		   $Schuelerschnitt='-';
       
		
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
                label: "SchuelerID:",
                name: "SchuelerID",
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
            }, {
                label: "Notenschnitt:",
                name: "Notenschnitt",
			    type: "readonly"
            }
        ], i18n: {
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
			 { data: "SchuelerID" },
            { data: "Vorname" },
            { data: "Nachname" },
			{ data: "Klasse" },
			{ data: "KursID" },
			{ data: "Notenschnitt" }
            
          
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            
            { extend: "edit",   editor: editor, text:"Schüler bearbeiten" },
            { extend: "remove", editor: editor, text:"Schüler löschen" }
        ],"language": {
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
<br><br>

<h4>Schüler dem ausgewählten Kurs hinzufügen:</h4>

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
				<th>SchuelerID</th>
                <th>Vorname</th>
                <th>Nachname</th>
				<th>Klasse</th>
                <th>KursID</th>
				<th>Notenschnitt</th>
            </tr>
        </thead>
    </table>



<br><br>
