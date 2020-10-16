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
	
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	
	
	
	<!--	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.css">-->
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

	</head>
    <?php
	include "db.php";

    global $current_user;

    get_currentuserinfo();



    ?>

	
	
    <script>

  var editor;
 var table;
		

        function reload() {

            var x = document.querySelector("#klassedrop").value;

            var y = document.querySelector("#Lehrperson").value;

            window.location.href = "/deine-termine?&klasse=" + x + "&Lehrperson=" + y;

        }



    </script>

    <input type="hidden" name="curruser" id="curruser" value="<?php echo $current_user->ID ?>" class="text ui-widget-content ui-corner-all" readonly >

	
<body>
<h4>Lehrperson:
</h4>
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







    echo '<form action=" /DBFuellung/DBFuellungKlbu.php" method="POST">';



    echo '<input  id="lehrer" class="ninput" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>

    <br>

    <br>

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

			tableshow();
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
								
								 calendar.fullCalendar('refetchEvents');

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

                                

                                document.getElementById('kursid').value = event.kursid;

                                document.getElementById('klasse').value = event.klasse;

                                document.getElementById('lehrperson').value = event.lehrperson;

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



                    xmlhttp.open("GET", "/Ajax_Scripts/showschuelernoten.php?f=" + event.klasse +  "&e=" + event.gewichtung + "&g=" + event.kursid +"&h=" + startdate +"&i=" + event.title  + "&j=" + starttime+  "&k=" + enddate + "&l=" + endtime + "&m=" + event.zimmer + "&n=" + event.kursname+  "&o=" + event.lehrperson+ "&p=" + event.color, true);

                    xmlhttp.send();

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









    <br><br>

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





            xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value  + "&farbe=" + document.getElementById('farbe').value + "&zimmer=" + document.getElementById('zimmer').value+ "&lehrperson=" + document.getElementById('lehrperson').value, true);

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
	font-size: large;
	font-weight: normal;
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
  border: 1px solid #FFFFFF;
  border-radius: 4px;
}

 input[type=text].ninput {

            width:auto;

           

        }

    </style>

</head>



<div id="dialog-form" title="Prüfungsfenster">
	


<table class="timecard"  border="0">
  <caption>
    Prüfungsdaten
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Prüfungsname:</td>
      <td colspan="2"><input type="text" name="title" id="title" value="<?php echo $_GET['i'];?>" width="400px" readonly></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Kurs:</td>
      <td colspan="2"><input type="text" name="kursid" id="kursid" value="<?php echo $_GET['g'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
    <tr>
		<td style="width: 150px; font-size: 12px; font-weight: bold;">Startdatum und Zeit:</td>
			
      <td><input type="date" name="startdate" id="startdate" value="<?php echo $_GET['h'];?>"  class="text ui-widget-content ui-corner-all" readonly></td></td>
      <td><input type="time" name="starttime" id="starttime" value="<?php echo $_GET['j'];?>"  class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Enddatum und Zeit:</td>
      <td><input type="date" name="enddate" id="enddate" value="<?php echo $_GET['k'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
      <td><input type="time" name="endtime" id="endtime" value="<?php echo $_GET['l'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Gewichtung:</td>
      <td><input type="text" name="gewicht" id="gewicht" value="<?php echo $_GET['e'];?>" class="text ui-widget-content ui-corner-all" readonly ></td>
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
      <td> <input type="text" name="zimmer" id="zimmer" value="<?php echo $_GET['m'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
    </tr>
	  <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Lehrperson:</td>
      <td><input type="text" name="lehrperson" id="lehrperson" value="<?php echo $_GET['o'];?>" class="text ui-widget-content ui-corner-all" readonly></td>
		
    </tr>
   
	
  </tbody>
</table>	
<!--
<table class="timecard"  border="0">
  <caption>
    Lernziele
  </caption>
  <tbody>
    <tr>
      <td><input type="textarea" name="lernziele" id="lernziele" value="" class="text ui-widget-content ui-corner-all" ></td>
      
    </tr>

   
  </tbody>
</table>

   
		

        


-->
   



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






</div>



<?php



include 'db.php';



$today=date("Y-m-d");

$delOlder= "Delete  From sv_KurseAll Where Datum < '$today' ";

mysqli_query($con,$delOlder);



?>

<input name="myBtn1" id="myBtn1" type="button" value="Mail versenden"  /><br><br>

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

