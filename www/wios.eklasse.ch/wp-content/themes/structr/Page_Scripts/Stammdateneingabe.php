<script>

function showdata() {
			
				document.getElementById("myModal2").style.display = "block"; 
		
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal2")) {
 
		document.getElementById("myModal2").style.display = "none";
			
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span2").onclick = function() {
       document.getElementById("myModal2").style.display = "none";
		
		
    }
}



</script>

<script>
	function getKursname() {



		

		
			if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}

			xmlhttp.onreadystatechange = function () {

				if ( this.readyState == 4 && this.status == 200 ) {

					document.getElementById( "Kursname" ).innerHTML = this.responseText;

				}

			};

			xmlhttp.open( "GET", "/Ajax_Scripts/getKursnameAllAll.php?s="+ document.getElementById( "semester" ).value , true );

			xmlhttp.send();

		}

	





	function checkKurs( str ) {

		if ( str == "-Select-" ) {

			alert( 'Bitte einen Kurs auswählen' )

			return;

		}

	}


    function getSchueler(){





        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("schueler").innerHTML = this.responseText;

            }

        };

        xmlhttp.open("GET","/Ajax_Scripts/getSchueler.php?q="+ document.getElementById('Kursname').value + "&s="  +  document.getElementById('semester').value,true);

        xmlhttp.send();

    }
	
	  function showStammdaten(str){





        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("Stammdaten").innerHTML = this.responseText;

            }

        };

        xmlhttp.open("GET","/Ajax_Scripts/showStammdaten.php?q="+ str  + "&s="  +  document.getElementById('semester').value,true);

        xmlhttp.send();

    }
	
	

	function setStammdaten(){
		
	if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}

		
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("dbres").innerHTML = this.responseText;

            }

		};
			
			xmlhttp.open( "GET", "/Ajax_Scripts/updateStammdaten.php?Vorname=" + document.getElementById( "Vorname" ).value+"&Nachname="+ document.getElementById("Nachname").value +"&EMail=" +document.getElementById("EMail").value +"&Geburtstag="+ document.getElementById("Geburtstag").value +"&Nation=" +document.getElementById("Nation").value +"&Strasse="+document.getElementById("Strasse").value +"&HNummer="+document.getElementById("HNummer").value  + "&PLZ="+document.getElementById("PLZ").value+"&Ort="+document.getElementById("Ort").value+"&Tel="+document.getElementById("Tel").value+"&ElternTel="+document.getElementById("ElternTel").value +"&ElternMail="+document.getElementById("ElternMail").value +"&ID="+document.getElementById("ID").value +"&sem="+document.getElementById("sem").value, true );

			xmlhttp.send();
	
	
	
	}
	

</script>





<button id="showdata" onclick="showdata()">Stammdaten anzeigen und bearbeiten</button><br><br>

<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
 <h3>Stammdaten der Schüler</h3>
		<?php
error_reporting(E_ERROR | E_PARSE);
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

$heute = date( "Y-m-d" );



?>

<br>

Wählen Sie das Semester aus :
<br>
<select name="semester" id="semester" onchange="getKursname()" value="-Select-" required="required">
   <?php

    //Den aktuell eingeloggten Schüler anzeigen

    $isEntry= "Select Semesterkuerzel From sv_SemesterArchiv";
    $result = mysqli_query($con, $isEntry);
    echo "<option>-Select-</option>";

    while( $line3= mysqli_fetch_array($result))
    {
    $Semester = $line3['Semesterkuerzel'];
    echo "<option>" . $Semester . "</option>";

    }

    ?>
</select>

<br><br>




    Kursname:<br>
    <select name="Kursname" onchange="getSchueler()"  id="Kursname" >

       
    </select>


<br><br> Schüler:



 <?

					
              
					
					echo '<br><select name="schueler" id="schueler" onchange="showStammdaten(this.value)">';



        



       
 echo '</select>';




?>
		
		<div id="Stammdaten">
		
		</div>
		
		
		

        <span class="close"   id="span2">&times;</span>


        
    </div>

</div>


<style>
       

        .modal{
            display: none; /* Hidden by default */
            position: absolute; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 1700px; /* Full height */
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
            width: 930px;
			height: 1300px;
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

