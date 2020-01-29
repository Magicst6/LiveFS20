<!DOCTYPE html>

<html>

<head>

    <meta charset='utf-8' />





    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>jQuery UI Dialog - Default functionality</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>





    <link rel='stylesheet' href='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.css' />

    <!--<script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/jquery.min.js'></script>-->

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/moment.min.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/locale-all.js'></script>

    <?php
	include "db.php";

    global $current_user;

    get_currentuserinfo();



    ?>

    <script>



        function reload() {

            var x = document.querySelector("#klassedrop").value;

            var y = document.querySelector("#Lehrperson").value;

            window.location.href = "/deine-termine?&klasse=" + x + "&Lehrperson=" + y;

        }



    </script>

    <input type="hidden" name="curruser" id="curruser" value="<?php echo $current_user->ID ?>" class="text ui-widget-content ui-corner-all" readonly >

	<br><br>
<body>
<h4>Schüler:
</h4>


<?php


$isEntry= "Select ID From sv_LernendeModule where User_ID=$current_user->ID";

$result = mysqli_query($con, $isEntry);



while( $line2= mysqli_fetch_assoc($result))

{

    $value=$line2['ID'];



    $isEntry= "Select Name, Vorname From sv_LernendeModule WHERE ID='$value'";

    $result = mysqli_query($con, $isEntry);

    while( $line3= mysqli_fetch_array($result))

    {

        $Name = $line3['Name'];

        $Vorname = $line3['Vorname'];



    }










    echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>


   <!-- </br>Klasse:<br>

    <select name="klassedrop" id="klassedrop" onchange="reload()" >



        <?php

/*

        $con = @mysqli_connect('heimmart.mysql.db.internal', "heimmart_test", "Tab_12_3");



        if (!$con) {

            echo "Error: " . mysqli_connect_error();

            exit();

        }

        //echo 'Connected to MySQL';





        $verbunden=mysqli_select_db($con, "heimmart_klingmobile");

        if($verbunden)

            echo '';

        else

            die('DB-Verbindung fehlgeschlagen! ');







        $isEntry= "Select Klasse From sv_Lernende";

        $result1 = mysqli_query($con,$isEntry);

        $resultarr1 = array();

        echo "<option>".$_GET['klasse']."</option>";

        echo "<option></option>";

        while( $line2= mysqli_fetch_assoc($result1))

        {

            $resultarr1[] = $line2['Klasse'];

        }

        $uniquearr1 = array_unique($resultarr1);

        asort($uniquearr1);





        foreach ($uniquearr1 as $value)

        {

            if ($value == $_GET['klasse']){}

            else

            {

                echo "<option>" . $value . "</option>";

            }

        }



        */?>



    </select>

    <br>

    Lehrperson:

    <br>

    <select name="Lehrperson"  id="Lehrperson" onchange="reload()"   >



        <?php

/*        $isEntry= "Select * From sv_Lehrpersonen Order By Nachname ASC";

        $result = mysqli_query($con, $isEntry);



        echo "<option>".$_GET['Lehrperson']."</option>";

        echo "<option></option>";

        while( $line2= mysqli_fetch_array($result))

        {

            $ID = $line2['ID'];

            $Name = $line2['Nachname'];

            $Vorname = $line2['Vorname'];





            echo "<option>" . $Name.' '. $Vorname .' ID:'. $ID. "</option>";

        }

        */?>





    </select>-->

    <script>

        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({

                editable:false,

                defaultView:'listMonth',

                header:{

                    left:'prev,next today',

                    center:'title',

                    right:'month,agendaWeek,agendaDay,listMonth'

                },

                navLinks: true, // can click day/week names to navigate views

                editable: false,

                locale: 'de',

                theme:'jquery-ui',

                eventLimit: true, // allow "more" link when too many events

                events:  "/wp-content/themes/structr/Page_Scripts/GetPruefterminValues.php?q="+ document.getElementById('curruser').value,

                eventTextColor: 'black',

                selectable:true,

                selectHelper:true,

                select: function(startev, endev, allDay) {





                    var dialog, form,



                        // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29

                        tips = $(".validateTips");



                    startevdate = $.fullCalendar.formatDate(startev, "YYYY-MM-DD");

                    endevdate = $.fullCalendar.formatDate(endev, "YYYY-MM-DD");

                    startevtime = $.fullCalendar.formatDate(startev, "HH:mm:ss");

                    endevtime = $.fullCalendar.formatDate(endev, "HH:mm:ss");

                    startdatepicker = startevdate;

                    enddatepicker = endevdate;

                    starttimepicker = startevtime;

                    endtimepicker = endevtime;











                    dialog = $("#dialog-form").dialog({



                        autoOpen: false,

                        height: 800,

                        width: 600,

                        modal: true,





                        open: function () {

                            document.getElementById('startdate').value = startdatepicker;

                            document.getElementById('enddate').value = enddatepicker;

                            document.getElementById('starttime').value = starttimepicker;

                            document.getElementById('endtime').value = endtimepicker;

                            document.getElementById('title').value = "";

                            document.getElementById('zimmer').value = "";

                            document.getElementById('kursname').value = "";

                            document.getElementById('kursid').value = "";

                            document.getElementById('klasse').value = "";

                            document.getElementById('lehrperson').value = "";

                            document.getElementById('farbe').value = "";
							
							document.getElementById('gewicht').value = "";

                        },



                        buttons: {

                            /*"Speichern":function()  {



                                title = $("#title"),

                                    startCustdate = $("#startdate"),

                                    endCustdate = $("#enddate"),

                                    startCusttime = $("#starttime"),

                                    endCusttime = $("#endtime"),

                                    allFields = $([]).add(title).add(startCustdate).add(endCustdate).add(startCusttime).add(endCusttime);





                                var valid = true;

                                allFields.removeClass("ui-state-error");



                                $("#users tbody").append("<tr>" +

                                    "<td>" + title.val() + "</td>" +

                                    "<td>" + startCustdate.val() + "</td>" +

                                    "<td>" + endCustdate.val() + "</td>" +

                                    "<td>" + startCusttime.val() + "</td>" +

                                    "<td>" + endCusttime.val() + "</td>" +

                                    "</tr>");





                                if (window.XMLHttpRequest) {

                                    // code for IE7+, Firefox, Chrome, Opera, Safari

                                    xmlhttp = new XMLHttpRequest();

                                } else {

                                    // code for IE6, IE5

                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                                }

                                xmlhttp.onreadystatechange = function () {

                                    if (this.readyState == 4 && this.status == 200) {

                                        document.getElementById("respond").innerHTML = this.responseText;

                                    }

                                };





                                xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value + "&farbe=" + document.getElementById('farbe').value + "&zimmer=" + document.getElementById('zimmer').value+ "&lehrperson=" + document.getElementById('lehrperson').value, true);

                                xmlhttp.send();



                                dialog.dialog("close");







                                calendar.fullCalendar('refetchEvents');

                            },

*/

                            Cancel: function () {

                                dialog.dialog("close");

                            },





                        },

                        close: function () {

                            calendar.fullCalendar('refetchEvents');



                        }

                    });





                   // dialog.dialog("open");



                },













                editable:false,

                eventResize:function(event) {

                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                    var title = event.title;

                    var id = event.id;

                    var color = event.color;

                    if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("respond").innerHTML = this.responseText;

                        }

                    };



                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updateCalendarDrop.php?k=" + start + "&g=" + end + "&f=" + id, true);

                    xmlhttp.send();

                    calendar.fullCalendar('refetchEvents');

                    alert('Event Update');









                },



                eventDrop:function(event)

                {

                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                    var title = event.title;

                    var id = event.id;



                    if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("respond").innerHTML = this.responseText;

                        }

                    };



                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updateCalendarDrop.php?k=" + start + "&g=" + end + "&f=" + id, true);

                    xmlhttp.send();

                    calendar.fullCalendar('refetchEvents');

                    alert("Event Updated");

                },









                eventClick:function(event)

                {

                    var dialog,form,

                        dialog = $("#dialog-form").dialog({



                            autoOpen: false,

                            height: 800,

                            width: 600,

                            modal: true,


                           


                            open: function () {
								
								
                                var startdate = $.fullCalendar.formatDate(event.start, "Y-MM-DD");

                                var enddate = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                var starttime = $.fullCalendar.formatDate(event.start, "HH:mm:ss");

                                var endtime = $.fullCalendar.formatDate(event.end, "HH:mm:ss");

                                var id= event.ID;

                                document.getElementById('startdate').value = startdate;

                                document.getElementById('enddate').value = enddate;

                                document.getElementById('starttime').value = starttime;

                                document.getElementById('endtime').value = endtime;

                                document.getElementById('title').value = event.title;

                                document.getElementById('zimmer').value = event.zimmer;

                                document.getElementById('kursname').value = event.kursname;

                                document.getElementById('kursid').value = event.kursid;

                                document.getElementById('klasse').value = event.klasse;

                                document.getElementById('lehrperson').value = event.lehrperson;
								
								
                          var text1 = event.lernziele;
                    text1 = text1.replace( /!^/g,'\r');
					text1 = text1.replace( /~!/g,'\n');			
		
							
						    document.getElementById('lernziele').value =text1;

                                document.getElementById('farbe').value = event.color;
								
								document.getElementById('gewicht').value = event.gewichtung;
								
								
								 if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("dialog-form").innerHTML = this.responseText;

                        }

                    };



                   // xmlhttp.open("GET", "/Ajax_Scripts/showschuelernoten.php?f=" + event.klasse +  "&e=" + event.gewichtung + "&g=" + event.kursid +"&h=" + startdate +"&i=" + event.title  + "&j=" + starttime+  "&k=" + enddate + "&l=" + endtime + "&m=" + event.zimmer + "&n=" + event.kursname+  "&o=" + event.lehrperson+ "&p=" + event.color, true);

                  //  xmlhttp.send();

                            },



                            /*buttons: {

                                "Speichern": function(){



                                    title = $("#title");

                                    startCustdate = $("#startdate");

                                    endCustdate = $("#enddate");

                                    startCusttime = $("#starttime");

                                    endCusttime = $("#endtime");

                                    allFields = $([]).add(title).add(startCustdate).add(endCustdate).add(startCusttime).add(endCusttime);





                                    var valid = true;

                                    allFields.removeClass("ui-state-error");



                                    $("#users tbody").append("<tr>" +

                                        "<td>" + title.val() + "</td>" +

                                        "<td>" + startCustdate.val() + "</td>" +

                                        "<td>" + endCustdate.val() + "</td>" +

                                        "<td>" + startCusttime.val() + "</td>" +

                                        "<td>" + endCusttime.val() + "</td>" +

                                        "</tr>");





                                    if (window.XMLHttpRequest) {

                                        // code for IE7+, Firefox, Chrome, Opera, Safari

                                        xmlhttp = new XMLHttpRequest();

                                    } else {

                                        // code for IE6, IE5

                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                                    }

                                    xmlhttp.onreadystatechange = function () {

                                        if (this.readyState == 4 && this.status == 200) {

                                            document.getElementById("respond").innerHTML = this.responseText;

                                        }

                                    };





                                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updateCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+"&f=" + event.id + "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value + "&farbe=" + document.getElementById('farbe').value + "&zimmer=" + document.getElementById('zimmer').value+ "&lehrperson=" + document.getElementById('lehrperson').value, true);

                                    xmlhttp.send();



                                    dialog.dialog("close");







                                    calendar.fullCalendar('refetchEvents');

                                },

                                "Löschen":function(){

                                    if(confirm("Are you sure you want to remove it?")) {

                                        var id = event.id;

                                        if (window.XMLHttpRequest) {

                                            // code for IE7+, Firefox, Chrome, Opera, Safari

                                            xmlhttp = new XMLHttpRequest();

                                        } else {

                                            // code for IE6, IE5

                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                                        }

                                        xmlhttp.onreadystatechange = function () {

                                            if (this.readyState == 4 && this.status == 200) {

                                                document.getElementById("respond").innerHTML = this.responseText;

                                            }

                                        };



                                        xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/deleteCalendar.php?f=" + id, true);

                                        xmlhttp.send();

                                        calendar.fullCalendar('refetchEvents');

                                        alert("Event Removed");

                                    }

                                },

                                Cancel: function () {

                                    dialog.dialog("close");

                                },





                            },*/

                            close: function () {

                                calendar.fullCalendar('refetchEvents');

                            }

                        });

                    form = dialog.find("form").on("submit", function (event) {

                        event.preventDefault();

                    });

                    dialog.dialog("open");

                },

            });

        });

    </script>


