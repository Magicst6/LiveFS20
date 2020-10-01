<?

include 'db.php';


    $isEntry= "Select * From sv_Zeiten ";

    $result = mysqli_query($con, $isEntry);







    while( $value= mysqli_fetch_array($result)) {
		$Tag=$value['Tag'];   
		switch ($Tag) {
        case 'Montag':
            	$Zeit11= $value['Uhrzeit1'];
		 $Zeit21= $value['Uhrzeit2'];
	 $Zeit31= $value['Uhrzeit3'];
	 $Zeit41= $value['Uhrzeit4'];
	 $Zeit51= $value['Uhrzeit5'];
	 $Zeit61= $value['Uhrzeit6'];
	 $Zeit71= $value['Uhrzeit7'];
	 $Zeit81= $value['Uhrzeit8'];
	 $Zeit91= $value['Uhrzeit9'];
	 $Zeit101= $value['Uhrzeit10'];
            break;
        case 'Dienstag':
            	$Zeit12= $value['Uhrzeit1'];
		 $Zeit22= $value['Uhrzeit2'];
	 $Zeit32= $value['Uhrzeit3'];
	 $Zeit42= $value['Uhrzeit4'];
	 $Zeit52= $value['Uhrzeit5'];
	 $Zeit62= $value['Uhrzeit6'];
	 $Zeit72= $value['Uhrzeit7'];
	 $Zeit82= $value['Uhrzeit8'];
	 $Zeit92= $value['Uhrzeit9'];
	 $Zeit102= $value['Uhrzeit10'];
            break;
        case 'Mittwoch':
           	$Zeit13= $value['Uhrzeit1'];
		 $Zeit23= $value['Uhrzeit2'];
	 $Zeit33= $value['Uhrzeit3'];
	 $Zeit43= $value['Uhrzeit4'];
	 $Zeit53= $value['Uhrzeit5'];
	 $Zeit63= $value['Uhrzeit6'];
	 $Zeit73= $value['Uhrzeit7'];
	 $Zeit83= $value['Uhrzeit8'];
	 $Zeit93= $value['Uhrzeit9'];
	 $Zeit103= $value['Uhrzeit10'];
            break;
        case 'Donnerstag':
           	$Zeit14= $value['Uhrzeit1'];
		 $Zeit24= $value['Uhrzeit2'];
	 $Zeit34= $value['Uhrzeit3'];
	 $Zeit44= $value['Uhrzeit4'];
	 $Zeit54= $value['Uhrzeit5'];
	 $Zeit64= $value['Uhrzeit6'];
	 $Zeit74= $value['Uhrzeit7'];
	 $Zeit84= $value['Uhrzeit8'];
	 $Zeit94= $value['Uhrzeit9'];
	 $Zeit104= $value['Uhrzeit10'];
            break;
        case 'Freitag':
           	$Zeit15= $value['Uhrzeit1'];
		 $Zeit25= $value['Uhrzeit2'];
	 $Zeit35= $value['Uhrzeit3'];
	 $Zeit45= $value['Uhrzeit4'];
	 $Zeit55= $value['Uhrzeit5'];
	 $Zeit65= $value['Uhrzeit6'];
	 $Zeit75= $value['Uhrzeit7'];
	 $Zeit85= $value['Uhrzeit8'];
	 $Zeit95= $value['Uhrzeit9'];
	 $Zeit105= $value['Uhrzeit10'];
            break;
        case 'Samstag':
          	$Zeit16= $value['Uhrzeit1'];
		 $Zeit26= $value['Uhrzeit2'];
	 $Zeit36= $value['Uhrzeit3'];
	 $Zeit46= $value['Uhrzeit4'];
	 $Zeit56= $value['Uhrzeit5'];
	 $Zeit66= $value['Uhrzeit6'];
	 $Zeit76= $value['Uhrzeit7'];
	 $Zeit86= $value['Uhrzeit8'];
	 $Zeit96= $value['Uhrzeit9'];
	 $Zeit106= $value['Uhrzeit10'];
            break;
		}
	
	}

