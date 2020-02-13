<?php
include 'db.php';

$Klasse = $_GET['q'];
$Semester = $_GET['k'];
if ($Klasse==""){$vr2=5;}
else {$vr2=4; }
for($y = 1; $y < 7; $y++) {
    ${Uhr1 . $y} = "08:15";

    ${Uhr2 . $y} = "09:05";

    ${Uhr3 . $y} = "10:10";

    ${Uhr4 . $y} = "11:00";

    ${Uhr5 . $y} = "11:45";

    ${Uhr6 . $y} = "13:15";

    ${Uhr7 . $y} = "14:05";

    ${Uhr8 . $y} = "15:10";

    ${Uhr9 . $y} = "16:00";

    ${Uhr10 . $y} = "16:45";

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

    $isEntry = "Select KursID,Kursname,Uhrzeit From sv_Kurse Where Klasse='$Klasse' and Tag='$Tag' ";

    $entry = mysqli_query($con,$isEntry);
    while( $line2= mysqli_fetch_assoc($entry)) {
        $isEntry1 = "Select Uhrzeit1,Uhrzeit2,Uhrzeit3,Uhrzeit4,Uhrzeit5,Uhrzeit6,Uhrzeit7,Uhrzeit8,Uhrzeit9,Uhrzeit10 From sv_ZeitenStundenplan Where Klasse='$Klasse' and Tag='$Tag' ";
        $entry1 = mysqli_query($con, $isEntry1);
        while ($line3 = mysqli_fetch_assoc($entry1)) {

            for ($z = 1; $z <= 10; $z++) {
                $Uhrzeit = "Uhrzeit" . "$z";
                $UhrzeitV = $line3[$Uhrzeit];
                if ($UhrzeitV == $line2['Uhrzeit'].":00" and $line2['Uhrzeit']<>"") {
                    $Uhr = ${Uhr . $z . $y} = $line2['Uhrzeit'];
                    preg_match("/\.(.*?)\./", $line2['KursID'], $output_array);
                    ${Kurs . $z . $y} = $output_array[1];
                    ${KName . $z . $y} = $line2['Kursname'];

                    $isEntry1 = "Select Startdatum,Farbe From sv_Kurse Where Klasse='$Klasse' and Tag='$Tag' and Uhrzeit='$Uhr '";
                    $entry1 = mysqli_query($con, $isEntry1);
                    while ($line3 = mysqli_fetch_assoc($entry1)) {
                        ${Date . $z . $y} = $line3['Startdatum'];
                        ${col . $z . $y} = $line3['Farbe'];

                    }
                }
            }


        }
    }
    unset(${Kurs.$z.$y});
    unset(${Date.$z.$y});
    unset(${col.$z.$y});

}


?>


