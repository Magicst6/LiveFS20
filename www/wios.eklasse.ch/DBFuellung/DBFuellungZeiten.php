<?

include 'db.php';

if( $_POST['Senden'])
{
	
	$sql_befehl1="Delete From sv_Zeiten";	
	
	 mysqli_query($con, $sql_befehl1);
	for ($y=1;$y<7;$y++){
  $Zeit1= $_POST['Zeit1'.$y];
	 $Zeit2= $_POST['Zeit2'.$y];
	 $Zeit3= $_POST['Zeit3'.$y];
	 $Zeit4= $_POST['Zeit4'.$y];
	 $Zeit5= $_POST['Zeit5'.$y];
	 $Zeit6= $_POST['Zeit6'.$y];
	 $Zeit7= $_POST['Zeit7'.$y];
	 $Zeit8= $_POST['Zeit8'.$y];
	 $Zeit9= $_POST['Zeit9'.$y];
	 $Zeit10= $_POST['Zeit10'.$y];
	    echo 'test'.$Zeit1;
		
		if ($y==1) $Tag= 'Montag';
		if ($y==2) $Tag= 'Dienstag';
		if ($y==3) $Tag= 'Mittwoch';
		if ($y==4) $Tag= 'Donnerstag';
		if ($y==5) $Tag= 'Freitag';
		if ($y==6) $Tag= 'Samstag';
         
		
			 
$sql_befehl="Insert Into sv_Zeiten (Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10,Tag) VALUES ('$Zeit1','$Zeit2','$Zeit3','$Zeit4','$Zeit5','$Zeit6','$Zeit7','$Zeit8','$Zeit9','$Zeit10','$Tag')";	
	
	 mysqli_query($con, $sql_befehl);

	
	}
		



	
	
}
header('Location:'.$_SERVER['HTTP_REFERER']);