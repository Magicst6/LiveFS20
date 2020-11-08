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
$Sg=5;
   include 'db.php';
$Kursnme=$_GET['q'];
$heute= $_GET['h'];
$LektionenF=$_GET['j'];

$start= $_GET['s'];
$end=$_GET['e'];

$Sg=$_GET['f'];


echo '<br><br>';

echo 'Datum des einzutragenden Kurses:';

echo'<br><br>';

echo '<input style="width: 145px;" name="date" id="date" type="date" value="'.$heute.'"  onchange="testdate(this.value)"  required="required" />';

echo '<br>';
if ($start){ 
echo 'Start:  <strong>'.$start.' Uhr</strong>';
echo '<br>';
echo 'Ende: <strong>'.$end.' Uhr</strong>';
}
echo '<br><br>';
if ($LektionenF){
		   $Lektionen=$LektionenF;
	   }
		
if ($Kursnme<>'' && $Kursnme<>"-Select-"){
$isEntry2 = "Select Stattgefunden,Kommentar From sv_Kurshistorie Where KursID='$Kursnme' and Datum='$heute'";
$result2 = mysqli_query($con, $isEntry2);

while( $value3= mysqli_fetch_array($result2))
{
$Stattgefunden=$value3['Stattgefunden'];
$Comment=$value3['Kommentar'];
}
	if ($Sg=='false'){$Stattgefunden='nein';}
if ($Stattgefunden=='ja' || $Sg=='true'){
echo '<div class="panel panel-default" style="background-color:aliceblue"><div class="panel-body"><strong><span class="auto-style2">Kurs hat stattgefunden:</span></strong>   <input type="checkbox" id="tookplace" name="tookplace" value="ja" checked="checked" class="auto-style1" ><br></div></div>';
}

	else if ( $Stattgefunden=='nein' ){
	echo '<div class="panel panel-default" style="background-color:aliceblue"><div class="panel-body"><strong><span class="auto-style2">Kurs hat stattgefunden:</span></strong>   <input type="checkbox" id="tookplace" name="tookplace" value="ja" class="auto-style1" ><br></div></div>';
	}
else
{
echo '<div class="panel panel-default" style="background-color:aliceblue"><div class="panel-body"><strong><span class="auto-style2">Kurs hat stattgefunden:</span></strong>   <input type="checkbox" id="tookplace" name="tookplace" value="ja" class="auto-style1" ><br></div></div>';
}  
	
	$isEntry10 = "SELECT Lektionen From sv_Kurshistorie Where KursID='$Kursnme' and Datum='$heute'  ";

    $result10 = mysqli_query($con, $isEntry10);

    while ($value10 = mysqli_fetch_array($result10)) {
       if ($LektionenF){
		   $Lektionen=$LektionenF;
	   }
else		$Lektionen=$value10['Lektionen'];
		
    }
	echo '<br>';
    echo 'Lektionen:';
    echo '<br>';
    echo '<input name="Lektionen" id="Lektionen" type="number" value=' . $Lektionen . ' min="0" max="999" onchange="test11()"" required="required">';
    echo '(anzugeben für die Stundenabrechung)';
    echo '<br>';
    echo '<br>';
    echo '<br>';
echo "Kommentar zur Lektion:";
echo '<textarea name="Comment">'.$Comment.'</textarea>';
}



?>


<?php