<div style="overflow-x:auto;"></div>
<table style="width: 1400px; height: 600px; background-color:aliceblue;">
    <tbody>
    <tr style="height: 50px;background-color:ghostwhite;">
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 180px;  font-size: 16px; font-weight: bold;">Montag</td>
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 163px;  font-size: 16px;font-weight: bold;">Dienstag</td>
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 184px;  font-size: 16px;font-weight: bold;">Mittwoch</td>
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 201px;  font-size: 16px;font-weight: bold;">Donnerstag</td>
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 182px;  font-size: 16px;font-weight: bold;">Freitag</td>
        <td style="width: 73px;font-weight: bold;"></td>
        <td style="width: 229px;  font-size: 16px;font-weight: bold;">Samstag</td>
    </tr>


    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr11;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col11;?>;" name="Text11" type="text" value="<?php echo $Kurs11;echo " "; echo " "; echo " "; echo $KName11;?>"  /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr12;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col12;?>; " name="Text12" type="text" value="<?php echo $Kurs12;echo " "; echo " "; echo $KName12;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr13;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col13;?>;" name="Text13" type="text" value="<?php echo $Kurs13;echo " "; echo $KName13;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr14;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col14;?>; " name="Text14" type="text" value="<?php echo $Kurs14;echo " "; echo $KName14;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr15;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col15;?>; " name="Text15" type="text" value="<?php echo $Kurs15;echo " "; echo $KName15;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr16;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px;background-color:<?php echo $col16;?>; " name="Text16" type="text" value="<?php echo $Kurs16;echo " "; echo $KName16;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr21;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col21;?>;" name="Text21" type="text" value="<?php echo $Kurs21;echo " "; echo $KName21;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr22;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col22;?>;" name="Text22" type="text" value="<?php echo $Kurs22;echo " "; echo $KName22;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr23;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col23;?>;" name="Text23" type="text" value="<?php echo $Kurs23;echo " "; echo $KName23;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr24;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col24;?>;" name="Text24" type="text" value="<?php echo $Kurs24;echo " "; echo $KName24;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr25;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col25;?>;" name="Text25" type="text" value="<?php echo $Kurs25;echo " "; echo $KName25;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr26;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col26;?>;" name="Text26" type="text" value="<?php echo $Kurs26;echo " "; echo $KName26;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr31;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col31;?>;" name="Text31" type="text" value="<?php echo $Kurs31;echo " "; echo $KName31;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr32;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col32;?>;" name="Text32" type="text" value="<?php echo $Kurs32;echo " "; echo $KName32;?>" readonly  /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr33;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col33;?>;" name="Text33" type="text" value="<?php echo $Kurs33;echo " "; echo $KName33;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr34;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col34;?>;" name="Text34" type="text" value="<?php echo $Kurs34;echo " "; echo $KName34;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr35;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col35;?>;" name="Text35" type="text" value="<?php echo $Kurs35;echo " "; echo $KName35;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr36;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col36;?>;" name="Text36" type="text" value="<?php echo $Kurs36;echo " "; echo $KName36;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr41;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col41;?>;" name="Text41" type="text" value="<?php echo $Kurs41;echo " "; echo $KName41;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr42;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col42;?>;" name="Text42" type="text" value="<?php echo $Kurs42;echo " "; echo $KName42;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr43;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col43;?>;" name="Text43" type="text" value="<?php echo $Kurs43;echo " "; echo $KName43;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr44;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col44;?>;" name="Text44" type="text" value="<?php echo $Kurs44;echo " "; echo $KName44;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr45;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col45;?>;" name="Text45" type="text" value="<?php echo $Kurs45;echo " "; echo $KName45;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr46;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col46;?>;" name="Text46" type="text" value="<?php echo $Kurs46;echo " "; echo $KName46;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr51;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col51;?>;" name="Text51" type="text" value="<?php echo $Kurs51;echo " "; echo $KName51;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr52;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col52;?>;" name="Text52" type="text" value="<?php echo $Kurs52;echo " "; echo $KName52;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr53;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col53;?>;" name="Text53" type="text" value="<?php echo $Kurs53;echo " "; echo $KName53;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr54;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col54;?>;" name="Text54" type="text" value="<?php echo $Kurs54;echo " "; echo $KName54;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr55;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col55;?>;" name="Text55" type="text" value="<?php echo $Kurs55;echo " "; echo $KName55;?>"  readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr56;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col56;?>;" name="Text56" type="text" value="<?php echo $Kurs56;echo " "; echo $KName56;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr61;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col61;?>;" name="Text61" type="text" value="<?php echo $Kurs61;echo " "; echo $KName61;?>"  readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr62;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col62;?>;" name="Text62" type="text" value="<?php echo $Kurs62;echo " "; echo $KName62;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr63;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col63;?>;" name="Text63" type="text" value="<?php echo $Kurs63;echo " "; echo $KName63;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr64;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col64;?>;" name="Text64" type="text" value="<?php echo $Kurs64;echo " "; echo $KName64;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr65;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col65;?>;" name="Text65" type="text" value="<?php echo $Kurs65;echo " "; echo $KName65;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr66;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col66;?>;" name="Text66" type="text" value="<?php echo $Kurs66;echo " "; echo $KName66;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr71;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col71;?>;" name="Text71" type="text" value="<?php echo $Kurs71;echo " "; echo $KName71;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr72;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col72;?>;" name="Text72" type="text" value="<?php echo $Kurs72;echo " "; echo $KName72;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr73;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col73;?>;" name="Text73" type="text" value="<?php echo $Kurs73;echo " "; echo $KName73;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr74;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col74;?>;" name="Text74" type="text" value="<?php echo $Kurs74;echo " "; echo $KName74;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr75;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col75;?>;" name="Text75" type="text" value="<?php echo $Kurs75;echo " "; echo $KName75;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr76;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col76;?>;" name="Text76" type="text" value="<?php echo $Kurs76;echo " "; echo $KName76;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr81;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col81;?>;" name="Text81" type="text" value="<?php echo $Kurs81;echo " "; echo $KName81;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr82;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col82;?>;" name="Text82" type="text" value="<?php echo $Kurs82;echo " "; echo $KName82;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr83;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col83;?>;" name="Text83" type="text" value="<?php echo $Kurs83;echo " "; echo $KName83;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr84;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col84;?>;" name="Text84" type="text" value="<?php echo $Kurs84;echo " "; echo $KName84;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr85;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col85;?>;" name="Text85" type="text" value="<?php echo $Kurs85;echo " "; echo $KName85;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr86;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col86;?>;" name="Text86" type="text" value="<?php echo $Kurs86;echo " "; echo $KName86;?>" readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr91;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col91;?>;" name="Text91" type="text" value="<?php echo $Kurs91;echo " "; echo $KName91;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr92;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col92;?>;" name="Text92" type="text" value="<?php echo $Kurs92;echo " "; echo $KName92;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr93;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col93;?>;" name="Text93" type="text" value="<?php echo $Kurs93;echo " "; echo $KName93;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr94;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col94;?>;" name="Text94" type="text" value="<?php echo $Kurs94;echo " "; echo $KName94;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr95;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col95;?>;" name="Text95" type="text" value="<?php echo $Kurs95;echo " "; echo $KName95;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr96;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col96;?>;" name="Text96" type="text" value="<?php echo $Kurs96;echo " "; echo $KName96;?>"  readonly /></td>
    </tr>
    <tr height="30px">
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr101;?></td>
        <td class="auto-style1" style="width: 22px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col101;?>;" name="Text101" type="text" value="<?php echo $Kurs101;echo " "; echo $KName101;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr102;?></td>
        <td class="auto-style1" style="width: 163px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col102;?>;" name="Text102" type="text" value="<?php echo $Kurs102;echo " "; echo $KName102;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr103;?></td>
        <td class="auto-style1" style="width: 184px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col103;?>;" name="Text103" type="text" value="<?php echo $Kurs103;echo " "; echo $KName103;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr104;?></td>
        <td class="auto-style1" style="width: 201px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col104;?>;" name="Text104" type="text" value="<?php echo $Kurs104;echo " "; echo $KName104;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr105;?></td>
        <td class="auto-style1" style="width: 182px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col105;?>;" name="Text105" type="text" value="<?php echo $Kurs105;echo " "; echo $KName105;?>" readonly /></td>
        <td class="auto-style1" style="width: 74px; text-align: left; font-weight: bold;"><?php echo $Uhr106;?></td>
        <td class="auto-style1" style="width: 229px;"><input style="width: 149px; height: 39px; background-color:<?php echo $col106;?>;" name="Text106" type="text" value="<?php echo $Kurs106;echo " "; echo $KName106;?>" readonly /></td>
    </tr>
    <tr height="30px">
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
<br>
<?php


