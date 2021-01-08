

<?php
include 'db.php';

$Lehrer = $_GET['q'];


$semester = $_GET['k'];

$datestart = $_GET['d'];

  preg_match("/:(.*)/", $Lehrer, $output_array);

        $lid=$output_array[1];

//echo $lid;
   

for($y = 1; $y < 7; $y++) {
	
	if ($y==1) $Tag= 'Montag';
		if ($y==2) $Tag= 'Dienstag';
		if ($y==3) $Tag= 'Mittwoch';
		if ($y==4) $Tag= 'Donnerstag';
		if ($y==5) $Tag= 'Freitag';
		if ($y==6) $Tag= 'Samstag';
	
	   $isEntryZt= "Select * From sv_Zeiten where Tag='$Tag'";

    $resultZt = mysqli_query($con, $isEntryZt);







    while( $value= mysqli_fetch_array($resultZt)) {
		
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
	
    ${'Uhr1' . $y} = $Zeit1;

    ${'Uhr2' . $y} = $Zeit2;

    ${'Uhr3' . $y} = $Zeit3;

    ${'Uhr4' . $y} = $Zeit4;

    ${'Uhr5' . $y} = $Zeit5;

    ${'Uhr6' . $y} = $Zeit6;

    ${'Uhr7' . $y} = $Zeit7;

    ${'Uhr8' . $y} = $Zeit8;

    ${'Uhr9' . $y} = $Zeit9;

    ${'Uhr10' . $y} = $Zeit10;

}
$test_datum = $datestart;
$wochentage = array ('So','Mo','Di','Mi','Do','Fr','Sa');
list ($jahr, $monat, $tag) = explode ('-', $test_datum) ;
$datum = getdate(mktime ( 0,0,0, $monat, $tag, $jahr));
$wochentagz = $datum['wday'];
$wochentag= $wochentage[$wochentagz];

if ($wochentag=='Mo'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datestart;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}

if ($wochentag=='Di'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+0 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}

if ($wochentag=='Mi'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+0 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}

if ($wochentag=='Do'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+0 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}

if ($wochentag=='Fr'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+0 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}

if ($wochentag=='Sa'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+0 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}
if ($wochentag=='So'){
for ($z = 1; $z <= 10; $z++) {
	for($y = 1; $y < 7; $y++)   {
						switch ($y) {
        case 1:
								
				$datesp=date('Y-m-d', strtotime("+1 day", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 2:
							$datesp=date('Y-m-d', strtotime("+2 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 3:
           	$datesp=date('Y-m-d', strtotime("+3 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 4:
           	$datesp=date('Y-m-d', strtotime("+4 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 5:
          	$datesp=date('Y-m-d', strtotime("+5 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
        case 6:
         	$datesp=date('Y-m-d', strtotime("+6 days", strtotime($datestart)));	
             ${'Date' . $z . $y} = $datesp;
            break;
    }
	}
	}
}


for($y = 1; $y < 7; $y++)   {
    switch ($y) {
        case 1:
            $Tag= 'Montag';
            break;
        case 2:
            $Tag= 'Dienstag';
            break;
        case 3:
            $Tag= 'Mittwoch';
            break;
        case 4:
            $Tag= 'Donnerstag';
            break;
        case 5:
            $Tag= 'Freitag';
            break;
        case 6:
            $Tag= 'Samstag';
            break;
    }

	
//Daten in DB speichern

    $isEntry = "Select * From sv_Kurse Where Lehrperson='$lid' and Tag='$Tag' ";
	$isStdpln=0;
    $entry = mysqli_query($con,$isEntry);
    while( $line2= mysqli_fetch_assoc($entry)) {
		
		
        $isEntry1 = "Select Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10 From sv_ZeitenStundenplan where Tag='$Tag' and Semester='$semester' ";
        $entry1 = mysqli_query($con, $isEntry1);
        while ($line4 = mysqli_fetch_assoc($entry1)) {
                   $Klasse=$line4['Klasse'];
			
			
            for ($z = 1; $z <= 10; $z++) {
                $Uhrzeit = "Uhrzeit" . "$z";
				 
                $UhrzeitV = $line4[$Uhrzeit];
                    
                if ($UhrzeitV == $line2['Uhrzeit'].":00" and $line2['Uhrzeit']<>"" )  {
                  // echo "test";
					$Uhr = ${'Uhr' . $z . $y} = $line2['Uhrzeit'];
                    preg_match("/\.(.*?)\./", $line2['KursID'], $output_array);
                    ${'Kurs' . $z . $y} = $line2['KursID'];

                   
                    $isEntry1 = "Select Startdatum,Farbe From sv_Kurse Where Lehrperson='$lid' and Tag='$Tag' and Uhrzeit='$Uhr '";
                    $entry1 = mysqli_query($con, $isEntry1);
                    while ($line3 = mysqli_fetch_assoc($entry1)) {
						$Kursname=$line3['KursID'];
					  $Kursarr = explode('.', $Kursname);
                   $Klassenname=$Kursarr[0];
						//echo $Klassenname;
						if ($Klasse==$Klassenname)
						{
							$isStdpln=1;
						${'Date' . $z . $y} = $line3['Startdatum'];
						
                       
                        ${'col' . $z . $y} = $line3['Farbe'];
						}
                    }
                }
            }


        }
   

        
    
    unset(${'Kurs'.$z.$y});
    unset(${'Date'.$z.$y});
    unset(${'col'.$z.$y});


	
	}
	}

?>






<div style="overflow-x:auto;"></div>
<table class="blueTable" style="width: 1500px; height: 994px;">
    <tbody>
    <tr style="height: 50px;">
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1" style="width: 180px;  font-size: 16px;">Montag</td>
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1" style="width: 163px;  font-size: 16px;">Dienstag</td>
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1" style="width: 184px;  font-size: 16px;">Mittwoch</td>
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1"  style="width: 201px;  font-size: 16px;">Donnerstag</td
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1" style="width: 182px;  font-size: 16px;">Freitag</td>
        <td class="auto-style1"  style="width: 50px;"></td>
        <td class="auto-style1"  style="width: 229px;  font-size: 16px;">Samstag</td>
    </tr>


    <tr>

        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr11" type="time" value="<?php echo $Uhr11;?>"  />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text11" onchange="check(this.value,'Montag','<?php echo $Uhr11;?>')" type="text" value="<?php echo $Kurs11;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where  Lehrperson='$lid'  Group by KursID"; echo "<option>" . $Kurs11 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			
			
			<input style="width: 145px;" name="Date11"    type="date" value="<?php echo $Date11;?>" /></td>
		<td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr12" type="time" value="<?php echo $Uhr12;?>"  />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text12" onchange="check(this.value,'Dienstag','<?php echo $Uhr12;?>')" type="text" value="<?php echo $Kurs12;?>"  />
			
			   <? $isEntry2= "Select KursID From sv_Kurse where  Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs12 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date12" type="date" value="<?php echo $Date12;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr13" type="time" value="<?php echo $Uhr13;?>"  />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text13" onchange="check(this.value,'Mittwoch','<?php echo $Uhr13;?>')" type="text" value="<?php echo $Kurs13;?>"  />
			
		  <? $isEntry2= "Select KursID From sv_Kurse  where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs13 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date13" type="date" value="<?php echo $Date13;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr14" type="time" value="<?php echo $Uhr14;?>"  />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text14" onchange="check(this.value,'Donnerstag','<?php echo $Uhr14;?>')" type="text" value="<?php echo $Kurs14;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs14 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date14" type="date" value="<?php echo $Date14;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr15" type="time" value="<?php echo $Uhr15;?>"  />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text15" onchange="check(this.value,'Freitag','<?php echo $Uhr15;?>')" type="text" value="<?php echo $Kurs15;?>"  />
			 <? $isEntry2= "Select KursID From sv_Kurse where  Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs15 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date15" type="date" value="<?php echo $Date15;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr16" type="time" value="<?php echo $Uhr16;?>"  />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text16" onchange="check(this.value,'Samstag','<?php echo $Uhr16;?>')" type="text" value="<?php echo $Kurs16;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs16 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date16" type="date" value="<?php echo $Date16;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr21" type="time" value="<?php echo $Uhr21;?>"  />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text21" onchange="check(this.value,'Montag','<?php echo $Uhr21;?>')" type="text" value="<?php echo $Kurs21;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs21 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date21" type="date" value="<?php echo $Date21;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr22" type="time" value="<?php echo $Uhr22;?>"  />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text22" onchange="check(this.value,'Dienstag','<?php echo $Uhr22;?>')" type="text" value="<?php echo $Kurs22;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs22 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date22" type="date" value="<?php echo $Date22;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr23" type="time" value="<?php echo $Uhr23;?>"  />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text23" onchange="check(this.value,'Mittwoch','<?php echo $Uhr23;?>')" type="text" value="<?php echo $Kurs23;?>"  />
			
		  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs23 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date23" type="date" value="<?php echo $Date23;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr24" type="time" value="<?php echo $Uhr24;?>"  />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text24" onchange="check(this.value,'Donnerstag','<?php echo $Uhr24;?>')" type="text" value="<?php echo $Kurs24;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs24 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date24" type="date" value="<?php echo $Date24;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr25" type="time" value="<?php echo $Uhr25;?>"  />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text25" onchange="check(this.value,'Freitag','<?php echo $Uhr25;?>')" type="text" value="<?php echo $Kurs25;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs25 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date25" type="date" value="<?php echo $Date25;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr26" type="time" value="<?php echo $Uhr26;?>"  />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text26" onchange="check(this.value,'Samstag','<?php echo $Uhr26;?>')" type="text" value="<?php echo $Kurs26;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs26 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date26" type="date" value="<?php echo $Date26;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr31" type="time" value="<?php echo $Uhr31;?>"  />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text31" onchange="check(this.value,'Montag','<?php echo $Uhr31;?>')" type="text" value="<?php echo $Kurs31;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs31 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date31" type="date" value="<?php echo $Date31;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr32" type="time" value="<?php echo $Uhr32;?>"  />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text32" onchange="check(this.value,'Dienstag','<?php echo $Uhr32;?>')" type="text" value="<?php echo $Kurs32;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs32 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date32" type="date" value="<?php echo $Date32;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr33" type="time" value="<?php echo $Uhr33;?>"  />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text33" onchange="check(this.value,'Mittwoch','<?php echo $Uhr33;?>')" type="text" value="<?php echo $Kurs33;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs33 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date33" type="date" value="<?php echo $Date33;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr34" type="time" value="<?php echo $Uhr34;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text34" onchange="check(this.value,'Donnerstag','<?php echo $Uhr34;?>')" type="text" value="<?php echo $Kurs34;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs34 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date34" type="date" value="<?php echo $Date34;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr35" type="time" value="<?php echo $Uhr35;?>"/>
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text35" onchange="check(this.value,'Freitag','<?php echo $Uhr35;?>')" type="text" value="<?php echo $Kurs35;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs35 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date35" type="date" value="<?php echo $Date35;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr36" type="time" value="<?php echo $Uhr36;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text36" onchange="check(this.value,'Samstag','<?php echo $Uhr36;?>')" type="text" value="<?php echo $Kurs36;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs36 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date36" type="date" value="<?php echo $Date36;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr41" type="time" value="<?php echo $Uhr41;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text41" onchange="check(this.value,'Montag','<?php echo $Uhr41;?>')" type="text" value="<?php echo $Kurs41;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs41 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date41" type="date" value="<?php echo $Date41;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr42"  type="time" value="<?php echo $Uhr42;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text42" onchange="check(this.value,'Dienstag','<?php echo $Uhr42;?>')" type="text" value="<?php echo $Kurs42;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs42 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date42" type="date" value="<?php echo $Date42;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr43" type="time" value="<?php echo $Uhr43;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text43" onchange="check(this.value,'Mittwoch','<?php echo $Uhr43;?>')" type="text" value="<?php echo $Kurs43;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs43 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date43" type="date" value="<?php echo $Date43;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr44" type="time" value="<?php echo $Uhr44;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text44" onchange="check(this.value,'Donnerstag','<?php echo $Uhr44;?>')" type="text" value="<?php echo $Kurs44;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs44 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date44" type="date" value="<?php echo $Date44;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr45" type="time" value="<?php echo $Uhr45;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text45" onchange="check(this.value,'Freitag','<?php echo $Uhr45;?>')" type="text" value="<?php echo $Kurs45;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs45 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date45" type="date" value="<?php echo $Date45;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr46" type="time" value="<?php echo $Uhr46;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text46" onchange="check(this.value,'Samstag','<?php echo $Uhr46;?>')" type="text" value="<?php echo $Kurs46;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs46 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date46" type="date" value="<?php echo $Date46;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr51" type="time" value="<?php echo $Uhr51;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text51" onchange="check(this.value,'Montag','<?php echo $Uhr51;?>')" type="text" value="<?php echo $Kurs51;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs51 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date51" type="date" value="<?php echo $Date51;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr52" type="time" value="<?php echo $Uhr52;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text52" onchange="check(this.value,'Dienstag','<?php echo $Uhr52;?>')" type="text" value="<?php echo $Kurs52;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs52 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date52" type="date" value="<?php echo $Date52;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr53" type="time" value="<?php echo $Uhr53;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text53" onchange="check(this.value,'Mittwoch','<?php echo $Uhr53;?>')" type="text" value="<?php echo $Kurs53;?>"  />
			
			   <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs53 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date53" type="date" value="<?php echo $Date53;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr54" type="time" value="<?php echo $Uhr54;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text54" onchange="check(this.value,'Donnerstag','<?php echo $Uhr54;?>')" type="text" value="<?php echo $Kurs54;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs54 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date54" type="date" value="<?php echo $Date54;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr55" type="time" value="<?php echo $Uhr55;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text55" onchange="check(this.value,'Freitag','<?php echo $Uhr55;?>')" type="text" value="<?php echo $Kurs55;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs55 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date55" type="date" value="<?php echo $Date55;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr56" type="time" value="<?php echo $Uhr56;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text56" onchange="check(this.value,'Samstag','<?php echo $Uhr56;?>')" type="text" value="<?php echo $Kurs56;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs56 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date56" type="date" value="<?php echo $Date56;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr61" type="time" value="<?php echo $Uhr61;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text61" onchange="check(this.value,'Montag','<?php echo $Uhr61;?>')" type="text" value="<?php echo $Kurs61;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs61 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option> where Lehrperson='$lid' Group by KursID"; }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date61" type="date" value="<?php echo $Date61;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr62" type="time" value="<?php echo $Uhr62;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text62" onchange="check(this.value,'Dienstag','<?php echo $Uhr62;?>')" type="text" value="<?php echo $Kurs62;?>"  />
			
			   <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs62 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date62" type="date" value="<?php echo $Date62;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr63" type="time" value="<?php echo $Uhr63;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text63" onchange="check(this.value,'Mittwoch','<?php echo $Uhr63;?>')" type="text" value="<?php echo $Kurs63;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs63 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date63" type="date" value="<?php echo $Date63;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr64" type="time" value="<?php echo $Uhr64;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text64" onchange="check(this.value,'Donnerstag','<?php echo $Uhr64;?>')" type="text" value="<?php echo $Kurs64;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs64 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date64" type="date" value="<?php echo $Date64;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr65" type="time" value="<?php echo $Uhr65;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text65" onchange="check(this.value,'Freitag','<?php echo $Uhr65;?>')" type="text" value="<?php echo $Kurs65;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs65 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date65" type="date" value="<?php echo $Date65;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr66" type="time" value="<?php echo $Uhr66;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text66" onchange="check(this.value,'Samstag','<?php echo $Uhr66;?>')" type="text" value="<?php echo $Kurs66;?>"  />
			
			    <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs66 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date66" type="date" value="<?php echo $Date66;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr71" type="time" value="<?php echo $Uhr71;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text71" onchange="check(this.value,'Montag','<?php echo $Uhr71;?>')" type="text" value="<?php echo $Kurs71;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs71 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date71" type="date" value="<?php echo $Date71;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr72" type="time" value="<?php echo $Uhr72;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text72" onchange="check(this.value,'Dienstag','<?php echo $Uhr72;?>')" type="text" value="<?php echo $Kurs72;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs72 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date72" type="date" value="<?php echo $Date72;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr73" type="time" value="<?php echo $Uhr73;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text73" onchange="check(this.value,'Mittwoch','<?php echo $Uhr73;?>')" type="text" value="<?php echo $Kurs73;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs73 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date73" type="date" value="<?php echo $Date73;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr74" type="time" value="<?php echo $Uhr74;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text74" onchange="check(this.value,'Donnerstag','<?php echo $Uhr74;?>')" type="text" value="<?php echo $Kurs74;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs74 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date74" type="date" value="<?php echo $Date74;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr75" type="time" value="<?php echo $Uhr75;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text75" onchange="check(this.value,'Freitag','<?php echo $Uhr75;?>')" type="text" value="<?php echo $Kurs75;?>"  />
			
			   <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs75 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date75" type="date" value="<?php echo $Date75;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr76" type="time" value="<?php echo $Uhr76;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text76" onchange="check(this.value,'Freitag','<?php echo $Uhr76;?>')" type="text" value="<?php echo $Kurs76;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs76 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date76" type="date" value="<?php echo $Date76;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr81" type="time" value="<?php echo $Uhr81;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text81" onchange="check(this.value,'Montag','<?php echo $Uhr81;?>')" type="text" value="<?php echo $Kurs81;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs81 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date81" type="date" value="<?php echo $Date81;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr82" type="time" value="<?php echo $Uhr82;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text82" onchange="check(this.value,'Dienstag','<?php echo $Uhr82;?>')" type="text" value="<?php echo $Kurs82;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs82 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date82" type="date" value="<?php echo $Date82;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr83" type="time" value="<?php echo $Uhr83;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text83" onchange="check(this.value,'Mittwoch','<?php echo $Uhr83;?>')" type="text" value="<?php echo $Kurs83;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs83 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date83" type="date" value="<?php echo $Date83;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr84" type="time" value="<?php echo $Uhr84;?>"/>
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text84" onchange="check(this.value,'Donnerstag','<?php echo $Uhr84;?>')" type="text" value="<?php echo $Kurs84;?>"  />
			
			   <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs84 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date84" type="date" value="<?php echo $Date84;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr85" type="time" value="<?php echo $Uhr85;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text85" onchange="check(this.value,'Freitag','<?php echo $Uhr85;?>')" type="text" value="<?php echo $Kurs85;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs85 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date85" type="date" value="<?php echo $Date85;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr86" type="time" value="<?php echo $Uhr86;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text86" onchange="check(this.value,'Samstag','<?php echo $Uhr86;?>')" type="text" value="<?php echo $Kurs86;?>"  />
			 
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs86 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date86" type="date" value="<?php echo $Date86;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr91" type="time" value="<?php echo $Uhr91;?>" />
        <td class="auto-style1" style="height: 28px; width: 22px;"><select  style="width: 149px; height: 39px;" name="Text91" onchange="check(this.value,'Montag','<?php echo $Uhr91;?>')" type="text" value="<?php echo $Kurs91;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs91 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date91" type="date"  value="<?php echo $Date91;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr92" type="time" value="<?php echo $Uhr92;?>" />
        <td class="auto-style1" style="height: 28px; width: 163px;"><select  style="width: 149px; height: 39px;" name="Text92" onchange="check(this.value,'Dienstag','<?php echo $Uhr92;?>')" type="text" value="<?php echo $Kurs92;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs92 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date92" type="date" value="<?php echo $Date92;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr93" type="time" value="<?php echo $Uhr93;?>" />
        <td class="auto-style1" style="height: 28px; width: 184px;"><select  style="width: 149px; height: 39px;" name="Text93" onchange="check(this.value,'Mittwoch','<?php echo $Uhr93;?>')" type="text" value="<?php echo $Kurs93;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs93 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date93" type="date" value="<?php echo $Date93;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr94" type="time" value="<?php echo $Uhr94;?>" />
        <td class="auto-style1" style="height: 28px; width: 201px;"><select  style="width: 149px; height: 39px;" name="Text94" onchange="check(this.value,'Donnerstag','<?php echo $Uhr94;?>')" type="text" value="<?php echo $Kurs94;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs94 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date94" type="date" value="<?php echo $Date94;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr95" type="time" value="<?php echo $Uhr95;?>" />
        <td class="auto-style1" style="height: 28px; width: 182px;"><select  style="width: 149px; height: 39px;" name="Text95" onchange="check(this.value,'Freitag','<?php echo $Uhr95;?>')" type="text" value="<?php echo $Kurs95;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs95 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date95" type="date" value="<?php echo $Date95;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr96" type="time" value="<?php echo $Uhr96;?>" />
        <td class="auto-style1" style="height: 28px; width: 229px;"><select  style="width: 149px; height: 39px;" name="Text96" onchange="check(this.value,'Samstag','<?php echo $Uhr96;?>')" type="text" value="<?php echo $Kurs96;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs96 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date96" type="date" value="<?php echo $Date96;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr101" type="time" value="<?php echo $Uhr101;?>" />
        <td class="auto-style1" style="width: 22px;"><select  style="width: 149px; height: 39px;" name="Text101" onchange="check(this.value,'Montag','<?php echo $Uhr101;?>')" type="text" value="<?php echo $Kurs101;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs101 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date101" type="date" value="<?php echo $Date101;?>"  /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr102" type="time" value="<?php echo $Uhr102;?>" />
        <td class="auto-style1" style="width: 163px;"><select  style="width: 149px; height: 39px;" name="Text102" onchange="check(this.value,'Dienstag','<?php echo $Uhr102;?>')" type="text" value="<?php echo $Kurs102;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs102 . "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date102" type="date" value="<?php echo $Date102;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr103" type="time" value="<?php echo $Uhr103;?>" />
        <td class="auto-style1" style="width: 184px;"><select  style="width: 149px; height: 39px;" name="Text103" onchange="check(this.value,'Mittwoch','<?php echo $Uhr103;?>')" type="text" value="<?php echo $Kurs103;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs103. "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date103" type="date" value="<?php echo $Date103;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr104" type="time" value="<?php echo $Uhr104;?>" />
        <td class="auto-style1" style="width: 201px;"><select  style="width: 149px; height: 39px;" name="Text104" onchange="check(this.value,'Donnerstag','<?php echo $Uhr104;?>')" type="text" value="<?php echo $Kurs104;?>"  />
			
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs104. "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date104" type="date" value="<?php echo $Date104;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr105" type="time" value="<?php echo $Uhr105;?>" />
        <td class="auto-style1" style="width: 182px;"><select  style="width: 149px; height: 39px;" name="Text105" onchange="check(this.value,'Freitag','<?php echo $Uhr105;?>')" type="text" value="<?php echo $Kurs105;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs105. "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date105" type="date" value="<?php echo $Date105;?>" /></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr106" type="time" value="<?php echo $Uhr106;?>" />
        <td class="auto-style1" style="width: 229px;"><select  style="width: 149px; height: 39px;" name="Text106" onchange="check(this.value,'Samstag','<?php echo $Uhr106;?>')" type="text" value="<?php echo $Kurs106;?>"  />
			  <? $isEntry2= "Select KursID From sv_Kurse where Lehrperson='$lid' Group by KursID"; echo "<option>" . $Kurs106. "</option>";
            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))
            {
                $KursID = $line3['KursID'];
               echo "<option>" . $KursID . "</option>";
            }
			 echo "<option></option>";
		?></select>
			<input style="width: 145px;" name="Date106" type="date" value="<?php echo $Date106;?>" /></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 74px;"></td>
        <td class="auto-style1" style="width: 22px;"></td>
        <td class="auto-style1" style="width: 163px;"></td>
        <td class="auto-style1" style="width: 184px;"></td>
        <td class="auto-style1" style="width: 201px;"></td>
        <td class="auto-style1" style="width: 182px;"></td>
        <td class="auto-style1" style="width: 229px;"></td>
    </tr>
    </tbody>
</table>
</div>
