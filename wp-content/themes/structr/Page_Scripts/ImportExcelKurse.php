<form action="/wp-content/themes/structr/Page_Scripts/uploads.php" method="post" enctype="multipart/form-data">

Wählen Sie die Klasse:<br>

    <select name="klasse" id="klasse"  required="required">



<?php



include 'db.php';







    $isEntry= "Select Klasse From sv_Lernende";

    $result1 = mysqli_query($con,$isEntry);

    $resultarr1 = array();

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

    <br>

    Wählen Sie das Semester aus :

    <br>

    <select name="semester" id="semester"  required="required">

        <option>FS<?php echo date("y");?></option>

        <option>WS<?php echo date("y");?></option>

        <option>FS<?php echo date("y")-1;?></option>

        <option>WS<?php echo date("y")-1;?></option>

        <option>FS<?php echo date("y")+1;?></option>

        <option>WS<?php echo date("y")+1;?></option>

    </select>

    <br>

    Wählen Sie eine csv-Datei aus :

    <br>

    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Upload File" name="submit">

    <br>

    Hier die CSV-Vorlage zum ausfüllen:

    <br>

    <a href="/wp-content/themes/structr/Page_Scripts/Wios_Kurstermine_Vorlage.csv" download>

         CSV-Kursimportvorlage

    </a>

</form>