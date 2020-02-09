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

      


        echo 'zu kopierende Klasse: ';

        echo $Klassenname;

        echo '<br><br>zu erstellende Klasse: ';
	   
	    echo '<input name="Klassenname" type="text" value="" required="required"/> ';


        echo '<table id="table_id" class="display">';

        //Schreibe Spaltennamen

        echo "<thead>";

        echo "<tr>";

        echo "<th width=200>".'Nachname'. "</th>";

        echo "<th width= 200>".'Vorname'. "</th>";

        echo "<th width= 75>".'Profil'. "</th>";

        echo "<th width=200>".'Loginname'. "</th>";

        echo "<th width= 220>".'E-Mail'. "</th>";
	
	    echo "<th width= 220>".'User ID'. "</th>";
	
	    echo "<th width=200>".'WinLogin'. "</th>";

        echo "<th width= 220>".'SchulMail'. "</th>";
	
	    echo "<th width= 220>".'Laptop'. "</th>";


        echo "</tr>";



        echo "</thead>";



        echo "<tbody>";

        include 'db.php';

        $isEntry = "SELECT * From sv_Lernende Where Klasse='$Klassenname' Order by Name";

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
			
			$User_ID=$value['User_ID'];
			
			$WinLogin=$value['WinLogin'];
			
			$SchulMail=$value['SchulMail'];
			
			$Laptop=$value['Laptop'];



            echo "<tr>";


            echo '<td><input  name="Nachname1'.$y.'"  id="Nachname1'.$y.'" style="width: 200px" type="text"  readonly   value='.$Name.' ></td>';

            echo '<td><input name="Vorname1'.$y.'"  id="Vorname1'.$y.'" type="text"  readonly  value='.$Vorname.' style="width: 200px"  ></td>';

            echo '<td><input name="Profil'.$y.'" id="Profil'.$y.'" type="text"  readonly  style="width: 75px" value='.$Profil.'  ></td>';

            echo '<td><input name="Loginname1'.$y.'" id="Loginname1'.$y.'"  readonly  type="text" style="width: 200px" value='.$Loginname.'  ></td>';

            echo '<td><input name="EMail1'.$y.'" id="EMail1'.$y.'" type="text"  readonly  style="width: 220px" value='.$EMail.'   ></td>';
			 
			echo '<td><input name="UserID'.$y.'" id="UserID'.$y.'" type="text"  readonly  style="width: 220px"  readonly  value='.$User_ID.'  ></td>';
			
			echo '<td><input name="WinLogin'.$y.'" id="WinLogin'.$y.'" type="text"    style="width: 220px" value='.$WinLogin.'   ></td>';
			 
			echo '<td><input name="SchulMail'.$y.'" id="SchulMail'.$y.'" type="text"    style="width: 220px"  value='.$SchulMail.'  ></td>';
			
			echo '<td><input name="Laptop'.$y.'" id="Laptop'.$y.'" type="text"    style="width: 220px"   value='.$Laptop.'  ></td>';




            echo "</tr>";

            $y=$y+1;

        }

        echo "</tbody>";

        echo "</table>";

     
        echo '<input name="AnzahlSch" type="hidden" value="'.$y.'" /> ';





    



    ?>

   

</body>

</html>