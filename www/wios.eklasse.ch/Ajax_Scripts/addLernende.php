<script>

	
	</script>

<?php

include "db.php";

$AnzahlSch=$_GET['k'];
$z=$_GET['l'];

for($x = 0; $x < $AnzahlSch; $x++)
					
                {
	$k=$x+1;
	
	echo 'Schüler'.$k.':';
					
                    $i=$z+$x+1;
					
					echo '<br><select name="schueler'.$x.'" id="schueler'.$x.'" >';



        



        $isEntry= "Select ID From sv_LernendeModule order by Name asc ";

        $result = mysqli_query($con, $isEntry);

        $resultarr = array();





        while( $line2= mysqli_fetch_assoc($result))

        {

            $resultarr[] = $line2['ID'];

        }

        $uniquearr = array_unique($resultarr);





        echo "<option>".'--Select--'. "</option>";



        foreach ($uniquearr as $value) {

            $isEntry= "Select * From sv_LernendeModule WHERE ID='$value' order by Name asc";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];
				
				$Profil= $line3['Profil'];
				
				
				$EMail=$line3['EMail'];



            }

            echo "<option>". $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        

 echo '</select>';
	
	echo '<br><br>Wenn der Schüler nicht im Dropdown zu finden ist kann hier ein neuer Lernender eingetragen werden:<br>';
					
                echo '<table id="table_id" class="display" >';
                echo "<thead>";
                echo "<tr>";
                //Schreibe Spaltennamen

                echo "<th width=80>".'ID'."</th>";
                echo "<th width= 200>".'Nachname'. "</th>";
                echo "<th width=200>".'Vorname'. "</th>";
                echo "<th width=75>".'Profil'. "</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    echo "<tr>";
                    echo '<td><input name="ID'.$x.'" style="width: 80px" type="text"  value='.$i.'  readonly/></td>';
                    echo '<td><input name="Nachname'.$x.'" style="width: 200px" type="text"  /></td>';
                    echo '<td><input name="Vorname'.$x.'" type="text" style="width: 200px" /></td>';
                    echo '<td><select name="Profil' . $y . '" id="Profiles"  type="text" style="width: 120px"  onchange="setVal(this.value)" >';
			
			  $isEntry= "Select Profil From sv_Profile";

    $result1 = mysqli_query($con,$isEntry);






    echo "<option></option>";



    while( $line3= mysqli_fetch_array($result1))
	{

    


            $value = $line3['Profil'];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    

			
			
		echo '	</select></td>';


                    echo "</tr>";
					 echo "</tbody>";

                echo "</table>";
echo '_______________________________________________________________________________________________________________________________________________________________________________________<br><br>';

                }


?>



