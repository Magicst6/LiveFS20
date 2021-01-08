<html>

<head>
</head>

<body>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
        type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<?php
$LP_ID=$_GET['Lehrer'];

        include  "db.php";


        $isEntry3= "Select Semesterende From sv_Settings";
        $result3 = mysqli_query($con, $isEntry3);


        while( $line3= mysqli_fetch_assoc($result3))
        {
            $Semesterende=$line3['Semesterende'];
        }

?>
<script type='text/javascript'>
    <!--
    $(document).ready( function () {
        $('#table_id').DataTable();
        <?php
        echo "var str='$LP_ID';";
        ?>
       
           
                    document.getElementById("Kursformular").innerHTML = this.responseText;
                
            
            xmlhttp.open("GET", "/Ajax_Scripts/KursdatenEingabeLehrer.php?q=" + str+ "&k=" + document.getElementById('enddatum').value, true);
            xmlhttp.send();
        
        document.getElementById('enddatum').value="<?php echo $Semesterende; ?>";
    } );

    //-->
</script>


<script>
    function getLehrer(str) {
              str = str.split(':');
str =  str[1];
        if (str == "") {
            document.getElementById("Kursformular").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Kursformular").innerHTML = this.responseText;
                }
            };
					document.getElementById("plan").style.display = 'none';
            xmlhttp.open("GET", "/Ajax_Scripts/KursdatenEingabeLehrer.php?q=" + str+ "&k=" + document.getElementById('enddatum').value, true);
            xmlhttp.send();
        }
        document.getElementById('enddatum').value="<?php echo $Semesterende; ?>";
    }
</script>
<?php
        include  "db.php";


        $isEntry3= "Select Semesterende From sv_Settings";
        $result3 = mysqli_query($con, $isEntry3);


        while( $line3= mysqli_fetch_assoc($result3))
        {
            $Semesterende=$line3['Semesterende'];
        }
	
	  $isEntry2= "Select Nachname, Vorname,ID From sv_Lehrpersonen where ID='$LP_ID'";

            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))

            {
				
				   $Name1 = $line3['Nachname'];

                $Vorname1 = $line3['Vorname'];

			}
        ?>

<form action="/DBFuellung/DBFuellungKursformular.php "method="POST">
    
    Falls das Enddatum aller Kurse gleich (z.B. das Semesterende) ist bitte hier eingeben:
    <br>
    <input name="Enddatum" id="enddatum" type="date"  onchange="getLehrer(lehrer.value)"  value="<?php echo $Semesterende; ?>" />

    <br>
    <br>
    Bitte hier die Kursdaten vervollständigen, falls noch nicht der Fall. Wenn Sie einen neuen Stundenplan erstellt haben, dann wählen Sie die Klasse aus und ergänzen bitte das Enddatum, den Kursnamen und das Zimmer der Kurse.
    <br>
    <br>
    Lehrer wählen:<br />
    <br>
    <select name="lehrer" id="lehrer" onchange="getLehrer(this.value)" required="required">
    <?php
	
	
				      echo "<option>" . $Vorname1 .' '. $Name1 .' ID:'. $LP_ID . "</option>";

      $isEntry2= "Select Nachname, Vorname,ID From sv_Lehrpersonen";

            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];

                $value = $line3['ID'];

				
				   echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

            }

    
    

    ?>

