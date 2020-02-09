<style>
.modalDialog {
position: Fixed;
font-family: Verdana, Sans-Serif;
top: 0;
right: 0;
bottom: 0;
left: 0;
background-color: rgba(0, 0, 0, 0.6);
z-index: 99999;
opacity: 0;
transition: opacity 400ms ease-in;
pointer-events: None;
}
.modalDialog:target {
opacity: 1;
pointer-events: Auto;
}
.modalDialog > div {
width: 500px;
max-width: 90%;
position: relative;
margin: 10% Auto;
padding: 20px 10px 20px 10px;
border-radius: 30px;
background-color: #FFFFFF;
background: linear-gradient(#ffffff, #999999);
cursor: Default;
}
.close {
background-color: #ff0000;
opacity: 1.0;
color: #ffffff;
line-height: 30px;
width: 30px;
position: Absolute;
right: -12px;
text-align: Center;
top: -10px;
text-decoration: None;
font-size: 14px;
font-weight: Bold;
border-radius: 12px;
box-shadow: 5px 5px 8px #000000;
}
.close:hover {
background-color: #00D9FF;
}
</style>

<script>
    function myModal() {
        window.location.href = '#openModal';
    }
    window.onload = myModal;
</script>


<!-- Beginn Anzeige vom Modal -->
<a href="javascript: myModal();">Modal-Fenster öffnen</a>

<div id="openModal" class="modalDialog">
    <div>
        <html>

        <head>
        </head>

        <body>

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

        <form action="/DBFuellung/DBFuellungSchuelerbearbeitung.php "method="POST">



            <?php
            if( $_POST['Senden']){


                $Klassenname =  $_POST['klasse1'];
                $Klassenname = 'kv1-wil';
                $AnzahlSch = $_POST['AnzahlSch'];
                $AnzahlSch = '10';

                echo 'Klassenname: ';
                echo $Klassenname;

                echo '<table id="table_id" class="display">';
                //Schreibe Spaltennamen
                echo "<thead>";
                echo "<tr>";
                echo "<th width=100>".'ID'."</th>";
                echo "<th width=240>".'Nachname'. "</th>";
                echo "<th width= 240>".'Vorname'. "</th>";
                echo "<th width= 100>".'Profil'. "</th>";
                echo "<th width=240>".'Loginname'. "</th>";
                echo "<th width= 300>".'E-Mail'. "</th>";
                echo "</tr>";

                echo "</thead>";

                echo "<tbody>";
                $con = @mysqli_connect('9b1qp.myd.infomaniak.com', "9b1qp_heimmart", "St1180!!ST");

                if (!$con) {
                    echo "Error: " . mysqli_connect_error();
                    exit();
                }
                //echo 'Connected to MySQL';
                $verbunden=mysqli_select_db($con, "9b1qp_heimmart_test");
                if($verbunden)
                    //echo('DB-Verbindung hergestellt! ');
                    echo('');
                else
                    die('DB-Verbindung fehlgeschlagen! ');
                $isEntry = "SELECT ID, Name, Vorname, Loginname, EMail, Profil From sv_Lernende Where Klasse='$Klassenname' Order by Name";
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
                    echo '<td><input name="ID1'.$y.'" style="width: 100px" type="text"  value='.$ID.'  readonly></td>';
                    echo '<td><input name="Nachname1'.$y.'" style="width: 240px" type="text"  value='.$Name.'   ></td>';
                    echo '<td><input name="Vorname1'.$y.'" type="text" value='.$Vorname.' style="width: 240px"  ></td>';
                    echo '<td><input name="Profil'.$y.'" type="text" style="width: 100px" value='.$Profil.'  ></td>';
                    echo '<td><input name="Loginname1'.$y.'" type="text" style="width: 240px" value='.$Loginname.'  ></td>';
                    echo '<td><input name="EMail1'.$y.'" type="text" style="width: 300px" value='.$EMail.'  ></td>';
                    echo "</tr>";
                    $y=$y+1;
                }
                echo "</tbody>";
                echo "</table>";
                echo '<input name="Klassenname" type="hidden" value="'.$Klassenname.'" /> ';
                echo '<input name="AnzahlSch" type="hidden" value="'.$y.'" /> ';


            }

            ?>
            <input name="Senden" type="submit" value="Senden" /></form>_____________________________________________________________________________<form action="/klassen-und-lernendenverwaltung/"> <input type="submit" value="Zurück" /></form>

        </body>
        </html>

        <a href="#close" title="Schließen" class="close">X</a>
        <h1>Modal-Fenster</h1>
        <p>Dies ist ein modales Fenster, das mit HTML5 und CSS3 erstellt wurde.</p>
    </div>
</div>
<!-- Ende Anzeige vom Modal -->