



<?php
include 'db.php';



$ID = $_GET[ 'k' ];
$Name = $_GET[ 'l' ];
$Vorname = $_GET[ 'm' ];
$Profil = $_GET[ 'n' ];
$Loginname = $_GET[ 'o' ];
$EMail = $_GET[ 'p' ];

//$ID = $_GET[ 'k' ];

$isEntry= "Select * From sv_Lernende where ID='$ID'  ";

$result = mysqli_query($con, $isEntry);

while ($row = mysqli_fetch_array($result)) {
	$Nameold=$row['Name'];
    $Vornameold=$row['Vorname'];
	$EMailold=$row['EMail'];
}
$isEntry = "Update sv_LernendeModule SET Name='$Name', Vorname='$Vorname',Profil='$Profil',Loginname='$Loginname', EMail='$EMail'  Where Name='$Nameold' and Vorname='$Vornameold' and EMail='$EMailold'";
 mysqli_query( $con, $isEntry);


$isEntry = "Update sv_Lernende SET Name='$Name', Vorname='$Vorname',Profil='$Profil',Loginname='$Loginname', EMail='$EMail' where Name='$Nameold' and Vorname='$Vornameold' and EMail='$EMailold'";
if (mysqli_query( $con, $isEntry) === TRUE) {
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
	$Loginname=$row['Loginname'];
    $isEntry4= "Select ID  From sv_LernendeModule";

    $result4 = mysqli_query($con, $isEntry4);
    while ($row4= mysqli_fetch_array($result4)) {
        if ($ID==$row4['ID'])
        {
            $query4 = "Update sv_LernendeModule Set Name='$Name' , Vorname='$Vorname' , EMail='$EMail', User_ID='$UserID', Profil='$Profil',Loginname='$Loginname' Where ID='$ID' ";
            mysqli_query($con, $query4);
        }
    }
$x=1;
    $isEntry1= "Select *  From sv_Lernende Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'";

    $result1 = mysqli_query($con, $isEntry1);
    
    while ($row1= mysqli_fetch_array($result1)) {
 
        $isEntry2= "Select *  From sv_LernendeModule Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'";

        $result2 = mysqli_query($con, $isEntry2);
        $ID2="";
        while ($row2= mysqli_fetch_array($result2)) {
            $ID2=$row2['ID'];
        }

        if ($x==1 and $ID2=="") {
            $Klasse1=$row1['Klasse'];
            $query1 = "INSERT INTO sv_LernendeModule (Name, Vorname,EMail,Profil,User_ID,ID,Loginname,Modul1)  VALUES ('$Name', '$Vorname', '$EMail','$Profil','$UserID','$ID','$Loginname','$Klasse1')";
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
	
for($z=$x;$z<13;$z++)
{
	$Modul="Modul".$z;

$query2 = "Update sv_LernendeModule Set $Modul='' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query2);
			
}




}
	$isEntry2= "Select *  From sv_LernendeModule ";

        $result2 = mysqli_query($con, $isEntry2);
        $ID2="";
        while ($row2= mysqli_fetch_array($result2)) {
            
			$ID=$row2['ID'];
			$Name=$row2['Name'];
			$Vorname=$row2['Vorname'];
			$EMail=$row2['EMail'];
			$check='none';
			$isEntry10= "Select *  From sv_Lernende Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail'";
			 $result10 = mysqli_query($con, $isEntry10);
        
        while ($row10= mysqli_fetch_array($result10)) {
			
			$check=$row10['ID'];
		}
            if ($check=='none'){
				$Modul="Modul1";

$query11 = "Update sv_LernendeModule Set $Modul='' Where Name='$Name' and Vorname='$Vorname' and EMail='$EMail' ";

                mysqli_query($con, $query11);
				
			}
        }

?>







    <?php
	
	include "db.php";

   
        $Klassenname = $_GET['q'];

      


        echo 'Klassenname: ';

        echo $Klassenname;



        echo '<table id="table_id" class="display">';

        //Schreibe Spaltennamen

        echo "<thead>";

        echo "<tr>";

        echo "<th width=80>".'ID'."</th>";

        echo "<th width=200>".'Nachname'. "</th>";

        echo "<th width= 200>".'Vorname'. "</th>";

        echo "<th width= 75>".'Profil'. "</th>";

        echo "<th width=200>".'Loginname'. "</th>";

        echo "<th width= 220>".'E-Mail'. "</th>";

        echo "</tr>";



        echo "</thead>";



        echo "<tbody>";

        include 'db.php';

        $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_Lernende Where Klasse='$Klassenname' Order by Name";

        $result = mysqli_query($con,$isEntry);

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

            echo '<td><input name="ID1'.$y.'"  id="ID1'.$y.'" style="width: 80px" type="text"  value='.$ID.'  readonly></td>';

            echo '<td><input  name="Nachname1'.$y.'"  id="Nachname1'.$y.'" style="width: 200px" type="text"  value='.$Name.'   ></td>';

            echo '<td><input name="Vorname1'.$y.'"  id="Vorname1'.$y.'" type="text" value='.$Vorname.' style="width: 200px"  ></td>';

            echo '<td><input name="Profil'.$y.'" id="Profil'.$y.'" type="text" style="width: 75px" value='.$Profil.'  ></td>';

            echo '<td><input name="Loginname1'.$y.'" id="Loginname1'.$y.'" type="text" style="width: 200px" value='.$Loginname.'  ></td>';

            echo '<td><input name="EMail1'.$y.'" id="EMail1'.$y.'" type="text" style="width: 220px" value='.$EMail.'  ></td>';
			 
			echo '<td><input name="Delete'.$y.'" onclick="del('.$ID.')" type="button" value="Löschen"   style="width: 75px" ></td>';
			
			echo '<td><input name="Update'.$y.'" onclick="updateSchueler('.$y.')"  type="button" value="Update" style="width: 70px" ></td>';



            echo "</tr>";

            $y=$y+1;

        }

        echo "</tbody>";

        echo "</table>";

        echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';

        echo '<input name="AnzahlSch" type="hidden" value="'.$y.'" /> ';





    printf("Eintrag aktualisiert!\n");
}
 
  








    



    ?>

