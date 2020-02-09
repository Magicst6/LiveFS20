<html>



<head>

    <title>Hello!</title>

</head>



<body>





<form action="/DBFuellung/DBFuellungLehrereingabe.php" method="POST">



    <strong>Lehrer:</strong></br>

    Sie müssen nur Vorname und Nachname ausfüllen. Die restlichen Daten werden durch Zuordnung des Logins unter <a href="/Lehrpersonen">Lehrpersonen </a> eingefügt.

    <?php

    if( $_POST['Senden']){



        $AnzahlSch = $_POST['AnzahlSch'];









        echo '<table id="table_id" class="blueTable">';

        echo "<thead>";

        echo "<tr>";

        //Schreibe Spaltennamen



        echo "<th width=100>".'ID'."</th>";

        echo "<th width= 240>".'Nachname'. "</th>";

        echo "<th width=240>".'Vorname'. "</th>";

        echo "<th width= 240>".'Loginname'. "</th>";

        echo "<th width=300>".'E-Mail'. "</th>";

        echo "<th width=200>".'User_ID'. "</th>";

        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";

        include 'db.php';

        $isEntry = "SELECT ID, Vorname, Nachname, Loginname, EMAIL, User_ID From sv_Lehrpersonen ";

        $result = mysqli_query($con, $isEntry);

        $y=0;



        while( $value= mysqli_fetch_array($result))

        {





            $Nachname= $value['Nachname'];

            $Vorname=$value['Vorname'];

            $Loginname=$value['Loginname'];

            $ID=$value['ID'];

            $EMail=$value['EMAIL'];

            $User_ID=$value['User_ID'];



            echo "<tr>";

            echo '<td><input name="ID1'.$y.'" style="width: 100px" type="text"  value='.$ID.' readonly /></td>';

            echo '<td><input name="Nachname1'.$y.'" style="width: 240px" type="text"  value='.$Nachname.' /></td>';

            echo '<td><input name="Vorname1'.$y.'" type="text" value='.$Vorname.' style="width: 240px" /></td>';

            echo '<td><input name="Loginname1'.$y.'" type="text" style="width: 240px" value='.$Loginname.'  /></td>';

            echo '<td><input name="EMail1'.$y.'" type="text" style="width: 300px" value='.$EMail.'  /></td>';

            echo '<td><input name="User_ID1'.$y.'" type="text" style="width: 200px" value='.$User_ID.'  /></td>';



            $y=$y+1;

        }

        echo "</tr>";



        $isEntry = "SELECT ID From sv_Lehrpersonen";

        $result = mysqli_query($con, $isEntry);

        $y=0;



        while( $value= mysqli_fetch_array($result))

        {

            $z=$value['ID'];

        }



        for($x = 0; $x < $AnzahlSch; $x++)

        {

            $i=$z+$x+1;

            echo "<tr>";

            echo '<td><input name="ID'.$x.'" style="width: 100px" type="text"  value='.$i.'  readonly/></td>';

            echo '<td><input name="Nachname'.$x.'" style="width: 240px" type="text" required="required" /></td>';

            echo '<td><input name="Vorname'.$x.'" type="text" style="width: 240px" required="required" /></td>';

            echo '<td><input name="Loginname'.$x.'" type="text" style="width: 240px"/></td>';

            echo '<td><input name="EMail'.$x.'" type="text" style="width: 300px"  /></td>';

            echo '<td><input name="User_ID'.$x.'" type="text" style="width: 200px"  /></td>';







        }

        echo "</tr>";

        echo "</tbody>";

        echo "</table>";

        echo '<input name="AnzahlSch" type="hidden" value="'.$AnzahlSch.'" /> ';

        echo ' <input name="Senden" type="submit" value="Senden" />   ';



    }



    ?>

</form>

_______________________________________________________________<form action="/lehrerverwaltung/">

    <input type="submit" value="Zurück" />

</form>

</body>





</html>