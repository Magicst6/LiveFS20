<?php
include 'db.php';
$q = $_GET['q'];
echo 'test';
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 03.11.2018
 * Time: 16:46
 */

// CSV-Datei in eine DB-Tabelle einlesen

// CSV-Datei einlesen
$csvInhalt = file($q, FILE_SKIP_EMPTY_LINES);

$daten = [];
$trennzeichen = ";";

foreach ($csvInhalt as $inhalt) {

    // Die Anzahl der Spalten anpassen
    list($spalte1, $spalte2, $spalte3, $spalte4, $spalte5, $spalte6, $spalte7, $spalte8, $spalte9) = explode($trennzeichen, $inhalt);

    // Daten hinzufügen (Anzahl der Spalten anpassen)
    $daten[] = "('" . $spalte1 . "','" . $spalte2 . "','" . $spalte3 . "','" . $spalte4 . "','" . $spalte5 . "','" . $spalte6 . "','" . $spalte7 . "','" . $spalte8 . "','" . $spalte9 . "')" . chr(13);
}

// Verbindung zur Datenbank aufbauen


// SQL-String zusammensetzen
// Die Anzahl der Spalten und Namen anpassen
$sql_befehl = "INSERT INTO `sv_KurseAll` (`spalte1`, `spalte2`, `spalte3`, `spalte4`,`spalte5`, `spalte6`, `spalte7`, `spalte8`, `spalte9`) VALUES" . implode(",", $daten) . ";";

// In die DB-Tabelle eintragen
mysqli_query($con,$sql_befehl);

error_log($q, 3, "meine-fehler.log");
echo $sql_befehl ;
?>