<style>



        body {

            margin: 40px 10px;

            padding: 0;

            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;

            font-size: 14px;

        }



        #calendar {

            max-width: 900px;

            margin: 0 auto;

        }



    </style>





    <script>





        function addUser() {



            title = $("#title"),

                startCustdate = $("#startdate"),

                endCustdate = $("#enddate"),

                startCusttime = $("#starttime"),

                endCusttime = $("#endtime"),

                allFields = $([]).add(title).add(startCustdate).add(endCustdate).add(startCusttime).add(endCusttime);





            var valid = true;

            allFields.removeClass("ui-state-error");



            $("#users tbody").append("<tr>" +

                "<td>" + title.val() + "</td>" +

                "<td>" + startCustdate.val() + "</td>" +

                "<td>" + endCustdate.val() + "</td>" +

                "<td>" + startCusttime.val() + "</td>" +

                "<td>" + endCusttime.val() + "</td>" +

                "</tr>");





            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function () {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("respond").innerHTML = this.responseText;

                }

            };





            xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value + "&farbe=" + document.getElementById('farbe').value + "&zimmer=" + document.getElementById('zimmer').value+ "&lehrperson=" + document.getElementById('lehrperson').value, true);

            xmlhttp.send();



            dialog.dialog("close");





            alert("Added Successfully");

        }

        $( function() {

            var dialog, form,



                // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29



                tips = $( ".validateTips" );





            function addUser() {







                dialog.dialog( "close" );





            }



            dialog = $( "#dialog-form" ).dialog({

                autoOpen: false,

                height: 900,

                width: 300,

                modal: true,

                buttons: {



                    OK: function() {

                        dialog.dialog( "close" );

                    }

                },



            });









        } );



    </script>



    <script>

        $(function(){



            $('input[type=datetime-local]').datepicker({

                    dateFormat : 'YYYY-MM-DD HH:mm:ss'

                }

            );



        });

    </script>
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

		
table.timecard {
	margin: auto;
	width: 100%;
	border-collapse: collapse;
	border: 1px solid #fff; /*for older IE*/
	border-style: hidden;
}

