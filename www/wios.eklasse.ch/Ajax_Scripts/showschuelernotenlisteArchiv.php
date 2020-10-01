<style type="text/css">
    .auto-style1 {
        background-color: red;
    }
    .auto-style2 {
        color: black;
        background-color: ;
        font-size: large;

    }
</style>


<form action=" /DBFuellung/DBFuellungNotenArchiv.php" method="POST">

<?php
include 'db.php';

$Kursnme= $_GET['g'];
$datum=$_GET['h'];
$Semester=$_GET['sem'];
	
?>


	<style>
	
	table.timecard {
	margin: auto;
	width: 100%;
	border-collapse: collapse;
	border: 1px solid #fff; /*for older IE*/
	border-style: hidden;
}

table.timecard caption {
	background-color: #3356FB;
	color: #fff;
	font-size: large;
	font-weight: normal;
	letter-spacing: .3em;
}

table.timecard thead th {
	padding: 8px;
	background-color: #8DCBFF;
	font-size: large;
}

table.timecard thead th#thDay {
	width: 40%;	
}

table.timecard thead th#thRegular, table.timecard thead th#thOvertime, table.timecard thead th#thTotal {
	width: 20%;
}

table.timecard th, table.timecard td {
	padding: 3px;
	border-width: 1px;
	border-style: solid;
	border-color: #3356FB #ccc;
}

table.timecard td {
	text-align: right;
}

table.timecard tbody th {
	text-align: left;
	font-weight: normal;
}

table.timecard tfoot {
	font-weight: bold;
	font-size: large;
	background-color: #687886;
	color: #fff;
}

table.timecard tr.even {
	background-color: #fde9d9;
}

input[type=text], select {
  width: 100%;
 padding: 0px 0px;
  margin: 0px 0;
  display: inline-block;
  border: 1px solid #FFFFFF;
  border-radius: 4px;
}



    </style>

</head>


<input type="hidden" name="Semester" id="Semester" value="<? echo $Semester;?>" class="text ui-widget-content ui-corner-all" readonly>


<fieldset>

            

             <input type="hidden" name="gewicht" id="gewicht" value="" class="text ui-widget-content ui-corner-all" readonly >



            <input type="hidden" name="kursid" id="kursid" value="" class="text ui-widget-content ui-corner-all" readonly>

    

       

            <input type="text" name="kursname" id="kursname" value="" class="text ui-widget-content ui-corner-all" readonly>

    

      
            <input type="hidden" name="klasse" id="klasse" value="" class="text ui-widget-content ui-corner-all" readonly>

    

        

            <input type="hidden" name="zimmer" id="zimmer" value="" class="text ui-widget-content ui-corner-all" readonly>

     

   

            <input type="hidden" name="lehrperson" id="lehrperson" value="" class="text ui-widget-content ui-corner-all" readonly>

            <br>

            
           

            <input type="hidden" name="farbe" id="farbe" value="" class="text ui-widget-content ui-corner-all" readonly>



        </fieldset>



 



<table class="timecard"  border="0">
  <caption>
    Prüfungsdaten
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Prüfungsname:</td>
      <td colspan="2"><input type="text" name="title" id="title" value="<?php echo $_GET['i'];?>" width="400px" readonly></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Kurs:</td>
      <td colspan="2"><input type="text" name="kursid" id="kursid" value="<?php echo $_GET['g'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	   <tr>
		<td style="width: 150px; font-size: 12px; font-weight: bold;">Datum</td>
			
      <td><input type="date" name="startdate" id="startdate" value="<?php echo $_GET['h'];?>"  class="text ui-widget-content ui-corner-all" readonly></td></td>
     
    </tr>
    <tr>
		<td style="width: 150px; font-size: 12px; font-weight: bold;">Startdatum und Zeit:</td>
			
      <td><input type="datetime" name="startdate1" id="startdate1" value="<?php echo $_GET['n'];?>"  class="text ui-widget-content ui-corner-all" readonly></td></td>
     
    </tr>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Enddatum und Zeit:</td>
      <td><input type="datetime" name="enddate" id="enddate" value="<?php echo $_GET['k'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
      
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Gewichtung:</td>
      <td><input type="text" name="gewicht" id="gewicht" value="<?php echo $_GET['e'];?>" class="text ui-widget-content ui-corner-all" readonly ></td>
      <td style="padding-left: 5px;padding-bottom:3px; font-size: 10px;">Wert 1 entspricht einfacher Gewichtung</td>
    </tr>
	
  </tbody>
</table>

<table class="timecard"  border="0">
  <caption>
    Ort und Aufsicht
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Zimmer:</td>
      <td> <input type="text" name="zimmer" id="zimmer" value="<?php echo $_GET['m'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	  <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Lehrperson:</td>
      <td><input type="text" name="lehrperson" id="lehrperson" value="<?php echo $_GET['o'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
		
    </tr>
   
	
  </tbody>
</table>	
<!--
<table class="timecard"  border="0">
  <caption>
    Lernziele
  </caption>
  <tbody>
    <tr>
      <td><input type="textarea" name="lernziele" id="lernziele" value="" class="text ui-widget-content ui-corner-all" ></td>
      
    </tr>

   
  </tbody>
</table>

   
		

        


-->
   



<style>

