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
        function zuordnen(lernender,login){
            if (lernender == "" || login == "") {
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
                xmlhttp.open("GET","/Ajax_Scripts/lernendezuordnenscr.php?q="+lernender+"&h="+login,true);
                xmlhttp.send();
            }
        }
        function myFunction3(){
            window.location.href = "/lernende-automatisch-zuordnen";
        }

        //-->
    </script>


    <br><br>
    Lernende:
    <br>
    <select name="Lernender"  id="Lernender" >

        <?php
        $isEntry= "Select * From sv_LernendeModule Order By Name ASC";
        $result = mysqli_query($con, $isEntry);

        echo "<option>".''. "</option>";


        while( $line2= mysqli_fetch_array($result))
        {


            $ID = $line2['ID'];
            $Name = $line2['Name'];
            $Vorname = $line2['Vorname'];


            echo "<option>" . $Name.' '. $Vorname .' ID:'. $ID. "</option>";
        }
        ?>


    </select>
    <br><br>
    Login zuordnen:
    <br>
    <select name="Loginname"  id="Loginname" >

        <?php
        $LernenderID=$_GET['Lehrperson'];
        preg_match("/:(.*)/", $LernenderID, $output_array);
        $LernenderID=$output_array[1];

        echo "<option>".''. "</option>";

        $isEntry= "Select * From sv_users INNER JOIN sv_usermeta ON sv_users.ID = sv_usermeta.user_id WHERE sv_usermeta.meta_key = 'sv_capabilities' AND (sv_usermeta.meta_value LIKE '%kv%' or sv_usermeta.meta_value LIKE '%hs%'  or sv_usermeta.meta_value LIKE '%sveb%') Order By user_login ASC";
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
    <br>
    <br>
    <div id="zuordnen"><b></b></div>
    <br>
    <br>
    <input name="button" type="button" onclick="zuordnen(Lernender.value,Loginname.value)" id="button" value="Zuordnen" />
    <br>
    <br>
    <input name="button" type="button" onclick="myFunction3()" id="button" value="Alle Lernenden automatisch zuordnen" />