?>
<H4>Stundenzeiten</H4>
<form action=" /DBFuellung/DBFuellungZeiten.php" method="POST">
Hier können Sie die Stundenzeiten des Stundenplans eingeben<br>
	
	<table border="1" cellpadding="5" cellspacing="5">
<tr>
<th>Stunden</th>	
<th>Montag</th>
<th>Dienstag</th>
<th>Mittwoch</th>
<th>Donnerstag</th>
<th>Freitag</th>
<th>Samstag</th>
</tr>
<tr>
<td>Stunde1</td>	
<td><input style="width:100px" name=Zeit11 type="text" value="<? echo $Zeit11; ?>"></td>
<td><input name=Zeit12 style="width:100px" type="text" value="<? echo $Zeit12; ?>"></td>
<td><input name=Zeit13 style="width:100px" type="text" value="<? echo $Zeit13; ?>"></td>
<td><input name=Zeit14 style="width:100px" type="text" value="<? echo $Zeit14; ?>"></td>
<td><input name=Zeit15 type="text" style="width:100px" value="<? echo $Zeit15; ?>"></td>
<td><input name=Zeit16 style="width:100px" type="text" value="<? echo $Zeit16; ?>"></td>
</tr>
<tr>
<td>Stunde2</td>	
<td><input style="width:100px" name=Zeit21 type="text" value="<? echo $Zeit21; ?>"></td>
<td><input name=Zeit22 style="width:100px" type="text" value="<? echo $Zeit22; ?>"></td>
<td><input name=Zeit23 style="width:100px" type="text" value="<? echo $Zeit23; ?>"></td>
<td><input name=Zeit24 style="width:100px" type="text" value="<? echo $Zeit24; ?>"></td>
<td><input name=Zeit25 type="text" style="width:100px" value="<? echo $Zeit25; ?>"></td>
<td><input name=Zeit26 style="width:100px" type="text" value="<? echo $Zeit26; ?>"></td>
</tr>
<tr>
<td>Stunde3</td>	
<td><input style="width:100px" name=Zeit31 type="text" value="<? echo $Zeit31; ?>"></td>
<td><input name=Zeit32 style="width:100px" type="text" value="<? echo $Zeit32; ?>"></td>
<td><input name=Zeit33 style="width:100px" type="text" value="<? echo $Zeit33; ?>"></td>
<td><input name=Zeit34 style="width:100px" type="text" value="<? echo $Zeit34; ?>"></td>
<td><input name=Zeit35 type="text" style="width:100px" value="<? echo $Zeit35; ?>"></td>
<td><input name=Zeit36 style="width:100px" type="text" value="<? echo $Zeit36; ?>"></td>
</tr>
<tr>
<td>Stunde4</td>	
<td><input style="width:100px" name=Zeit41 type="text" value="<? echo $Zeit41; ?>"></td>
<td><input name=Zeit42 style="width:100px" type="text" value="<? echo $Zeit42; ?>"></td>
<td><input name=Zeit43 style="width:100px" type="text" value="<? echo $Zeit43; ?>"></td>
<td><input name=Zeit44 style="width:100px" type="text" value="<? echo $Zeit44; ?>"></td>
<td><input name=Zeit45 type="text" style="width:100px" value="<? echo $Zeit45; ?>"></td>
<td><input name=Zeit46 style="width:100px" type="text" value="<? echo $Zeit46; ?>"></td>
</tr>	
<tr>
<td>Stunde5</td>	
<td><input style="width:100px" name=Zeit51 type="text" value="<? echo $Zeit51; ?>"></td>
<td><input name=Zeit52 style="width:100px" type="text" value="<? echo $Zeit52; ?>"></td>
<td><input name=Zeit53 style="width:100px" type="text" value="<? echo $Zeit53; ?>"></td>
<td><input name=Zeit54 style="width:100px" type="text" value="<? echo $Zeit54; ?>"></td>
<td><input name=Zeit55 type="text" style="width:100px" value="<? echo $Zeit55; ?>"></td>
<td><input name=Zeit56 style="width:100px" type="text" value="<? echo $Zeit56; ?>"></td>
</tr>
<tr>
<td>Stunde6</td>	
<td><input style="width:100px" name=Zeit61 type="text" value="<? echo $Zeit61; ?>"></td>
<td><input name=Zeit62 style="width:100px" type="text" value="<? echo $Zeit62; ?>"></td>
<td><input name=Zeit63 style="width:100px" type="text" value="<? echo $Zeit63; ?>"></td>
<td><input name=Zeit64 style="width:100px" type="text" value="<? echo $Zeit64; ?>"></td>
<td><input name=Zeit65 type="text" style="width:100px" value="<? echo $Zeit65; ?>"></td>
<td><input name=Zeit66 style="width:100px" type="text" value="<? echo $Zeit66; ?>"></td>
</tr>
<tr>
<td>Stunde7</td>	
<td><input style="width:100px" name=Zeit71 type="text" value="<? echo $Zeit71; ?>"></td>
<td><input name=Zeit72 style="width:100px" type="text" value="<? echo $Zeit72; ?>"></td>
<td><input name=Zeit73 style="width:100px" type="text" value="<? echo $Zeit73; ?>"></td>
<td><input name=Zeit74 style="width:100px" type="text" value="<? echo $Zeit74; ?>"></td>
<td><input name=Zeit75 type="text" style="width:100px" value="<? echo $Zeit75; ?>"></td>
<td><input name=Zeit76 style="width:100px" type="text" value="<? echo $Zeit76; ?>"></td>
</tr>
<tr>
<td>Stunde8</td>	
<td><input style="width:100px" name=Zeit81 type="text" value="<? echo $Zeit81; ?>"></td>
<td><input name=Zeit82 style="width:100px" type="text" value="<? echo $Zeit82; ?>"></td>
<td><input name=Zeit83 style="width:100px" type="text" value="<? echo $Zeit83; ?>"></td>
<td><input name=Zeit84 style="width:100px" type="text" value="<? echo $Zeit84; ?>"></td>
<td><input name=Zeit85 type="text" style="width:100px" value="<? echo $Zeit85; ?>"></td>
<td><input name=Zeit86 style="width:100px" type="text" value="<? echo $Zeit86; ?>"></td>
</tr>
<tr>
<td>Stunde9</td>	
<td><input style="width:100px" name=Zeit91 type="text" value="<? echo $Zeit91; ?>"></td>
<td><input name=Zeit92 style="width:100px" type="text" value="<? echo $Zeit92; ?>"></td>
<td><input name=Zeit93 style="width:100px" type="text" value="<? echo $Zeit93; ?>"></td>
<td><input name=Zeit94 style="width:100px" type="text" value="<? echo $Zeit94; ?>"></td>
<td><input name=Zeit95 type="text" style="width:100px" value="<? echo $Zeit95; ?>"></td>
<td><input name=Zeit96 style="width:100px" type="text" value="<? echo $Zeit96; ?>"></td>
		</tr>
<tr>
<td>Stunde10</td>	
<td><input style="width:100px" name=Zeit101 type="text" value="<? echo $Zeit101; ?>"></td>
<td><input name=Zeit102 style="width:100px" type="text" value="<? echo $Zeit102; ?>"></td>
<td><input name=Zeit103 style="width:100px" type="text" value="<? echo $Zeit103; ?>"></td>
<td><input name=Zeit104 style="width:100px" type="text" value="<? echo $Zeit104; ?>"></td>
<td><input name=Zeit105 type="text" style="width:100px" value="<? echo $Zeit105; ?>"></td>
<td><input name=Zeit106 style="width:100px" type="text" value="<? echo $Zeit106; ?>"></td>
</tr>
</table>
	

	
	
    <input name="Senden" type="submit" value="Senden" />