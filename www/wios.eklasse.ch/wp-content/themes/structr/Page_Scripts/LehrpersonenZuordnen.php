<em>Hier lassen sich die Logins, mit denen sich die Lehrpersonen selbst registriert haben, manuell zuordnen </em>

<?php

include 'db.php';



global $current_user;

get_currentuserinfo();

/*

echo 'Username: ' . $current_user->user_login . "\n";

echo 'User email: ' . $current_user->user_email . "\n";

echo 'User level: ' . $current_user->user_level . "\n";

echo 'User first name: ' . $current_user->user_firstname . "\n";

echo 'User last name: ' . $current_user->user_lastname . "\n";

echo 'User display name: ' . $current_user->display_name . "\n";

echo 'User ID: ' . $current_user->ID . "\n";

echo 'User Rolle1: ' . $current_user->roles[0] . "\n";

echo 'User Rolle2: ' . $current_user->roles[1] . "\n";

*/



?>





<form  method="POST">





    <script type='text/javascript'>

        <!--

        function zuordnen(lehrperson,login){

           <?php

            preg_match("/(.*) (.*) (.*):(.*)/",$_GET['Loginname'] , $output_array);

            $LoginnameID=$output_array[4];

            $u = new WP_User($LoginnameID);

            $u->add_role('lehrperson');

             ?>

            if (lehrperson == "" || login == "") {

                document.getElementById("zuordnen").innerHTML = "";

                return;

            } else {

                if (window.XMLHttpRequest) {

                    // code for IE7+, Firefox, Chrome, Opera, Safari

                    xmlhttp = new XMLHttpRequest();

                } else {

                    // code for IE6, IE5

                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                }

                xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("zuordnen").innerHTML = this.responseText;

                    }

                };

                xmlhttp.open("GET","/Ajax_Scripts/lehrerzuordnenscr.php?q="+lehrperson+"&h="+login,true);

                xmlhttp.send();

                alert(lehrperson);

            }

        }

        //-->

    </script>





    <br><br>

    Lehrperson:

    <br>

    <select name="Lehrpersonen"  id="Lehrpersonen" >



        <?php

        $isEntry= "Select * From sv_Lehrpersonen Order By Nachname ASC";

        $result = mysqli_query($con, $isEntry);

        echo "<option>".$_GET['Lehrpersonen']. "</option>";

        echo "<option>".''. "</option>";

        while( $line2= mysqli_fetch_array($result))

        {

            $ID = $line2['ID'];

            $Name = $line2['Nachname'];

            $Vorname = $line2['Vorname'];





            echo "<option>" . $Name.' '. $Vorname .' ID:'. $ID. "</option>";

        }

        ?>





    </select>

    <br><br>

    Login zuordnen:

    <br>

    <select name="Loginname"  id="Loginname" onchange="myFunction2()" >



        <?php

        $Lehrperson=$_GET['Lehrperson'];

        preg_match("/:(.*)/", $Lehrperson, $output_array);

        $LehrpersonID=$output_array[1];

        echo "<option>".$_GET['Loginname']. "</option>";

        echo "<option>".''. "</option>";



        $isEntry= "Select * From sv_users Order By user_login ASC";

        $result = mysqli_query($con1, $isEntry);

        while( $line3= mysqli_fetch_array($result))

        {

            $Login = $line3['user_login'];

            $Mail = $line3['user_email'];

            $ID = $line3['ID'];

            echo "<option>" . $Login .' '. $Mail .' ID:'. $ID."</option>";

        }

        ?>

    </select>

  <script>

    function myFunction2(){

        var x   = document.getElementById('Lehrpersonen').value;

    var y   = document.getElementById('Loginname').value;

    window.location.href = "/lehrpersonen-zuordnen?&Loginname="+y+"&Lehrpersonen="+x;

    }

  </script>



    <br> <br>

    <div id="zuordnen"><b></b></div>

   
    <input name="button" type="button" onclick="zuordnen(Lehrpersonen.value,Loginname.value)" id="button" value="Zuordnen" />

     <br><br>




    &nbsp;



