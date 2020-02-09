<form action="/datenbankbefuellung-schuelereingabe "method="POST">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"

            type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



    <script type='text/javascript'>

        <!--

        $(document).ready( function () {

            $('#table_id').DataTable();

        } );



        //-->

    </script>
<br>
    Semester:<br>
    <select id="Semester" name="Semester" onchange="myFunction()">
        <?php
        include 'db.php';
        //Den aktuell eingeloggten Schüler anzeigen

        $isEntry= "Select Semesterkuerzel From sv_SemesterArchiv";
        $result = mysqli_query($con, $isEntry);
        echo "<option>". $_GET['Semester']. "</option>";

        while( $line3= mysqli_fetch_array($result))
        {
            $Semester = $line3['Semesterkuerzel'];
            echo "<option>" . $Semester . "</option>";

        }
        $Semester= $_GET['Semester'];
        ?>
    </select>

<br>
    Klasse wählen:<br>

    <br>

    <select name="klasse" id="klasse"  onchange="myFunction1()">



        <?php

        include 'db.php';


        $isEntry= "Select Klasse From sv_Lernende";

        $result1 = mysqli_query($con, $isEntry);

        $resultarr1 = array();

        echo "<option>" . $_GET['klasse'] . "</option>";



        while( $line2= mysqli_fetch_assoc($result1))

        {

            $resultarr1[] = $line2['Klasse'];

        }

        $uniquearr1 = array_unique($resultarr1);

        asort($uniquearr1);

        echo "<option>" . '' . "</option>";





        foreach ($uniquearr1 as $value)

        {

            if ($value == $_GET['klasse']){}

            else

            {

                echo "<option>" . $value . "</option>";

            }

        }

        ?>



    </select>
    <script type='text/javascript'>

        <!--

        $(document).ready( function () {

            $('#table_id').DataTable();

        } );
        </body>





        //-->

    </script>

    <script type='text/javascript'>
        function myFunction(){
            var x = ""; var y = document.querySelector("#Semester").value; window.location.href = "lernende-archiv?&Semester="+y;
        }

        function myFunction1(){
            var x = document.querySelector("#klasse").value; var y = document.querySelector("#Semester").value; window.location.href = "lernende-archiv?&klasse="+x+"&Semester="+y;
        }

    </script>


<br>
    <?php

    $Klassenname=$_GET['klasse'];
    $Sem=$_GET['Semester'];

    $lernende=$Sem."_Lernende";





        $AnzahlSch = 0;

        $AnzahlSch1 = 0;

        if ($AnzahlSch=='') {$AnzahlSch=$AnzahlSch1;}



        if ($Klassenname ==""){echo "Bitte zurück gehen und eine Klasse auswählen!";}

        else {



            echo '<table id="table_id" class="blueTable">';

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



            include 'db.php';
            $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From $lernende Where Klasse='$Klassenname' Order By Name ";

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

            $isEntry = "SELECT ID From $lernende";

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

                echo '<td><input name="Profil'.$x.'" type="text" style="width: 75px"  /></td>';

                echo '<td><input name="Loginname'.$x.'" type="text" style="width: 240px" /></td>';

                echo '<td><input name="EMail'.$x.'" type="text" style="width: 300px" /></td>';

                echo "</tr>";





            }

            echo "</tbody>";



            echo "</table>";

            echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';

            echo '<input name="AnzahlSch" type="hidden" value="'.$AnzahlSch.'" /> ';







    }



    ?>








