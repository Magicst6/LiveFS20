<? 
	include "db.php";
	$heute= date("Y-m-d");
    //$heute= '2020-03-02';
	
	$isEntry = "SELECT * From sv_KurseAll Where Datum='$heute' Order by Start asc";

        $result = mysqli_query($con,$isEntry);

$z=0;
        while( $value= mysqli_fetch_array($result))

        {
			$z++;
		
		}
	$height=850/$z;

if ($height > 90){
	$height=90;
}
	?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>Wios Kurstermine</title>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<style>
body {
  font-family: 'lato', sans-serif;
}

.container {
  max-width: 3000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
	width:2500px;
	
	
	align-self:flex-start;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
}
h2 small {
  font-size: 0.5em;
}

.responsive-table li {
  border-radius: 3px;
  padding: 14px 18px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 6px;
	font-size: 40px;
	font-family: Constantia, "Lucida Bright", "DejaVu Serif", Georgia, "serif";
	height: <? echo $height;?>px;
}
.responsive-table .table-header {
  background-color: #95A5A6;
   font-size: 41px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.responsive-table .table-row {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
	
}
.responsive-table .col-1 {
  flex-basis: 35%;
}
.responsive-table .col-2 {
  flex-basis: 10%;
}
.responsive-table .col-3 {
  flex-basis: 10%;
}
.responsive-table .col-4 {
  flex-basis: 15%;
}
	.responsive-table .col-5 {
  flex-basis: 15%;
}
	.responsive-table .col-6 {
  flex-basis: 20%;
}
@media all and (max-width: 2500px) {
  .responsive-table .table-header {
    display: none;
  }
  .responsive-table li {
    display:block;
  }
  .responsive-table .col {
    flex-basis: 100%;
	 
  }
  .responsive-table .col {
    display: flex;
    padding: 10px 0;
  }
  .responsive-table .col:before {
    color: #6C7A89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="container">
<h2>Heutige Kurse(<? echo date('d.m.Y');?>)</h2>
<ul class="responsive-table">
<li class="table-header">
<div class="col col-1">Kursname</div>
<div class="col col-2">Start</div>
<div class="col col-3">Ende</div>
<div class="col col-4">Klasse</div>
<div class="col col-5">Zimmer</div>
<div class="col col-6">Lehrperson</div>
</li>
	
<? 
	include "db.php";
	$heute= date("Y-m-d");
	//$heute= '2020-03-02';
	
	$isEntry = "SELECT * From sv_KurseAll Where Datum='$heute' Order by Start asc";

        $result = mysqli_query($con,$isEntry);
$t=0;

        while( $value= mysqli_fetch_array($result))

        {
			$t++;
			$farbe=$value['Farbe'];
			$Kursname=$value['Kursname'];
			$Start=$value['Start'];
			$Ende=$value['Ende'];
			$Klasse=$value['Klasse'];
			$Zimmer=$value['Zimmer'];
			$Lehrperson=$value['Lehrperson'];
			
			$Start=substr($Start,-8);
			$Ende=substr($Ende,-8);
			
			if ($farbe=='#FFFFFF' or $farbe==''){
				$farbe='#3483eb';
			}
			
            
				
				$tcolor='#000000';
			if ($t % 2 != 0){
			$bcolor='#F2F2F2';
			}
	else{
		$bcolor='#81BEF7';
	}
			
			echo '<li class="table-row" style="border: 5px solid '.$farbe.'; line-height: 1.8em;color:'.$tcolor.';background-color:'.$bcolor.'";>';
            echo '<div class="col col-1" data-label="Kursname">'.$Kursname.'</div>';
            echo '<div class="col col-2" data-label="Start">'.$Start.'</div>';
			echo '<div class="col col-3" data-label="Ende">'.$Ende.'</div>';
			echo '<div class="col col-4" data-label="Klasse">'.$Klasse.'</div>';
			echo '<div class="col col-5" data-label="Zimmer">'.$Zimmer.'</div>';
			echo '<div class="col col-6" data-label="Lehrperson">'.$Lehrperson.'</div>';
            echo '</li>';
			
		}
	
	?>


</ul>
</div>
</body>
</html>
