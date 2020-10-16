
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<em>Hier können die Lehrer die Noten der Schüler eintragen oder bearbeiten </em>

<?php
include 'db.php';
$Kursname=$_GET['Kursname'];
?>


    &nbsp;


    <script type='text/javascript'>
        <!--
		
		 function base64_encode(string){
  return window.btoa(encodeURIComponent(string));
}
        function myFunction1(){
            var x   = document.querySelector("#Kursname").value;
            var y   = document.querySelector("#Schueler").value;

            window.location.href = "noteneingabe-lehrer-2?&Schueler="+y+"&Kursname="+x;
        }

        function myFunction(){
            var x   = document.querySelector("#Kursname").value;
          
			var y   = document.querySelector("#Schueler").value;

            window.location.href = "noteneingabe-lehrer-2?&Schueler="+y+"&Kursname="+x;
        }
		
		function getSchueler( str ) {

		location.reload;

		if ( str == "" ) {

			document.getElementById( "Schueler" ).innerHTML = "";

			return;

		} else {

			if ( window.XMLHttpRequest ) {

				// code for IE7+, Firefox, Chrome, Opera, Safari

				xmlhttp = new XMLHttpRequest();

			} else {

				// code for IE6, IE5

				xmlhttp = new ActiveXObject( "Microsoft.XMLHTTP" );

			}

			xmlhttp.onreadystatechange = function () {

				if ( this.readyState == 4 && this.status == 200 ) {

					document.getElementById( "Schueler" ).innerHTML = this.responseText;

				}

			};

			xmlhttp.open( "GET", "/Ajax_Scripts/getSchueler.php?q=" + document.getElementById( "Kursname" ).value, true );

			xmlhttp.send();

		}

	}



    </script>-->


<br><br>
   
		<?php
include 'db.php';



global $current_user;

get_currentuserinfo();



/* echo 'Username: ' . $current_user-&gt;user_login . "\n";

echo 'User email: ' . $current_user-&gt;user_email . "\n";

echo 'User level: ' . $current_user-&gt;user_level . "\n";

echo 'User first name: ' . $current_user-&gt;user_firstname . "\n";

echo 'User last name: ' . $current_user-&gt;user_lastname . "\n";

echo 'User display name: ' . $current_user-&gt;display_name . "\n";

echo 'User ID: ' . $current_user-&gt;ID . "\n";



*/

$heute=date("Y-m-d");



?>

<br><br>

Lehrperson:

<br>

<?php



$isEntry= "Select ID From sv_Lehrpersonen where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_assoc($result))

{

    $value=$line2['ID'];



    $isEntry= "Select Nachname, Vorname From sv_Lehrpersonen WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Nachname'];

        $Vorname = $line3['Vorname'];



    }







    



    echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>

<br><br>

 Kursname:<br>
    <select name="Kursname" onchange="getSchueler(this.value)" id="Kursname" >

    <?php

    include 'db.php';

    

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);

