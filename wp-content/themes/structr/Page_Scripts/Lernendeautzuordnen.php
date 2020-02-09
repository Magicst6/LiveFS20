<?php

include 'db.php';

global $current_user;

get_currentuserinfo();

/*

echo 'Username: ' . $current_user->user_login . "\n";

echo 'User email: ' . $current_user->user_email . "\n";

echo 'User level: ' . $current_user->user_level . "\n";

echo 'User first name: ' . $current_user->user_firstname . "\n";

echo 'User last name: ' . $current_user->user_lastname . "\n";

echo 'User display name: ' . $current_user->display_name . "\n";

echo 'User ID: ' . $current_user->ID . "\n";

echo 'User Rolle1: ' . $current_user->roles[0] . "\n";

echo 'User Rolle2: ' . $current_user->roles[1] . "\n";



*/



?>







<?php



$isEntry= "Select * From sv_Lernende Order By Name";

$result = mysqli_query($con, $isEntry);

$NameArr[]=array();

$VornameArr[]=array();

$y=0;





while( $line2= mysqli_fetch_array($result))

{

    $LernenderID = $line2['ID'];

    $Name = $line2['Name'];

    $Vorname = $line2['Vorname'];





    $x=0;



    $isEntry1= "Select * From sv_users INNER JOIN sv_usermeta ON (sv_users.ID = sv_usermeta.user_id) INNER JOIN sv_usermeta AS w1 ON (sv_users.ID = w1.user_id) INNER JOIN sv_usermeta AS w2 ON (sv_users.ID = w2.user_id) WHERE sv_usermeta.meta_key = 'sv_capabilities'  AND w1.meta_key = 'last_name' AND w1.meta_value='$Name' AND w2.meta_key = 'first_name' AND w2.meta_value='$Vorname' ";

    $result1 = mysqli_query($con1, $isEntry1);

    while( $line3= mysqli_fetch_array($result1))

    {

        $Login = $line3['user_login'];

        $Mail = $line3['user_email'];

        $ID = $line3['ID'];



        $x++;

        if ($x==2){

            echo '<script language="javascript">';

            echo 'alert("'.$Name.' '.$Vorname.' doppelt! Bitte diesen User manuell anpassen")';

            echo '</script>';



        }

        else{





            $sql_befehl = "Update  sv_Lernende Set Loginname='$Login', User_ID='$ID', EMAIL='$Mail' Where ID='$LernenderID' ";
			  $sql_befehl1 = "Update  sv_LernendeModule Set Loginname='$Login', User_ID='$ID', EMail='$Mail' Where Name='$Name' and Vorname='$Vorname' ";



////echo $sql_befehl5;

            if  (""== $ID)  {

//echo "Fehler: Eintrag unvollständig. ";

            }

            else {

                mysqli_query($con,$sql_befehl);
				mysqli_query($con,$sql_befehl1);


//   echo "   Aktualisierung wurde ausgeführt!";

            }

        }

    }

}

echo "Script ausgeführt";





?>

<?php




$isEntry= "Select * From sv_Lernende Order by ID asc ";



$result = mysqli_query($con, $isEntry);



while ($row = mysqli_fetch_array($result)) {

	
	
    $Name=$row['Name'];

    $Vorname=$row['Vorname'];

    $Profil=$row['Profil'];

    $Klasse=$row['Klasse'];

    $EMail=$row['EMail'];

    $UserID=$row['User_ID'];

    $ID=$row['ID'];

    $isEntry4= "Select ID  From sv_LernendeModule";



    $result4 = mysqli_query($con, $isEntry4);

    while ($row4= mysqli_fetch_array($result4)) {
		
		$IDMod=$row4['ID'];

        if ($ID==$IDMod)

        {
			

            $query4 = "Update sv_LernendeModule Set Name='$Name' , Vorname='$Vorname' , EMail='$EMail', User_ID='$UserID', Profil='$Profil' Where ID='$ID' ";

            
			mysqli_query($con, $query4);

        }

    }



    $isEntry1= "Select *  From sv_Lernende Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'";



    $result1 = mysqli_query($con, $isEntry1);

    $x=1;

    while ($row1= mysqli_fetch_array($result1)) {



        $isEntry2= "Select *  From sv_LernendeModule Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'";



        $result2 = mysqli_query($con, $isEntry2);

        $ID2="";

        while ($row2= mysqli_fetch_array($result2)) {

            $ID2=$row2['ID'];

        }



        if ($x==1 and $ID2=="") {

            $Klasse1=$row1['Klasse'];

            $query1 = "INSERT INTO sv_LernendeModule (Name, Vorname,EMail,Profil,User_ID,ID,Modul1)  VALUES ('$Name', '$Vorname', '$EMail','$Profil','$UserID','$ID','$Klasse1')";

            mysqli_query($con, $query1);

            $x++;



        }

        else {



            $Klasse1=$row1['Klasse'];



            if ($x==1) {

                $query2 = "Update sv_LernendeModule Set Modul1='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);



            }if ($x==2) {

                $query2 = "Update sv_LernendeModule Set Modul2='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);



            }if ($x==3) {

                $query2 = "Update sv_LernendeModule Set Modul3='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==4) {

                $query2 = "Update sv_LernendeModule Set Modul4='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==5) {

                $query2 = "Update sv_LernendeModule Set Modul5='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==6) {

                $query2 = "Update sv_LernendeModule Set Modul6='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==7) {

                $query2 = "Update sv_LernendeModule Set Modul7='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==8) {

                $query2 = "Update sv_LernendeModule Set Modul8='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==9) {

                $query2 = "Update sv_LernendeModule Set Modul9='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==10) {

                $query2 = "Update sv_LernendeModule Set Modul10='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==11) {

                $query2 = "Update sv_LernendeModule Set Modul11='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }if ($x==12) {

                $query2 = "Update sv_LernendeModule Set Modul12='$Klasse1' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);

            }

            $x++;



        }

    }









}



?>

<form action="/lernende-zuordnen-2">

    <input type="submit" value="Zurück" />









