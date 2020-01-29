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





    <!--<script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/jquery.min.js'></script>-->

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/moment.min.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/locale-all.js'></script>

    <link rel='stylesheet' href='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.css' />
	
	

    <?php

    global $current_user;

    get_currentuserinfo();

	

    ?>
	<input id="kidhidden" type="hidden">
    
<input id="farbehid" type="hidden">
    
    <script>

function getKursname(str){
if (str == "") {
       
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
                document.getElementById("kursid").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/getKursnamewthoutselect.php?q="+str,true);
        xmlhttp.send();
       
    }
}
		function getKursnamepre(str){
if (str == "") {
       
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
                document.getElementById("kursid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/getKursnamewthoutselect.php?q="+str+ "&k="+ document.getElementById('kidhidden').value,true);
        xmlhttp.send();
       
    }
}

            function reload() {

                var x = document.querySelector("#klassedrop").value;

                var y = document.querySelector("#Lehrpersondrop").value;

                window.location.href = "/pruefungen-verwaltung?&klasse=" + x + "&Lehrpersondr=" + y;

            }


	function getcolor(str1){
		
		
	 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("farbediv").innerHTML = this.responseText ;
				
            }
        };
        xmlhttp.open("GET","/Ajax_Scripts/getcolorAK.php?q="+str1+"&c="+document.getElementById('farbehid').value.substring(1,7),true);
        xmlhttp.send();
		
	}

    </script>

    <input type="hidden" name="curruser" id="curruser" value="<?php echo $current_user->ID ?>" class="text ui-widget-content ui-corner-all" readonly >

    <br>

    <br>

    

   <table  id="tab1 "width="1300" >
  <tbody>
    <tr>
      <td><strong>Klasse</strong></td>
      <td><strong>Lehrperson</strong></td>
    </tr>
    <tr>
      <td><select name="klassedrop" id="klassedrop" onchange="reload()" >



        <?php



        include 'db.php';







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



        ?>



    </select>
</td>
      <td> <select name="Lehrpersondrop"  id="Lehrpersondrop" onchange="reload()"   >



        <?php

        $isEntry= "Select * From sv_Lehrpersonen Order By Nachname ASC";

        $result = mysqli_query($con, $isEntry);



        echo "<option>".$_GET['Lehrpersondr']."</option>";

        echo "<option></option>";

        while( $line2= mysqli_fetch_array($result))

        {

            $ID = $line2['ID'];

            $Name = $line2['Nachname'];

            $Vorname = $line2['Vorname'];





            echo "<option>" . $Name.' '. $Vorname .' ID:'. $ID. "</option>";

        }

        ?>





    </select>
</td>
    </tr>
  </tbody>
