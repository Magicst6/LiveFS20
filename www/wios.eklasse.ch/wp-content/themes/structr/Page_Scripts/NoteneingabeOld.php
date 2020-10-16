<em>Hier können Verwaltungsmitarbeiter Noten eintragen </em>
<?php
include 'db.php';
 $Kursname=$_GET['Kursname'];
 $Schueler=$_GET['Schueler'];

?>


    &nbsp;


    <script type='text/javascript'>
   
	

    
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

		function showNoten( str ) {

		alert();

		if ( str == "" ) {

			document.getElementById( "Noten" ).innerHTML = "";

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

					document.getElementById( "Noten" ).innerHTML = this.responseText;

				}

			};

			xmlhttp.open( "GET", "/Ajax_Scripts/showNoten.php?s=" + str + "&q="+ document.getElementById( "Kursname" ).value, true );

			xmlhttp.send();

		}

	}
		
   function base64_encode(string){
  return window.btoa(encodeURIComponent(string));
}

function base64_decode(string){
  return decodeURIComponent(window.atob(string));
}
  function myFunction(){
            var x   = document.querySelector("#Kursname").value;
	
	  
            var y   = document.querySelector("#Schueler").value;
	
            window.location.href = "noteneingabe-1?&Schueler="+y+"&Kursname="+x;
        }


    </script>

</script>
<br><br>

 
    Kursname:<br>
    <select name="Kursname" onchange="getSchueler(this.value)" onload="getSchueler(this.value)" id="Kursname" >

        <?php

        $isEntry= "Select KursID From sv_LernenderKurs order by KursID asc";
        $result = mysqli_query($con,$isEntry, MYSQLI_USE_RESULT);
        $resultarr = array();
            
		

        while( $line2= mysqli_fetch_assoc($result))
        {
            $resultarr[] = $line2['KursID'];
        }
        $uniquearr = array_unique($resultarr);

        foreach ($uniquearr as $value) {
            if ($value == $Kursname)
            {
                echo "<option>" . $Kursname . "</option>";
            }
            else{}

        }
        echo "<option>" .''. "</option>";
        foreach ($uniquearr as $value)
        {
            echo "<option>" . $value . "</option>";
        }

        $isEntry1= "Select KursID From sv_ExtraKurse ";
        $result1 = mysqli_query($con,$isEntry1);
        $resultarr1 = array();


        while( $line3= mysqli_fetch_assoc($result1))
        {
            $resultarr1[] = $line3['KursID'];
        }
        $uniquearr1 = array_unique($resultarr1);

        foreach ($uniquearr1 as $value1) {
            if ($value1 == $Kursname)
            {
                echo "<option>" . $Kursname . "</option>";
            }
            else{}

        }
        foreach ($uniquearr1 as $value1)
        {
            echo "<option>" . $value1 . "</option>";
        }
        echo '&nsbp;';

        ?>


    </select>
<br><br>
    Schüler:<br>
 
<select name="Schueler" onchange="myFunction()"  id="Schueler" >
<?php
	$Tab="sv_LernenderKurs";

$isEntry= "Select SchuelerID From $Tab Where KursID='$Kursname' ";
$result = mysqli_query($con,$isEntry);
$resultarr = array();


while( $line2= mysqli_fetch_assoc($result))
{
    $resultarr[] = $line2['SchuelerID'];
}
$uniquearr = array_unique($resultarr);

echo "<option>" .$Schueler. "</option>";
echo "<option>" .'-Select-'. "</option>";




        foreach ($uniquearr as $value) {

            $isEntry= "Select Name, Vorname From sv_Lernende WHERE ID='$value'";

            $result = mysqli_query($con, $isEntry);

            while( $line3= mysqli_fetch_array($result))

            {

                $Name = $line3['Name'];

                $Vorname = $line3['Vorname'];



            }

            echo "<option>" . $Vorname .' '. $Name .' ID:'. $value . "</option>";

        }

        
?>

       
    </select><br><br>
<?php

     
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
                      echo "  ---  Note 1:  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  } else {
                      echo " ---   " . $Note . ":  ";
                      echo "<strong>" . $NoteValue . "</strong>";
                  }

                  echo " ---Prüfungsname:  ";
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
       

		document.getElementById("myBtn"+1).onclick = function() {
			document.getElementById("myModal"+1).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+1)) {
         document.getElementById("myModal"+1).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+1).onclick = function() {
       document.getElementById("myModal"+1).style.display = "none";
    }
		  

      
	
		document.getElementById("myBtn"+2).onclick = function() {
			document.getElementById("myModal"+2).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+2)) {
         document.getElementById("myModal"+2).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+2).onclick = function() {
       document.getElementById("myModal"+2).style.display = "none";
    }
//
	 
	  c=3;
	
		document.getElementById("myBtn"+3).onclick = function() {
			document.getElementById("myModal"+3).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+3)) {
         document.getElementById("myModal"+3).style.display = "none";
        }
    }
	
	// When the user clicks on <span> (x), close the modal
     document.getElementById("span"+3).onclick = function() {
       document.getElementById("myModal"+3).style.display = "none";
    }
	  c=4;
	
		document.getElementById("myBtn"+4).onclick = function() {
			document.getElementById("myModal"+4).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+4)) {
         document.getElementById("myModal"+4).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+4).onclick = function() {
       document.getElementById("myModal"+4).style.display = "none";
    }
	 c=5;
	
		document.getElementById("myBtn"+5).onclick = function() {
			document.getElementById("myModal"+5).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+5)) {
         document.getElementById("myModal"+5).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+5).onclick = function() {
       document.getElementById("myModal"+5).style.display = "none";
    }
    

   
		document.getElementById("myBtn"+6).onclick = function() {
			document.getElementById("myModal"+6).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+6)) {
         document.getElementById("myModal"+6).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+6).onclick = function() {
       document.getElementById("myModal"+6).style.display = "none";
    }
	
	
	
		document.getElementById("myBtn"+7).onclick = function() {
			document.getElementById("myModal"+7).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+7)) {
         document.getElementById("myModal"+7).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+7).onclick = function() {
       document.getElementById("myModal"+7).style.display = "none";
    }
	


		document.getElementById("myBtn"+8).onclick = function() {
			document.getElementById("myModal"+8).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+8)) {
         document.getElementById("myModal"+8).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+8).onclick = function() {
       document.getElementById("myModal"+8).style.display = "none";
    }
	
	
	
		document.getElementById("myBtn"+9).onclick = function() {
			document.getElementById("myModal"+9).style.display = "block"; 
		}
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal"+9)) {
         document.getElementById("myModal"+9).style.display = "none";
        }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span"+9).onclick = function() {
       document.getElementById("myModal"+9).style.display = "none";
    }
</script>

</body>
</html>




