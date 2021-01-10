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
    $isEntry2 = "SELECT * From sv_LernendeModule where ID='$Lernender'  Order by Name";

        $result2 = mysqli_query($con,$isEntry2);

        while( $value2= mysqli_fetch_array($result2)){
			$Modul1=$value2['Modul1'];
			$Modul2=$value2['Modul2'];
			$Modul3=$value2['Modul3'];
			$Modul4=$value2['Modul4'];
			$Modul5=$value2['Modul5'];
			$Modul6=$value2['Modul6'];
			$Modul7=$value2['Modul7'];
			$Modul8=$value2['Modul8'];
			$Modul9=$value2['Modul9'];
			$Modul10=$value2['Modul10'];
			$Modul11=$value2['Modul11'];
			$Modul12=$value2['Modul12'];
			
			
		}
	
	$sql_befehl = "Update  sv_Lernende Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail' Where Name='$Name' and Vorname='$Vorname' and(Klasse='$Modul1' or Klasse='$Modul2' or Klasse='$Modul3' or Klasse='$Modul3' or Klasse='$Modul4' or Klasse='$Modul5' or Klasse='$Modul6' or Klasse='$Modul7' or  Klasse='$Modul8' or Klasse='$Modul9' or Klasse='$Modul10' or Klasse='$Modul11' or Klasse='$Modul12')  ";
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

$sql_befehl1 = "Update  sv_LernendeModule Set Loginname='$LoginnameReal', User_ID='$LoginnameID', EMAIL='$LoginnameMail' Where ID='$Lernender'";
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