

<?
include 'db.php';
 $isEntry0 = "Select * From sv_LernenderKurs group by KursID  ";




$result0 = mysqli_query( $con, $isEntry0 );


while ( $line0 = mysqli_fetch_array( $result0 ) ) {

 $Kursname=$line0['KursID'];
	
	//echo $Kursname;

   $isEntry = "Select * From sv_AbwesenheitenKompakt where Kursname='$Kursname'  Group by SchuelerID order by Nachname asc ";




$result = mysqli_query( $con, $isEntry );
$events = array();

while ( $line2 = mysqli_fetch_array( $result ) ) {
	$ID = $line2[ 'SchuelerID' ];
	$Vorname = $line2[ 'Vorname' ];
	$Nachname = $line2[ 'Nachname' ];
    
        $isEntry1 = "Select * From sv_AbwesenheitenKompakt where SchuelerID=$ID and Kursname ='$Kursname' Order by Datum asc ";

   

	$result1 = mysqli_query( $con, $isEntry1 );
	$abwges = 0;
	$y = 0;
	$data2 = null;
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {

		${'datac'.$y} = array(
			'Klasse' . $y => $line1[ 'Klasse' ],
			'Datum' . $y => $line1[ 'Datum' ],
			'Kommentar' . $y => $line1[ 'Kommentar' ],
			'KommentVer' . $y => $line1[ 'KommentarVerwaltung' ],
			'Abwesenheitsdauer' . $y => $line1[ 'Abwesenheitsdauer' ],
			'Lehrer' . $y => $line1[ 'Lehrer' ] );
		if ( $y == 0 ) {
			$data2 = $ {
				'datac' . $y
			};
		} else {

			$data2 = array_merge( $data2, $ {
				'datac' . $y
			} );
		}
		$y++;
		$abwges = $abwges + $line1[ 'Abwesenheitsdauer' ];

	}

	$data3 = array(
		'Rows' => $y );
	$data1 = array(
		'SchuelerID' => $ID,
		'Vorname' => $Vorname,
		'Nachname' => $Nachname,
		'AbwesenheitenGesamt' => $abwges );
	
	$data[] = array_merge( $data1, $data2, $data3 );
	
	 $isEntry1 = "Select * From sv_Lernende where ID='$ID'  ";
	$result1 = mysqli_query( $con, $isEntry1 );
	while ( $line1 = mysqli_fetch_array( $result1 ) ) {

		$EMail=$line1['EMail'];
		$Vorname=$line1['Vorname'];
		$Nachname=$line1['Name'];
		$Klasse=$line1['Klasse'];
	}
	if ($EMail==''){
		$EMail='nomail';
	}

	$isEntry3 = "Select * From sv_LernendeModule where EMail='$EMail' or ((Vorname='$Vorname' and Name='$Nachname' ) and (Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'))";
	$result3 = mysqli_query( $con, $isEntry3 );
	while ( $line3 = mysqli_fetch_array( $result3 ) ) {
      
		$SchID=$line3['ID'];
	}
    
	
	$isEntryUpd = "UPDATE sv_LernenderKurs SET Abwesenheiten = '$abwges' where SchuelerID='$SchID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	

}
}

 $isEntry0 = "Select * From sv_LernenderKurs group by KursID  ";




$result0 = mysqli_query( $con, $isEntry0 );


