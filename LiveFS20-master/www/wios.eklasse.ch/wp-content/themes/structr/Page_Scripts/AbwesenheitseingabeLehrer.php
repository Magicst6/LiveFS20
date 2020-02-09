<script>

    function getKursname(str){

        if (str == "") {

            document.getElementById("Kursnm").innerHTML = "";

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

                    document.getElementById("Kursnm").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+str,true);

            xmlhttp.send();

            test('');

        }

    }

    function test(str){

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

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+str+"&k="+document.getElementById("lehrer").value+"&h="+document.getElementById("date").value,true);

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

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+document.getElementById("Kursnm").value+"&k="+document.getElementById("lehrer").value+"&h="+str,true);

            xmlhttp.send();

        }

    }

</script>

<form action=" /DBFuellung/DBFuellungAbwEngbLehrer.php" method="POST">



    <?php

    include 'db.php';






    $heute=date("Y-m-d");



    if (($KursnameVar=='') and ($Klasse==''))  {$vr2=5;}

    else {$vr2=0;}

    if ($KursnameVar=='') {$vr3='4';}

    else  {$vr3=$KursnameVar; }

    ?>

<br><br>

    Lehrer:

    <br><br>

    <select name="lehrer" onchange="getKursname(this.value)"  id="lehrer" >



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

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        ?>

    </select>

    <br><br>

    Kursname:

    <br><br>

    <select name="Kursnm" id="Kursnm" onchange="test(this.value)" required="required" ></select>

    <br><br>

    Aktuelles Datum:

    <br><br>

    <input style="width: 145px;" name="date" id="date" type="date" value=<?php echo $heute;?>  onchange="testdate(this.value)"  required="required" />



    <br><br>

    <div id="lernende"><b>Abwesenheiten werden hier eingetragen...</b></div>







    <br><br>



    <input name="Senden" type="submit" value="Senden" />





</form>



</br>

</br>





</br></br>





</body>

</html>



