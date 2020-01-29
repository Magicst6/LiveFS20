<script>

    function getKursname(str){

        location.reload;

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

    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

</script>

<?php

include 'db.php';



global $current_user;

get_currentuserinfo();



/* echo 'Username: ' . $current_user-&gt;user_login . "\n";

echo 'User email: ' . $current_user-&gt;user_email . "\n";

echo 'User level: ' . $current_user-&gt;user_level . "\n";

echo 'User first name: ' . $current_user-&gt;user_firstname . "\n";

echo 'User last name: ' . $current_user-&gt;user_lastname . "\n";

echo 'User display name: ' . $current_user-&gt;display_name . "\n";

echo 'User ID: ' . $current_user-&gt;ID . "\n";



*/

$heute=date("Y-m-d");



?>

<br><br>

Lehrperson:

<br>

<?php



$isEntry= "Select ID From sv_Lehrpersonen where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_assoc($result))

{

    $value=$line2['ID'];



    $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Nachname'];

        $Vorname = $line3['Vorname'];



    }







    echo '<form action=" /DBFuellung/DBFuellungKlbu.php" method="POST">';



    echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>

<br><br>

<select id="Kursnm" name="Kursnm" required="required"  onchange="test(this.value)">

    <?php

    include 'db.php';

    

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);





    echo "<option>" . '-Select-' . "</option>";



    while( $line2= mysqli_fetch_array($result))

    {

        for($x = 1; $x <= 30; $x++)

        {



            $value = $line2['Kurs'.$x];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    }

    ?>



</select>

<br><br>

Aktuelles Datum:

<br><br>

<input style="width: 145px;" name="date" id="date" type="date" value="<?php echo $heute;?>"  onchange="testdate(this.value)"  required="required" />

<br><br>

<div id="lernende"><b>Abwesenheiten werden hier eingetragen...</b></div>

<br><br>

<input name="Senden" type="submit" value="Senden" onclick="checkKurs(Kursnm.value)" />



</form>&nbsp;



