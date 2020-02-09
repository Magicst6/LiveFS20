<?php
include 'db.php';


    $Lernender=$_GET['q'];
    preg_match("/:(.*)/", $Lernender, $output_array);
    $Lernender=$output_array[1];

    $Loginname=$_GET['h'];
    preg_match("/(.*) (.*) (.*):(.*)/", $Loginname, $output_array);
    $LoginnameID=$output_array[4];
    $LoginnameReal=$output_array[1];
    $LoginnameMail=$output_array[2];

    $isEntry = "SELECT * From sv_LernendeModule Where ID='$Lernender' Order by Name";

        $result = mysqli_query($con,$isEntry);

        while( $value= mysqli_fetch_array($result))

        {
              $Name = $value['Name'];
			$Vorname= $value['Vorname'];
		       
		}
 $isExisting=false;
 $isEntry1 = "SELECT * From sv_LernendeModule  Order by Name";

        $result1 = mysqli_query($con,$isEntry1);

        while( $value1= mysqli_fetch_array($result1))
		{
                 $Mail= $value1['EMail'];
			       $ID=$value1['ID'];
		
if($Mail==$LoginnameMail and $Lernender<>$ID)
{
	 echo "Account bereits LernenderID ".$ID." zugeordnet!";
	 $isExisting=true;
}
		}
if (!$isExisting){
    $sql_befehl = "Update  sv_Lernende Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail' Where Name='$Name' and Vorname='$Vorname' ";
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

$sql_befehl1 = "Update  sv_LernendeModule Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail' Where Name='$Name' and Vorname='$Vorname'";
    //echo $sql_befehl5;
    if  (""== $Lernender)  {
        //echo "Fehler: Eintrag unvollständig. ";
    }
    else {
        mysqli_query($con,$sql_befehl1);
        echo "!";
        echo '<script language="javascript">';
        echo 'alert("Login zugeordnet!")';
        echo '</script>';

    }
	
}
		


mysqli_close($con);
?>