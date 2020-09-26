<?php
include 'db.php';
  
		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }
?>
<script>
    function getKlasse(str){
        if (str == "") {
            document.getElementById("stundenplan").innerHTML = "";
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
                    document.getElementById("stundenplan").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET"," /Ajax_Scripts/showstundenplanlehrer.php?q="+document.getElementById('lehrer').value+"&k=" + document.getElementById('semester').value,true);
            xmlhttp.send();
        }
    }
</script>

<select name="lehrer" id="lehrer" onchange="getKlasse(this.value)" required="required">
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

     
    

    ?>

</select>
<br>
<br>
Semester:
<br>
<input name="semester" id="semester"   value="<?php echo $semDB;?>" readonly=readonly >
      

<div id="stundenplan"><b></b></div>