</table>

   

   

    <script>

        $(document).ready(function() {


    


            var calendar = $('#calendar').fullCalendar({



                editable:true,

                defaultView:'listMonth',

                header:{

                    left:'prev,next today',

                    center:'title',

                    right:'month,agendaWeek,agendaDay,listMonth'

                },

                theme:'jquery-ui',
				
 


                navLinks: true, // can click day/week names to navigate views

                editable: true,

                locale: 'de',

                eventLimit: true, // allow "more" link when too many events

                events:  "/wp-content/themes/structr/Page_Scripts/GetPruefterminValues.php?q=1000000" + "&k="+ document.getElementById('klassedrop').value + "&l="+ document.getElementById('Lehrpersondrop').value,

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

                                document.getElementById('lernziele').value = "";

                                document.getElementById('kursid').value = "";

                                document.getElementById('klasse').value = "";

                                document.getElementById('lehrperson').value = "";
								document.getElementById('gewicht').value = "";

                                document.getElementById('farbe').value = "";

                            },



                            buttons: {

                                "Speichern":function()  {



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
 

 var text = document.getElementById('lernziele').value;
              text = text.replace(/\r/g, '!^');
					text = text.replace(/\n/g, '~!');

                                    xmlhttp.open("POST", "/wp-content/themes/structr/Page_Scripts/insertPrueftermin.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value   + "&color=" + document.getElementById('farbe').value.substring(1,7) + "&zimmer=" + document.getElementById('zimmer').value + "&l=" + document.getElementById('lehrperson').value +  "&gewichtung=" + document.getElementById('gewicht').value + "&lernziele=" + text, true);

                                    xmlhttp.send();



                                    dialog.dialog("close");



                                    



                                    calendar.fullCalendar('refetchEvents');

                                },



                                Cancel: function () {

                                    dialog.dialog("close");
									
									 calendar.fullCalendar('refetchEvents');

                                },





                            },

                            close: function () {

                                calendar.fullCalendar('refetchEvents');



                            }

                        });





                        dialog.dialog("open");



                    },













                editable:true,

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



                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updatePruefterminDrop.php?k=" + start + "&g=" + end + "&f=" + id, true);

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



                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updatePruefterminDrop.php?k=" + start + "&g=" + end + "&f=" + id, true);

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
                      
						
                          var text1 = event.lernziele;
                 text1 = text1.replace( /!^/g,'\r');
					text1 = text1.replace( /~!/g,'\n');			
		
							
						    document.getElementById('lernziele').value =text1;
							
								
							 document.getElementById('kidhidden').value=event.kursid;

                            getKursnamepre(event.klasse);
							
							 document.getElementById('farbehid').value = event.color;
							
							getcolor(event.kursid);

                            document.getElementById('kursid').value = event.kursid;

                            document.getElementById('klasse').value = event.klasse;

                            document.getElementById('lehrperson').value = event.lehrperson;
							
							document.getElementById('gewicht').value = event.gewichtung;

                            document.getElementById('farbe').value = event.color;

                        },

                         eventColor: event.color,


                        buttons: {

                            "Speichern": function(){

                       var farbe= document.getElementById('farbe').value.substring(1,7);

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

  var text = document.getElementById('lernziele').value;
            text = text.replace(/\r/g, '!^');
					text = text.replace(/\n/g, '~!');

                                xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updatePrueftermin.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+  "&f=" + event.id  + "&kursid=" + document.getElementById('kursid').value   + "&zimmer=" + document.getElementById('zimmer').value + "&l=" + document.getElementById('lehrperson').value + "&klasse=" + document.getElementById('klasse').value + "&color=" + farbe + "&gewichtung=" + document.getElementById('gewicht').value + "&lernziele=" + text, true);

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



                                     xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/deletePrueftermin.php?f=" + id, true);

                                     xmlhttp.send();

                                     calendar.fullCalendar('refetchEvents');

                                     alert("Event Removed");
									dialog.dialog("close");

                                 }

                             },

                            Cancel: function () {

                                dialog.dialog("close");
								
								 calendar.fullCalendar('refetchEvents');

                            },





                        },

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

             var text = document.getElementById('lernziele').value;
            text = text.replace(/\r/g, '!^');
					text = text.replace(/\n/g, '~!');

            xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertPrueftermin.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value +  "&color=" + document.getElementById('farbe').value.substring(1,7) + "&zimmer=" + document.getElementById('zimmer').value+ "&lehrperson=" + document.getElementById('lehrperson').value +"&gewichtung=" + document.getElementById('gewicht').value + "&lernziele=" + text, true);

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

                width: 600,

                modal: true,

                buttons: {

                    "Titel in Kalender Eintagen": addUser,

                    Cancel: function() {

                        dialog.dialog( "close" );

                    }

                },



            });









        } );

		
		


    </script>



    <script>

		
		function pruefungerfassen() {





                    var dialog, form,



                        // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29

                        tips = $(".validateTips");



                 









                        dialog = $("#dialog-form").dialog({



                            autoOpen: false,

                            height: 800,

                            width: 600,

                            modal: true,





                            open: function () {

                                document.getElementById('startdate').value = "";

                                document.getElementById('enddate').value = "";

                                document.getElementById('starttime').value = "";

                                document.getElementById('endtime').value = "";

                                document.getElementById('title').value = "";

                                document.getElementById('zimmer').value = "";

                                document.getElementById('lernziele').value = "";

                                document.getElementById('kursid').value = "";

                                document.getElementById('klasse').value = "";

                                document.getElementById('lehrperson').value = "";
								document.getElementById('gewicht').value = "";

                                document.getElementById('farbe').value = "";

                            },



                            buttons: {

                                "Speichern":function()  {



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


 var text = document.getElementById('lernziele').value;
              text = text.replace(/\r/g, '!^');
					text = text.replace(/\n/g, '~!');

                                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertPrueftermin.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value +   "&color=" + document.getElementById('farbe').value.substring(1,7) + "&zimmer=" + document.getElementById('zimmer').value + "&l=" + document.getElementById('lehrperson').value +  "&gewichtung=" + document.getElementById('gewicht').value + "&lernziele=" + text, true);

                                    xmlhttp.send();



                                    dialog.dialog("close");



                                    



                              //      calendar.fullCalendar('refetchEvents');
									
									return;

                                },



                                Cancel: function () {

                                    dialog.dialog("close");
									
								//	 calendar.fullCalendar('refetchEvents');
									
									return;

                                },





                            },

                            close: function () {

                               // calendar.fullCalendar('refetchEvents');

                                return;

                            }

                        });





                        dialog.dialog("open");



                    };





		
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

    </style>