function myFunction3(str) {
	  
  if (str.value.indexOf(",")>0)
    {
	 x = str.value;
  	 y = x.replace(",", ".");				  
     alert( 'Bitte "." statt "," verwenden!');
	 str.value=y;				  															 
	}
}

	function loadeditor(){	
		
    editor = new $.fn.dataTable.Editor( {
        ajax: {
            url: "/wp-content/themes/structr/Page_Scripts/pruefungenvaluesLehrer.php",
            type: 'POST',
            data: {
             
				'KID':  document.getElementById("lehrer").value
				
			
			}
        }, 
		
        table: ".datatables",
        fields: [
			
			{
			 label: "Pruefungsname:",
                name: "Pruefungsname"
                
		},		
			{
			 label: "KursID:",
                name: "KursID",
				type:'readonly'
                
		}, {
                label: "Datum:",
                name: "Datum",
				 type: "date"
            },	 {
                label: "Start(Format: YYYY-MM-DD HH:mm:ss):",
                name: "Start",
				 
				
            }	
			, {
                label: "Ende(Format: YYYY-MM-DD HH:mm:ss):",
                name: "Ende",
				
                
            },	  {
			 label: "Klasse:",
                name: "Klasse",
				type:'readonly'
               
              
		},			
				 { 
                label: "Lehrperson:",
                name: "Lehrperson",
					 type:'readonly'
            }, {
                label: "Lehrperson ID:",
                name: "LP_ID",
				type:'readonly'
            }, {
                label: "Zimmer:",
                name: "Zimmer"
               
            }, {
                label: "Gewichtung:",
                name: "Gewichtung"
               
            }, {
                label: "Kommentar:",
                name: "Kommentar"
               
            }
				
        ],
		i18n: {
            remove: {
                button: "Löschen",
                title:  "Eintrag löschen",
                submit: "Endgültig Löschen",
                confirm: {
                    _: 'Sind Sie sicher, dass Sie die %d ausgwählten Zeilen löschen wollen?',
                    1: 'Sind Sie sicher, dass Sie die ausgewählte Zeile löschen wollen?'
                }
            },
            edit: {
                button: "Bearbeiten",
                title:  "Eintrag bearbeiten",
                submit: "Änderungen speichern"
            },
            create: {
                button: "Neuer Eintrag",
                title:  "Neuen Eintrag anlegen",
                submit: "Neuen Eintrag speichern"
            },
            datetime: {
                    previous: 'Zurück',
                    next:     'Weiter',
                    months:   [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
                    weekdays: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
                    amPm:     [ 'am', 'pm' ],
                    unknown:  '-'
            },
            error: {            
                    system: "Ein Systemfehler ist aufgetreten (<a target=\"_blank\" href=\"//datatables.net/tn/12\">Für mehr Informationen</a>)."
            },
            multi: {
                    title: "Mehrere Werte",         
                    info: "Die ausgewählten Elemente enthalten verschiedene Werte für das Feld. Um alle Elemente für diess Feld auf den gleichen Wert zu setzen, klicken Sie bitte hier. Ansonsten werden die Elemente ihren jeweiligen Wert behalten.",
                    restore: "Änderungen rückgängig machen",
                    noMulti: "Dieses Feld kann einzeln bearbeitet werden, aber nicht als Teil einer Gruppe."
            },
        }      
		
    } );
		
		
		  // Activate an inline edit on click of a table cell
    $('.datatables').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit();
													  
													  
													  } }
        } );
    } );
		
 
	 
	}
	
		
	
