<em>Hier können Kurse oder Kurstermine erstellt werden, die nicht im Stundenplan der Klasse erscheinen. </em>

<script>
	
	  $(document).ready(function() {
		

	  });
function getKursname(str){

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kursid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/getKursname.php?q="+str,true);
        xmlhttp.send();
       
     getcolor();
}
	
	
	function getlehrperson(str1){
if (str1 == "-Select-" || str1=="") {
	
	document.getElementById("Kursname").disabled = false;
		document.getElementById("Kuerzel").disabled = false;
		document.getElementById("semester").disabled= false;
	

}
	else{
				
       
		document.getElementById("Kursname").disabled = true;
		document.getElementById("Kuerzel").disabled = true;
	
		document.getElementById("semester").disabled= true;
		
	
        
    } 
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
        xmlhttp.open("GET","/Ajax_Scripts/getLehrerAK.php?q="+str1,true);
        xmlhttp.send();
       
		getcolor(str1);
   
		
}
	function getcolor(str1){
	 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("farbediv").innerHTML = this.responseText ;
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/getcolorAK.php?q="+str1,true);
        xmlhttp.send();
		
	}
</script>



<form action="/DBFuellung/DBFuellungKurse.php" method="post">

    <br><br>

    <h3>Kurs anlegen</h3>

    <br>

    <b>Klasse:</b>

    <br>

    <select name="Klasse"  id="Klasse" onchange="getKursname(this.value)" required="required"  >



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

<?php
include 'db.php';
  
		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }
?>

    <br />
	
    <b>Kurs: </b><br> <i>(entweder im Dropdown wählen oder im das Kürzel für einen neuen Kurs angeben):</i>
	<br>
	Existierender Kurs:<br>
	<select id="kursid" name="kursid" onChange="getlehrperson(this.value)" value=""></select>

    <br><hr />
	<label id="knlabel">Neuer Kurs:<br>
	 ->Kursname:<br></label>

    <input id="Kursname" name="Kursname" type="text" /><br />

    <br>

    <label id="kklabel"> ->Kurskürzel:

		<br></label>

    <input  id="Kuerzel" name="Kuerzel"  type="text" /><br />

	<hr />
    <br>

    Tag:

    <br>

    <select name="Tag">

        <option>Montag</option>

        <option>Dienstag</option>

        <option>Mittwoch</option>

        <option>Donnerstag</option>

        <option>Freitag</option>

        <option>Samstag</option>



    </select>

    <br>

    Startzeit:

    <br>

    <input name="Startzeit" type="time" /><br />

    <br>

    Endzeit:

    <br>

    <input name="Endzeit" type="time" /><br />

    <br>

    Datum:

    <br>

    <input name="Datum" type="Date" /><br />

    <br>

    <br>

	<label id="semlabel"> Wählen Sie das Semester aus :</label>

    <br>

   <select name="semester" id="semester" onchange="getKlasse()"  value="<?php echo $semDB;?>" required="required">
      <option><?php echo $semDB;?></option>
	<option>FS<?php echo date("y");?></option>
    <option>WS<?php echo date("y");?></option>
    <option>FS<?php echo date("y")-1;?></option>
    <option>WS<?php echo date("y")-1;?></option>
    <option>FS<?php echo date("y")+1;?></option>
    <option>WS<?php echo date("y")+1;?></option>
</select>

    <br>

    Lektionen:

    <br>

    <input name="Lektionen" type="text"  /><br />

    <br>

    Zimmer:

    <br>

    <input name="Zimmer" type="text" /><br />

    <br>

    Zimmer ID:

    <br>

    <input name="ZI_ID" type="text" /><br />

    <br>
	
    Lehrperson:
<br>

     <select name="lehrer" id="lehrer"> 
		 <?
	  $isEntry= "Select ID,Nachname, Vorname From sv_Lehrpersonen ";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

				$ID=$line3['ID'];
				
                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];

  echo "<option>". $Name ." ".$Vorname.":".$ID."</option>";

            }

          

	?>
	</select>
<br>
	
	
    Profil:
<br>

    <select name="Profil" id="Profil"  type="text" style="width: 120px"  >
			<?
			  $isEntry= "Select Profil From sv_Profile";

    $result1 = mysqli_query($con,$isEntry);





    echo "<option>$Profil</option>";
				
	echo "<option></option>";



    while( $line3= mysqli_fetch_array($result1))
	{

    


            $value = $line3['Profil'];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    

			?>
			
			</select>

<br>
  
	Farbe <label id="lblcol">(Farbe wird von existierendem Kurs übernommen,falls ausgewählt)</label>:

    <br>

   <div id="farbediv"></div>
<br><br>
    <input name="Senden" type="submit" value="Senden" />

</form>





</body>



</html>

