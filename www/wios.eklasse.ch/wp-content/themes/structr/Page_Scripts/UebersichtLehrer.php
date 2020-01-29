
<html>
<head>

	
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<!--	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.css">-->
	<style type="text/css" class="init">
	
	</style>
	
	
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init"></script>
	
		<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	
	 
   
	
    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/moment.min.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/locale-all.js'></script>

    <link rel='stylesheet' href='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.css' />

	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
</head>
<!--
			<div class="demo-html width=50%"></div>
			<table id="example" class="display" style="width:50%">
				<thead>
					<tr>
						<th>Note</th>
						<th>Name</th>
						<th>Gewichtung</th>
						<th>Datum</th>
					</tr>
				</thead>
				
			</table>
			
</html>-->
	
	
	
	<script>
	 var table;
		var table1;
	$(document).ready(function() {
  
 
	//var data= [{"Note":"6","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"2","Name":"dsgs","Gewichtung":"0","Datum":"2019-06-16"},{"Note":"3.7","Name":"dsgs","Gewichtung":"25","Datum":"2019-06-16"}]  ;
	
 
  
 // function format (data) {
//	  var i;  
//	  var note=null;
//	  
//	  for(i=1; i<10; i++){
//		var Notedt= data["Note"+i];
//		var  Namedt=data["Name"+i];
//		var  Gewichtungdt= data["Gewichtung"+i];
//		var  Datumdt=data["Datum"+i];
//		 
//		if ((Notedt)>1 && Notedt<=6){
//	  var z=null;
//	 var z= '<div class="details-container"><table cellpadding="5" cellspacing="0" border="0" class="details-table">'
//            
//		  +'<tr>'+
//                  '<td class="title">Note'+i+':</td>'+
//                  '<td>'+Notedt+'</td>'+
//		     '<td class="title">Notenname:</td>'+
//		  '<td>'+Namedt+'</td>'+
//		    '<td class="title">Gewichtung:</td>'+
//		   '<td>'+Gewichtungdt+'</td>'+
//		   '<td class="title">Datum:</td>'+
//		   '<td>'+Datumdt+'</td></tr>'+
//			 
//          '</table>'+
//     
//
//		    '</div>';
//		if (note==null){
//	       note=z;
//		}
//			else note=note+z;
//		  }
//		  
//  }
//	  
//	  return note;
//  };
//  
		var new_url= "/wp-content/themes/structr/Page_Scripts/GetAbwesenheitenKompakt_Lehrer.php?l="+document.getElementById("lehrer").value;
		//	var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende_Archiv.php?q="+document.getElementById("Semester").value;
                   
		
      $.fn.dataTable.ext.errMode = 'throw';
  table = $('.datatables').DataTable({
	      dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      
	
	    ajax: {
			
			url: new_url,
			
            dataSrc: ""
			
        },
    columns : [
      {
        className      : 'details-control',
        defaultContent : '',
        data           : null,
        orderable      : false
      },
      {data : 'Klasse'},
		{data : 'Kursname'},
		{data : 'Datum'},
		{data : 'Kommentar'},
		{data : 'KommentVer'},
		{data : 'Abwesenheitsdauer'},
		{data : 'Nachname'},
		{data : 'Vorname'},
		{data : 'Lehrer'},
		{data : 'Entschuldigt'}
		
			 
			
	
    
			
		
    ],
    
  
  });

        var new_url2 = "/wp-content/themes/structr/Page_Scripts/GetKurshistorie_Lehrer.php?l=" + document.getElementById("lehrer").value;


       
        table2 = $('.datatables2').DataTable({

            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],


            ajax: {

                url: new_url2,

                dataSrc: ""

            },
            columns: [
                {
                    //className      : 'details-control',
                    data: 'ID',

                    orderable: false
                },

                {data: 'Stattgefunden'},
                {data: 'Datum'},
                {data: 'KursID'},
                {data: 'Lehrer'},
                {data: 'Kommentar'},
                {data: 'Lektionen'}


            ],


       
  
  });
 
//  $('.datatables tbody').on('click', 'td.details-control', function () {
//     var tr  = $(this).closest('tr'),
//         row = table.row(tr);
//    
//     if (row.child.isShown()) {
//       tr.next('tr').removeClass('details-row');
//       row.child.hide();
//       tr.removeClass('shown');
//     }
//     else {
//       row.child(format(row.data())).show();
//       tr.next('tr').addClass('details-row');
//       tr.addClass('shown');
//     }
//  });
 

	
		});
		
