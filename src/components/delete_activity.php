<?php
include '../config/connect_db.php';
$success = true;

$query = " SELECT fk_attivita FROM " . $_SESSION["tipo_scuola"] . " WHERE codice = '" . $_SESSION["codice"] . "' ";
$data = mysqli_fetch_array(mysqli_query($conn, $query));

//$query = "UPDATE attivita SET titolo = 'empty', descrizione = 'empty', logo = 'empty', occupato = '0' WHERE id_attivita=( SELECT fk_attivita FROM " . $_SESSION["tipo_scuola"] . " WHERE codice = '" . $_SESSION["codice"] . "' )";
//$query2 = "UPDATE " . $_SESSION["tipo_scuola"] . " SET fk_attivita = NULL WHERE codice = '" . $_SESSION["codice"] . "' ";
$query2="DELETE FROM registra_attivita WHERE id_attivita='$data[0]'";

$result2 = mysqli_query($conn, $query2) or die("Query fallita: " . mysqli_error($conn) . " " . mysqli_error($conn));
if (!$result2) { //if theres any problem
    echo "<center><p style='font-size: 2vw;'>Attivita non eliminata correttamente da scuola tabella attività.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
    $success = false;
} else {
    $query3 = "DELETE FROM attivita WHERE id_attivita='$data[0]' ";
    $result3 = mysqli_query($conn, $query3) or die("Query fallita" . mysqli_error($conn) . " " . mysqli_error($conn));
    if (!$result3) {
        echo "<center><p style='font-size: 2vw;'>Attivita non eliminata correttamente dalla tabella attivita.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
        $success = false;
    }
}

if ($success) { //if success
    echo "Registrato correttamente ";
}
echo "<a href='../../index.php'>Esci</a>";