function loadtable(){
		
			table = $( '.datatables' ).DataTable( {
             
				responsive:true,

			dom: "lBfrtip",
        ajax:{
            url: "/wp-content/themes/structr/Page_Scripts/pruefungenvaluesLehrer.php",
            type: 'POST',
            data: {
				'KID': document.getElementById("lehrer").value
				
				
			
			}
        }, 
		
				 columns: [
           
				 {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
 {
                className: 'details-control1',
                defaultContent: '',
                data: null,
                orderable: false,
                title:' '


            },

	{
	
					data: 'Pruefungsname'
				
				},
					  {
					      data: 'KursID'
						 
				},
					  {
				
						  data: 'Datum'
						
				},
					 
					
					  {
					      data: 'Klasse'
						 
				},
					  {
				
						  data: 'Lehrperson'
						
				},
					 
					  {
		
						  data: 'LP_ID'
						 
				},
					  {
					      data: 'Zimmer'
						 
				},
					  {
				
						  data: 'Gewichtung'
						
				},
					 
					  {
		
						  data: 'Kommentar'
						 
				}
					 
			],
			select: true,
				order: [[ 4, "desc" ]],
        buttons: [
            { extend: "edit",   editor: editor,text: 'Prüfung  bearbeiten' },
            { extend: "remove", editor: editor,text: 'Prüfung löschen' }
        ], "language": {
            "decimal": ",",
            "thousands": ".",
            "info": "Anzeige _START_ bis _END_ von _TOTAL_ Einträgen",
            "infoEmpty": "Keine Einträge",
            "infoPostFix": "",
            "infoFiltered": "(gefiltert aus insgesamt _MAX_ Einträgen)",
            "loadingRecords": "keine Daten vorhanden oder es werden Daten geladen...",
            "lengthMenu": "Anzeigen von _MENU_ Einträgen",
            "paginate": {
                "first": "Erste",
                "last": "Letzte",
                "next": "Nächste",
                "previous": "Zurück"
            },
            "processing": "Verarbeitung läuft ...",
            "search": "Suche:",
            "searchPlaceholder": "Suchbegriff",
            "zeroRecords": "Keine Daten! Bitte ändern Sie Ihren Suchbegriff.",
            "emptyTable": "Keine Daten vorhanden",
            "aria": {
                "sortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
                "sortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
            },
            //only works for built-in buttons, not for custom buttons
            "buttons": {
                "create": "Neu",
                "edit": "Ändern",
                "remove": "Löschen",
                "copy": "Kopieren",
                "csv": "CSV-Datei",
                "excel": "Excel-Tabelle",
                "pdf": "PDF-Dokument",
                "print": "Drucken",
                "colvis": "Spalten Auswahl",
                "collection": "Auswahl",
                "upload": "Datei auswählen...."
            },
            "select": {
                "rows": {
                    _: '%d Zeilen ausgewählt',
                    0: 'Zeile anklicken um auszuwählen',
                    1: 'Eine Zeile ausgewählt'
                }
            }
        }            

		} );
	
	
    $( '.datatables tbody' ).on( 'click', 'td.details-control1', function () {
        var tr = $( this ).closest( 'tr' ),
            row = table.row( tr );



        row.child( neueNote( row.data() ) ).show();
        tr.next( 'tr' ).addClass( 'details-row' );
        tr.addClass( 'shown' );


    } );
	
}
 function neueNote( data ) {
			 document.getElementById("Pruefunglb1").value=data['Pruefungsname'];
				document.getElementById("Kurslb1").value = data['KursID']; 

			 document.getElementById("Datumlb1").value=data['Datum'];
			document.getElementById("Gewichtunglb1").value=data['Gewichtung'];
		
	 
	 	 if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("Noten").innerHTML = this.responseText;

                        }

                    };



                    xmlhttp.open("GET", "/Ajax_Scripts/showschuelernotenliste.php?f=" + data['Klasse'] +  "&e=" + data['Gewichtung'] + "&g=" + data['KursID'] +"&h=" + data['Datum'] +"&i=" + data['Pruefungsname']  + "&k=" + data['Ende'] + "&n=" + data['Start'] + "&m=" + data['Zimmer'] +  "&o=" + data['Lehrperson'], true);

                    xmlhttp.send();
	document.getElementById("myModal2").style.display = "block"; 
	 
   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal2")) {
 
		document.getElementById("myModal2").style.display = "none";
			 document.getElementById("Pruefunglb1").value = "";
	 document.getElementById("Kurslb1").value = "";
	 document.getElementById("Gewichtunglb1").value = "";
	 document.getElementById("Datumlb1").value = "";
			
			      }
    }
	
	 //When the user clicks on <span> (x), close the modal
     document.getElementById("span2").onclick = function() {
       document.getElementById("myModal2").style.display = "none";
	document.getElementById("Pruefunglb1").value = "";
	 document.getElementById("Kurslb1").value = "";
	 document.getElementById("Gewichtunglb1").value = "";
	 document.getElementById("Datumlb1").value = "";
			
		 
		
    }
			
       
	 
	 
		
		}
		
			
	
	
function tableshow() {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	loadeditor();
	
	
	loadtable();


 
	
	


	
}
function tableshow1(str) {
	
	if ( table ) {
		table.destroy();
	}
	
	if ( editor ) {
		editor.destroy();
	}
	loadeditor();
	
	
	loadtable();


 
	showtable(str);
	


	
}

  
	
function showtable(str) {
	
	

		
		

            if (window.XMLHttpRequest) {

                // code for IE7+, Firefox, Chrome, Opera, Safari

                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            }

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("tabpruefungen").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/showtable.php?k="+str,true);

            xmlhttp.send();

        }
	

 
	
	


	


 
</script>

	


<html>
<body>
	
<em>Hier können Sie Ihre Prüfungsnoten eintragen und die Prüfungen editieren</em>
	

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


    echo '<input  id="lehrer1" name="lehrer1" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;
	
	echo '<input  id="lehrer" name="lehrer" readonly="readonly" type="hidden" value="'. $value .'" />' ;


}



		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }

?>

<br><br>


		</script>


<style>
	#tooltip {
  position: absolute;
  z-index: 1001;
  display: none;
  border: 2px solid #ebebeb;
  border-radius: 5px;
  padding: 10px;
  background-color: #fff;
}
	
div.DTE div.DTE_Body div.DTE_Field {
    padding: 0.7em 0 0 0;
}
div.DTE div.DTE_Body div.DTE_Field > label {
    float: none;
    clear: both;
    width: 100%;
}
div.DTE div.DTE_Body div.DTE_Field > div.DTE_Field_Input {
    float: none;
    clear: both;
    width: 100%;
}