table.timecard caption {
	background-color: #3356FB;
	color: #fff;
	font-size: x-large;
	font-weight: bold;
	letter-spacing: .3em;
}

table.timecard thead th {
	padding: 8px;
	background-color: #8DCBFF;
	font-size: large;
}

table.timecard thead th#thDay {
	width: 40%;	
}

table.timecard thead th#thRegular, table.timecard thead th#thOvertime, table.timecard thead th#thTotal {
	width: 20%;
}

table.timecard th, table.timecard td {
	padding: 3px;
	border-width: 1px;
	border-style: solid;
	border-color: #3356FB #ccc;
}

table.timecard td {
	text-align: right;
}

table.timecard tbody th {
	text-align: left;
	font-weight: normal;
}

table.timecard tfoot {
	font-weight: bold;
	font-size: large;
	background-color: #687886;
	color: #fff;
}

table.timecard tr.even {
	background-color: #fde9d9;
}

input[type=text], select {
  width: 100%;
	padding: 0px 0px;
  margin: 0px 0;
  display: inline-block;
  border: 0px solid #FFFFFF;
  border-radius: 4px;
}



    </style>

</head>



<div id="dialog-form" title="Prüfungsdaten">



<table class="timecard"  border="0">
  <caption>
    Prüfungsdaten
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Prüfungsname:</td>
      <td colspan="2"><input type="text" name="title" id="title" value="" width="400px" readonly></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Kurs:</td>
      <td colspan="2"><input type="text" name="kursid" id="kursid" value="" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
    <tr>
		<td style="width: 150px; font-size: 12px; font-weight: bold;">Startdatum und Zeit:</td>
			
      <td><input type="date" name="startdate" id="startdate" value=""  class="text ui-widget-content ui-corner-all" readonly></td></td>
      <td><input type="time" name="starttime" id="starttime" value=""  class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Enddatum und Zeit:</td>
      <td><input type="date" name="enddate" id="enddate" value="" class="text ui-widget-content ui-corner-all" readonly></td>
      <td><input type="time" name="endtime" id="endtime" value="" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Gewichtung:</td>
      <td><input type="text" name="gewicht" id="gewicht" value="" class="text ui-widget-content ui-corner-all" readonly ></td>
      <td style="padding-left: 5px;padding-bottom:3px; font-size: 10px;">Wert 1 entspricht einfacher Gewichtung</td>
    </tr>
	
  </tbody>