</select>
	<input name="hlpid" id="HLP_ID" type="hidden" value="<? echo $value;?>" > 
	
	<?php
	
	
 echo '<div id="plan"><b></b>';
    $Klasse = $klasse;
    $EnddatumManual=$Semesterende;
	  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }

    $isEntry= "Select * From sv_Kurse Where Lehrperson='$LP_ID' and Stundenplan=1 ORDER BY Startdatum" ;
    $result = mysqli_query($con, $isEntry);

    echo '<table id="table_id" class="display">';
    //Schreibe Spaltennamen
    echo "<thead>";
    echo "<tr>";
    echo "<th width=100>".'ID'."</th>";
    echo "<th width=240>".'KursID'. "</th>";
    echo "<th width= 240>".'Kursname'. "</th>";
    echo "<th width= 100>".'Startdatum'. "</th>";
    echo "<th width=240>".'Enddatum'. "</th>";
   echo "<th width=120>".'Zimmer'. "</th>";
   echo "<th width=70>".'Uhrzeit'. "</th>";
	 echo "<th width=80>".'Profil'. "</th>";
	 echo "<th width=80>".'Lehrer'. "</th>";

    echo "</tr>";

    echo "</thead>";

    echo "<tbody>";
 $y=0;
    while( $line2= mysqli_fetch_array($result)) {
        $ID = $line2['ID'];
        $KursID = $line2['KursID'];
        $Kursname = $line2['Kursname'];
        $Startdatum = $line2['Startdatum'];
        $Enddatum=$line2['Enddatum'];
        $Zimmer = $line2['Zimmer'];
        $Uhrzeit=$line2['Uhrzeit'];
		$Profil=$line2['Profil'];
		$LP_ID=$line2['Lehrperson'];
		$semakt = substr($KursID, -4);
        if($EnddatumManual<>""){

            $Enddatum=$EnddatumManual;
        }
        if ($semakt==$semDB)
		{

         echo "<tr>";
        echo '<td><input name="ID1' . $y . '" style="width: 100px" type="text"  value="' . $ID . '"  readonly></td>';
        echo '<td><input name="KursID1' . $y . '" style="width: 240px" type="text"  value="' . $KursID . '"  required="required"  ></td>';
        echo '<td><input name="Kursname1' . $y . '" style="width: 240px" required="required" type="text" value="' . $Kursname . '"    ></td>';
        echo '<td><input name="Startdatum1' . $y . '" type="date" style="width: 100px" value="' . $Startdatum . '" required="required" ></td>';
        echo '<td><input name="Enddatum1' . $y . '" type="date" style="width: 240px" value="' . $Enddatum . '" required="required" ></td>';
        echo '<td><input name="Zimmer1' . $y . '" type="text" style="width: 120px" value="' . $Zimmer . '"  ></td>';
        echo '<td><input name="Uhrzeit1' . $y . '"  required="required" type="text" style="width: 70px" value="' . $Uhrzeit . '"  ></td>';
			echo '<td><select name="Profil1' . $y . '"   type="text" style="width: 60px" value="' . $Profil . '"  >';
			
			  $isEntry= "Select Profil From sv_Profile";

    $result1 = mysqli_query($con,$isEntry);


echo "<option>$Profil</option>";


    echo "<option></option>";



    while( $line3= mysqli_fetch_array($result1))
	{

    


            $value = $line3['Profil'];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    

			
			
		echo '	</select></td>';
			echo '<td><select name="Lehrperson1' . $y . '"  type="text" style="width: 80px" value="' . $LP_ID . '"  >';
			
			 
			
		   $isEntry21= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$LP_ID'";

            $result21 = mysqli_query($con, $isEntry21);

            while( $line31= mysqli_fetch_array($result21))

            {

                $Name = $line31['Nachname'];

                $Vorname = $line31['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $LP_ID . "</option>";

         $isEntry2= "Select * From sv_Lehrpersonen ";

            $result2 = mysqli_query($con, $isEntry2);

            while( $line3= mysqli_fetch_array($result2))

            {

                $Name = $line3['Nachname'];

                $Vorname = $line3['Vorname'];
				
				$value= $line3['ID'];

                     echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

            }

         

        
    

			
			
		echo '	</select></td>';


        echo "</tr>";
        $y = $y + 1;
        $Enddatum=null;
		}
		
    }
    echo "</tbody>";
    echo "</table>";

    echo '<input name="AnzahlKurse" type="hidden" value="'.$y.'" /> ';
	$klasse=null;
    echo '</div>';



    echo '<div id="Kursformular"><b></b></div>';
	?>
    _______________________________________________________<br>
    <input name="Senden" type="submit" value="Senden" /></form>