<?php

$isEntry= "Select KursID, Klasse From sv_Kurse";
$result1 = mysqli_query($con, $isEntry);
while( $row5= mysqli_fetch_array($result1))
{

    $Klasse =  $row5['Klasse'];
    $Kursname =  $row5['KursID'];

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


    $isEntry2= "Select Name, Vorname, ID, Profil From sv_LernendeModule Where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse' ";


    $result2 = mysqli_query($con, $isEntry2);

    while ($row2 = mysqli_fetch_array($result2)) {
        $dontFill=0;
        $SchuelerID= $row2['ID'];
        $Vorname= $row2['Vorname'];
        $Nachname= $row2['Name'];
        $Profil1= $row2['Profil'];

        preg_match("/.fz./", $Kursname, $output_array1);
        $KursnameReg=$output_array1[0];
        preg_match("/e/", $Profil1, $output_array2);
        $ProfilReg=$output_array2[0];
        preg_match("/.itplus./", $Kursname, $output_array3);
        $KursnameReg1=$output_array3[0];
             preg_match("/.it./", strtolower($Kursname), $output_array3);
$KursnameReg2=$output_array3[0];
preg_match("/it/", strtolower($Profil1), $output_array4);
$ProfilReg1=$output_array4[0];

if ((($KursnameReg=='.fz.') and ($ProfilReg=='e')) or (($KursnameReg<>'.fz.') and (($KursnameReg1<>'.itplus.') and ($KursnameReg2 <> '.it.'))) or ((($KursnameReg1=='.itplus.') or ($KursnameReg2 == '.it.')) and ($ProfilReg1=='it'))) {
            $isEntry4= "Select SchülerID, Vorname, Nachname, KursID From sv_LernenderKurs";
            $result4 = mysqli_query($con, $isEntry4);

            while ($row4 = mysqli_fetch_array($result4)) {
                $ID1= $row4['SchülerID'];
                $KursnameAbw =  $row4['KursID'];
                $VornameAbw= $row4['Vorname'];
                $NachnameAbw= $row4['Nachname'];

                if ( ($SchuelerID==$ID1) and ($Kursname==$KursnameAbw) and (($Vorname<>$VornameAbw) or ($Nachname<>$NachnameAbw) ))
                {
                    $sql_befehl = "Update sv_LernenderKurs SET Vorname='$Vorname', Nachname='$Nachname' Where SchülerID='$ID1' and KursID='$Kursname'";
                    mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
                    $dontFill=1;
                }







                if ( ($SchuelerID==$ID1) and ($Kursname==$KursnameAbw) and  ($Vorname==$VornameAbw) and ($Nachname==$NachnameAbw) )
                {
                    $dontFill=1;
                }
            }

            if ($dontFill == 0 and strpos($Kursname, $Klasse) !== false){
                $sql_befehl = "INSERT INTO sv_LernenderKurs (KursID, SchülerID, Klasse, Vorname, Nachname) VALUES ('$Kursname', '$SchuelerID', '$Klasse', '$Vorname','$Nachname')";
                mysqli_query($con, $sql_befehl);
//echo "Eintrag hinzugefügt!";
            }

        }
    }
}



?>


   

</body>

</html>

