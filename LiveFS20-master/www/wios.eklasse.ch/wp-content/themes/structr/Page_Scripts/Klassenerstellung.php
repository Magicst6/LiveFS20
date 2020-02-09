

    <form action="/DBFuellung/DBFuellungSchuelereingabe.php "method="POST">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
                type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

        <script type='text/javascript'>
            <!--
            $(document).ready( function () {
                $('#table_id').DataTable();
            
							
			

        }

							 );

            //-->
			

		
	
		
		
        </script>


        <?php
        include 'db.php';
        if( $_POST['Senden']){

            $Klassenname = strtolower($_POST['klasse']);

            $AnzahlSch = $_POST['AnzahlSch'];
            $AnzahlSch1 = $_POST['AnzahlSch1'];
            if ($AnzahlSch=='') {$AnzahlSch=$AnzahlSch1;}
            echo 'Klassenname: <h3>'.$Klassenname.'</h3>';
           
            if ($Klassenname ==""){echo "Bitte zurück gehen und eine Klasse auswählen!";}
           
                $isEntry = "SELECT ID From sv_Lernende";
                $result = mysqli_query($con, $isEntry);
                $y=0;

                while( $value= mysqli_fetch_array($result))
                {
                    $z=$value['ID'];
                }
                
               echo '<br><br>_______________________________________________________________________________________________________________________________________________________________________________________<br><br>';
             
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

            echo "<option>".$i.' ->' . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        

 echo '</select>';
	
	echo '<br><br>Wenn der Schüler nicht im Dropdown zu finden ist kann hier ein neuer Lernender eingetragen werden:<br>';
					
                echo '<table id="table_id" class="display">';
                echo "<thead>";
                echo "<tr>";
                //Schreibe Spaltennamen

                echo "<th width=100>".'ID'."</th>";
                echo "<th width= 240>".'Nachname'. "</th>";
                echo "<th width=240>".'Vorname'. "</th>";
                echo "<th width=240>".'Profil'. "</th>";
                echo "<th width= 240>".'Loginname'. "</th>";
                echo "<th width=300>".'E-Mail'. "</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    echo "<tr>";
                    echo '<td><input name="ID'.$x.'" style="width: 100px" type="text"  value='.$i.'  readonly/></td>';
                    echo '<td><input name="Nachname'.$x.'" style="width: 240px" type="text"  /></td>';
                    echo '<td><input name="Vorname'.$x.'" type="text" style="width: 240px"  /></td>';
                    echo '<td><input name="Profil'.$x.'" type="text" style="width: 75px"  /></td>';
                    echo '<td><input name="Loginname'.$x.'" type="text" style="width: 240px" /></td>';
                    echo '<td><input name="EMail'.$x.'" type="text" style="width: 300px" /></td>';
                    echo "</tr>";
					 echo "</tbody>";

                echo "</table>";
echo '_______________________________________________________________________________________________________________________________________________________________________________________<br><br>';

                }
				
                echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';
               echo '<input name="AnzahlSch" type="hidden" value="'.$AnzahlSch.'" /> ';
                echo ' <br><br><input name="Senden" type="submit" value="Senden" />   ';

            
        }

        ?>
		
		
    </form>
    _______________________________________________________________<form action="/klassen-und-lernendenverwaltung/">
        <input type="submit" value="Zurück" />
    </form>
