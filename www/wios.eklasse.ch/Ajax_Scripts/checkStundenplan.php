<?

include 'db.php';
$Tag=$_GET['d'];
$Uhr=$_GET['k'];
$Kuerzel=$_GET['q'];
$Klasse=$_GET['c'];

 $isEntry= "Select * From sv_KurseStammdaten where KursKuerzel='$Kuerzel'";

    $result = mysqli_query($con, $isEntry);







    while( $value= mysqli_fetch_array($result)) {
		
		$Lehrperson=$value['Lehrer'];
		
		 preg_match("/:(.*)/", $Lehrperson, $output_array);

        $LP_ID=$output_array[1];
		
		$Kursname=$value['Kursname'];

	}


 $isEntryCheck= "Select * From sv_Kurse ";

    $resultCheck = mysqli_query($con, $isEntryCheck);







    while( $valueCheck= mysqli_fetch_array($resultCheck)) {
	
		
		if ( ($valueCheck['Lehrperson']==$LP_ID) and ($valueCheck['Uhrzeit']==$Uhr) and ($valueCheck['Tag']==$Tag) )
		{
			echo "Lehrer ".$Lehrperson." hat bereits einen Kurs zu diesem Zeitpunkt!";
			
      
		}
		
		
	}


	 $isEntryCheck1= "Select * From sv_LernendeModule where Modul1='$Klasse' or Modul2='$Klasse' or Modul3='$Klasse' or Modul4='$Klasse' or Modul5='$Klasse' or Modul6='$Klasse' or Modul7='$Klasse' or Modul8='$Klasse' or Modul9='$Klasse' or Modul10='$Klasse' or Modul11='$Klasse' or Modul12='$Klasse'";

    $resultCheck1 = mysqli_query($con, $isEntryCheck1);


$z=0;




    while( $valueCheck1= mysqli_fetch_array($resultCheck1)) {
		
		
			
		$Klasse1=$valueCheck1['Modul1'];
		$Klasse2=$valueCheck1['Modul2'];
		$Klasse3=$valueCheck1['Modul3'];
		$Klasse4=$valueCheck1['Modul4'];
		$Klasse5=$valueCheck1['Modul5'];
		$Klasse6=$valueCheck1['Modul6'];
		$Klasse7=$valueCheck1['Modul7'];
		$Klasse8=$valueCheck1['Modul8'];
		$Klasse9=$valueCheck1['Modul9'];
	    $Klasse10=$valueCheck1['Modul10'];
		$Klasse11=$valueCheck1['Modul11'];
		$Klasse12=$valueCheck1['Modul12'];
		
		$isEntryCheck2= "Select * From sv_Kurse where Klasse='$Klasse1' or Klasse='$Klasse2' or Klasse='$Klasse3' or Klasse='$Klasse4' or Klasse='$Klasse5' or Klasse='$Klasse6' or Klasse='$Klasse7' or Klasse='$Klasse8' or Klasse='$Klasse9' or Klasse='$Klasse10' or Klasse='$Klasse11' or Klasse='$Klasse12'  ";

    $resultCheck2 = mysqli_query($con, $isEntryCheck2);







    while( $valueCheck2= mysqli_fetch_array($resultCheck2)) {
		
		if ( (($Klasse<>'' && $Klasse<>$valueCheck2['Klasse']) and $valueCheck2['Uhrzeit']==$Uhr) and ($valueCheck2['Tag']==$Tag) and $z==0 )
		{
			echo "Kurs ".$Kursname." ist an diesem Tag und dieser Uhrzeit nicht möglich, da ein Lernender der Klasse ".$valueCheck2['Klasse']." bereits einen Kurs zu diesem Zeitpunkt hat!";
		$z++;
       
		}
		
		
	}
		
	
	}