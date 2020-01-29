<?php
include 'db.php';
$isEntry2 = "Select Semesterkuerzel From sv_Settings";
$result2 = mysqli_query($con, $isEntry2);

while ($value3 = mysqli_fetch_array($result2)) {
    $SemesterkuerzelDB = $value3['Semesterkuerzel'];
}
$Sem_lernende= $SemesterkuerzelDB.'_Lernende';

$query = "DROP TABLE $Sem_lernende";

mysqli_query($con,$query);



$query1 = "CREATE TABLE $Sem_lernende LIKE sv_Lernende";

mysqli_query($con,$query1);

$query2 = "INSERT INTO $Sem_lernende SELECT * FROM sv_Lernende";

mysqli_query($con,$query2);

$Sem_lernendeModule= $SemesterkuerzelDB.'_LernendeModule';

$query3 = "DROP TABLE $Sem_lernendeModule";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_lernendeModule LIKE sv_LernendeModule";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_lernendeModule SELECT * FROM sv_LernendeModule";

mysqli_query($con,$query5);


$Sem_AbwesenheitenGesamt= $SemesterkuerzelDB.'_AbwesenheitenGesamt';

$query3 = "DROP TABLE $Sem_AbwesenheitenGesamt";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_AbwesenheitenGesamt LIKE sv_AbwesenheitenGesamt";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_AbwesenheitenGesamt SELECT * FROM sv_AbwesenheitenGesamt";

mysqli_query($con,$query5);


$Sem_AbwesenheitenKompakt= $SemesterkuerzelDB.'_AbwesenheitenKompakt';

$query3 = "DROP TABLE $Sem_AbwesenheitenKompakt";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_AbwesenheitenKompakt LIKE sv_AbwesenheitenKompakt";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_AbwesenheitenKompakt SELECT * FROM sv_AbwesenheitenKompakt";

mysqli_query($con,$query5);


$Sem_Kurse= $SemesterkuerzelDB.'_Kurse';

$query3 = "DROP TABLE $Sem_Kurse";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_Kurse LIKE sv_Kurse";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_Kurse SELECT * FROM sv_Kurse";

mysqli_query($con,$query5);


$Sem_Kurshistorie= $SemesterkuerzelDB.'_Kurshistorie';

$query3 = "DROP TABLE $Sem_Kurshistorie";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_Kurshistorie LIKE sv_Kurshistorie";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_Kurshistorie SELECT * FROM sv_Kurshistorie";

mysqli_query($con,$query5);



$Sem_Lehrpersonen= $SemesterkuerzelDB.'_Lehrpersonen';

$query3 = "DROP TABLE $Sem_Lehrpersonen";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_Lehrpersonen LIKE sv_Lehrpersonen";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_Lehrpersonen SELECT * FROM sv_Lehrpersonen";

mysqli_query($con,$query5);


$Sem_LernenderKurs= $SemesterkuerzelDB.'_LernenderKurs';

$query3 = "DROP TABLE $Sem_LernenderKurs";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_LernenderKurs LIKE sv_LernenderKurs";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_LernenderKurs SELECT * FROM sv_LernenderKurs";

mysqli_query($con,$query5);


$Sem_ZeitenStundenplan= $SemesterkuerzelDB.'_ZeitenStundenplan';

$query3 = "DROP TABLE $Sem_ZeitenStundenplan";

mysqli_query($con,$query3);



$query4 = "CREATE TABLE $Sem_ZeitenStundenplan LIKE sv_ZeitenStundenplan";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_ZeitenStundenplan SELECT * FROM sv_ZeitenStundenplan";

mysqli_query($con,$query5);


$Sem_Noten= $SemesterkuerzelDB.'_Noten';

$query3 = "DROP TABLE $Sem_Noten";

mysqli_query($con,$query3);


$query4 = "CREATE TABLE $Sem_Noten LIKE sv_Noten";

mysqli_query($con,$query4);

$query5 = "INSERT INTO $Sem_Noten SELECT * FROM sv_Noten";

mysqli_query($con,$query5);



$Sem_Users= $SemesterkuerzelDB.'_users';

$query3 = "DROP TABLE $Sem_Users";

mysqli_query($con1,$query3);



$query4 = "CREATE TABLE $Sem_Users LIKE sv_users";

mysqli_query($con1,$query4);

$query5 = "INSERT INTO $Sem_Users SELECT * FROM sv_users";

mysqli_query($con1,$query5);



$Sem_RecLernende= $SemesterkuerzelDB.'_RecoverLernende';

$query3 = "DROP TABLE $Sem_RecLernende";

mysqli_query($con1,$query3);



$query4 = "CREATE TABLE $Sem_RecLernende LIKE sv_RecoverLernende";

mysqli_query($con1,$query4);

$query5 = "INSERT INTO $Sem_RecLernende SELECT * FROM sv_RecoverLernende";

mysqli_query($con1,$query5);


$isEntry2 = "Select Semesterkuerzel From sv_SemesterArchiv";
$result2 = mysqli_query($con, $isEntry2);
$isFilled = false;
while ($value3 = mysqli_fetch_array($result2)) {
    $SemesterkuerzelDBArchiv = $value3['Semesterkuerzel'];

    if ($SemesterkuerzelDB == $SemesterkuerzelDBArchiv) {
        $isFilled = true;
    }
}
if (!$isFilled)
{
        $sql_befehl2 = "INSERT INTO sv_SemesterArchiv (Semesterkuerzel) VALUES ('$SemesterkuerzelDB')";
        mysqli_query($con, $sql_befehl2);
}

?>