input.err {
    color: #444444;
    font-size: 12px;
    width: 180px;
    height: 26px;
    padding-left: 5px;
    outline:none;   
	border: 1px solid #1F1F1F;
    background-image: url(../images/error.png);
}
input.err:focus{
    color:#f23;
    font-weight: bold;
    border: 2px solid #f23;
}
}



    </style>
	
	<?php


$pruefungen=$Semester.'_Pruefungen';

$kurse=$Semester.'_Kurse';
$LM=$Semester.'_LernendeModule';
$Noten=$Semester.'_Noten';
$LK=$Semester.'_LernenderKurs';
	 $Pruefungsname=$_GET['i'];
	  $isEntry = "SELECT Kommentar,Gewichtung,Start From $pruefungen Where Pruefungsname='$Pruefungsname' and Datum='$datum' and KursID='$Kursnme' ";
    $result = mysqli_query($con, $isEntry);
    $y = 0;
    while ($value1 = mysqli_fetch_array($result)) {
		$Comment=$value1['Kommentar'];
		$Start=$value1['Start'];
	}

 $isEntry2 = "Select Klasse From $kurse Where KursID='$Kursnme' ";
    $result2 = mysqli_query($con, $isEntry2);
    
    while ($value2 = mysqli_fetch_array($result2)) {
		$Klasse=$value2['Klasse'];
	}
	if ($Start<date("Y-m-d H:i:s")){
	echo ' Kommentar zur Prüfung:';
    echo ' <textarea name="Comment"> '.$Comment.'</textarea>';
if ($Kursnme<>'' && $Kursnme<>"-Select-") {
    
    echo '<br>';


    echo "<br><br><br>"."Bitte unten die Noten der Schüler eintragen. Notenformat e. g. '3.5'";

    echo '<br>';

    $isEntry = "SELECT Name, Vorname, ID,Profil From $LM Where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'  Order By Name asc";
    $result = mysqli_query($con, $isEntry);
    
    while ($value1 = mysqli_fetch_array($result)) {
		
        $isfilled = 0;
        $Vorname = $value1['Vorname'];
        $Name = $value1['Name'];
        $ID = $value1['ID'];
        $Profil = $value1['Profil'];

    $isEntry1 = "SELECT Nachname, Vorname  From $LK Where KursID='$Kursnme'";
    $result1 = mysqli_query($con, $isEntry1);
    
    while ($value2 = mysqli_fetch_array($result1)) {
	
	if (($value2['Nachname']==$value1['Name']) and ($value2['Vorname']==$value1['Vorname']))
	{
	 $isEntry1 = "SELECT Zeit From $Noten Where Name='$Pruefungsname' and KursID='$Kursnme' and SchuelerID='$ID' ORDER BY Zeit ASC ";

            $result1 = mysqli_query($con, $isEntry1);
		
		$Zeit='0000-00-00 00:00:00';
            while ($value3 = mysqli_fetch_array($result1)) {
			
			if ($value3['Zeit']>$Zeit  )
			{
			       
				$Zeit=$value3['Zeit'];
				
			}
			
				
			}
		
	
	
if ($Zeit=='0000-00-00 00:00:00'){

            $isEntry1 = "SELECT Note, Datum,SchuelerID From $Noten Where Name='$Pruefungsname' and KursID='$Kursnme' and SchuelerID='$ID'   ORDER BY Zeit ASC ";
}
		
		else 

{
	$isEntry1 = "SELECT Note, Datum,SchuelerID From $Noten Where Name='$Pruefungsname' and KursID='$Kursnme' and SchuelerID='$ID' and  Zeit='$Zeit'  ORDER BY Zeit ASC ";
	}


            $result1 = mysqli_query($con, $isEntry1);
		
		

            while ($value3 = mysqli_fetch_array($result1)) {

                if  ($value3['Datum'] == $datum) {

                    $y++;
                    $u = "Note" . "$y";
                    echo '<br>';
                    echo '<label for=' . $ID . '><b>' . $Vorname . ' ' . $Name . '   </b></label>';
                    echo '<input type="hidden" name=' . $y . ' value=' . $ID . '><br>';
                    echo '<br>';
                    echo 'Note:';
                    echo '<br>';
                    echo '<input class="err" name=' . $u . ' id="'.$u.'" type="text" onchange="myFunction3('.$u.')" value="' . $value3['Note'] . '" >';
                    echo '<br>';
                    echo '<br>';
                    echo '<hr>';
                    $isfilled = 1;
					;
                }
            }

          


            if ($isfilled == 0) {
                $y++;

                $u = "Note" . "$y";
                echo '<br>';
                echo '<label for=' . $ID . '><b>' . $Vorname . ' ' . $Name . '   </b></label>';
                echo '<input type="hidden" name=' . $y . ' value=' . $ID . '><br>';
                echo '<br>';
                echo 'Note:';
                echo '<br>';
                echo '<input class="err" name=' . $u . ' id="'.$u.'" type="text"  onchange="myFunction3('.$u.')"  >';
                echo '<br>';

                echo '<br>';
                echo '<hr>';

            }
            echo '<input name="Schueler" id="Schueler" type="hidden" value=' . $y . ' />';
        }
    }
	}
}

mysqli_close($con);

 echo  ' <input name="Senden" type="submit" value="Senden" onclick="checkKurs(Kursnm.value)" />';
	}
?>