div.DTE div.DTE_Header,
div.DTE div.DTE_Footer {
    background-color: transparent;
    border-color: black
}

div.DTE div.DTE_Header {
    height: 60px;
}

p.start-editing,
p.add-new {
    text-align: center;
    font-size: 1.4em;
    line-height: 1.4em;
}


p.start-editing {
    padding-top: 7em;
}

#container {
    display: flex;
    align-items: stretch;
}

#table-container {
    box-sizing: border-box;
    width: 55%;
    padding: 0 1em;
}

#form-container {
    box-sizing: border-box;
    width: 45%;
    padding: 0 1em;
}


	
	.container {
		margin-top: 15px;
	}
	
	.container .details-row td {
		padding: 0;
		margin: 0;
	}
	
	.details-container {
		width: 100%;
		height: 100%;
		background-color: #FFF;
		padding-top: 5px;
	}
	
	.details-table {
		width: 100%;
		background-color: #FFF;
		margin: 5px;
	}
	
	.title {
		font-weight: bold;
	}
	
	.iconSettings,
	td.details-control:before,
	tr.shown td.details-control:before {
		margin-top: 5px;
		margin-bottom: 10px;
		font-size: 12px;
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: 400;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
	}
	
	td.details-control {
		cursor: pointer;
		text-align: center;
	}
	
	td.details-control:before {
		content: '\2b';
	}
	
	tr.shown td.details-control:before {
		content: '\2212';
	}

	.iconSettings,
	td.details-control1:before,
	tr.shown td.details-control1:before {
		margin-top: 5px;
		margin-bottom: 10px;
		font-size: 12px;
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: 400;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
	}
	
	td.details-control1 {
		cursor: pointer;
		text-align: center;
	}
	
	td.details-control1:before {
		content: '✎';
	}
	
	tr.shown td.details-control1:before {
		content: '✎';
	}
	
	
	
		.iconSettings,
	td.details-control2:before,
	tr.shown td.details-control2:before {
		margin-top: 5px;
		margin-bottom: 10px;
		font-size: 12px;
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: 400;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
	}
	
	td.details-control2 {
		cursor: pointer;
		text-align: center;
	}
	
	td.details-control2:before {
		content: url(/plussmall.png);
	}
	
	tr.shown td.details-control2:before {
		content: url(/plussmall.png);
	}

</style>
	
<style>
        body {}

        .modal3{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
		.modal1{
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }


        /* Modal Content */
        .modal-content3 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 1200px;
        }
		
		.modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 1400px;
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
<div id="myModal2" class="modal3">

    <!-- Modal content -->
    <div class="modal-content3">
     

Prüfungsname:     <input id="Pruefunglb1" readonly>                       
Kurs:        <input id="Kurslb1" readonly><br><br>
Datum:        <input id="Datumlb1" readonly><br><br>
Gewichtung:        <input id="Gewichtunglb1" readonly><br><br>

             
            <p>Bitte hier die Noten eintragen (erst nach Prüfungsdatum möglich)...</p>
		   
		   <div id="Noten"></div>
            
			
           

        <span class="close" onclick="reload.location()"  id="span2">&times;</span>


        
    </div>

</div>


<div class="container">
	<div class="row">
		<form class="col-md4"></form>
	</div>
	<div class="row">
		<div class="col md12">
			<table class="table table-striped table-hover datatables" width=1300px>
				<thead>
					<tr>	
						<th width= 1%></th>
						<th width= 3%></th>
						<th width= 12%>Pruefungsname</th>
	                    <th width =11%>KursID</th>
						<th width=7%>Datum</th>
	                    <th width =7%>Klasse</th>
						<th width=7%>Lehrperson<pe/th>
						<th width =5%>LP ID</th>
						<th width=5%>Zimmer</th>
	                    <th width =4%>Gew.</th>
						<th width= 17%>Kommentar</th>
						
						
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

	
	
	<br><br>
	<h4>Für eine Notenüberbersicht der Prüfungen bitte Kurs wählen...</h4>
	<br><br>
Kursname:
<br>
 
<select id="Kursname" name="Kursname" required="required"  onchange="tableshow1(this.value)">

   <?php

    include 'db.php';

    $lp='sv_Lehrpersonen';

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From $lp Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);



 echo "<option>" . $Kursnme . "</option>";

 


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
	<br>
        
	
	
	<div id="tabpruefungen"></div>

		
	</body>
</html>
<script>
	
function myFunction3(str) {
	  
  if (str.value.indexOf(",")>0)
    {
	 x = str.value;
  	 y = x.replace(",", ".");				  
     alert( 'Bitte "." statt "," verwenden!');
	 str.value=y;				  															 
	}
}
	</script>


</script>