if ($Kursname==null)
{
	 echo "<option>" . '-Select-' . "</option>";
}
else{
 echo "<option>" . $Kursname . "</option>";
		}
   



    while( $line2= mysqli_fetch_array($result))

    {

        for($x = 1; $x <= 16; $x++)

        {



            $value = $line2['Kurs'.$x];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    }

    ?>



</select>

<br><br>
    Schüler:<br>
    <select name="Schueler" onchange="myFunction()" id="Schueler" >

        <?php
       
        $isEntry= "Select SchuelerID From sv_LernenderKurs WHERE KursID='$Kursname' Order By Nachname ASC";
        $result = mysqli_query($con, $isEntry);
        $resultarr = array();


        while( $line2= mysqli_fetch_assoc($result))
        {
            $resultarr[] = $line2['SchuelerID'];
        }
        $uniquearr = array_unique($resultarr);

if ($Kursname==null and $_GET['Schueler']==null )
{
	 echo "<option></option>";
}
if($_GET['Schueler']==null and $Kursname<>null ) {
 echo "<option>" . "-Select-". "</option>";
		}
   if($_GET['Schueler']<>null and $Kursname<>null  ){
        echo "<option>" . $_GET['Schueler'] . "</option>";
        echo "<option>".''. "</option>";
   }
        foreach ($uniquearr as $value) {
            $isEntry= "Select Nachname, Vorname From sv_LernenderKurs WHERE SchuelerID='$value' Order By Nachname ASC";
            $result = mysqli_query($con, $isEntry);
            while( $line3= mysqli_fetch_array($result))
            {
                $Name = $line3['Nachname'];
                $Vorname = $line3['Vorname'];

            }
            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";
        }
        ?>
    </select><br><br>
    <?php
    $Schueler=$_GET['Schueler'];
    preg_match("/:(.*)/", $Schueler, $output_array);
    $Schueler=$output_array[1];
    if ($Schueler==""){$vr3=0;}
    else {$vr3= $Schueler;}
    $isEntry = "SELECT * From sv_LernenderKurs Where KursID='$Kursname' AND SchuelerID='$Schueler' ";
    $result = mysqli_query($con, $isEntry);
    $y=0;

    while( $value= mysqli_fetch_array($result))
    {
          $g=1;
        for($x = 1; $x <= 9; $x++)
        {

            $Note = "Note"."$x";
            $NoteValue= $value[$Note];
            $Name = "Name"."$x";
            $NameValue= $value[$Name];
            $Gewichtung = "Gewichtung"."$x";
            $GewValue= $value[$Gewichtung];
            $Datum = "Datum"."$x";
            $DatumValue= $value[$Datum];

              if (($NoteValue<>0 or $NoteValue<>null) and $NameValue<>null and $DatumValue<>null and $GewValue<>null ) {

                  $g++;

                  echo '<br/>';

                  if ($Note == "Note1") {
                      echo "<i class='far fa-clock'></i> Note 1:  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  } else {
                      echo " --- " . $Note . ":  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  }

                  echo " ---Prüfungsname :  ";
                  echo "<strong>" . $NameValue . "</strong>";


                  echo "  ---Gewichtung:  ";
                  echo "<strong>" . $GewValue . "</strong>";


                  echo "   ---Datum:  ";
                  echo "<strong>" . $DatumValue . "</strong>";

                  echo "   " . '<button id="myBtn' . $x . '">Note bearbeiten</button><br/>';

              }
        }
if ($g<10) {
    echo '<br><br><br><button id="myBtn' . $g . '">Note hinzufügen</button>';
}

    }
    mysqli_close($con);
    ?>





<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {}

        /* The Modal (background) */
        .modal{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 40%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        button {
          color: white;
        }

    </style>
</head>
<body>

<?php
        
 for($i=1;$i<10;$i++){
echo '<div id="myModal'.$i.'" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <form action="/DBFuellung/DBFuellungLernenderKurs.php "method="POST">';


            
          
          

            include "db.php";
            $isEntry = "SELECT * From sv_LernenderKurs Where KursID='$Kursname' AND SchuelerID='$Schueler' ";
            $result = mysqli_query($con, $isEntry);
            $y=0;

            while( $value= mysqli_fetch_array($result)) {


                $Note = "Note".$i;
                $NoteValue = $value[$Note];
                $Name = "Name".$i;
                $NameValue = $value[$Name];
                $Gewichtung = "Gewichtung".$i;
                $GewValue = $value[$Gewichtung];
                $Datum = "Datum".$i;
                $DatumValue = $value[$Datum];
            }
          echo '
            <input name="Kursname" type="hidden" value="'.$Kursname.'" />
            <input name="Schueler" type="hidden" value="'.$Schueler.'" />
            <input name="count" type="hidden" value="'.$i.'" />
            <p>Bitte hier die Note eintragen..</p>
            
			Note'.$i.':<br>
            <input name="Note'.$i.'m" type="Text" value="'.$NoteValue.'" required="required" />
            <br><br>
			Prüfungsname:<br>
            <input name="Name'.$i.'m" type="Text" value="'.$NameValue.'" required="required" />
            <br><br>
			Gewichtung(in % ->100 = 100%):<br>
            <input name="Gewichtung'.$i.'m" type="number" value="'.$GewValue.'" required="required" />
            <br><br>
			Datum:<br>
            <input name="Datum'.$i.'m" type="date" value="'.$DatumValue.'" required="required" />
             <br><br>
            <input name="Speichern" type="submit" value="Senden" />

        <span class="close" id="span'.$i.'">&times;</span>


        </form>
    </div>

</div>';
 }
?>




<script>
    // Get the modal
    var modal1 = document.getElementById("myModal1");

    // Get the button that opens the modal
    var btn1 = document.getElementById("myBtn1");

    // Get the <span> element that closes the modal
    var span1 = document.getElementById("span1");

    // When the user clicks the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal1.style.display = "none";
        }
    }

    var modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn2 = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span2 = document.getElementById("span2");

    // When the user clicks the button, open the modal
    btn2.onclick = function() {
        modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span2.onclick = function() {
        modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal2.style.display = "none";
        }
    }


    var modal3 = document.getElementById("myModal3");

    // Get the button that opens the modal
    var btn3 = document.getElementById("myBtn3");

    // Get the <span> element that closes the modal
    var span3 = document.getElementById("span3");

    // When the user clicks the button, open the modal
    btn3.onclick = function() {
        modal3.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span3.onclick = function() {
        modal3.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal3.style.display = "none";
        }
    }

    var modal4 = document.getElementById("myModal4");

    // Get the button that opens the modal
    var btn4 = document.getElementById("myBtn4");

    // Get the <span> element that closes the modal
    var span4 = document.getElementById("span4");

    // When the user clicks the button, open the modal
    btn4.onclick = function() {
        modal4.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span4.onclick = function() {
        modal4.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal4.style.display = "none";
        }
    }

    var modal5 = document.getElementById("myModal5");

    // Get the button that opens the modal
    var btn5 = document.getElementById("myBtn5");

    // Get the <span> element that closes the modal
    var span5 = document.getElementById("span5");

    // When the user clicks the button, open the modal
    btn5.onclick = function() {
        modal5.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span5.onclick = function() {
        modal5.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal5.style.display = "none";
        }
    }

    var modal6 = document.getElementById("myModal6");

    // Get the button that opens the modal
    var btn6 = document.getElementById("myBtn6");

    // Get the <span> element that closes the modal
    var span6 = document.getElementById("span6");

    // When the user clicks the button, open the modal
    btn6.onclick = function() {
        modal6.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span6.onclick = function() {
        modal6.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal6.style.display = "none";
        }
    }

    var modal7 = document.getElementById("myModal7");

    // Get the button that opens the modal
    var btn7 = document.getElementById("myBtn7");

    // Get the <span> element that closes the modal
    var span7 = document.getElementById("span7");

    // When the user clicks the button, open the modal
    btn7.onclick = function() {
        modal7.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span7.onclick = function() {
        modal7.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal7.style.display = "none";
        }
    }

    var modal8 = document.getElementById("myModal8");

    // Get the button that opens the modal
    var btn8 = document.getElementById("myBtn8");

    // Get the <span> element that closes the modal
    var span8 = document.getElementById("span8");

    // When the user clicks the button, open the modal
    btn8.onclick = function() {
        modal8.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span8.onclick = function() {
        modal8.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal8.style.display = "none";
        }
    }

    var modal9 = document.getElementById("myModal9");

    // Get the button that opens the modal
    var btn9 = document.getElementById("myBtn9");

    // Get the <span> element that closes the modal
    var span9 = document.getElementById("span9");

    // When the user clicks the button, open the modal
    btn9.onclick = function() {
        modal9.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span9.onclick = function() {
        modal9.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal9.style.display = "none";
        }
    }



</script>

</body>
</html>




