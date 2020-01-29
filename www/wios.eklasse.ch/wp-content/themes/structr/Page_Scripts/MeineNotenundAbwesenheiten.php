<?php

include 'db.php';




global $current_user;

get_currentuserinfo();



/*      echo 'Username: ' . $current_user->user_login . "\n";

echo 'User email: ' . $current_user->user_email . "\n";

echo 'User level: ' . $current_user->user_level . "\n";

echo 'User first name: ' . $current_user->user_firstname . "\n";

echo 'User last name: ' . $current_user->user_lastname . "\n";

echo 'User display name: ' . $current_user->display_name . "\n";

echo 'User ID: ' . $current_user->ID . "\n";



*/







$isEntry6= "Select * From sv_LernenderKurs";

$result6 = mysqli_query($con, $isEntry6);

while( $line6= mysqli_fetch_array($result6))

{

    $Kursname=$line6['KursID'];

    $SchuelerID=$line6['SchülerID'];

    $Abwesenheitsdauer='100000';

    $isEntry5 = "Select Abwesenheit From sv_AbwesenheitenGesamt Where SchülerID = '$SchuelerID' and KursID= '$Kursname'";

    $result5 = mysqli_query($con, $isEntry5);



    while( $value3= mysqli_fetch_array($result5))

    {

        $Abwesenheitsdauer=$value3['Abwesenheit'];



    }



    if ($Abwesenheitsdauer=='100000' )

    {

        $sql_befehl2 = "INSERT INTO sv_AbwesenheitenGesamt (Abwesenheit,KursID,SchülerID) VALUES ('0','$Kursname','$SchuelerID')";

        mysqli_query($con,$sql_befehl2);

    }

}



//Den aktuell eingeloggten Schüler anzeigen



$isEntry= "Select ID From sv_Lernende where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);

$resultarr = array();





while( $line2= mysqli_fetch_assoc($result))

{

    $resultarr[] = $line2['ID'];

}

$uniquearr = array_unique($resultarr);











foreach ($uniquearr as $value) {

    $isEntry= "Select Name, Vorname From sv_Lernende WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Nachname'];

        $Vorname = $line3['Vorname'];



    }

    $Schueler= $Vorname .' '. $Name .' ID:'. $value ;

}









preg_match("/:(.*)/", $Schueler, $output_array);

$Schueler=$output_array[1];



$Kursname=$_GET['q'];

$isEntry1= "Select SchülerID From sv_AbwesenheitenKompakt Where SchülerID = $Schueler";

$result1 = mysqli_query($con,$isEntry1);



$tblnr=10;



$DauerGesamt=0;

$KursnameGes=0;

$isEntry2= "Select Abwesenheitsdauer,Kursname From sv_AbwesenheitenKompakt Where SchülerID = '$Schueler' Order By Kursname Asc";

$result2 = mysqli_query($con, $isEntry2);

while( $line4= mysqli_fetch_array($result2))

{

    $Kursnamebefore =$line4['Kursname'];



    if(($Kursnamebefore==$KursnameGes) or ($KursnameGes=='')){

        $KursnameGes=$line4['Kursname'];

        $DauerGesamt =$DauerGesamt+$line4['Abwesenheitsdauer'];





        $isEntry5 = "Select Abwesenheit From sv_AbwesenheitenGesamt Where SchülerID = '$Schueler' and KursID= '$KursnameGes'";

        $result5 = mysqli_query($con, $isEntry5);



        $sql_befehl2 = "UPDATE sv_AbwesenheitenGesamt SET Abwesenheit='$DauerGesamt' Where KursID='$KursnameGes' and SchülerID = '$Schueler'  ";

        mysqli_query($con,$sql_befehl2);







    }

    else {

        $KursnameGes=$line4['Kursname'];

        $DauerGesamt =$line4['Abwesenheitsdauer'];





        $isEntry5 = "Select Abwesenheit From sv_AbwesenheitenGesamt Where SchülerID = '$Schueler' and KursID= '$KursnameGes'";

        $result5 = mysqli_query($con, $isEntry5);





        $sql_befehl2 = "UPDATE sv_AbwesenheitenGesamt SET Abwesenheit='$DauerGesamt' Where KursID='$KursnameGes' and SchülerID = '$Schueler'  ";

        mysqli_query($con,$sql_befehl2);

    }











}



if ($Kursname==""){$vr1=0;$vr2=5;}

else {$vr1= $Kursname;

    $vr2=4;}

if ($Schueler==""){$vr3=1;}

else {$vr3= $Schueler;}







?>

&nbsp;









