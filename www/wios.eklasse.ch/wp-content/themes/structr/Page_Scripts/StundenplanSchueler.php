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
            xmlhttp.open("GET"," /Ajax_Scripts/showstundenplanschueler.php?q="+document.getElementById('klasse').value+"&k=" + document.getElementById('semester').value,true);
            xmlhttp.send();
        }
    }
</script>

<select name="klasse" id="klasse" onchange="getKlasse(this.value)" required="required">
    <?php
    $isEntry= "Select Klasse From sv_Lernende ";
    $result1 = mysqli_query($con,$isEntry);
    $resultarr1 = array();
    echo "<option>" . $_GET['klasse'] . "</option>";

    while( $line2= mysqli_fetch_assoc($result1))
    {
        $resultarr1[] = $line2['Klasse'];
    }
    $uniquearr1 = array_unique($resultarr1);
    asort($uniquearr1);


    foreach ($uniquearr1 as $value)
    {
        if ($value == $_GET['klasse']){}
        else
        {
            echo "<option>" . $value . "</option>";
        }
    }

    ?>

</select>
<br>
<br>
Semester:
<br>
<input name="semester" id="semester"   value="<?php echo $semDB;?>" readonly=readonly >
      

<div id="stundenplan"><b></b></div>

