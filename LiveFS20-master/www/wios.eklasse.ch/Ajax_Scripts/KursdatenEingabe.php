
   <?php
   include "../DBFuellung/db.php";
    $Klasse = $_GET['q'];
    $EnddatumManual=$_GET['k'];

  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }

    $isEntry= "Select * From sv_Kurse Where Klasse='$Klasse' ORDER BY Startdatum" ;
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
   echo "<th width=240>".'Zimmer'. "</th>";
   echo "<th width=240>".'Uhrzeit'. "</th>";

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
        if($EnddatumManual<>""){

            $Enddatum=$EnddatumManual;
        }

		$semakt = substr($KursID, -4);
        if($EnddatumManual<>""){

            $Enddatum=$EnddatumManual;
        }
        if ($semakt==$semDB)
		{

        echo "<tr>";
        echo '<td><input name="ID1' . $y . '" style="width: 100px" type="text"  value=' . $ID . '  readonly></td>';
        echo '<td><input name="KursID1' . $y . '" style="width: 240px" type="text"  value=' . $KursID . '  required="required"  ></td>';
        echo '<td><input name="Kursname1' . $y . '" style="width: 240px" required="required" type="text" value=' . $Kursname . '    ></td>';
        echo '<td><input name="Startdatum1' . $y . '" type="date" style="width: 100px" value=' . $Startdatum . ' required="required" ></td>';
        echo '<td><input name="Enddatum1' . $y . '" type="date" style="width: 240px" value=' . $Enddatum . ' required="required" ></td>';
        echo '<td><input name="Zimmer1' . $y . '" type="text" style="width: 240px" value=' . $Zimmer . '  ></td>';
        echo '<td><input name="Uhrzeit1' . $y . '"  required="required" type="text" style="width: 240px" value=' . $Uhrzeit . '  ></td>';



        echo "</tr>";
        $y = $y + 1;
        $Enddatum=null;
		}
    }
    echo "</tbody>";
    echo "</table>";

    echo '<input name="AnzahlKurse" type="hidden" value="'.$y.'" /> ';
    ?>
