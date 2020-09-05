 <?php
  include 'db.php'; 
 $sem=$_GET['s'];
$isEntry= "Select Klasse From ".$sem."_Lernende";
    $result1 = mysqli_query($con,$isEntry);
    $resultarr1 = array();
    echo "<option>-Select-</option>";

    while( $line2= mysqli_fetch_assoc($result1))
    {
        $resultarr1[] = $line2['Klasse'];
    }
    $uniquearr1 = array_unique($resultarr1);
    asort($uniquearr1);
       

    foreach ($uniquearr1 as $value)
    {
        
        
            echo "<option>" . $value . "</option>";
        
    }

    ?>