</table>

<table class="timecard"  border="0">
  <caption>
    Ort und Aufsicht
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Zimmer:</td>
      <td> <input type="text" name="zimmer" id="zimmer" value="" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	  <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Lehrperson:</td>
      <td><input type="text" name="lehrperson" id="lehrperson" value="" class="text ui-widget-content ui-corner-all" readonly></td>
	  
	
  </tbody>
</table>	

<table class="timecard"  border="0">
  <caption>
    Lernziele
  </caption>
  <tbody>
    <tr>
      <td><td><textarea id="lernziele" class="text ui-widget-content ui-corner-all" height="400px" readonly ></textarea></td></td>
      
    </tr>
	 
   
  </tbody>
</table>
    <form>
		 <fieldset>

            

             <input type="hidden" name="gewicht" id="gewicht" value="" class="text ui-widget-content ui-corner-all" readonly >



            <input type="hidden" name="kursid" id="kursid" value="" class="text ui-widget-content ui-corner-all" readonly>

    

       

            <input type="text" name="kursname" id="kursname" value="" class="text ui-widget-content ui-corner-all" readonly>

    

      
            <input type="hidden" name="klasse" id="klasse" value="" class="text ui-widget-content ui-corner-all" readonly>

    

        

            <input type="hidden" name="zimmer" id="zimmer" value="" class="text ui-widget-content ui-corner-all" readonly>

     

   

            <input type="hidden" name="lehrperson" id="lehrperson" value="" class="text ui-widget-content ui-corner-all" readonly>

            <br>

            
           

            <input type="hidden" name="farbe" id="farbe" value="" class="text ui-widget-content ui-corner-all" readonly>



        </fieldset>




    </form>

