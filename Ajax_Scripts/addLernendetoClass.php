
<?php

include "db.php";

$AnzahlSch=$_GET['k'];
$z=$_GET['l'];
$Klassenname=$_GET['m'];

echo '<br>Hier die momentan in dieser Klasse befindlichen Schüler:<br><br>';

   echo '<table id="table_id" class="display">';
                echo "<thead>";
                echo "<tr>";
                //Schreibe Spaltennamen

                echo "<th width=80>".'ID'."</th>";
                echo "<th width= 200>".'Nachname'. "</th>";
                echo "<th width=200>".'Vorname'. "</th>";
                echo "<th width=75>".'Profil'. "</th>";
                echo "<th width= 200>".'Loginname'. "</th>";
                echo "<th width=220>".'E-Mail'. "</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";


                $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_Lernende Where Klasse='$Klassenname' Order By Name ";
                $result = mysqli_query($con, $isEntry);
                $y=0;

                while( $value= mysqli_fetch_array($result))
                {


                    $Name= $value['Name'];
                    $Vorname=$value['Vorname'];
                    $Loginname=$value['Loginname'];
                    $ID=$value['ID'];
                    $EMail=$value['EMail'];
                    $Profil=$value['Profil'];

                    echo "<tr>";
                    echo '<td><input name="ID1'.$y.'" style="width: 80px" type="text" readonly  value='.$ID.' ></td>';
                    echo '<td><input name="Nachname1'.$y.'" style="width: 200px" type="text" readonly value='.$Name.'  ></td>';
                    echo '<td><input name="Vorname1'.$y.'" type="text" value='.$Vorname.' readonly style="width: 200px"   ></td>';
                    echo '<td><input name="Profil'.$y.'" type="text" style="width: 75px" readonly   value='.$Profil.'  ></td>';
                    echo '<td><input name="Loginname1'.$y.'" type="text" style="width: 200px" readonly  value='.$Loginname.'  ></td>';
                    echo '<td><input name="EMail1'.$y.'" type="text" style="width: 220px" readonly value='.$EMail.'   ></td>';
                    echo "</tr>";

                    $y=$y+1;
                }
				 echo "</tbody>";

                echo "</table>";


echo '<br>Hier können die Schüler zur Klasse hinzugefügt werden:<br><br>';
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

            echo "<option>". $Vorname .' '. $Name .' ID:'. $value ."</option>";

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
                echo "<th width= 200>".'Loginname'. "</th>";
                echo "<th width=220>".'E-Mail'. "</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    echo "<tr>";
                    echo '<td><input name="ID'.$x.'" style="width: 80px" type="text"  value='.$i.'  readonly/></td>';
                    echo '<td><input name="Nachname'.$x.'" style="width: 200px" type="text"  /></td>';
                    echo '<td><input name="Vorname'.$x.'" type="text" style="width: 200px" /></td>';
                    echo '<td><input name="Profil'.$x.'" type="text" style="width: 75px"  /></td>';
                    echo '<td><input name="Loginname'.$x.'" type="text" style="width: 200px" readonly /></td>';
                    echo '<td><input name="EMail'.$x.'" type="text" style="width: 220px"  readonly/></td>';
                    echo "</tr>";
					 echo "</tbody>";

                echo "</table>";
echo '_______________________________________________________________________________________________________________________________________________________________________________________<br><br>';

                }
