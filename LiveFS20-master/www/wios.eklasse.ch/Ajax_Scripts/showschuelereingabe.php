<form action="http://schulverwaltungheimtest.ch/datenbankbefuellung-schuelereingabe "method="POST">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
  type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type='text/javascript'>
<!--
$(document).ready( function () {
    $('#table_id').DataTable();
} );

//-->
</script>


<?php
echo 'dfkjhkdfghfdkjdhgkfjhdfk';
     $wp='[wpdatata]';
    //$Klassenname = strtolower($_POST['klasse']);
   $Klassenname = $q = $_GET['q'];
    //$AnzahlSch = $_POST['AnzahlSch'];
    //$AnzahlSch1 = $_POST['AnzahlSch1'];
    $AnzahlSch =$a = $_GET['a'];
    $AnzahlSch1 = $b = $_GET['b'];

if ($AnzahlSch=='') {$AnzahlSch=$AnzahlSch1;}
echo 'Klassenname:';
echo $Klassenname;
if ($Klassenname ==""){echo "Bitte zurück gehen und eine Klasse auswählen!";}
else {

echo '<table id="table_id" class="blueTable">';
echo "<thead>";
echo "<tr>";
//Schreibe Spaltennamen

echo "<th width=100>".'ID'."</th>";
echo "<th width= 240>".'Nachname'. "</th>";
echo "<th width=240>".'Vorname'. "</th>";
echo "<th width=240>".'Profil'. "</th>";
echo "<th width= 240>".'Loginname'. "</th>";
echo "<th width=300>".'E-Mail'. "</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";



    include 'db.php';
$isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_Lernende Where Klasse='$Klassenname' Order By Name ";
$result = mysqli_query($con, $isEntry);
$y=0;

while( $value= mysqli_fetch_array($result))
{


$Name= $value['Name'];
$Vorname=$value['Vorname'];
$Loginname=$value['Loginname'];
$ID=$value['ID'];
$EMail=$value['EMail'];
$Profil=$value['Profil'];

echo "<tr>";
 echo '<td><input name="ID1'.$y.'" style="width: 100px" type="text" readonly  value='.$ID.' ></td>';
 echo '<td><input name="Nachname1'.$y.'" style="width: 240px" type="text" readonly value='.$Name.'  ></td>';
  echo '<td><input name="Vorname1'.$y.'" type="text" value='.$Vorname.' readonly style="width: 240px"   ></td>';
  echo '<td><input name="Profil'.$y.'" type="text" style="width: 75px" readonly   value='.$Profil.'  ></td>';
  echo '<td><input name="Loginname1'.$y.'" type="text" style="width: 240px" readonly  value='.$Loginname.'  ></td>';
  echo '<td><input name="EMail1'.$y.'" type="text" style="width: 300px" readonly value='.$EMail.'   ></td>';
echo "</tr>";

$y=$y+1;
}
$isEntry = "SELECT ID From sv_Lernende";
$result = mysqli_query($con, $isEntry);
$y=0;

while( $value= mysqli_fetch_array($result))
{
$z=$value['ID'];
}

for($x = 0; $x < $AnzahlSch; $x++)
{
$i=$z+$x+1;
   echo "<tr>";
   echo '<td><input name="ID'.$x.'" style="width: 100px" type="text"  value='.$i.'  readonly/></td>';
  echo '<td><input name="Nachname'.$x.'" style="width: 240px" type="text" required="required" /></td>';
  echo '<td><input name="Vorname'.$x.'" type="text" style="width: 240px" required="required" /></td>';
  echo '<td><input name="Profil'.$x.'" type="text" style="width: 75px"  /></td>';
  echo '<td><input name="Loginname'.$x.'" type="text" style="width: 240px" /></td>';
  echo '<td><input name="EMail'.$x.'" type="text" style="width: 300px" /></td>';
echo "</tr>";


}
echo "</tbody>";

echo "</table>";
echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';
echo '<input name="AnzahlSch" type="hidden" value="'.$AnzahlSch.'" /> ';
 echo ' <input name="Senden" type="submit" value="Senden" />   ';

}


?>
</form>
_______________________________________________________________<form action="/klassenverwaltung/">
    <input type="submit" value="Zurück" />
</form>
