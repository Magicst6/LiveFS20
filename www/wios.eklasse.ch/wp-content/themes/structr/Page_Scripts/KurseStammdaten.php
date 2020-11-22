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

         
            xmlhttp.open("GET","/Ajax_Scripts/DelKursST.php?k="+document.getElementById("ID"+str).value,true);

           xmlhttp.timeout = 2000; // time in milliseconds

xmlhttp.onload = function () {
 window.location.href = "/kurse-stammdaten";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();

        }

		
	
		
	}
	function updateKursST(y){
	var str=	document.getElementById("farbe"+y).value;
		var farbe=str.slice(1);
      var r = confirm("Soll der Eintrag  wirklich geändert werden?"   );
       if (r == true) {
 


        

      

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            } xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("farbediv").innerHTML = this.responseText;
            }
        };

           
		   
		  

            xmlhttp.open("GET","/Ajax_Scripts/UpdateKursST.php?k="+document.getElementById("Kursname"+y).value + "&l="+document.getElementById("KursKuerzel"+y).value + "&m="+document.getElementById("ID"+y).value+ "&f="+farbe + "&z="+document.getElementById("Zimmer"+y).value+ "&lp="+document.getElementById("Lehrer"+y).value + "&p="+document.getElementById("Profil"+y).value,true);

            xmlhttp.timeout = 4000; // time in milliseconds

xmlhttp.onload = function () {
window.location.href = "/kurse-stammdaten";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();


        }

		
	}
	
	function create(){
		
      

var str=	document.getElementById("farbe").value;
		var farbe=str.slice(1);
        

      

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                     document.getElementById("farbediv").innerHTML = this.responseText;

                }

            };
		   
		  xmlhttp
            xmlhttp.open("GET","/Ajax_Scripts/createKursST.php?k="+document.getElementById("Kursname").value + "&l="+document.getElementById("KursKuerzel").value +  "&f="+farbe + "&z="+document.getElementById("Zimmer").value+ "&lp="+document.getElementById("Lehrer").value + "&p="+document.getElementById("Profil").value,true);

		xmlhttp.timeout = 4000; // time in milliseconds

xmlhttp.onload = function () {
 window.location.href = "/kurse-stammdaten";
};

xmlhttp.ontimeout = function (e) {
  // XMLHttpRequest timed out. Do something here.
};


		
            xmlhttp.send();


		
	 
		
	
	}
		
	


</script>
Bitte keine Sonderzeichen(+ , * , . ,...) im Kurskürzel verwenden!! <br>

<div id="farbediv"></div>

<?php
include 'db.php';

			      $isEntry = "SELECT * From sv_KurseStammdaten Order by Kursname";
			 
		
			$result = mysqli_query($con,$isEntry);

			echo '<table id="table_id" class="display" width="50%">';

			//Schreibe Spaltennamen

			echo "<thead>";

			echo "<tr>";

			echo "<th width=80>".'KursKürzel'."</th>";

			echo "<th width=100>".'Kursname'. "</th>";

            echo "<th width=40>".'Farbe'."</th>";

			echo "<th width=100>".'Lehrer'. "</th>";

            echo "<th width=40>".'Profil'. "</th>";

	       echo "<th width=100>".'Zimmer'. "</th>";
            
            echo "<th width=60>".''."</th>";

			echo "<th width=60>".''. "</th>";

			

			echo "</tr>";



			echo "</thead>";
 
            echo "<tbody>";

 $y=0;

			while( $value= mysqli_fetch_array($result))

			{
				$KursKuerzel=$value['KursKuerzel'];
				$ID=$value['ID'];
				
				$Kursname=$value['Kursname'];
                $FarbeDB=$value['Farbe'];
				$Lehrer=$value['Lehrer'];
				$Farbe='#'.$FarbeDB;
				$Zimmer=$value['Zimmer'];
				$Profil=$value['Profil'];



				echo "<tr>";

				echo '<input name="ID'.$y.'"  id="ID'.$y.'" style="width: 80px" type="hidden"  value="'.$ID.'"  >';
		echo '<td><input name="KursKuerzel'.$y.'"  id="KursKuerzel'.$y.'" style="width: 80px" type="text"  value="'.$KursKuerzel.'"  ></td>';
        echo '<td><input name="Kursname'.$y.'"  id="Kursname'.$y.'" style="width: 200px" type="text"  value="'.$Kursname.'"  ></td>';
				echo '<td><input name="Farbe'.$y.'"  id="farbe'.$y.'" style="width: 40px" type="color"  value="'.$Farbe.'"  ></td>';
        echo '<td><select name="Lehrer'.$y.'"  id="Lehrer'.$y.'" style="width: 100px" type="text"  value="'.$Lehrer.'"  >';
				

        $isEntry1= "Select ID From sv_Lehrpersonen ";

        $result1 = mysqli_query($con, $isEntry1);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result1))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





        echo "<option>".$Lehrer."</option>";



        foreach ($uniquearr as $value) {

            $isEntry3= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

            $result3 = mysqli_query($con, $isEntry3);

            while( $line3= mysqli_fetch_array($result3))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        

   echo ' </select>
				
				</td>';
				echo '<td><select name="Profil' . $y . '"  id="Profil' . $y . '"  type="text" style="width: 60px" value="' . $Profil . '"  >';
			
			  $isEntry= "Select Profil From sv_Profile";

    $result1 = mysqli_query($con,$isEntry);


echo "<option>$Profil</option>";


    echo "<option></option>";



    while( $line3= mysqli_fetch_array($result1))
	{

    


            $value = $line3['Profil'];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    

			
			
		echo '	</select></td>';
				  echo '<td><input name="Zimmer'.$y.'"  id="Zimmer'.$y.'" style="width: 80px" type="text"  value="'.$Zimmer.'"  ></td>';
				echo '<td><input name="Delete'.$y.'" onclick="del('.$y.')" type="button" value="Löschen"   style="width: 120px" ></td>';
			
			echo '<td><input name="Update'.$y.'" onclick="updateKursST('.$y.')"  type="button" value="Update" style="width:120px" ></td>';


				echo "</tr>";
				
				 $y=$y+1;


			

			}


				echo "<tr>";

		echo '<td><input name="KursKuerzel"  id="KursKuerzel" style="width: 80px" type="text"  value=""  ></td>';
        echo '<td><input name="Kursname"  id="Kursname" style="width: 200px" type="text"  value=""  ></td>';
echo '<td><input name="Farbe"  id="farbe" style="width: 40px" type="color"  value=""  ></td>';
        echo '<td><select name="Lehrer"  id="Lehrer" style="width: 100px" type="text"  value=""  >
		  ';



        $isEntry4= "Select ID From sv_Lehrpersonen ";

        $result4 = mysqli_query($con, $isEntry4);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result4))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





        echo "<option>".'--Select--'. "</option>";



        foreach ($uniquearr as $value) {

            $isEntry2= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        

   echo ' </select></td>';
echo '<td><select name="Profil" id="Profil"  type="text" style="width: 60px" value=""  >';
			
			  $isEntry= "Select Profil From sv_Profile";

    $result1 = mysqli_query($con,$isEntry);





    echo "<option></option>";



    while( $line3= mysqli_fetch_array($result1))
	{

    


            $value = $line3['Profil'];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    

			
			
		echo '	</select></td>';
echo '<td><input name="Zimmer"  id="Zimmer" style="width: 80px" type="text"  value=""  ></td>';
		echo '<td><input name="Anlegen" onclick="create()" type="button" value="Erstellen"   style="width:120px" ></td>';
			
			


				echo "</tr>";

            echo "</tbody>";

			echo "</table>";
				

?>

