<?php

include 'db.php';



$Schueler=$_GET['h'];

preg_match("/:(.*)/", $Schueler, $output_array);

$Schueler=$output_array[1];



$Kursname=$_GET['q'];

$isEntry1= "Select SchuelerID From sv_AbwesenheitenKompakt Where SchuelerID = $Schueler";

$result1 = mysqli_query($con,$isEntry1);



$tblnr=10;





$DauerGesamt=0;

$KursnameGes=0;

$isEntry2= "Select Abwesenheitsdauer,Kursname From sv_AbwesenheitenKompakt Where SchuelerID = '$Schueler' Order By Kursname Asc";

$result2 = mysqli_query($con, $isEntry2);

while( $line4= mysqli_fetch_array($result2))

{

    $Kursnamebefore =$line4['Kursname'];



    if(($Kursnamebefore==$KursnameGes) or ($KursnameGes=='')){

        $KursnameGes=$line4['Kursname'];

        $DauerGesamt =$DauerGesamt+$line4['Abwesenheitsdauer'];





        $isEntry5 = "Select Abwesenheit From sv_AbwesenheitenGesamt Where SchuelerID = '$Schueler' and KursID= '$KursnameGes'";

        $result5 = mysqli_query($con, $isEntry5);



        $sql_befehl2 = "UPDATE sv_AbwesenheitenGesamt SET Abwesenheit='$DauerGesamt' Where KursID='$KursnameGes' and SchuelerID = '$Schueler'  ";

        mysqli_query($con,$sql_befehl2);







    }

    else {

        $KursnameGes = $line4['Kursname'];

        $DauerGesamt = $line4['Abwesenheitsdauer'];


        $isEntry5 = "Select Abwesenheit From sv_AbwesenheitenGesamt Where SchuelerID = '$Schueler' and KursID= '$KursnameGes'";

        $result5 = mysqli_query($con, $isEntry5);


        $sql_befehl2 = "UPDATE sv_AbwesenheitenGesamt SET Abwesenheit='$DauerGesamt' Where KursID='$KursnameGes' and SchuelerID = '$Schueler'  ";

        mysqli_query($con, $sql_befehl2);


    }







}



if ($Kursname==""){$vr1=0;$vr2=5;}

else {$vr1= $Kursname;

    $vr2=4;}

if ($Schueler==""){$vr3=1;}

else {$vr3= $Schueler;}



    $sql_befehl2 = "Update sv_HelperDT SET variable1='$vr1', variable2='$vr2', variable3='$vr3' ";

    mysqli_query($con, $sql_befehl2);

    echo ('Updated');





?>





<a href="http://schulverwaltungheimtest.ch/nua"

   target="popup"

   onclick="window.open('http://schulverwaltungheimtest.ch/nua','popup','width=1500,height=900'); return false;">

    Tabelle im Popup öffnen

</a>



