<form action="/DBFuellung/DBFuellungStundenplanLehrer.php" method="POST">
   
   
   
    &nbsp;<br><br>
    Lehrer:
    <br><br>
    <?php
   include 'db.php';
	

//echo $wochentage[$wochentag];
    ?>
    <script>
        function getLehrer(str){
            
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("stundenplan").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","/Ajax_Scripts/showstundenplanlehrererst.php?q="+document.getElementById("lehrer").value +"&k="+document.getElementById("semester").value+"&d="+document.getElementById("datum").value,true);
                xmlhttp.send();
            }
        
		
function check(str,tag,uhr){
		//alert();
		   if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       if (this.responseText.length>10)
						   {
						  alert(this.responseText);
						   }
					}
                };
                xmlhttp.open("GET","/Ajax_Scripts/checkStundenplanLehrer.php?q="+str +"&k="+uhr+"&d="+tag + "&l="+document.getElementById("lehrer").value,true);
                xmlhttp.send();
            
	
	
	
		
}
    </script>

  <select name="lehrer" id="lehrer" onchange="getLehrer(this.value)" required="required">
    <?php
	
	
				   echo "<option></option>";

      $isEntry2= "Select Nachname, Vorname,ID From sv_Lehrpersonen";

            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];

                $value = $line3['ID'];

				
				   echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

            }

     		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];
		  $semStart=$line1['Semesteranfang'];

    }

    

    ?>

</select>
    <br><br>
   Semester:
    <br>
    <input name="semester" id="semester" readonly  value="<? echo $semDB; ?>" required="required">
	
	 <br>
    Startdatum des Semesters:
	
    <br>    
      <input name="datum" id="datum" type="date"  value="<? echo $semStart; ?>"  onchange="getLehrer(this.value)">
    <br> 

    <div id="stundenplan"><b></b></div>
 <br><br>
    <p style="text-align: left;"><input name="Senden" type="submit" value="Senden" /></p>

</form>&nbsp;
