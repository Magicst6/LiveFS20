<html>

<head>

</head>

<body>

	<link rel="stylesheet" type="text/css" href="/wp-content/themes/structr/Page_Scripts/DataTables-1.10.19/media/css/jquery.dataTables.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"

        type="text/javascript"></script><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



<script type='text/javascript'>


    $(document).ready( function () {

        $('#table_id').DataTable();

    } );

	</script>

    <?php
	
	include "db.php";
	
	
  
		  $isEntry = "Select * From sv_Settings ";
$result = mysqli_query($con, $isEntry);

    while ($line1 = mysqli_fetch_array($result)) {

        $semDB=$line1['Semesterkuerzel'];

    }


   
        $Klasse =  $_GET['k'];

      $sem=$_GET['s'];
	
	if ($sem<>$semDB)
	{
		$DBAbw=$sem."_AbwesenheitenKompakt";
		$DBNoten=$sem."_Noten";
		$DBLK=$sem."_LernenderKurs";
		$DBLM=$sem."_LernendeModule";
		$DBPruefungen=$sem."_Pruefungen";
	} else{
		
		$DBAbw="sv_AbwesenheitenKompakt";
		$DBNoten="sv_Noten";
		$DBLK="sv_LernenderKurs";
		$DBLM="sv_LernendeModule";
		$DBPruefungen="sv_Pruefungen";
	} 
