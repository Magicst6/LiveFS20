<head>

	   <meta charset='utf-8' />





    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>jQuery UI Dialog - Default functionality</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>





    <link rel='stylesheet' href='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.css' />

    <!--<script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/jquery.min.js'></script>-->

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/moment.min.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/locale-all.js'></script>
	

    <meta charset='utf-8' />





    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>jQuery UI Dialog - Default functionality</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTablesEditor/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>





    <link rel='stylesheet' href='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.css' />

    <!--<script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/jquery.min.js'></script>-->

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/lib/moment.min.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/fullcalendar.js'></script>

    <script src='/wp-content/themes/structr/Page_Scripts/fullcalendar/locale-all.js'></script>
	
	<script src="https://cdn.tiny.cloud/1/p4y59yu91l1ttdi8h066ovomyunbzi9p44zqccnlmn9ly5ge/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	
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

	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

	

   

	
</head>

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

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+str+"&k="+document.getElementById("lehrer").value+"&h="+document.getElementById("today").value,true);

            xmlhttp.send();

        }

		
		check();
		
    }
	
	 function test11(){

        

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

            xmlhttp.open("GET","/Ajax_Scripts/showlernendeLehrer.php?q="+document.getElementById("Kursnm").value+"&k="+document.getElementById("lehrer").value+"&h="+document.getElementById("date").value+"&j="+document.getElementById("Lektionen").value + "&f="+document.getElementById("tookplace").checked,true);

            xmlhttp.send();

        

		
		check();
		
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

		check();
    }
	
    function checkKurs(str){

        if (str == "-Select-") {

          alert('Bitte einen Kurs auswählen')

            return;

        }

    }

	
	 function check(){


  setTimeout(function(){
	  
	  var count = document.getElementById("count").value;
	  
	  
	  var i;
	  
	  for (i=1 ; i<=count ;i++){
		  
		  var radio= "Dauer"+i;
		  var abw ="abw"+i;
	      var abw= document.getElementById(abw).value;
		  
	  
	  document.querySelector('input[name="'+ radio + '"][value="' + abw  + '"]').checked = true;
	 
	  }				   
					   
					   }, 1500);
        

    }
	
	 $(document).ready(function() {
		 
		 	var table;
	
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
		 var titlecolor;
	   var calendar = $('#calendar').fullCalendar({

                editable:false,
		   
		   height:400,

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

                events:  "/wp-content/themes/structr/Page_Scripts/GetKlBuValues.php?q="+ document.getElementById('curruser').value,

                

                selectable:true,

		         displayEventTime : false,
		   
                selectHelper:true,
  eventClick:function(event)

                {
                           document.getElementById('Kursnm').value=event.kursid;
					
						 startevtime = $.fullCalendar.formatDate(event.start, "HH:mm");

                    endevtime = $.fullCalendar.formatDate(event.end, "HH:mm");
							
						
								 if (window.XMLHttpRequest) {

                        // code for IE7+, Firefox, Chrome, Opera, Safari

                        xmlhttp = new XMLHttpRequest();

                    } else {

                        // code for IE6, IE5

                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                    }

                    xmlhttp.onreadystatechange = function () {

                        if (this.readyState == 4 && this.status == 200) {

                            document.getElementById("lernende").innerHTML = this.responseText;

                        }

                    };



                    xmlhttp.open("GET", "/Ajax_Scripts/showlernendeLehrer.php?q=" + event.kursid +  "&h=" + event.datum +"&k="+document.getElementById("lehrer").value +"&j="+event.lektionen +"&s="+startevtime +"&e="+endevtime  , true);

                   xmlhttp.send();

					check();
					
                     window.location.hash = "lernende";
                            },
		eventRender: function (event, element) {
    element.find('.fc-title').html(event.title);/*For Month,Day and Week Views*/
    element.find('.fc-list-item-title').html(event.title);/*For List view*/
}
		   
    
		   

                
        });
		 
		 });
</script>

<?php

include 'db.php';

$isEntrykl= "Select Klassenbuch From sv_Settings ";

$resultkl = mysqli_query($con, $isEntrykl);



while( $linekl= mysqli_fetch_assoc($resultkl))

{

$isKlBu=$linekl['Klassenbuch'];	
}
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

<input type="hidden" name="today" id="today" value="<?php echo $heute ?>" class="text ui-widget-content ui-corner-all" readonly >
<br><br>

Lehrperson:

<br>

<?php
 global $current_user;

    get_currentuserinfo();




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



    echo '<input  id="lehrer" name="lehrerklbu" readonly="readonly" type="text" value="'.$Vorname .' '.$Name .' ID:'. $value .'" />' ;

    $Lehrer=$Vorname .' '.$Name .' ID:'. $value;

}



?>
  <input type="hidden" name="curruser" id="curruser" value="<?php echo $current_user->ID ?>" class="text ui-widget-content ui-corner-all" readonly >
<br><br>
<?
if ($isKlBu=="true"){
	
	
 
echo '<div id="calendar"></div>';
echo '<br><br>';
echo 'Kursname:<br>';
echo '<input id="Kursnm" name="Kursnm" required="required"  onchange="test(this.value)" readonly=readonly>';
	
}	else {
	echo '	<br><br>';

echo '<select id="Kursnm" name="Kursnm" required="required"  onchange="test(this.value)">';

    

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

    



echo '</select>';
	}
		?>
		
		
	

    

<br><br>


<div id="lernende"  ><b>Abwesenheiten werden hier eingetragen...</b></div>

<br><br>

<input name="Senden" type="submit" value="Senden" onclick="checkKurs(Kursnm.value)" />



</form>&nbsp;

<script>	

</script>


<br><br>




<br><br>

<h1>Abwesenheitsübersicht</h1>
<div class="bck">
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
	  </div>
 
<br><br>


<style>
	ax {
    }

	.fc-list-item-title:hover{
  background:lightgrey;
		 cursor: pointer;
}
</style>
