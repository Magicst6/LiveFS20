

<?php
include 'db.php';

$Klasse = $_GET['q'];


$semester = $_GET['k'];


for($y = 1; $y < 7; $y++) {
    ${'Uhr1' . $y} = "08:15";

    ${'Uhr2' . $y} = "09:05";

    ${'Uhr3' . $y} = "10:10";

    ${'Uhr4' . $y} = "11:00";

    ${'Uhr5' . $y} = "11:45";

    ${'Uhr6' . $y} = "13:15";

    ${'Uhr7' . $y} = "14:05";

    ${'Uhr8' . $y} = "15:10";

    ${'Uhr9' . $y} = "16:00";

    ${'Uhr10' . $y} = "16:45";

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

    $isEntry = "Select KursID,Uhrzeit From sv_Kurse Where Klasse='$Klasse' and Tag='$Tag' ";

    $entry = mysqli_query($con,$isEntry);
    while( $line2= mysqli_fetch_assoc($entry)) {
        $isEntry1 = "Select Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10 From sv_ZeitenStundenplan Where Klasse='$Klasse' and Tag='$Tag' and Semester ='$semester' ";
        $entry1 = mysqli_query($con, $isEntry1);
        while ($line3 = mysqli_fetch_assoc($entry1)) {

            for ($z = 1; $z <= 10; $z++) {
                $Uhrzeit = "Uhrzeit" . "$z";
                $UhrzeitV = $line3[$Uhrzeit];

                if ($UhrzeitV == $line2['Uhrzeit'].":00" and $line2['Uhrzeit']<>"" and substr($line2['KursID'], -4)==$semester)  {
                    $Uhr = ${'Uhr' . $z . $y} = $line2['Uhrzeit'];
                    preg_match("/\.(.*?)\./", $line2['KursID'], $output_array);
                    ${'Kurs' . $z . $y} = $output_array[1];


                    $isEntry1 = "Select Startdatum,Farbe From sv_Kurse Where Klasse='$Klasse' and Tag='$Tag' and Uhrzeit='$Uhr '";
                    $entry1 = mysqli_query($con, $isEntry1);
                    while ($line3 = mysqli_fetch_assoc($entry1)) {
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

        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr11" type="time" value="<?php echo $Uhr11;?>" />
        <td class="auto-style1" style="width: 22px;"><input  style="width: 149px; height: 39px;" name="Text11" onchange="check(this.value)" type="text" value="<?php echo $Kurs11;?>"  /><input style="width: 145px;" name="Date11"    type="date" value="<?php echo $Date11;?>" /><input type="color" name="color11" value="<?php echo $col11;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr12" type="time" value="<?php echo $Uhr12;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text12" onchange="check(this.value)" type="text" value="<?php echo $Kurs12;?>" /><input style="width: 145px;" name="Date12" type="date" value="<?php echo $Date12;?>" /><input type="color" name="color12" value="<?php echo $col12;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr13" type="time" value="<?php echo $Uhr13;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text13" onchange="check(this.value)" type="text" value="<?php echo $Kurs13;?>" /><input style="width: 145px;" name="Date13" type="date" value="<?php echo $Date13;?>" /><input type="color" name="color13" value="<?php echo $col13;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr14" type="time" value="<?php echo $Uhr14;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text14" onchange="check(this.value)" type="text" value="<?php echo $Kurs14;?>" /><input style="width: 145px;" name="Date14" type="date" value="<?php echo $Date14;?>" /><input type="color" name="color14" value="<?php echo $col14;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr15" type="time" value="<?php echo $Uhr15;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text15" onchange="check(this.value)" type="text" value="<?php echo $Kurs15;?>" /><input style="width: 145px;" name="Date15" type="date" value="<?php echo $Date15;?>" /><input type="color" name="color15" value="<?php echo $col15;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr16" type="time" value="<?php echo $Uhr16;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text16" onchange="check(this.value)" type="text" value="<?php echo $Kurs16;?>" /><input style="width: 145px;" name="Date16" type="date" value="<?php echo $Date16;?>" /><input type="color" name="color16" value="<?php echo $col16;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr21" type="time" value="<?php echo $Uhr21;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text21" onchange="check(this.value)" type="text" value="<?php echo $Kurs21;?>" /><input style="width: 145px;" name="Date21" type="date" value="<?php echo $Date21;?>" /><input type="color" name="color21" value="<?php echo $col21;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr22" type="time" value="<?php echo $Uhr22;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text22" onchange="check(this.value)" type="text" value="<?php echo $Kurs22;?>" /><input style="width: 145px;" name="Date22" type="date" value="<?php echo $Date22;?>" /><input type="color" name="color22" value="<?php echo $col22;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr23" type="time" value="<?php echo $Uhr23;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text23" onchange="check(this.value)" type="text" value="<?php echo $Kurs23;?>" /><input style="width: 145px;" name="Date23" type="date" value="<?php echo $Date23;?>" /><input type="color" name="color23" value="<?php echo $col23;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr24" type="time" value="<?php echo $Uhr24;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text24" onchange="check(this.value)" type="text" value="<?php echo $Kurs24;?>" /><input style="width: 145px;" name="Date24" type="date" value="<?php echo $Date24;?>" /><input type="color" name="color24" value="<?php echo $col24;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr25" type="time" value="<?php echo $Uhr25;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text25" onchange="check(this.value)" type="text" value="<?php echo $Kurs25;?>" /><input style="width: 145px;" name="Date25" type="date" value="<?php echo $Date25;?>" /><input type="color" name="color25" value="<?php echo $col25;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr26" type="time" value="<?php echo $Uhr26;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text26" onchange="check(this.value)" type="text" value="<?php echo $Kurs26;?>" /><input style="width: 145px;" name="Date26" type="date" value="<?php echo $Date26;?>" /><input type="color" name="color26" value="<?php echo $col26;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr31" type="time" value="<?php echo $Uhr31;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text31" onchange="check(this.value)" type="text" value="<?php echo $Kurs31;?>" /><input style="width: 145px;" name="Date31" type="date" value="<?php echo $Date31;?>" /><input type="color" name="color31" value="<?php echo $col31;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr32" type="time" value="<?php echo $Uhr32;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text32" onchange="check(this.value)" type="text" value="<?php echo $Kurs32;?>" /><input style="width: 145px;" name="Date32" type="date" value="<?php echo $Date32;?>" /><input type="color" name="color32" value="<?php echo $col32;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr33" type="time" value="<?php echo $Uhr33;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text33" onchange="check(this.value)" type="text" value="<?php echo $Kurs33;?>" /><input style="width: 145px;" name="Date33" type="date" value="<?php echo $Date33;?>" /><input type="color" name="color33" value="<?php echo $col33;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr34" type="time" value="<?php echo $Uhr34;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text34" onchange="check(this.value)" type="text" value="<?php echo $Kurs34;?>" /><input style="width: 145px;" name="Date34" type="date" value="<?php echo $Date34;?>" /><input type="color" name="color34" value="<?php echo $col34;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr35" type="time" value="<?php echo $Uhr35;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text35" onchange="check(this.value)" type="text" value="<?php echo $Kurs35;?>" /><input style="width: 145px;" name="Date35" type="date" value="<?php echo $Date35;?>" /><input type="color" name="color35" value="<?php echo $col35;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr36" type="time" value="<?php echo $Uhr36;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text36" onchange="check(this.value)"  type="text" value="<?php echo $Kurs36;?>" /><input style="width: 145px;" name="Date36" type="date" value="<?php echo $Date36;?>" /><input type="color" name="color36" value="<?php echo $col36;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr41" type="time" value="<?php echo $Uhr41;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text41" onchange="check(this.value)" type="text" value="<?php echo $Kurs41;?>" /><input style="width: 145px;" name="Date41" type="date" value="<?php echo $Date41;?>" /><input type="color" name="color41" value="<?php echo $col41;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr42"  type="time" value="<?php echo $Uhr42;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text42" onchange="check(this.value)" type="text" value="<?php echo $Kurs42;?>" /><input style="width: 145px;" name="Date42" type="date" value="<?php echo $Date42;?>" /><input type="color" name="color42" value="<?php echo $col42;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr43" type="time" value="<?php echo $Uhr43;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text43" onchange="check(this.value)" type="text" value="<?php echo $Kurs43;?>" /><input style="width: 145px;" name="Date43" type="date" value="<?php echo $Date43;?>" /><input type="color" name="color43" value="<?php echo $col43;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr44" type="time" value="<?php echo $Uhr44;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text44" onchange="check(this.value)" type="text" value="<?php echo $Kurs44;?>" /><input style="width: 145px;" name="Date44" type="date" value="<?php echo $Date44;?>" /><input type="color" name="color44" value="<?php echo $col44;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr45" type="time" value="<?php echo $Uhr45;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text45" onchange="check(this.value)" type="text" value="<?php echo $Kurs45;?>" /><input style="width: 145px;" name="Date45" type="date" value="<?php echo $Date45;?>" /><input type="color" name="color45" value="<?php echo $col45;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr46" type="time" value="<?php echo $Uhr46;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text46" onchange="check(this.value)" type="text" value="<?php echo $Kurs46;?>" /><input style="width: 145px;" name="Date46" type="date" value="<?php echo $Date46;?>" /><input type="color" name="color46" value="<?php echo $col46;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr51" type="time" value="<?php echo $Uhr51;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text51" onchange="check(this.value)" type="text" value="<?php echo $Kurs51;?>" /><input style="width: 145px;" name="Date51" type="date" value="<?php echo $Date51;?>" /><input type="color" name="color51" value="<?php echo $col51;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr52" type="time" value="<?php echo $Uhr52;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text52" onchange="check(this.value)" type="text" value="<?php echo $Kurs52;?>" /><input style="width: 145px;" name="Date52" type="date" value="<?php echo $Date52;?>" /><input type="color" name="color52" value="<?php echo $col52;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr53" type="time" value="<?php echo $Uhr53;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text53" onchange="check(this.value)" type="text" value="<?php echo $Kurs53;?>" /><input style="width: 145px;" name="Date53" type="date" value="<?php echo $Date53;?>" /><input type="color" name="color53" value="<?php echo $col53;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr54" type="time" value="<?php echo $Uhr54;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text54" onchange="check(this.value)" type="text" value="<?php echo $Kurs54;?>" /><input style="width: 145px;" name="Date54" type="date" value="<?php echo $Date54;?>" /><input type="color" name="color54" value="<?php echo $col54;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr55" type="time" value="<?php echo $Uhr55;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text55" onchange="check(this.value)" type="text" value="<?php echo $Kurs55;?>" /><input style="width: 145px;" name="Date55" type="date" value="<?php echo $Date55;?>" /><input type="color" name="color55" value="<?php echo $col55;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr56" type="time" value="<?php echo $Uhr56;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text56" onchange="check(this.value)" type="text" value="<?php echo $Kurs56;?>" /><input style="width: 145px;" name="Date56" type="date" value="<?php echo $Date56;?>" /><input type="color" name="color56" value="<?php echo $col56;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr61" type="time" value="<?php echo $Uhr61;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text61" onchange="check(this.value)" type="text" value="<?php echo $Kurs61;?>" /><input style="width: 145px;" name="Date61" type="date" value="<?php echo $Date61;?>" /><input type="color" name="color61" value="<?php echo $col61;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr62" type="time" value="<?php echo $Uhr62;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text62" onchange="check(this.value)" type="text" value="<?php echo $Kurs62;?>" /><input style="width: 145px;" name="Date62" type="date" value="<?php echo $Date62;?>" /><input type="color" name="color62" value="<?php echo $col62;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr63" type="time" value="<?php echo $Uhr63;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text63" onchange="check(this.value)" type="text" value="<?php echo $Kurs63;?>" /><input style="width: 145px;" name="Date63" type="date" value="<?php echo $Date63;?>" /><input type="color" name="color63" value="<?php echo $col63;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr64" type="time" value="<?php echo $Uhr64;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text64" onchange="check(this.value)" type="text" value="<?php echo $Kurs64;?>" /><input style="width: 145px;" name="Date64" type="date" value="<?php echo $Date64;?>" /><input type="color" name="color64" value="<?php echo $col64;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr65" type="time" value="<?php echo $Uhr65;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text65" onchange="check(this.value)" type="text" value="<?php echo $Kurs65;?>" /><input style="width: 145px;" name="Date65" type="date" value="<?php echo $Date65;?>" /><input type="color" name="color65" value="<?php echo $col65;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr66" type="time" value="<?php echo $Uhr66;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text66" onchange="check(this.value)" type="text" value="<?php echo $Kurs66;?>" /><input style="width: 145px;" name="Date66" type="date" value="<?php echo $Date66;?>" /><input type="color" name="color66" value="<?php echo $col66;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr71" type="time" value="<?php echo $Uhr71;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text71" onchange="check(this.value)" type="text" value="<?php echo $Kurs71;?>" /><input style="width: 145px;" name="Date71" type="date" value="<?php echo $Date71;?>" /><input type="color" name="color71" value="<?php echo $col71;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr72" type="time" value="<?php echo $Uhr72;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text72" onchange="check(this.value)" type="text" value="<?php echo $Kurs72;?>" /><input style="width: 145px;" name="Date72" type="date" value="<?php echo $Date72;?>" /><input type="color" name="color72" value="<?php echo $col72;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr73" type="time" value="<?php echo $Uhr73;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text73" onchange="check(this.value)" type="text" value="<?php echo $Kurs73;?>" /><input style="width: 145px;" name="Date73" type="date" value="<?php echo $Date73;?>" /><input type="color" name="color73" value="<?php echo $col73;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr74" type="time" value="<?php echo $Uhr74;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text74" onchange="check(this.value)" type="text" value="<?php echo $Kurs74;?>" /><input style="width: 145px;" name="Date74" type="date" value="<?php echo $Date74;?>" /><input type="color" name="color74" value="<?php echo $col74;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr75" type="time" value="<?php echo $Uhr75;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text75" onchange="check(this.value)" type="text" value="<?php echo $Kurs75;?>" /><input style="width: 145px;" name="Date75" type="date" value="<?php echo $Date75;?>" /><input type="color" name="color75" value="<?php echo $col75;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr76" type="time" value="<?php echo $Uhr76;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text76" onchange="check(this.value)" type="text" value="<?php echo $Kurs76;?>" /><input style="width: 145px;" name="Date76" type="date" value="<?php echo $Date76;?>" /><input type="color" name="color76" value="<?php echo $col76;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr81" type="time" value="<?php echo $Uhr81;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text81" onchange="check(this.value)" type="text" value="<?php echo $Kurs81;?>" /><input style="width: 145px;" name="Date81" type="date" value="<?php echo $Date81;?>" /><input type="color" name="color81" value="<?php echo $col81;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr82" type="time" value="<?php echo $Uhr82;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text82" onchange="check(this.value)" type="text" value="<?php echo $Kurs82;?>" /><input style="width: 145px;" name="Date82" type="date" value="<?php echo $Date82;?>" /><input type="color" name="color82" value="<?php echo $col82;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr83" type="time" value="<?php echo $Uhr83;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text83" onchange="check(this.value)" type="text" value="<?php echo $Kurs83;?>" /><input style="width: 145px;" name="Date83" type="date" value="<?php echo $Date83;?>" /><input type="color" name="color83" value="<?php echo $col83;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr84" type="time" value="<?php echo $Uhr84;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text84" onchange="check(this.value)" type="text" value="<?php echo $Kurs84;?>" /><input style="width: 145px;" name="Date84" type="date" value="<?php echo $Date84;?>" /><input type="color" name="color84" value="<?php echo $col84;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr85" type="time" value="<?php echo $Uhr85;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text85" onchange="check(this.value)" type="text" value="<?php echo $Kurs85;?>" /><input style="width: 145px;" name="Date85" type="date" value="<?php echo $Date85;?>" /><input type="color" name="color85" value="<?php echo $col85;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr86" type="time" value="<?php echo $Uhr86;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text86" onchange="check(this.value)" type="text" value="<?php echo $Kurs86;?>" /><input style="width: 145px;" name="Date86" type="date" value="<?php echo $Date86;?>" /><input type="color" name="color86" value="<?php echo $col86;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr91" type="time" value="<?php echo $Uhr91;?>" />
        <td class="auto-style1" style="height: 28px; width: 22px;"><input style="width: 149px; height: 39px;" name="Text91" onchange="check(this.value)" type="text" value="<?php echo $Kurs91;?>" /><input style="width: 145px;" name="Date91" type="date"  value="<?php echo $Date91;?>" /><input type="color" name="color91" value="<?php echo $col91;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr92" type="time" value="<?php echo $Uhr92;?>" />
        <td class="auto-style1" style="height: 28px; width: 163px;"><input style="width: 149px; height: 39px;" name="Text92"  onchange="check(this.value)" type="text" value="<?php echo $Kurs92;?>" /><input style="width: 145px;" name="Date92" type="date" value="<?php echo $Date92;?>" /><input type="color" name="color92" value="<?php echo $col92;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr93" type="time" value="<?php echo $Uhr93;?>" />
        <td class="auto-style1" style="height: 28px; width: 184px;"><input style="width: 149px; height: 39px;" name="Text93" onchange="check(this.value)" type="text" value="<?php echo $Kurs93;?>" /><input style="width: 145px;" name="Date93" type="date" value="<?php echo $Date93;?>" /><input type="color" name="color93" value="<?php echo $col93;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr94" type="time" value="<?php echo $Uhr94;?>" />
        <td class="auto-style1" style="height: 28px; width: 201px;"><input style="width: 149px; height: 39px;" name="Text94" onchange="check(this.value)" type="text" value="<?php echo $Kurs94;?>" /><input style="width: 145px;" name="Date94" type="date" value="<?php echo $Date94;?>" /><input type="color" name="color94" value="<?php echo $col94;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr95" type="time" value="<?php echo $Uhr95;?>" />
        <td class="auto-style1" style="height: 28px; width: 182px;"><input style="width: 149px; height: 39px;" name="Text95" onchange="check(this.value)" type="text" value="<?php echo $Kurs95;?>" /><input style="width: 145px;" name="Date95" type="date" value="<?php echo $Date95;?>" /><input type="color" name="color95" value="<?php echo $col95;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr96" type="time" value="<?php echo $Uhr96;?>" />
        <td class="auto-style1" style="height: 28px; width: 229px;"><input style="width: 149px; height: 39px;" name="Text96" onchange="check(this.value)" type="text" value="<?php echo $Kurs96;?>" /><input style="width: 145px;" name="Date96" type="date" value="<?php echo $Date96;?>" /><input type="color" name="color96" value="<?php echo $col96;?>"></td>
    </tr>
    <tr>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr101" type="time" value="<?php echo $Uhr101;?>" />
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;" name="Text101" onchange="check(this.value)" type="text" value="<?php echo $Kurs101;?>" /><input style="width: 145px;" name="Date101" type="date" value="<?php echo $Date101;?>"  /><input type="color" name="color101" value="<?php echo $col101;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr102" type="time" value="<?php echo $Uhr102;?>" />
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;" name="Text102" onchange="check(this.value)" type="text" value="<?php echo $Kurs102;?>" /><input style="width: 145px;" name="Date102" type="date" value="<?php echo $Date102;?>" /><input type="color" name="color102" value="<?php echo $col102;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr103" type="time" value="<?php echo $Uhr103;?>" />
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;" name="Text103" onchange="check(this.value)" type="text" value="<?php echo $Kurs103;?>" /><input style="width: 145px;" name="Date103" type="date" value="<?php echo $Date103;?>" /><input type="color" name="color103" value="<?php echo $col103;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr104" type="time" value="<?php echo $Uhr104;?>" />
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;" name="Text104" onchange="check(this.value)" type="text" value="<?php echo $Kurs104;?>" /><input style="width: 145px;" name="Date104" type="date" value="<?php echo $Date104;?>" /><input type="color" name="color104" value="<?php echo $col104;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr105" type="time" value="<?php echo $Uhr105;?>" />
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;" name="Text105" onchange="check(this.value)" type="text" value="<?php echo $Kurs105;?>" /><input style="width: 145px;" name="Date105" type="date" value="<?php echo $Date105;?>" /><input type="color" name="color105" value="<?php echo $col105;?>"></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 70px; height: 39px;" name="Uhr106" type="time" value="<?php echo $Uhr106;?>" />
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;" name="Text106" onchange="check(this.value)" type="text" value="<?php echo $Kurs106;?>" /><input style="width: 145px;" name="Date106" type="date" value="<?php echo $Date106;?>" /><input type="color" name="color106" value="<?php echo $col106;?>"></td>
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
