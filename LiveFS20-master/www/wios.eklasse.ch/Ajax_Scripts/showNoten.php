<?php
include 'db.php';
echo "dkjlkghej";   
$Schueler=$_GET['s'];
     $Kursname=$_GET['q'];
    preg_match("/:(.*)/", $Schueler, $output_array);
    $Schueler=$output_array[1];
    if ($Schueler==""){$vr3=0;}
    else {$vr3= $Schueler;}
    $isEntry = "SELECT * From sv_LernenderKurs Where KursID='$Kursname' AND SchülerID='$Schueler' ";
    $result = mysqli_query($con, $isEntry);
    $y=0;
echo "ets";
    while( $value= mysqli_fetch_array($result))
    {
          $g=1;
        for($x = 1; $x <= 9; $x++)
        {

            $Note = "Note"."$x";
            $NoteValue= $value[$Note];
            $Name = "Name"."$x";
            $NameValue= $value[$Name];
            $Gewichtung = "Gewichtung"."$x";
            $GewValue= $value[$Gewichtung];
            $Datum = "Datum"."$x";
            $DatumValue= $value[$Datum];

              if (($NoteValue<>0 or $NoteValue<>null) and $NameValue<>null and $DatumValue<>null and $GewValue<>null ) {

                  $g++;

                  echo '<br/>';

                  if ($Note == "Note1") {
                      echo "  ---  Note 1:  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  } else {
                      echo " ---   " . $Note . ":  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  }

                  echo " ---Name :  ";
                  echo "<strong>" . $NameValue . "</strong>";


                  echo "  ---Gewichtung:  ";
                  echo "<strong>" . $GewValue . "</strong>";


                  echo "   ---Datum:  ";
                  echo "<strong>" . $DatumValue . "</strong>";

                  echo "   " . '<button id="myBtn' . $x . '">Note bearbeiten</button><br/>';

              }
        }
if ($g<10) {
    echo '<br><br><br><button id="myBtn' . $g . '">Note hinzufügen</button>';
}

    }
    mysqli_close($con);
    ?>




