	<html>



	<head>

	</head>



	<body>



		<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"

			type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



	<script type='text/javascript'>

		<!--

		$(document).ready( function () {

			$('#table_id').DataTable();

		} );



		//-->





	</script>








		<?php

		include "db.php";


			$Klassenname =  $_GET['k'];






			echo 'Klassenname: ';

			echo $Klassenname;



			echo '<table id="table_id" class="display">';

			//Schreibe Spaltennamen

			echo "<thead>";

			echo "<tr>";

			echo "<th width=80>".'ID'."</th>";

			echo "<th width=200>".'Nachname'. "</th>";

			echo "<th width= 200>".'Vorname'. "</th>";

			echo "<th width= 75>".'Profil'. "</th>";

			echo "<th width=200>".'Loginname'. "</th>";

			echo "<th width= 220>".'E-Mail'. "</th>";

			echo "</tr>";



			echo "</thead>";



			echo "<tbody>";

			include 'db.php';

			 if ($Klassenname=='Alle Schüler (unabhängig von der Klasse)'){
				  $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_LernendeModule Order by Name";
			 }
		     else{
			      $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_Lernende Where Klasse='$Klassenname' Order by Name";
			 }
		
			$result = mysqli_query($con,$isEntry);

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

				echo '<td><input name="ID1'.$y.'"  id="ID1'.$y.'" style="width: 80px" type="text"  value='.$ID.'  readonly></td>';

				echo '<td><input  name="Nachname1'.$y.'"  id="Nachname1'.$y.'" style="width: 200px" type="text"  value='.$Name.'   ></td>';

				echo '<td><input name="Vorname1'.$y.'"  id="Vorname1'.$y.'" type="text" value='.$Vorname.' style="width: 200px"  ></td>';

				 echo '<td><select name="Profil1' . $y . '" id="Profil1'.$y.'"  type="text" style="width: 120px" onchange="setVal1(this.value,'.$y.')" >';
			
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

				echo '<td><input name="Loginname1'.$y.'" id="Loginname1'.$y.'" type="text" style="width: 200px" value='.$Loginname.'  ></td>';

				echo '<td><input name="EMail1'.$y.'" id="EMail1'.$y.'" type="text" style="width: 220px" value='.$EMail.'  ></td>';

				echo '<td><input name="Delete'.$y.'" onclick="del('.$ID.')" type="button" value="Löschen"   style="width: 75px" ></td>';

				echo '<td><input name="Update'.$y.'" onclick="updateSchueler('.$y.')"  type="button" value="Update" style="width: 70px" ></td>';



				echo "</tr>";

				$y=$y+1;

			}

			echo "</tbody>";

			echo "</table>";

			echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';

			echo '<input name="AnzahlSch" type="hidden" value="'.$y.'" /> ';









		?>



	</body>

	</html>