function tableshow(){
		var new_url= "/wp-content/themes/structr/Page_Scripts/GetLernendeModule.php?q="+document.getElementById("Kursname").value;
	var new_url1= "/wp-content/themes/structr/Page_Scripts/GetLernende.php?q="+document.getElementById("Kursname").value;
	
		
                    
		
	
	table1.ajax.url( new_url1 ).load();
}		
		
		
	</script>
	
	

	
	
	</html>

	<style>
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

.iconSettings, td.details-control:before, tr.shown td.details-control:before {
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
  content: /*'\2b'*/;
}
/*
tr.shown td.details-control:before {
  content: '\2212';
}
*/	</style>
<script>
	

    function getKursname(str){

        location.reload;

        if (str == "") {

            document.getElementById("Kursnm").innerHTML = "";

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

                    document.getElementById("Kursnm").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+str,true);

            xmlhttp.send();

        }

    }

  
  

    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

</script>

<style type="text/css"> 
.clear{
  clear: left;
}

.container {
  width: auto;
  padding: 10px;
  border: 0px solid;
}

.left {
  float: auto;
  width: auto;
  padding: 10px;
  border: 2px solid #3e4ac9;
  text-align: center;
}
	.leftn {
  float: auto;
  width: auto;
  padding: 10px;
  border: 0px solid;
  text-align: center;
}
	.leftn2 {
  float: left;
  width: auto;
  padding: 10px;
  border: 0px solid;
  text-align: center;
}
		.leftn1 {
  float: auto;
  width: auto;
  padding: 10px;
  border: 2px solid;
  text-align: center;
}
</style>

<div class="container">
  <div class="clear"></div>
	
	<div class="left">
   <h4>Mein Klassenbuch</h4>
		<script>

    function getKursname(str){

        location.reload;

        if (str == "") {

            document.getElementById("Kursnm").innerHTML = "";

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

                    document.getElementById("Kursnm").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/getKursnameLehrer.php?q="+str,true);

            xmlhttp.send();

        }

    }

    function test(str){

        if (str == "") {

            document.getElementById("lernende").innerHTML = "";

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

                    document.getElementById("lernende").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+str+"&k="+document.getElementById("lehrer").value+"&h="+document.getElementById("date").value,true);

            xmlhttp.send();

        }

    }

    function testdate(str){

        if (str == "") {

            document.getElementById("lernende").innerHTML = "";

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

                    document.getElementById("lernende").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+document.getElementById("Kursnm").value+"&k="+document.getElementById("lehrer").value+"&h="+str,true);

            xmlhttp.send();

        }

    }

    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

</script>

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







    echo '<form action=" /DBFuellung/DBFuellungKlbu.php" method="POST">';



    echo '<input class="insertframe" id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>
<br>
<br>Kursname:<br>

<select id="Kursnm" name="Kursnm" required="required"  onchange="test(this.value)">

    <?php

    include 'db.php';

    

    preg_match("/:(.*)/", $Lehrer, $output_array);

    $Lehrer=$output_array[1];



    $y=0;







    $isEntry= "Select Kurs1, Kurs2, Kurs3, Kurs4, Kurs5, Kurs6, Kurs7, Kurs8, Kurs9,Kurs10,Kurs11,Kurs12,Kurs13,Kurs14,Kurs15,Kurs16,Kurs17, Kurs18, Kurs19, Kurs20, Kurs21, Kurs22, Kurs23, Kurs24, Kurs25,Kurs26,Kurs27,Kurs28,Kurs29,Kurs30 From sv_Lehrpersonen Where ID = $Lehrer";

    $result = mysqli_query($con,$isEntry);





    echo "<option>" . '-Select-' . "</option>";



    while( $line2= mysqli_fetch_array($result))

    {

        for($x = 1; $x <= 30; $x++)

        {



            $value = $line2['Kurs'.$x];

            if ($value<>"") echo "<option>" . $value . "</option>";



        }

    }

    ?>