// echo $DBNoten;
	
	
        echo ' <br><br><br> <strong>Hier der Notenschnitt und die Abwesenheiten(in Klammern) in den Kursen:</strong>
	<br>';


	
			       echo '<table class="fixed_header" >';

        //Schreibe Spaltennamen

        echo "<thead>";

        echo "<tr>";

      

        echo "<th width=150px>".'Nachname'. "</th>";

        echo "<th width= 150px>".'Vorname'. "</th>";
			
			 echo "<th width= 200px>".'Kurse:'."</th>";
		
	
	    $isEntry = "SELECT * From $DBLK Where Klasse='$Klasse' group by KursID ";

        $result = mysqli_query($con,$isEntry);
 $g=2;
	        $csv[0][0] ="Nachname";
	        $csv[0][1] ="Vorname";
	        
      
        while( $value1= mysqli_fetch_array($result))
         
        { 
			
			$KursID=$value1['KursID'];
            $csv[0][$g]=$KursID;
			echo "<th>".$KursID. "</th>";
	  $g++;
		}
        echo "</tr>";

        echo "</thead>";

        echo "<tbody class='fixed_header'>";
       
 
	 
 
        $isEntry4 = "SELECT * From $DBLK where Klasse='$Klasse'  group by SchuelerID order by Nachname asc ";

        $result4 = mysqli_query($con,$isEntry4);

      $z=0;
        while( $value= mysqli_fetch_array($result4))

        {
			
			
			
			$ID=$value['SchuelerID'];
	
			
		
				
			 $isEntry1 = "SELECT * From $DBLM Where ID='$ID' order by Name asc  ";

        $result1 = mysqli_query($con,$isEntry1);

        while( $value2= mysqli_fetch_array($result1))
          
        {    
			
			
			$z++;
				if ($z==11 || $z==22 || $z==33)
				{
				 echo "<tr>";

         

        echo "<th width=40>".'Nachname    '. "</th>";

        echo "<th width= 40>".'Vorname   '. "</th>";
			
			 echo "<th width= 40>".'Kurse:'."</th>";
		
	
	    $isEntry = "SELECT * From $DBLK Where Klasse='$Klasse' group by KursID ";

        $result = mysqli_query($con,$isEntry);

      
        while( $value1= mysqli_fetch_array($result))

        { 
			$KursID=$value1['KursID'];
            
			echo "<th>".$KursID. "</th>";
	  
		}
        echo "</tr>";	
					
				}
				
             echo "<tr>";
			
			
			 	
		     
            $Name= str_replace(" ","?",$value2['Name']);

            $Vorname= str_replace(" ","?",$value2['Vorname']);
			
			$Name1= $value2['Name'];

            $Vorname1= $value2['Vorname'];
			 echo '<td>'.$Name1.'</td>';
			 echo '<td>'.$Vorname1.'</td>';
			
			 $csv[$z][0] = $Name1;
	         $csv[$z][1] = $Vorname1;
	       
			
				 	
		 echo "<td><strong>Note(∅)</strong> (Abw.):</td>";
            $Notengesamt=0;
            $Gewges=0;
			
			$isKurs=0;
			
			$isEntry = "SELECT * From $DBLK Where Klasse='$Klasse' group by KursID ";

        $result = mysqli_query($con,$isEntry);
			$h=1;
			  while( $value1= mysqli_fetch_array($result))

        { 
				  $h++;
			$KursID=$value1['KursID'];
			$isEntry5 = "SELECT * From $DBLK Where SchuelerID=$ID  group by KursID ";
	
			
        $result5 = mysqli_query($con,$isEntry5);
 
      
        while( $value5= mysqli_fetch_array($result5)){
			
			
		
		
				  
				  if ($KursID==$value5['KursID']){
					  
					  $isKurs=1;
				  }
			  }
				  if  ($isKurs==1){
			
          $isEntry2 = "SELECT * From $DBNoten Where SchuelerID='$ID' and KursID='$KursID'  order by Datum asc ";
          $isentall=$isEntry2;
          $result2 = mysqli_query($con,$isEntry2);

          // echo $isentall;
			
			$u=0;
			

          while( $value3= mysqli_fetch_array($result2))
           
			{
         
		  $Note=$value3['Note'];
			    $Gew=$value3['Gewichtung'];
			  
			  if ($Gew>0 && $Note)
			  {
			  $Notengesamt=$Notengesamt+$Note*$Gew;
			  $Gewges=$Gewges+$Gew;
			  }
        
		 
		
			}
			
	        $isEntry1 = "Select * From $DBAbw where Nachname='$Name1' and Vorname='$Vorname1' and Kursname ='$KursID' Order by Datum asc ";

   

	$result1 = mysqli_query( $con, $isEntry1 );
	$abwges = 0;
	$y = 0;
	$data2 = null;
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {

		
		$abwges = $abwges + $line1[ 'Abwesenheitsdauer' ];

	}
					  
			$Schuelerschnitt=$Notengesamt/$Gewges;
			if ($Schuelerschnitt>0){
			echo '<td  class="bold"><strong><a style="cursor: pointer;" onclick=showNotenoverview("'.$KursID.'","'.$ID.'")>'.$Schuelerschnitt.'</a></strong> <a style="cursor: pointer;" onclick=showAbwesenheiten("'.$KursID.'","'.$ID.'","'.$Name.'","'.$Vorname.'")>('.$abwges.')</a></td>';
				 $csv[$z][$h] = $Schuelerschnitt;
	        
			}
			else {
				echo '<td><strong>k. N.</strong>  <a style="cursor: pointer;" onclick=showAbwesenheiten("'.$KursID.'","'.$ID.'","'.$Name.'","'.$Vorname.'")>('.$abwges.')</a></td>';
				 $csv[$z][$h] = '-';
			}
            $Notengesamt='';
           $Gewges='';
		   $Schuelerschnitt='-';
       
		
		
			
		}else echo '<td></td>';
		}
			echo "</tr>";
			
			
		}
			 
		 
	 
		 
		}
       echo "</tbody>";

        echo "</table>";
   
	for ($i=0;$i<$z;$i++){
		
	for ($j=0;$j<10;$j++){
	//echo $csv[$i][$j];
	}
	}
	

	$fp = fopen('Notenblatt.csv', 'w');

foreach($csv as $arrays){
	
	
    fputcsv($fp, $arrays);
}

fclose($fp);

?>
	
    

 Hier das CSV-File zum Download:

    <br>

    <a href="/Ajax_Scripts/Notenblatt.csv" download>

         CSV-Notenblatt

    </a>	
   
	
   

</body>

</html>





	