while ( $line0 = mysqli_fetch_array( $result0 ) ) {

 $Kursname=$line0['KursID'];
//echo $Kursname;

    $isEntry = "Select * From sv_LernenderKurs where KursID='$Kursname' order by Nachname asc ";




    $result = mysqli_query($con, $isEntry);
    $events = array();
if ($Kursname<>"-Select-"){
	
	$Notenschnitt=null;
		$Notegesamt=0;	
$c=0;
	
	$a=0;
    while ($line1 = mysqli_fetch_array($result)) {
		$ID=$line1['SchuelerID'];
		
		$data0 = array(
			
		  'Vorname' => $line1['Vorname'],
			 'Nachname' => $line1['Nachname'],
			 'IDSchueler' => $line1['SchuelerID']
			);
          
		$isEntryUpdNull = "UPDATE sv_LernenderKurs SET Note1  = '',Note2  = '',Note3  = '',Note4  = '',Note5  = '',Note6  = '',Note7  = '',Note8  = '',Note9  = '' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpdNull );	

		

        
            
			 
			 $isEntry1 = "Select * From sv_Noten where KursID='$Kursname' and SchuelerID='$ID'   ";
			
			
			
			
       


    $result1 = mysqli_query($con, $isEntry1);
    $events = array();

	
	$Notenschnitt=null;
		$Notegesamt=0;	
$c=0;
	
	$a=0;
		$data11 = null;
		
		
		
    while ($line2 = mysqli_fetch_array($result1)) {
		
		
	
		if ($a<9){
		
				
		$a++;
					$Dateb = "Datum"; 
					$Noteb = "Note";
					$Gewb = "Gewichtung";
					$Nameb = "Name";
						$DatumAK = $line2[ $Dateb ];
						$NameAK = $line2[ $Nameb ];
						$GewAK = $line2[ $Gewb ];
						$NoteAK = $line2[ $Noteb ];



						//Schreibe Spaltennamen

						if ( $NoteAK >= 1  and $GewAK <= 100 and $GewAK > 0   ) {
							$Notegesamt = $Notegesamt + ( $NoteAK * $GewAK / 100 );
							$c = $c + $GewAK / 100;
						}
						
		
		
			
			${"data".$a}=array(
           	'Datum'.$a => $line2['Datum' ],
		    'Name'.$a => $line2[ 'Name' ],
		  'Gewichtung'.$a => $line2[ 'Gewichtung' ],
			'Note'.$a => $line2[ 'Note' ]);
			
			if ( $a == 1 ) {
			$data11 = $ {
				'data' . $a
			};
		} else {

			$data11 = array_merge( $data11, $ {
				'data' . $a
			} );
		}
			if ($NoteAK){ 
			switch ($a) {
    case 1:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note1  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 2:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note2  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 3:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note3  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
	case 4:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note4  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 5:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note5  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 6:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note6  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
	case 7:
      $isEntryUpd = "UPDATE sv_LernenderKurs SET Note7  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 8:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note8  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
    case 9:
       $isEntryUpd = "UPDATE sv_LernenderKurs SET Note9  = '$NoteAK' where SchuelerID='$ID' and KursID ='$Kursname'";
	mysqli_query( $con, $isEntryUpd );	
        break;
}
	
		}
		
    }
	}
		
			do {
				$a++;
				${"data".$a}=array(
           	'Datum'.$a => null,
		    'Name'.$a => null,
		  'Gewichtung'.$a => null,
			'Note'.$a => null);
			
			if ( $a == 1 ) {
			$data11 = $ {
				'data' . $a
			};
		} else {

			$data11 = array_merge( $data11, $ {
				'data' . $a
			} );
		}
			}while ($a<=9);
		

		if ($c>0){
		$Notenschnitt=$Notegesamt/$c;
			$Notenschnitt=round($Notenschnitt, 2);
		}
		$data10=array('Notenschnitt' => $Notenschnitt);
        $data12=array('empty' => '');
		
		
		$data[] = array_merge( $data0,$data11,$data10,$data12);
			
	}
	

}
}

	




	$schueler=$_GET['q'];				
              
					
				

                      

        



       
 


$schuelerarr=explode(":",$schueler);

$value=$schuelerarr[1];





$select='Select KursID, Note1,Note2, Note3,Note4, Note5, Note6, Note7,Note8, Note9 from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$sel2= '" Group by KursID';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2' where post_id='18113' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	




$selectt='Select KursID, Abwesenheiten from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$selt2= '" Group by KursID';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$selectt$sel1$selt2' where post_id='18504' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );	