</select>

<br><br>

Aktuelles Datum:

<br><br>

<input style="width: 145px;" name="date" id="date" type="date" value="<?php echo $heute;?>"  onchange="testdate(this.value)"  required="required" />

<br><br>

<div id="lernende"><b>Abwesenheiten werden hier eingetragen...</b></div>

<br><br>

<input name="Senden" type="submit" value="Senden" onclick="checkKurs(Kursnm.value)" />



</form>&nbsp;




	</div>
<div class="leftn">
	<br>
</div>
 <div class="left">
   <h4>Meine Kurstermine</h4>
	  <?php

    global $current_user;

    get_currentuserinfo();

    

    ?>
<input id="kidhidden" type="hidden">
	
	<input id="farbehid" type="hidden">
    
	
    <script>

		function alertcol(){
			
			alert(document.getElementById('test').value);
		}


            function reload() {

                var x = document.querySelector("#klassedrop").value;

                var y = document.querySelector("#Lehrpersondrop").value;

                window.location.href = "/terminkalender?&klasse=" + x + "&Lehrpersondr=" + y;

            }

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

    


<?php

include 'db.php';

$isEntry= "Select ID From sv_Lehrpersonen where User_ID='$current_user->ID'";

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







    


   
    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;
	
}

$IDLP=$value;

?>
	
	<input  id="lehrer" name="lehrer" readonly="readonly" type="hidden" value="<?php echo $Lehrer; ?>" />
