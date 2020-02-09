<style type="text/css">
    .auto-style1 {
        background-color: red;
    }
    .auto-style2 {
        color: black;
        background-color: ;
        font-size: large;

    }
</style>



<?php
   include 'db.php';
$Kursnme=$_GET['q'];
$heute= $_GET['h'];
if ($Kursnme<>'' && $Kursnme<>"-Select-"){
$isEntry2 = "Select Stattgefunden,Kommentar From sv_Kurshistorie Where KursID='$Kursnme' and Datum='$heute'";
$result2 = mysqli_query($con, $isEntry2);

while( $value3= mysqli_fetch_array($result2))
{
$Stattgefunden=$value3['Stattgefunden'];
$Comment=$value3['Kommentar'];
}
if ($Stattgefunden=='ja'){
echo '<div class="panel panel-default" style="background-color:aliceblue"><div class="panel-body"><strong><span class="auto-style2">Kurs hat stattgefunden:</span></strong>   <input type="checkbox" name="tookplace" value="ja" checked="checked" class="auto-style1" ><br></div></div>';
}
else
{
echo '<div class="panel panel-default" style="background-color:aliceblue"><div class="panel-body"><strong><span class="auto-style2">Kurs hat stattgefunden:</span></strong>   <input type="checkbox" name="tookplace" value="ja" class="auto-style1" ><br></div></div>';
}  
	
	$isEntry10 = "SELECT Lektionen From sv_Kurshistorie Where KursID='$Kursnme' and Datum='$heute'  ";

    $result10 = mysqli_query($con, $isEntry10);

    while ($value10 = mysqli_fetch_array($result10)) {
        $Lektionen=$value10['Lektionen'];
    }
	echo '<br>';
    echo 'Lektionen:';
    echo '<br>';
    echo '<input name="Lektionen" type="number" value=' . $Lektionen . ' min="0" max="999" required="required">';
    echo '(anzugeben für die Stundenabrechung)';
    echo '<br>';
    echo '<br>';
    echo '<br>';
echo "Kommentar zur Lektion:";
echo '<textarea name="Comment">'.$Comment.'</textarea>';
}



?>
Um die Abwesenheitsdauer nach Falscheingabe auf 0 zurück zu setzen bitte 99 eingeben

<?php

echo '<br>';
$Kursnme=$_GET['q'];
$isEntry5 = "SELECT Klasse From sv_Kurse Where KursID='$Kursnme' ";
$result5 = mysqli_query($con, $isEntry5);
$y=0;
while( $value5= mysqli_fetch_array($result5))
{
$isfilled=0;
$Klasse=$value5['Klasse'];
	
}
$isEntry4 = "SELECT Vorname,Name, Profil,ID From sv_Lernende Where Klasse='$Klasse' order by Name ";
$result4 = mysqli_query($con, $isEntry4);

while( $value4= mysqli_fetch_array($result4))
{
	$isfilled=0;
$Vorname=$value4['Vorname'];
$Name =$value4['Name'];
$ID =$value4['ID'];

$Profil=$value4['Profil'];

preg_match("/.fz./", strtolower($Kursnme), $output_array1);
$KursnameReg=$output_array1[0];
preg_match("/e/", strtolower($Profil), $output_array2);
$ProfilReg=$output_array2[0];
preg_match("/.itplus./", strtolower($Kursnme), $output_array3);
$KursnameReg1=$output_array3[0];
preg_match("/it/", strtolower($Profil), $output_array4);
$ProfilReg1=$output_array4[0];

if ((($KursnameReg=='.fz.') and ($ProfilReg=='e')) or (($KursnameReg<>'.fz.') and ($KursnameReg1<>'.itplus.')) or (($KursnameReg1=='.itplus.') and ($ProfilReg1=='it'))) {
$isEntry1 = "SELECT SchülerID, Kommentar, Abwesenheitsdauer,Datum From sv_AbwesenheitenKompakt Where Kursname='$Kursnme'";
$result1 = mysqli_query($con, $isEntry1);

while( $value2= mysqli_fetch_array($result1))
{

if (($ID==$value2['SchülerID']) and ($value2['Datum']==$heute)){
$y++;
$z="Comment"."$y";
$u="Dauer"."$y";
echo '<br>';
echo '<label for='.$ID.'><b>'.$Vorname.' '.$Name.'   </b></label>';
echo '<input type="hidden" name='.$y.' value='.$ID.'><br>';
echo '<br>';
echo 'Abwesenheitsdauer:';
echo '<br>';
echo '<input name='.$u.' type="number" value='.$value2['Abwesenheitsdauer'].' min="0" max="999">';
echo '<br>';
echo 'Kommentar: ';
echo '<br>';

echo '<textarea name='.$z.'>'.$value2['Kommentar'].'</textarea>';
echo '<br>';
echo '<hr>';
$isfilled=1;
}
 }

if ($isfilled==0){

$y++;
$z="Comment"."$y";
$u="Dauer"."$y";
echo '<br>';
echo '<label for='.$ID.'><b>'.$Vorname.' '.$Name.'   </b></label>';
echo '<input type="hidden" name='.$y.' value='.$ID.'><br>';
echo '<br>';
echo 'Abwesenheitsdauer:';
echo '<br>';
echo '<input name='.$u.' type="number" value="0" min="0" max="999">';
echo '<br>';
echo 'Kommentar: ';
echo '<br>';

echo '<textarea name='.$z.' ></textarea>';
echo '<br>';
echo '<hr>';

}
echo '<input name="Schueler" id="Schueler" type="hidden" value='.$y.' />';
}
}

mysqli_close($con);

?>