$isEntry = "SELECT Startdatum,Farbe, KursID,Kursname From sv_Kurse Where Klasse = '$Klasse' ORDER BY Startdatum ASC ";
$result = mysqli_query($con, $isEntry);
$y=0;
$KursIDarr= array();
while( $value= mysqli_fetch_array($result))
{
    $isEntry1 = "SELECT Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30, Vorname, Nachname From sv_Lehrpersonen ";
    $result1 = mysqli_query($con, $isEntry1);
    $VornameLehrer='';
    $NachnameLehrer='';

    while( $value1= mysqli_fetch_array($result1))
    {
        for($x = 1; $x <= 16; $x++)
        {

            $Kurs = "Kurs"."$x";
            $KursValue= $value1[$Kurs];
            if (($KursValue==$value['KursID']) and ($KursValue<>''))
            {
                $VornameLehrer=$value1['Vorname'];
                $NachnameLehrer=$value1['Nachname'];

                $isEntry2 = "SELECT Kursname From sv_Kurse Where KursID= '$KursValue'";
                $result2 = mysqli_query($con, $isEntry2);
                while( $value2= mysqli_fetch_array($result2))
                {
                    $Kursname=$value2['Kursname'];
                }
            }
        }
    }
    $dontwrite=0;

    foreach ($KursIDarr as $valueKurs)
    {
        if ($valueKurs == $value['KursID']) { $dontwrite=1;}

    }
    $KursIDarr[]=$value['KursID'];

    if ($dontwrite <>1){
        $y++;
        $Kursname=$value['Kursname'];
        $Startdatum=$value['Startdatum'];
        preg_match("/\.(.*?)\./", $value['KursID'], $output_array);
        $KursID=$output_array[1];
        $Farbe= $value['Farbe'];
        $Name=$y;
        echo '<input type="text" name='.$y.' style="width: 50px; height: 39px;background-color:'.$Farbe.'"; readonly >        <b>  Kursname: </b> '.$Kursname.' |   <b>  Kürzel: </b> '.$KursID.'        |    <b>Lehrer:</b> '.$VornameLehrer.'  '.$NachnameLehrer.'   |    <b>Startdatum des Kurses:</b> '.$Startdatum.'<br/>';
    }
}


?>