echo '<br>';
$Kursnme=$_GET['q'];
$isEntry= "Select KursID, Klasse, Profil From sv_Kurse where KursID='$Kursnme'";
$result1 = mysqli_query($con, $isEntry);
while( $row5= mysqli_fetch_array($result1))
{
      
    $Klasse =  $row5['Klasse'];
    $Kursname =  $row5['KursID'];
	
	$Profil =  $row5['Profil'];

    $dontFill=0;
    $isEntry3= "Select KursID From sv_LernenderKurs";
    $result3 = mysqli_query($con, $isEntry3);
    $resultarr3 = array();

    while( $row3= mysqli_fetch_assoc($result3))
    {
        $resultarr3[] = $row3['KursID'];
    }

    $uniquearr3 = array_unique($resultarr3);
    asort($uniquearr3);

    foreach ($uniquearr3 as $value) {
        if ($value==$Kursname)
        {
            $dontFill=1;
        }
    }


    $isEntry2= "Select * From sv_LernendeModule";


    $result2 = mysqli_query($con, $isEntry2);

    while ($row2 = mysqli_fetch_array($result2)) {
		$isProfil=0;
        $dontFill=0;
        $SchuelerID= $row2['ID'];
        $Vorname= $row2['Vorname'];
        $Name= $row2['Name'];
        $Profil1= $row2['Profil'];
		$UserID= $row2['User_ID'];
		$ProfKomma = explode(",", $Profil1);
		
		$ProfDash = explode("/", $Profil1);
		
		foreach ($ProfKomma as $val1) {
            if (strtolower($val1)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }
		
		foreach ($ProfDash as $val2) {
            if (strtolower($val2)==strtolower($Profil))
			{
				$isProfil=1;
			}
         }

       
		if ($isProfil==1 or $Profil==''){
		
            $isEntry4= "Select SchuelerID, Vorname, Nachname, KursID From sv_LernenderKurs where KursID='$Kursnme'";
            $result4 = mysqli_query($con, $isEntry4);

            while ($row4 = mysqli_fetch_array($result4)) {
				$isfilled=0;
                $ID= $row4['SchuelerID'];
                $KursnameAbw =  $row4['KursID'];
                $VornameAbw= $row4['Vorname'];
                $NachnameAbw= $row4['Nachname'];
                
                if ($SchuelerID==$ID)
                {
$isEntry1 = "SELECT SchuelerID, Kommentar, Abwesenheitsdauer,Datum From sv_AbwesenheitenKompakt Where Kursname='$Kursnme'";
$result1 = mysqli_query($con, $isEntry1);

while( $value2= mysqli_fetch_array($result1))
{
	
if (($ID==$value2['SchuelerID']) and ($value2['Datum']==$heute)){
$y++;
$z="Comment"."$y";
$u="Dauer"."$y";
$abw=$value2['Abwesenheitsdauer'];
		$ab="abw"."$y";
	
echo '<input name="'.$ab.'" id="'.$ab.'" type="hidden" value="'.$abw.'">'; 
echo '<br>';
echo '<label for='.$ID.'><b>'.$Vorname.' '.$Name.' '. get_avatar($UserID,50).'   </b></label>';
echo '<input type="hidden" name='.$y.' value='.$ID.'><br>';
echo '<br>';
echo 'Abwesenheitsdauer(Lektionen):';
echo '<br>';
for ($v=0;$v<=$Lektionen;$v++){
	echo '<input name="'.$u.'" id="'.$u.'" type="radio" value="'.$v.'" ><label for="'.$u.'">'.$v.'</label> &nbsp &nbsp';
}

echo ''; 	
echo ''; 	
echo '<br>';
echo 'Kommentar: ';
echo '<br>';

echo '<textarea name='.$z.'>'.$value2['Kommentar'].'</textarea>';
echo '<br>';
echo '<hr>';
$isfilled=1;
	
	?>



<?
}
}

if ($isfilled==0){

$y++;
$z="Comment"."$y";
$u="Dauer"."$y";
	
$abw="0";
$ab="abw"."$y";
	
echo '<input name="'.$ab.'" id="'.$ab.'" type="hidden" value="'.$abw.'">'; 
	
echo '<br>';
echo '<label for='.$ID.'><b>'.$Vorname.' '.$Name.' '. get_avatar($UserID,50).'    </b></label>';
echo '<input type="hidden" name='.$y.' value='.$ID.'><br>';
echo '<br>';
echo 'Abwesenheitsdauer(Lektionen):';
echo '<br>';
	if ($Lektionen){
for ($v=0;$v<=$Lektionen;$v++){
	echo '<input name="'.$u.'" id="'.$u.'" type="radio" value="'.$v.'" ><label for="'.$u.'">'.$v.'</label> &nbsp &nbsp ';
}
	}
	else {
	}
echo ''; 	
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
}
}
}

echo '<input name="count" id="count" type="hidden" value="'.$y.'">'; 

mysqli_close($con);

?>



 


