<?php
include 'db.php';
$Kursname = $_GET['q'];
$semester =$_GET['s'];

$isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

while ($line1 = mysqli_fetch_array($result)) {

    $semDB=$line1['Semesterkuerzel'];

}


if ($semester==$semDB || $semester==''){
	$Tab="sv_LernenderKurs";
	
}
else{
$Tab=$semester."_LernenderKurs";
}
if ($Kursname=="Alle") 

{
	$isEntry= "Select SchuelerID From $Tab Group by SchuelerID";
	
}else
{
$isEntry= "Select SchuelerID From $Tab Where KursID='$Kursname' ";
}
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['SchuelerID'];
}
$uniquearr = array_unique($resultarr);


echo "<option>" .'-Select-'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Name, Vorname From sv_LernendeModule WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

      





$select='Select KursID, Note1,Note2, Note3,Note4, Note5, Note6, Note7,Note8, Note9 from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$sel2= '" Group by KursID';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2' where post_id='18113' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	




$selectt='Select KursID, Abwesenheiten from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$selt2= '" Group by KursID';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$selectt$sel1$selt2' where post_id='18124' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );	




$select='Select sv_Lehrpersonen.Vorname,sv_Lehrpersonen.Nachname,KursID from sv_Kurse inner join sv_Lehrpersonen ON sv_Kurse.Lehrperson=sv_Lehrpersonen.ID where Lehrperson in (Select ID from sv_Lehrpersonen where 
Kurs1 in (Select KursID from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
$sel2='") or  Kurs2 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel3='") or Kurs3 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel4='") or  Kurs4 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel5='") or Kurs5 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel6='") or  Kurs6 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel7='") or Kurs7 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel8='") or  Kurs8 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel9='") or Kurs9 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel10='") or  Kurs2 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel11='") or Kurs11 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel12='") or  Kurs12 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel13='") or Kurs13 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel14='") or  Kurs14 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel15='") or Kurs15 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel16='") or  Kurs16 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel17='") or Kurs17 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel18='") or  Kurs18 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel19='") or Kurs19 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel20='") or  Kurs20 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel21='") or Kurs21 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel22='") or  Kurs22 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel23='") or Kurs23 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel24='") or  Kurs24 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$se253='") or Kurs25 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel26='") or  Kurs26 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel27='") or Kurs27 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel28='") or  Kurs28 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel29='") or Kurs29 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel30='") or  Kurs30 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel31='")) and KursID in (Select KursID from sv_LernenderKurs where SchuelerID="';




$sel32= '") Group by KursID';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2$sel1$sel3$sel1$sel4$sel1$sel5$sel1$sel6$sel1$sel7$sel1$sel8$sel1$sel9$sel1$sel10$sel1$sel11$sel1$sel12$sel1$sel13$sel1$sel14$sel1$sel15$sel1$sel16$sel1$sel17$sel1$sel18$sel1$sel19$sel1$sel20$sel1$sel21$sel1$sel22$sel1$sel23$sel1$sel24$sel1$sel25$sel1$sel26$sel1$sel27$sel1$sel28$sel1$sel29$sel1$sel30$sel1$sel31$sel1$sel32' where post_id='18116' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	




$selecty='Select Pruefungsname,Datum As Prüfungsdatum, Start,Ende,Zimmer,Gewichtung,KursID,Kommentar from sv_Pruefungen where KursID  in (Select KursID from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$sely2= '")';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$selecty$sel1$sely2' where post_id='18121' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );


$select='Select Klasse, Count(Klasse)As Schülerzahl from sv_Lernende where Klasse in (Select Modul1 from sv_LernendeModule where ID="';
 $sel1=$value;
$sel2='") or Klasse  in (Select Modul2 from sv_LernendeModule where ID="';
$sel3='") or Klasse in (Select Modul3 from sv_LernendeModule where ID="';
$sel4='") or Klasse in (Select Modul4 from sv_LernendeModule where ID="';	
$sel5='") or Klasse in (Select Modul5 from sv_LernendeModule where ID="';
$sel6='") or Klasse in (Select Modul6 from sv_LernendeModule where ID="';	
$sel7='") or Klasse in (Select Modul7 from sv_LernendeModule where ID="';
$sel8='") or Klasse in (Select Modul8 from sv_LernendeModule where ID="';
$sel9='") or Klasse in (Select Modul9 from sv_LernendeModule where ID="';
$sel10='") or Klasse in (Select Modul10 from sv_LernendeModule where ID="';
$sel11='") or Klasse in (Select Modul11 from sv_LernendeModule where ID="';	
$sel12='") or Klasse in (Select Modul12 from sv_LernendeModule where ID="';

$sel13= '") Group by Klasse';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2$sel1$sel3$sel1$sel4$sel1$sel5$sel1$sel6$sel1$sel7$sel1$sel8$sel1$sel9$sel1$sel10$sel1$sel11$sel1$sel12$sel1$sel13' where post_id='18119' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );
?>  

