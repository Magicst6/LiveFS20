<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 30.11.2018
 * Time: 16:39
 */


//delete.php

if(isset($_GET["f"]))
{

    include 'db.php';
    $id = $_GET['f'];



 $query = "DELETE from sv_KurseAll WHERE ID='$id'";

    mysqli_query($con,$query);
}

?>




