$select='Select sv_Lehrpersonen.Vorname,sv_Lehrpersonen.Nachname,KursID from sv_Kurse inner join sv_Lehrpersonen ON sv_Kurse.Lehrperson=sv_Lehrpersonen.ID where Lehrperson in (Select ID from sv_Lehrpersonen where 
Kurs1 in (Select KursID from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
$sel2='") or  Kurs2 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel3='") or Kurs3 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel4='") or  Kurs4 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel5='") or Kurs5 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel6='") or  Kurs6 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel7='") or Kurs7 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel8='") or  Kurs8 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel9='") or Kurs9 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel10='") or  Kurs2 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel11='") or Kurs11 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel12='") or  Kurs12 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel13='") or Kurs13 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel14='") or  Kurs14 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel15='") or Kurs15 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel16='") or  Kurs16 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel17='") or Kurs17 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel18='") or  Kurs18 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel19='") or Kurs19 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel20='") or  Kurs20 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel21='") or Kurs21 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel22='") or  Kurs22 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel23='") or Kurs23 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel24='") or  Kurs24 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$se253='") or Kurs25 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel26='") or  Kurs26 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel27='") or Kurs27 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel28='") or  Kurs28 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel29='") or Kurs29 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel30='") or  Kurs30 in (Select KursID from sv_LernenderKurs where SchuelerID="';
$sel31='")) and KursID in (Select KursID from sv_LernenderKurs where SchuelerID="';




$sel32= '") Group by KursID';
 $isEntryUpd1 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2$sel1$sel3$sel1$sel4$sel1$sel5$sel1$sel6$sel1$sel7$sel1$sel8$sel1$sel9$sel1$sel10$sel1$sel11$sel1$sel12$sel1$sel13$sel1$sel14$sel1$sel15$sel1$sel16$sel1$sel17$sel1$sel18$sel1$sel19$sel1$sel20$sel1$sel21$sel1$sel22$sel1$sel23$sel1$sel24$sel1$sel25$sel1$sel26$sel1$sel27$sel1$sel28$sel1$sel29$sel1$sel30$sel1$sel31$sel1$sel32' where post_id='18116' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd1 );	



$isEntryPr="Select Datum As Prüfungsdatum, Start,Ende,Zimmer,Gewichtung,KursID,Kommentar from sv_Pruefungen where KursID  in (Select KursID from sv_LernenderKurs where SchuelerID='$value')";
 $is=0;
$result=mysqli_query( $con, $isEntryPr );
 while( $line2= mysqli_fetch_array($result))
 {
	 $is=1;
 }



if ($is==1){

$selecty='Select Datum As Prüfungsdatum,Pruefungsname, Start,Ende,Zimmer,Gewichtung,KursID,Kommentar from sv_Pruefungen where KursID  in (Select KursID from sv_LernenderKurs where SchuelerID="';
 $sel1=$value;
		
$sely2= '") order by Datum asc';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$selecty$sel1$sely2' where post_id='18121' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );
}
else{
	$selecty='Select Meldung from sv_text';

 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$selecty' where post_id='18121' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );
}


$select='Select Klasse, Count(Klasse)As Schülerzahl from sv_Lernende where Klasse in (Select Modul1 from sv_LernendeModule where ID="';
 $sel1=$value;
$sel2='") or Klasse  in (Select Modul2 from sv_LernendeModule where ID="';
$sel3='") or Klasse in (Select Modul3 from sv_LernendeModule where ID="';
$sel4='") or Klasse in (Select Modul4 from sv_LernendeModule where ID="';	
$sel5='") or Klasse in (Select Modul5 from sv_LernendeModule where ID="';
$sel6='") or Klasse in (Select Modul6 from sv_LernendeModule where ID="';	
$sel7='") or Klasse in (Select Modul7 from sv_LernendeModule where ID="';
$sel8='") or Klasse in (Select Modul8 from sv_LernendeModule where ID="';
$sel9='") or Klasse in (Select Modul9 from sv_LernendeModule where ID="';
$sel10='") or Klasse in (Select Modul10 from sv_LernendeModule where ID="';
$sel11='") or Klasse in (Select Modul11 from sv_LernendeModule where ID="';	
$sel12='") or Klasse in (Select Modul12 from sv_LernendeModule where ID="';

$sel13= '") Group by Klasse';
 $isEntryUpd2 = "UPDATE sv_postmeta SET meta_value  = '$select$sel1$sel2$sel1$sel3$sel1$sel4$sel1$sel5$sel1$sel6$sel1$sel7$sel1$sel8$sel1$sel9$sel1$sel10$sel1$sel11$sel1$sel12$sel1$sel13' where post_id='18119' and meta_key='visualizer-db-query' ";
	mysqli_query( $con1, $isEntryUpd2 );

