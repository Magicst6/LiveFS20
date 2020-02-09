<?
include 'db.php';
 
	

    global $current_user;

    get_currentuserinfo();



   

$isEntry= "Select ID From sv_Lehrpersonen where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_assoc($result))

{

    $value=$line2['ID'];



    $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Nachname'];

        $Vorname = $line3['Vorname'];



    }










    echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}






$select='Select KursID, Sum(Lektionen) from sv_Kurshistorie where KursID in (Select KursID from sv_Kurse where Lehrperson="';
 $sel1=$value;
		
$sel2= '") and Stattgefunden="ja" Group by KursID';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2' where post_id='18148' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	


?>
