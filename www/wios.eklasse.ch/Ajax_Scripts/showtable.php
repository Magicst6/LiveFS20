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

   
        $KursID =  $_GET['k'];

      $sem=$_GET['s'];
	
	if ($sem)
	{
		$DBNoten=$sem."_Noten";
		$DBLK=$sem."_LernenderKurs";
		$DBLM=$sem."_LernendeModule";
		$DBPruefungen=$sem."_Pruefungen";
	} else{
		
		$DBNoten="sv_Noten";
		$DBLK="sv_LernenderKurs";
		$DBLM="sv_LernendeModule";
		$DBPruefungen="sv_Pruefungen";
	} 
	
	
	
        echo ' <br><br><br> <strong>Hier die Noten in den Prüfungen des Kurses:</strong>
	<br>';


        echo '<table id="table_id" class="display">';

        //Schreibe Spaltennamen

        echo "<thead>";

        echo "<tr>";

      

        echo "<th width=40>".'Nachname'. "</th>";

        echo "<th width= 40>".'Vorname'. "</th>";
	
	$isEntry = "SELECT Name,Gewichtung,Datum From $DBNoten Where KursID='$KursID' Group by Name Order by Datum asc";

        $result = mysqli_query($con,$isEntry);

        $z=0;



        while( $value= mysqli_fetch_array($result))

        {
			$z++;
        $Datum=$value['Datum'];
			${'PrName' . $z} =$value['Name'];
        echo "<th width= 100>".${'PrName' . $z}."</th>";
       	${'Gew' . $z} =$value['Gewichtung'];
        echo "<th width= 20>".'Gew.'."</th>";
			
		}

	     echo "<th width= 40>".'Durchschnitt(Ø)'. "</th>";    
	
        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";
	 

        $isEntry = "SELECT * From $DBLK Where KursID='$KursID' order by Nachname asc ";

        $result = mysqli_query($con,$isEntry);

      
        while( $value1= mysqli_fetch_array($result))

        {
			  echo "<tr>";
       
			$ID=$value1['SchülerID'];
				
			 $isEntry1 = "SELECT * From $DBLM Where ID='$ID'  ";

        $result1 = mysqli_query($con,$isEntry1);
 
        while( $value2= mysqli_fetch_array($result1))
          
        {           

            $Name= $value2['Name'];

            $Vorname=$value2['Vorname'];
			 echo '<td><strong>'.$Name.'</strong></td>';
			 echo '<td><strong>'.$Vorname.'</strong></td>';
            $Notengesamt=0;
            $Gewges=0;
			for ($i=1;$i<=$z;$i++){
          $isEntry2 = "SELECT * From $DBNoten Where SchuelerID='$ID' and KursID='$KursID' and Name= '${'PrName' . $i}' order by Datum asc ";
          $isentall=$isEntry2.$isent1.$isent2;
          $result2 = mysqli_query($con,$isentall);

          // echo $isentall;
			
			$u=0;
			

          while( $value3= mysqli_fetch_array($result2))
           
			{
           $u++;
		  $Note=$value3['Note'];
			    $Gew=$value3['Gewichtung'];
			  
			  if ($Gew>0)
			  {
			  $Notengesamt=$Notengesamt+$Note*$Gew;
			  $Gewges=$Gewges+$Gew;
			  }
          echo '<td>'.$Note.'</td>';
			  
		echo '<td>'.$Gew.'</td>';
			
		 
			
		  }if ($u==0){
			  echo '<td></td>';
			  
		echo '<td></td>';
			  
		  }
			  
			}
			
			$Schuelerschnitt=$Notengesamt/$Gewges;
			echo '<td><strong>'.$Schuelerschnitt.'</strong></td>';
            echo "</tr>";
           
		
        
		}
		}
		   
	         echo "<tr>";
	         echo '<td></td>';
			 echo '<td><strong>Durchschnitt(Ø):</strong></td>';
	
	  for ($i=1;$i<=$z;$i++)
	  {
	       $isEntry = "SELECT * From $DBNoten Where Name='${'PrName' . $i}' and KursID='$KursID' order by Datum asc ";

           $result = mysqli_query($con,$isEntry);

           $y=0;
       
           $NoteAll=0;
		  
           while( $value4= mysqli_fetch_array($result))
           {
			$y++;
			$Noteschn=$value4['Note'];
			
			$NoteAll=$NoteAll+$Noteschn; 
	       }
			
		    $Schnitt="";
		       if ($y<>0){
		                     $Schnitt=$NoteAll/$y;
	                     }
		  
		    echo '<td><strong>'.$Schnitt.'</strong></td>';
		   echo '<td></td>';
	  }
            echo "</tr>";
		
        echo "</tbody>";

        echo "</table>";


    ?>

   

</body>

</html>