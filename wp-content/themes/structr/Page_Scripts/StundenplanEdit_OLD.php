<form action="/DBFuellung/DBFuellungStundenplan.php" method="POST">

    Hinweis: Nur die erste Unterrichtsstunde eines Tages muss mit Kursname, Startdatum und Farbe angegeben werden. Findet eine weitere Unterrichtsstunde im gleichen Kurs an diesem Tag statt, so muss nur der Kursname eingetragen werden. Das Startdatum und die Farbe werden für diesen Kurs an diesem Tag vom ersten Eintrag übernommen.

    &nbsp;<br><br>

    Bitte keine Leerzeichen oder mathematische Operatoren(+,-,...) in den Namen der Kurse verwenden

    &nbsp;<br><br>

    Klasse:

    <br><br>

    <?php

    include 'db.php';
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

                xmlhttp.open("GET","/Ajax_Scripts/showstundenplan.php?q="+str,true);

                xmlhttp.send();

            }

        }

    </script>



    <select name="klasse" id="klasse" onchange="getKlasse(this.value)" required="required">

        <?php

        $isEntry= "Select Klasse From sv_Lernende";

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

    Wählen Sie das Semester aus :

    <br>

    <select name="semester" id="semester"  required="required">

        <option>FS<?php echo date("y");?></option>

        <option>WS<?php echo date("y");?></option>

        <option>FS<?php echo date("y")-1;?></option>

        <option>WS<?php echo date("y")-1;?></option>

        <option>FS<?php echo date("y")+1;?></option>

        <option>WS<?php echo date("y")+1;?></option>

    </select>

    <br>



    <div id="stundenplan"><b></b></div>

 <br><br>

    <p style="text-align: left;"><input name="Senden" type="submit" value="Senden" /></p>



</form>&nbsp;

