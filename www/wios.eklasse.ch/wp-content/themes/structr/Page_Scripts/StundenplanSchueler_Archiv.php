<?php
include 'db.php';
?>
Semester:<br>
<select id="Semester" name="Semester" onchange="myFunction()">
    <?php

    //Den aktuell eingeloggten Schüler anzeigen

    $isEntry= "Select Semesterkuerzel From sv_SemesterArchiv";
    $result = mysqli_query($con, $isEntry);
    echo "<option>". $_GET['Semester']. "</option>";

    while( $line3= mysqli_fetch_array($result))
    {
    $Semester = $line3['Semesterkuerzel'];
    echo "<option>" . $Semester . "</option>";

    }
 $Semester= $_GET['Semester'];
    ?>
</select>

<script type='text/javascript'>
    function myFunction(){
        var x = ""; var y = document.querySelector("#Semester").value; window.location.href = "/stundenplaenearchiv?&Semester="+y;
    }
</script>


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
            xmlhttp.open("GET","/Ajax_Scripts/showstundenplanschueler_Archiv.php?q="+document.getElementById('klasse').value+"&k=" + document.getElementById('Semester').value,true);
            xmlhttp.send();
        }
    }
</script>
<br>

Klasse:
<br>
<select name="klasse" id="klasse" onchange="getKlasse(this.value)" required="required">
    <?php
    $lernende= $Semester.'_Lernende';
    $isEntry= "Select Klasse From $lernende where Klasse like '%kv%'";
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



<div id="stundenplan"><b></b></div>

