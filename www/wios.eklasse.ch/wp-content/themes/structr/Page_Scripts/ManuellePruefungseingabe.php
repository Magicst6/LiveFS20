<script>
function getKursname(str){
	document.getElementById("Kursname").innerHTML="";
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
        xmlhttp.open("GET","/Ajax_Scripts/getKursname.php?q="+str,true);
        xmlhttp.send();
       
    }
}
function test(str){
    if (str == "" || str == "-Select-") {
        document.getElementById("lernende").innerHTML = "";
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
                document.getElementById("lernende").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/showlernende.php?q="+str+"&k="+document.getElementById("klasse").value+"&h="+document.getElementById("date").value,true);
        xmlhttp.send();
    }
}
function testdate(str){
if (str == "") {
        document.getElementById("lernende").innerHTML = "";
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
                document.getElementById("lernende").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/showlernende.php?q="+document.getElementById("Kursnm").value+"&k="+document.getElementById("klasse").value+"&h="+str,true);
        xmlhttp.send();
    }
}
	function AlertKursID(){
		
    if  (document.getElementById("Kursname").value == "-Select-" || document.getElementById("Kursname").value == "" ) {
		alert('KursID nicht gewählt');


	}
		
	}
    
</script>
<em>Hier können Prüfungen manuell erstellt werden... </em>







<form action="/DBFuellung/DBFuellungPruefungen.php" method="post">

    <br><br>

    
	
	   <label for="Title">Prüfungsname:</label>

            <br>

            <input type="text" name="title" id="title" value="" width="400px"  required="required"">

            <br>

         

    <br>

    Klasse:

    <br>

    <select name="Klasse"  id="Klasse" onchange="getKursname(this.value)"  required="required" >



        <?php

        include 'db.php';



        $isEntry= "Select Klasse From sv_Lernende";

        $result1 = mysqli_query($con, $isEntry);

        $resultarr1 = array();



        while( $line2= mysqli_fetch_assoc($result1))

        {

        $resultarr1[] = $line2['Klasse'];

        }

        $uniquearr1 = array_unique($resultarr1);

        asort($uniquearr1);

        echo "<option>" .'' . "</option>";





        foreach ($uniquearr1 as $value)

        {

        echo "<option>" . $value . "</option>";



        }

        ?>



    </select>

    


             


    <br />

    KursID:

    <br>

	<select name="Kursname" id="Kursname"  required="required"></select> <br />

    <br>
   
   
    
   
   

    <br>

    Startzeit:

    <br>

    <input name="Startzeit" type="time"  required="required" /><br />

    <br>

    Endzeit:

    <br>

    <input name="Endzeit" type="time"  required="required" /><br />

    <br>

    Datum:

    <br>

    <input name="Datum" type="Date"  required="required" /><br />

    <br>

    <br>

   <label for="gewicht">Gewichtung:</label>

             <br>

             <input type="text" name="gewicht" id="gewicht" value="" class="text ui-widget-content ui-corner-all"  onclick="AlertKursID()" required="required" >

             <br>

             <br>

    Zimmer:

    <br>

    <input name="Zimmer" type="text"  /><br />

    <br>

  

    Lehrperson:
    <br>

    <select name="Lehrperson" onchange="AlertKursID()"  required="required" id="lehrer" >



        <?php



        $isEntry= "Select ID From sv_Lehrpersonen ";

        $result = mysqli_query($con, $isEntry);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





        echo "<option>".'--Select--'. "</option>";



        foreach ($uniquearr as $value) {

            $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>". $Name ."</option>";

        }

        ?>

    </select>
  <br>
    <br>
	  <label for="lpid">ID der Lehrperson:</label>

             <br>

             <input type="text" name="lpid" id="lpid" value="" class="text ui-widget-content ui-corner-all"  required="required" >

             <br>

             <br>


    <br>
    <br>
  


    <input name="Senden" type="submit" value="Senden"  />
	
													 <br><br>
	


</form>





</body>



</html>

