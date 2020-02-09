

    <form action="/DBFuellung/DBFuellungSchuelereingabe.php "method="POST">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
                type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

        <script type='text/javascript'>
            <!--
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );

            //-->
			
			function insert(z){
			

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("schueler").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/addLernende.php?k="+ document.getElementById("AnzahlSch").value + "&l="+ z,true);

            xmlhttp.send();

        }

		
	
		
		
        </script>


        <?php
        include 'db.php';
        if( $_POST['Senden']){

            $Klassenname = strtolower($_POST['klasse']);

            $AnzahlSch = $_POST['AnzahlSch'];
            $AnzahlSch1 = $_POST['AnzahlSch1'];
            if ($AnzahlSch=='') {$AnzahlSch=$AnzahlSch1;}
            echo 'Klassenname:';
            echo $Klassenname;
            if ($Klassenname ==""){echo "Bitte zurück gehen und eine Klasse auswählen!";}
            else {

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
                    echo '<td><input name="ID1'.$y.'" style="width: 100px" type="text" readonly  value='.$ID.' ></td>';
                    echo '<td><input name="Nachname1'.$y.'" style="width: 240px" type="text" readonly value='.$Name.'  ></td>';
                    echo '<td><input name="Vorname1'.$y.'" type="text" value='.$Vorname.' readonly style="width: 240px"   ></td>';
                    echo '<td><input name="Profil'.$y.'" type="text" style="width: 75px" readonly   value='.$Profil.'  ></td>';
                    echo '<td><input name="Loginname1'.$y.'" type="text" style="width: 240px" readonly  value='.$Loginname.'  ></td>';
                    echo '<td><input name="EMail1'.$y.'" type="text" style="width: 300px" readonly value='.$EMail.'   ></td>';
                    echo "</tr>";

                    $y=$y+1;
                }
				 echo "</tbody>";

                echo "</table>";
                $isEntry = "SELECT ID From sv_Lernende";
                $result = mysqli_query($con, $isEntry);
                $y=0;

                while( $value= mysqli_fetch_array($result))
                {
                    $z=$value['ID'];
                }
                 echo 'Anzahl der hinzuzufügenden Schüler:<br>';
				echo '<input name="AnzahlSch" id="AnzahlSch" value="">';
				 echo '<br><br><input type="button" name="add" value="Schüler hinzufügen" onclick="insert('.$z.')"><br><br>';
               echo '_______________________________________________________________________________________________________________________________________________________________________________________<br><br>';
              echo '<div id="schueler"></div>';
				
                echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';
              //  echo '<input name="AnzahlSch" type="hidden" value="'.$AnzahlSch.'" /> ';
                echo ' <br><br><input name="Senden" type="submit" value="Senden" />   ';

            }
        }

        ?>
		
		
    </form>
    _______________________________________________________________<form action="/klassen-und-lernendenverwaltung/">
        <input type="submit" value="Zurück" />
    </form>
