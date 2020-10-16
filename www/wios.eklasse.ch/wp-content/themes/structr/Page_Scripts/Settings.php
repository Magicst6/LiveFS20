<script>

function empty11(){
	
	document.getElementById('f11').value=null;
}
function empty12(){
	
	document.getElementById('f12').value=null;
}
	function empty21(){
	
	document.getElementById('f21').value=null;
}
	function empty22(){
	
	document.getElementById('f22').value=null;
}
	function empty31(){
	
	document.getElementById('f31').value=null;
}
	function empty32(){
	
	document.getElementById('f32').value=null;
}
		function empty41(){
	
	document.getElementById('f41').value=null;
}
	function empty42(){
	
	document.getElementById('f42').value=null;
}
	function empty51(){
	
	document.getElementById('f51').value=null;
}
	function empty52(){
	
	document.getElementById('f52').value=null;
}	
	
	function subm(form) {
	
if (confirm("Möchten Sie die Einstellungen wirklich übernehmen?")) {
form.submit();
}
	}
	
</script>
<?php

include 'db.php';
$isEntry = "SELECT Semesterkuerzel, Semesteranfang, Semesterende, Ferien1von, Ferien1bis, Ferien2von, Ferien2bis, Ferien3von, Ferien3bis, Ferien4von, Ferien4bis,Ferien5von, Ferien5bis, Klassenbuch From sv_Settings";

$result = mysqli_query($con, $isEntry);





while( $value= mysqli_fetch_array($result)) {


    $Semesterkuerzel = $value['Semesterkuerzel'];

    $Semesteranfang = $value['Semesteranfang'];

    $Semesterende = $value['Semesterende'];

    $Ferien1von = $value['Ferien1von'];

    $Ferien1bis = $value['Ferien1bis'];

    $Ferien2von = $value['Ferien2von'];

    $Ferien2bis = $value['Ferien2bis'];

    $Ferien3von = $value['Ferien3von'];

    $Ferien3bis = $value['Ferien3bis'];

    $Ferien4von = $value['Ferien4von'];

    $Ferien4bis = $value['Ferien4bis'];

    $Ferien5von = $value['Ferien5von'];

    $Ferien5bis = $value['Ferien5bis'];
	
	$Klassenbuch = $value['Klassenbuch'];



}

?>

<body>

<form action="/DBFuellung/DBFuellungSettings.php" id="Settings"  method="POST">
    <br>
    Bitte hier die entsprechenden Daten eintragen oder modifizieren. Diese Daten sind erforderlich und müssen am Anfang des Semesters eingetragen werden.
    <br>
    <br><br>
    <br />
    <strong>Semesterkürzel</strong> (bitte für das Frühjahrssemester des aktuellen Jahres(hier
    2019) das Kürzel <strong>FS19</strong> und für das Herbstsemester 2019 das
    Kürzel <strong>WS19</strong> eintragen):<br />
    <br />

    <select name="Semesterkuerzel" id="Semesterkuerzel"  value="<?php echo $Semesterkuerzel;?>" required="required">
        <option><?php echo $Semesterkuerzel;?></option>
		<option>FS<?php echo date("y")-1;?></option>
		<option>WS<?php echo date("y")-1;?></option>
		<option>FS<?php echo date("y");?></option>
        <option>WS<?php echo date("y");?></option>
        <option>FS<?php echo date("y")+1;?></option>
        <option>WS<?php echo date("y")+1;?></option>
        <option>FS<?php echo date("y")+2;?></option>
        <option>WS<?php echo date("y")+2;?></option>
    </select>
    <br>
    <br />
    <strong>Semesteranfang:</strong>
    <input name="Semesteranfang" type="date" value="<?php echo $Semesteranfang ?>" />
    <br>
    <br>
        <strong>Semesterende:</strong>
    <input name="Semesterende" type="date" value="<?php echo $Semesterende ?>" />
    <br>
    <br><strong>Ferien 1:</strong><br />

    von:
    <input name="Ferien1von" id="f11" type="date" onclick="empty11()" value="<?php echo $Ferien1von ?>" />
    bis:
    <input name="Ferien1bis" id="f12" type="date" onclick="empty12()" value="<?php echo $Ferien1bis ?>" />
    <br>
    <br><strong>Ferien 2:</strong><br />

    von:
    <input name="Ferien2von" id="f21" type="date" onclick="empty21()"  value="<?php echo $Ferien2von ?>"/>
    bis:
    <input name="Ferien2bis" id="f22" type="date" onclick="empty22()" value="<?php echo $Ferien2bis ?>" />
    <br>
    <br><strong>Ferien 3:</strong><br />

    von:
    <input name="Ferien3von" id="f31"type="date" onclick="empty31()" value="<?php echo $Ferien3von ?>" />
    bis:
    <input name="Ferien3bis" id="f32" type="date" onclick="empty32()" value="<?php echo $Ferien3bis ?>" />
    <br>
    <br><strong>Ferien 4:</strong><br />

    von:
    <input name="Ferien4von"  id="f41" type="date" onclick="empty41()" value="<?php echo $Ferien4von ?>" />
    bis:
    <input name="Ferien4bis" id="f42" type="date" onclick="empty42()" value="<?php echo $Ferien4bis ?>" />
    <br>
    <br><strong>Ferien 5:</strong><br />

    von:
    <input name="Ferien5von"  id="f51" type="date" onclick="empty51()" value="<?php echo $Ferien5von ?>" />
    bis:
    <input name="Ferien5bis" id="f52" type="date" onclick="empty52()" value="<?php echo $Ferien5bis ?>" />
    <br><br>
	
	_______________________________________________
	<h4>Klassenbucheinstellungen</h4>
	<? if ($Klassenbuch=="true")
{
	echo '<input type="checkbox" id="Klassenbuch" name="Klassenbuch"  value="true" checked>';
} else{
	echo '<input type="checkbox" id="Klassenbuch" name="Klassenbuch"  value="true" >';
}
	
	?>
	
	 <label for="Klassenbuch"> Das Klassenbuch mit den Kursterminen verknüpfen</label><br>
    <br><br>
    <input name="Senden" type="button" onClick="subm(this.form);" value="Einstellungen übernehmen"   /></form>

     

	
	
</body>


<script>

	 function test() {
       alert();  
		
		 
	 }
	
function dbbackup(){

       
     
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/dbbackup.php,true);
        xmlhttp.send();
       
    
}
	
	
</script>

</html>
