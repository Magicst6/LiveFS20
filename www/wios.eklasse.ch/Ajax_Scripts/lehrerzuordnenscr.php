<?php

include 'db.php';

    $Lehrperson=$_GET['q'];
    preg_match("/:(.*)/", $Lehrperson, $output_array);
    $LehrpersonID=$output_array[1];

    $Loginname=$_GET['h'];
    preg_match("/(.*) (.*) (.*):(.*)/", $Loginname, $output_array);
    $LoginnameID=$output_array[4];
    $LoginnameReal=$output_array[1];
    $LoginnameMail=$output_array[2];


/*$isEntry= "Select meta_value From sv_usermeta where user_id=$LoginnameID and meta_key ='sv_capabilities' ";
$result = mysqli_query($con, $isEntry);

while( $line2= mysqli_fetch_assoc($result)) {

    $svcap = $line2['meta_value'];

    if (strpos($svcap, 's:10:"lehrperson";b:1;') !== false) {
    } else {
        $svcapred = substr($svcap, 0, -1);
        $svcapnew = $svcapred . 's:10:"lehrperson";b:1;}';
    echo $svcapnew;
        $sql_befehl1 = "Update  sv_usermeta Set meta_value= '$svcapnew'  where user_id=$LoginnameID and meta_key ='sv_capabilities' ";
        mysqli_query($con, $sql_befehl1);
   }
}*/
    $sql_befehl = "Update  sv_Lehrpersonen Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail' Where ID='$LehrpersonID' ";

    //echo $sql_befehl5;
    if  (""== $LehrpersonID)  {
        echo "Fehler: Eintrag unvollständig. ";
    }
    else {
        mysqli_query($con,$sql_befehl);

        echo "   Aktualisierung wurde ausgeführt!";
        echo '<script language="javascript">';
        echo 'alert("Login zugeordnet!")';
        echo '</script>';

    }

/*
 $isEntry1 = "SELECT * From sv_Lehrpersonen  Order by Name";

        $result1 = mysqli_query($con,$isEntry1);

        while( $value1= mysqli_fetch_array($result1))
		{
                 $Mail= $value1['EMail'];
			       $ID=$value1['ID'];
		
if($Mail==$LoginnameMail and $LehrpersonID<>$ID)
{
	 echo "Account bereits LehrpersonenID ".$ID." zugeordnet!";
	 $isExisting=true;
}
		}
if (!$isExisting){
    $sql_befehl = "Update  sv_Lehrpersonen Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail'  Where ID='$LehrpersonID' ";
    //echo $sql_befehl5;
    if  (""== $Lernender)  {
        //echo "Fehler: Eintrag unvollständig. ";
    }
    else {
        mysqli_query($con,$sql_befehl);
        echo "   Aktualisierung wurde ausgeführt!";
        echo '<script language="javascript">';
        echo 'alert("Login zugeordnet!")';
        echo '</script>';

    }
}
*/
mysqli_close($con);
?>