</head>



<body>
	
	<div id="dialog-form" title="Prüfungsdaten">



<table class="timecard"  border="0">
  <caption>
    Prüfungsdaten
  </caption>
  <tbody>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Prüfungsname:</td>
      <td colspan="2"><input type="text" name="title" id="title" value="" width="400px" ></td>
    </tr>
	   <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Klasse:</td>
      <td colspan="2"><select type="text"  onchange="getKursname(this.value)"  name="klasse" id="klasse" value="" class="text ui-widget-content ui-corner-all" >
		  
		  
        <?php



        include 'db.php';







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



        ?>
		  
		  </select></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Kurs:</td>
      <td colspan="2"><select type="text" name="kursid" id="kursid" value=""   onChange="getcolor(this.value)" class="text ui-widget-content ui-corner-all" ></select></td>
    </tr>
    <tr>
		<td style="width: 150px; font-size: 12px; font-weight: bold;">Startdatum und Zeit:</td>
			
      <td><input type="date" name="startdate" id="startdate" value=""  class="text ui-widget-content ui-corner-all" ></td></td>
      <td><input type="time" name="starttime" id="starttime" value=""  class="text ui-widget-content ui-corner-all" ></td>
    </tr>
    <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Enddatum und Zeit:</td>
      <td><input type="date" name="enddate" id="enddate" value="" class="text ui-widget-content ui-corner-all" ></td>
      <td><input type="time" name="endtime" id="endtime" value="" class="text ui-widget-content ui-corner-all" ></td>
    </tr>
	 <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Gewichtung:</td>
      <td><input type="text" name="gewicht" id="gewicht" value="" class="text ui-widget-content ui-corner-all"  ></td>
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
      <td> <input type="text" name="zimmer" id="zimmer" value="" class="text ui-widget-content ui-corner-all" ></td>
    </tr>
	  <tr>
      <td style="width: 150px; font-size: 12px; font-weight: bold;">Lehrperson:</td>
      <td><select type="text" name="lehrperson" id="lehrperson" value="" class="text ui-widget-content ui-corner-all" >
		     


        <?php

        $isEntry= "Select * From sv_Lehrpersonen Order By Nachname ASC";

        $result = mysqli_query($con, $isEntry);



        echo "<option>".$_GET['Lehrpersondr']."</option>";

        echo "<option></option>";

        while( $line2= mysqli_fetch_array($result))

        {

            $ID = $line2['ID'];

            $Name = $line2['Nachname'];

            $Vorname = $line2['Vorname'];





            echo "<option>".$Name."</option>";

        }

        ?>


		  </select></td>
	  
	
  </tbody>
</table>	

<table class="timecard"  border="0" >
  <caption>
    Lernziele
  </caption>
  <tbody height="400px">
    <tr>
		<td><textarea id="lernziele" class="text ui-widget-content ui-corner-all"  onchange="show()"></textarea></td>
      
    </tr>
	 
   
  </tbody>
</table>
	
	
            <label for="farbe">Farbe:</label>

            <br>
         <div id="farbediv"></div>
   
        </fieldset>


    </form>

</div>
 <input id="lernzielehid" type="hidden">

<input name="myBtn1" id="myBtn1" type="button" value="Mail versenden"  />

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
	
	<br><br><input name="pruefungerf" id="pruefungserf" type="button" value="Prüfung erfassen"  onClick="pruefungerfassen()" /><br><br>

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
table td{
border:none;
}
table {
border:none;
}

	
</style>

<script>
	function show()
	{
		 var text = document.getElementById('lernziele').value;
                   text = text.replace(/\r/g, '^^^^');
					text = text.replace(/\n/g, '~~~~');	
		
		//alert(text);
	}
</script>

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

        xmlhttp.open("GET","/wp-content/themes/structr/Page_Scripts/GetPruefterminValuesMail.php?q=1000000" + "&k="+ document.getElementById('klassedrop').value + "&l="+ document.getElementById('Lehrpersondrop').value + "&m="+ document.getElementById('Mail').value,true);

        xmlhttp.send();


    }


</script>

