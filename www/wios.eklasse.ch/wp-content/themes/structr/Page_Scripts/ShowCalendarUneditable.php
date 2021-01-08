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

                events:  "/wp-content/themes/structr/Page_Scripts/GetCalendarValues.php?q="+ document.getElementById('curruser').value,

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

                        width: 300,

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

                            width: 300,

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

                                document.getElementById('farbe').value = event.color;

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

                height: 800,

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

</head>

<body>

<div id="dialog-form" title="Termin">

    <p class="validateTips">Bitte Felder ausfüllen oder ändern</p>



    <form>

        <fieldset>

            <label for="Title">Titel:</label>

            <br>

            <input type="text" name="title" id="title" value="" class="text ui-widget-content ui-corner-all" readonly >

            <br>

            <label for="start">Startdatum und Zeit:</label>

            <br>

            <input type="date" name="startdate" id="startdate" value=""  class="text ui-widget-content ui-corner-all">

            <input type="time" name="starttime" id="starttime" value=""  class="text ui-widget-content ui-corner-all">

            <br>

            <label for="end">Enddatum und Zeit:</label>

            <br>

            <input type="date" name="enddate" id="enddate" value="" class="text ui-widget-content ui-corner-all">

            <input type="time" name="endtime" id="endtime" value="" class="text ui-widget-content ui-corner-all">

            <br>

            <label for="kursid">KursID:</label>

            <br>

            <input type="text" name="kursid" id="kursid" value="" class="text ui-widget-content ui-corner-all" >

            <br>

            <label for="kursname">Kursname:</label>

            <br>

            <input type="text" name="kursname" id="kursname" value="" class="text ui-widget-content ui-corner-all" >

            <br>

            <label for="klasse">Klasse:</label>

            <br>

            <input type="text" name="klasse" id="klasse" value="" class="text ui-widget-content ui-corner-all" >

            <br>

            <label for="zimmer">Zimmer:</label>

            <br>

            <input type="text" name="zimmer" id="zimmer" value="" class="text ui-widget-content ui-corner-all" >

            <br>

            <label for="lehrperson">Lehrperson:</label>

            <br>

            <input type="text" name="lehrperson" id="lehrperson" value="" class="text ui-widget-content ui-corner-all" >

            <br>

            <label for="farbe">Farbe:</label>

            <br>

            <input type="text" name="farbe" id="farbe" value="" class="text ui-widget-content ui-corner-all" >

            <!-- Allow form submission with keyboard without duplicating the dialog button -->

            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">



        </fieldset>

    </form>

</div>



<?php



include 'db.php';



$today=date("Y-m-d");

//$delOlder= "Delete  From sv_KurseAll Where Datum < '$today' ";

//mysqli_query($con,$delOlder);



?>





<div id='calendar'></div>

<div id='respond'></div>



</body>

</html>

<style>

	.fc-list-item-title:hover{
  background:lightgrey;
		 cursor: pointer;
}

    body {

        font-family:"Dosis", "Helvetica Neue", sans-serif;

        color:#232323;

    }



    #calendar {

        max-width: 900px;

        margin: 0 auto;

    }



</style>