</div>

  <?php



include 'db.php';



$today=date("Y-m-d");

$delOlder= "Delete  From sv_KurseAll Where Datum < '$today' ";

mysqli_query($con,$delOlder);



?>

<p>
  <input name="myBtn1" id="myBtn1" type="button" value="Termine per Mail senden"  />
</p>
<p>&nbsp; </p>
<div id="myModal1" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
       Wenn Sie sich Ihre Termine für den Outlook Kalender zusenden lassen möchten, geben Sie hier Ihre Mailadresse an. Klicken Sie dann "Mail versenden" und es wird eine Mail an die eingegebene Adresse gesendet. Es wird dann eine Datei im Anhang der Mail sein, mit der alle Ihre Termine durch Öffnen der Datei automatisch in den Outlook Kalender eingetragen werden.
<br>
<br>Bitte die Mailadresse eingeben:   <input name="Mail" type="email" id="Mail" />    <input name="Button1" type="button" value="Mail versenden" onclick="Mail()" />

<br><br><br>
<div id='status'></div>

        <span class="close" id="span1">&times;</span>


       
    </div>

</div>



<div id='calendar'></div>

<div id='respond'></div>

<div id='lernende'></div>

</body>

</html>

<style>

    body {

        font-family:"Dosis", "Helvetica Neue", sans-serif;

        color:#232323;

    }



    #calendar {

        max-width: 900px;

        margin: 0 auto;

    }
	textarea {
  width: 450px;
  height: 400px;
}


</style>

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
		  
    function Mail(){


            document.getElementById("status").innerHTML = "start sending...";



        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                 document.getElementById("status").innerHTML = this.responseText;

            }

        };

        xmlhttp.open("GET","/wp-content/themes/structr/Page_Scripts/GetPruefterminValuesMail.php?q="+ document.getElementById('curruser').value +  "&m="+ document.getElementById('Mail').value,true);

        xmlhttp.send();


    }


</script>

