<?php
include 'db.php';
  
		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }
?>
<script>
    function stpl() {
//alert(document.getElementById('uid').value);
      
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
            xmlhttp.open("GET"," /Ajax_Scripts/showstundenplanlehrerind.php?q="+document.getElementById('uid').value+"&k=" + document.getElementById('semester').value,true);
            xmlhttp.send();
        }
    
</script>

<?
include 'db.php';


global $current_user;
 

get_currentuserinfo();
?>

<input type="hidden" id="uid" value="<? echo $current_user->ID;?>"
<br>
<br>
Semester:
<br>
<input name="semester" id="semester"   value="<?php echo $semDB;?>" readonly=readonly >
 <br><br>
<button onclick="stpl()">Mein Stundenplan</button>

<div id="stundenplan"><b></b></div>

