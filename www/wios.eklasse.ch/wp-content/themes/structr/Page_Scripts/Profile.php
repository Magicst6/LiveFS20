<script type='text/javascript'>

    <!--

    $(document).ready( function () {

        $('#table_id').DataTable();

    } );



    //-->
	
	function del(str){

      var r = confirm("Soll der Eintrag wirklich gelöscht werden?");
       if (r == true) {
 


        
        

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

         
            xmlhttp.open("GET","/Ajax_Scripts/DelProfil.php?k="+document.getElementById("ID"+str).value,true);

           xmlhttp.timeout = 2000; // time in milliseconds

xmlhttp.onload = function () {
 window.location.href = "/profilmanagement";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();

        }

		
	
		
	}
	function updateProfil(y){
		
      var r = confirm("Soll der Eintrag  wirklich geändert werden?"   );
       if (r == true) {
 


        

      

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

           
		   
		  

            xmlhttp.open("GET","/Ajax_Scripts/UpdateProfil.php?k="+document.getElementById("Profil"+y).value + "&l="+document.getElementById("Beschreibung"+y).value + "&m="+document.getElementById("ID"+y).value,true);

            xmlhttp.timeout = 2000; // time in milliseconds

xmlhttp.onload = function () {
 window.location.href = "/profilmanagement";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();


        }

		
	}
	
	function create(){
		
      


        

      

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
		   
		  xmlhttp
            xmlhttp.open("GET","/Ajax_Scripts/createProfil.php?k="+document.getElementById("Profil").value + "&l="+document.getElementById("Beschreibung").value,true);

		xmlhttp.timeout = 2000; // time in milliseconds

xmlhttp.onload = function () {
 window.location.href = "/profilmanagement";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();


		
	 
		
	
	}
		
	


</script>



<?php
include 'db.php';

			      $isEntry = "SELECT * From sv_Profile Order by Profil";
			 
		
			$result = mysqli_query($con,$isEntry);

			echo '<table id="table_id" class="display" width="50%">';

			//Schreibe Spaltennamen

			echo "<thead>";

			echo "<tr>";

			echo "<th width=80>".'Profil'."</th>";

			echo "<th width=300>".'Beschreibung'. "</th>";
            
            echo "<th width=60>".''."</th>";

			echo "<th width=60>".''. "</th>";

			

			echo "</tr>";



			echo "</thead>";
 
            echo "<tbody>";

 $y=0;

			while( $value= mysqli_fetch_array($result))

			{
				$Profil=$value['Profil'];
				$ID=$value['ID'];
				
				$Beschreibung=$value['Beschreibung'];


				echo "<tr>";

				echo '<input name="ID'.$y.'"  id="ID'.$y.'" style="width: 80px" type="hidden"  value="'.$ID.'"  >';
		echo '<td><input name="Profil'.$y.'"  id="Profil'.$y.'" style="width: 80px" type="text"  value="'.$Profil.'"  ></td>';
        echo '<td><input name="Beschreibung'.$y.'"  id="Beschreibung'.$y.'" style="width: 300px" type="text"  value="'.$Beschreibung.'"  ></td>';
				echo '<td><input name="Delete'.$y.'" onclick="del('.$y.')" type="button" value="Löschen"   style="width: 120px" ></td>';
			
			echo '<td><input name="Update'.$y.'" onclick="updateProfil('.$y.')"  type="button" value="Update" style="width:120px" ></td>';


				echo "</tr>";
				
				 $y=$y+1;


			

			}


				echo "<tr>";

		echo '<td><input name="Profil"  id="Profil" style="width: 80px" type="text"  value=""  ></td>';
        echo '<td><input name="Beschreibung"  id="Beschreibung" style="width: 300px" type="text"  value=""  ></td>';
		echo '<td><input name="Anlegen" onclick="create()" type="button" value="Erstellen"   style="width:120px" ></td>';
			
			


				echo "</tr>";

            echo "</tbody>";

			echo "</table>";
				

?>