?>

    

<html>




<script>

	
	
		
	function getSchueler(str){



       
	
		window.location.href= "/uebersicht-der-schueler?q=" + str;

    }
	

	
	
</script>


<div class="first-column">
    <?
	include 'db.php';
	
echo "<br><br><strong>Schüler:<strong>";
	
$isEntry0 = "Select * From sv_LernendeModule order by Name ASC ";


$schueler=$_GET['q'];		

$result0 = mysqli_query( $con, $isEntry0 );

 echo '<select class="link"  id="schueler" name="schueler" readonly="readonly"  onchange="getSchueler(this.value)" value="-Select-">' ;
	echo '<option>-Select-</option>' ;

while ( $line0 = mysqli_fetch_array( $result0 ) ) {
	 
	 $Name = $line0['Name'];

        $Vorname = $line0['Vorname'];

       $value = $line0['ID'];

     $Email = $line0['EMail'];
	
	 $UserID= $line0['User_ID'];
	
	$Profil = $line0['Profil'];
	
	$Schulmail= $line0['SchulMail'];
	
	$Loginname= $line0['Loginname'];
	
	$Winlogin = $line0['WinLogin'];	 


    echo '<option>'.$Vorname .' '.$Name .' ID:'. $value .'</option>' ;

   

}
	echo '</select>';
	 ?>
   </div>
   <div class="second-column" id="schmod">
	<?  
	   $schuelerarr=explode(":",$schueler);

$value=$schuelerarr[1];
	   $isEntry1 = "Select * From sv_LernendeModule where ID='$value' ";


	

$result1 = mysqli_query( $con, $isEntry1 );

 
while ( $line1 = mysqli_fetch_array( $result1 ) ) {
	 
	 $Name = $line1['Name'];

        $Vorname = $line1['Vorname'];

     

     $Email = $line1['EMail'];
	
	 $UserID= $line1['User_ID'];
	
	$Profil = $line1['Profil'];
	
	$Schulmail= $line1['SchulMail'];
	
	$Loginname= $line1['Loginname'];
	
	$Winlogin = $line1['WinLogin'];	 


   
   

}
 
  echo '<h4>'.$schueler.'</h4>';
	   
	   
	   if ($schueler<>''){
		   
		
		  
		  
	   echo '<p1><u>Daten des Schülers: </u></p1>';
	   echo '<br><p><strong>E-Mail Adresse: </strong>'.$Email; 
	   echo '<br><strong>UserID EKlasse: </strong>'.$UserID; 
	   echo '<br><strong>Lernendenprofil: </strong>'. $Profil; 
	   echo '<br><strong>Schulmail: </strong>'. $Schulmail;
	   echo '<p1><u> <br><br><strong>Rechnerdaten: </strong></u></p1><br>';
	   echo '<strong>Loginname: </strong>'.$Loginname;
	   echo '<br><strong>Win-Login: </strong>'.$Winlogin;'</p>';
	   echo '<br><br>';
		   echo '<u>Profilbild: </u><br>';
	  echo get_avatar($UserID,100);
		   
		   echo '<br><br>';
	   
	   
	     echo  '<br><h3>Klassen(Module)</h3>';
	  echo do_shortcode('[visualizer id="18119"]');

	   
	  echo  '<br><h3>Prüfungen</h3>';
echo do_shortcode('[visualizer id="18121"]');
 
 echo  '<br><br><h3>Lehrer</h3><br>';
echo do_shortcode('[visualizer id="18116"]');
	   
	   echo do_shortcode('[visualizer id="18113"]');
	   echo do_shortcode('[visualizer id="18504"]');
	  
	   }
?>
   </div>
	
	
<style>
        body {}

	     .first-column {
  width: 10%;
			 height: auto;
  float: left;
}

.second-column {
  width: 80%;
	height: auto;
  float: right;
}
	p {
  font-size: 16px;
		font-style:normal;
}
	p1 {
  font-size: 18px;
		font-style:normal;
		
}
	
	
        button {
          color: white;
        }
    </style>