</em>

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
						height: 450,

                theme:'jquery-ui',

                navLinks: true, // can click day/week names to navigate views

                editable: true,

                locale: 'de',

                eventLimit: true, // allow "more" link when too many events

                events:  "/wp-content/themes/structr/Page_Scripts/GetCalendarValues.php?q="+document.getElementById('curruser').value,

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
								
							    document.getElementById('lehrpers').value = <?php echo $Name; ?>;

                                document.getElementById('farbe').value = "";
								
								document.getElementById('kursidinp').value = "";

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





                                    xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value + "&farbe=" + document.getElementById('farbe').value.substring(1,7) + "&zimmer=" + document.getElementById('zimmer').value + "&l=" + document.getElementById('lehrpers').value +"&kursidinp=" + document.getElementById('kursidinp').value, true);

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
							document.getElementById('kidhidden').value=event.kursid;

                            
							getKursnamepre(event.klasse);
							
							 document.getElementById('farbehid').value = event.color;
							
							getcolor(event.kursid);
                           
							document.getElementById('kursname').value = event.kursname;

                            document.getElementById('kursid').value = event.kursid;
							
							 document.getElementById('kursidinp').value = "";

                            document.getElementById('klasse').value = event.klasse;

                            document.getElementById('lehrpers').value = event.lehrperson;

                            document.getElementById('farbe').value = event.color;
                        },



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





                                xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/updateCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+  "&f=" + event.id  + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value  + "&zimmer=" + document.getElementById('zimmer').value + "&l=" + document.getElementById('lehrpers').value + "&klasse=" + document.getElementById('klasse').value + "&farbe=" + farbe +"&kursidinp=" + document.getElementById('kursidinp').value, true);

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









    

    <style>



        body {

            margin: 40px 10px;

            padding: 0;

            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;

            font-size: 14px;

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





            xmlhttp.open("GET", "/wp-content/themes/structr/Page_Scripts/insertCalendar.php?q=" + title.val() + "&k=" + startCustdate.val() + "T" + startCusttime.val() + "&g=" + endCustdate.val() + "T" + endCusttime.val()+ "&klasse=" + document.getElementById('klasse').value + "&kursid=" + document.getElementById('kursid').value + "&kursname=" + document.getElementById('kursname').value + "&farbe=" + document.getElementById('farbe').value.substring(1,7) + "&zimmer=" + document.getElementById('zimmer').value+ "&l=" + document.getElementById('lehrpers').value +"&kursidinp=" + document.getElementById('kursidinp').value, true);

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

                    "Titel in Kalender Eintagen": addUser,

                    Cancel: function() {

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

    </style>
</head>

<body>



    </form>





<input name="myBtn1" id="myBtn1" type="hidden" value="Mail versenden"  />

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

        xmlhttp.open("GET","/wp-content/themes/structr/Page_Scripts/GetCalendarValuesMail.php?q=1000000" + "&k="+ document.getElementById('klassedrop').value + "&l="+ document.getElementById('Lehrpersondrop').value + "&m="+ document.getElementById('Mail').value,true);

        xmlhttp.send();


    }


</script>
	</div>
<div class="leftn">
	<br>
</div>
	<div class="left">
   <h4>Meine Prüfungstermine</h4>
		
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

	
<body>



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



    

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>

 

   <!-- </br>Klasse:

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

    

    Lehrperson:

    

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

            var calendar1 = $('#calendar1').fullCalendar({

                editable:false,

                defaultView:'listMonth',

                header:{

                    left:'prev,next today',

                    center:'title',

                    right:'month,agendaWeek,agendaDay,listMonth'

                },
				height: 450,

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







                                calendar1.fullCalendar('refetchEvents');

                            },

*/

                            Cancel: function () {

                                dialog.dialog("close");
								
								 calendar1.fullCalendar('refetchEvents');

                            },





                        },

                        close: function () {

                            calendar1.fullCalendar('refetchEvents');



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

                    calendar1.fullCalendar('refetchEvents');

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







                                    calendar1.fullCalendar('refetchEvents');

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

                                calendar1.fullCalendar('refetchEvents');

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



        #calendar1 {

            max-width: 600px;
            max-height: 500px;
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



    </style>

</head>






<?php



include 'db.php';



$today=date("Y-m-d");

$delOlder= "Delete  From sv_KurseAll Where Datum < '$today' ";

mysqli_query($con,$delOlder);



?>

<input name="myBtn1" id="myBtn1" type="hidden" value="Mail versenden"  />

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



<div id='calendar1'></div>

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
        max-width: 600px;
        max-height: 500px;  
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



</script>


</div>
<div class="leftn">
	<br>
</div>
  <div class="left">
   <h4>Abwesenheiten meiner Lernenden</h4>
 

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


    echo '<input class="insertframe" id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}

?>



<br><br>

<h1>Abwesenheitsübersicht</h1>

  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatables" width="80%">
        <thead>
          <tr>
            <th></th>
            <th>Klasse</th>
            <th>Kursname</th>
			<th>Datum</th>
	        <th>Kommentar</th>
			  <th>KommentVer</th>
            <th>Abwesenheitsdauer</th>
			<th>Nachname</th>
	        <th>Vorname</th>
		    <th>Lehrer</th>
			  <th>Entschuldigt</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

 
<br><br>

 </div>
<div class="leftn">
	<br>
</div>
  <div class="left">
    <h4>Meine Kurshistorie</h4>
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


    echo '<input class="insertframe" id="lehrer" name="lehrer" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}

?>

<br><br>

<br><br>


<h1>Kurshistorie</h1>


  <div class="row">
    <form class="col-md4"></form>
  </div>
  <div class="row">
    <div class="col md12">
      <table class="table table-striped table-hover datatables2" width="80%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Stattgefunden</th>
			<th>Datum</th>
	        <th>KursID</th>
			  <th>Lehrer</th>
            <th>Kommentar</th>
			<th>Lektionen</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
 
<br><br>





  </div>
  <div class="clear"></div>
</div>


</form>&nbsp;

<style>
.insertframe{
    font-family: arial, sans-serif;
    width: 80%;
    height: 26px;
    vertical-align: middle;
	text-align: center;
    font-size: 15px;
}
    body {
        font-family:"Dosis", "Helvetica Neue", sans-serif;
        color:#232323;
    }

    #calendar {
        max-width: 600px;
		 max-height: 500px;
        margin: 0 auto;
    }

</style>


