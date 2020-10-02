<br><br>
<h3>Kurs löschen  (der Kurs wird komplett aus dem System entfernt)</h3>
Sollte der Kurs einem Lehrer zugeordnet sein, bitte dies manuell bei <a href="/ksdlpsc">Kurse der Lehrperson</a> ändern!<br><br>
Zu löschenden Kurs wählen:<br />

    <br>

    <select name="kurse" id="kurse"  required="required" >



        <?php

        include 'db.php';


        $isEntry= "Select KursID From sv_Kurse";

        $result1 = mysqli_query($con, $isEntry);

        $resultarr1 = array();

        echo "<option></option>";



        while( $line2= mysqli_fetch_assoc($result1))

        {

        $resultarr1[] = $line2['KursID'];

        }

        $uniquearr1 = array_unique($resultarr1);

        asort($uniquearr1);

        echo "<option>" . '' . "</option>";





        foreach ($uniquearr1 as $value)

        {

        if ($value == $_GET['KursID']){}

        else

        {

        echo "<option>" . $value . "</option>";

        }

        }

        ?>



    </select>

<button id="Loeschen" onclick="delKurs(document.getElementById('kurse').value)">Kurs löschen</button>
<div id="Kursstatus"></div>
<br>
<script>
 function delKurs(str){

       if (confirm("Möchten Sie den Kurs "+str+" wirklich löschen?")) {


	
        if (str == "") {

           

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

                    document.getElementById("Kursstatus").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/delKurs.php?q="+str,true);

            xmlhttp.send();

        }

    }
 }
	</script>