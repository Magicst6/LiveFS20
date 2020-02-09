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
        xmlhttp.open("GET","/Ajax_Scripts/getKursname.php?q="+str,true);
        xmlhttp.send();
        test('');
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
</script>
<form action=" /DBFuellung/DBFuellungAbwEngb.php" method="POST">

<?php
include 'db.php';



$heute=date("Y-m-d");

if (($KursnameVar=='') and ($Klasse==''))  {$vr2=5;}
else {$vr2=0;}
if ($KursnameVar=='') {$vr3='4';}
else  {$vr3=$KursnameVar; }
?>
<br>
Klasse:
<br>
<select name="klasse" onchange="getKursname(klasse.value)" id="klasse" required="required">

<?php


$isEntry= "Select Klasse From sv_Lernende";
$result1 = mysqli_query($con, $isEntry);
$resultarr1 = array();


while( $line2= mysqli_fetch_assoc($result1))
{
  $resultarr1[] = $line2['Klasse'];
}
$uniquearr1 = array_unique($resultarr1);
asort($uniquearr1);
echo "<option>" . '-Select-' . "</option>";


foreach ($uniquearr1 as $value)
{
echo "<option>" . $value . "</option>";

}


?>

</select>
<br>
Kursname:
<br>
<select name="Kursnm" id="Kursnm" onchange="test(this.value)" required="required" ></select>
<br>
Aktuelles Datum:
<br>
<input style="width: 145px;" name="date" id="date" type="date" value=<?php echo $heute;?>  onchange="testdate(this.value)"  required="required" />


<div id="lernende"><b>Person info will be listed here...</b></div>





<input name="Senden" type="submit" value="Senden" />


</form>

</br>
</br>


</br></br>



</body>
</html>

