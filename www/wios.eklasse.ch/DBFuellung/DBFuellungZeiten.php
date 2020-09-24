<?

include 'db.php';

if( $_POST['Senden'])
{
  $Zeit1= $_POST['Zeit1'];
	 $Zeit2= $_POST['Zeit2'];
	 $Zeit3= $_POST['Zeit3'];
	 $Zeit4= $_POST['Zeit4'];
	 $Zeit5= $_POST['Zeit5'];
	 $Zeit6= $_POST['Zeit6'];
	 $Zeit7= $_POST['Zeit7'];
	 $Zeit8= $_POST['Zeit8'];
	 $Zeit9= $_POST['Zeit9'];
	 $Zeit10= $_POST['Zeit10'];
	
		
$sql_befehl1="Delete From sv_Zeiten";	
	
	 mysqli_query($con, $sql_befehl1);

	
$sql_befehl="Insert Into sv_Zeiten (Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10) VALUES ('$Zeit1','$Zeit2','$Zeit3','$Zeit4','$Zeit5','$Zeit6','$Zeit7','$Zeit8','$Zeit9','$Zeit10')";	
	
	 mysqli_query($con, $sql_befehl);

	
	
}
header('Location:'.$_SERVER['HTTP_REFERER']);