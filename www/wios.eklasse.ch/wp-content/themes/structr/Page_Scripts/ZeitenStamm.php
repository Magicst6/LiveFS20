<?

include 'db.php';


    $isEntry= "Select * From sv_Zeiten ";

    $result = mysqli_query($con, $isEntry);







    while( $value= mysqli_fetch_array($result)) {
		 $Zeit1= $value['Uhrzeit1'];
		 $Zeit2= $value['Uhrzeit2'];
	 $Zeit3= $value['Uhrzeit3'];
	 $Zeit4= $value['Uhrzeit4'];
	 $Zeit5= $value['Uhrzeit5'];
	 $Zeit6= $value['Uhrzeit6'];
	 $Zeit7= $value['Uhrzeit7'];
	 $Zeit8= $value['Uhrzeit8'];
	 $Zeit9= $value['Uhrzeit9'];
	 $Zeit10= $value['Uhrzeit10'];
	}

?>
<H4>Stundenzeiten</H4>
<form action=" /DBFuellung/DBFuellungZeiten.php" method="POST">
Hier können Sie die Stundenzeiten des Stundenplans eingeben<br><br>
    Stunde1: <input name=Zeit1 type="text" value="<? echo $Zeit1; ?>"><br><br>
    Stunde2: <input name=Zeit2 type="text" value="<? echo $Zeit2; ?>"><br><br>
	Stunde3: <input name=Zeit3 type="text" value="<? echo $Zeit3; ?>"><br><br>
	Stunde4: <input name=Zeit4 type="text" value="<? echo $Zeit4; ?>"><br><br>
	Stunde5: <input name=Zeit5 type="text" value="<? echo $Zeit5; ?>"><br><br>
	Stunde6: <input name=Zeit6 type="text" value="<? echo $Zeit6; ?>"><br><br>
	Stunde7: <input name=Zeit7 type="text" value="<? echo $Zeit7; ?>"><br><br>
	Stunde8: <input name=Zeit8 type="text" value="<? echo $Zeit8; ?>"><br><br>
	Stunde9: <input name=Zeit9 type="text" value="<? echo $Zeit9; ?>"><br><br>
	Stunde10: <input name=Zeit10 type="text" value="<? echo $Zeit10; ?>"><br><br>
	
	
	
    <input name="Senden" type="submit" value="Senden" />