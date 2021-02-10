<?php
include '../config/connect_db.php';
$success=true;

//$query2 = "SELECT id_attivita, ora FROM attivita WHERE giorno = ' $date' AND occupato=0 ";
//$query2 = " UPDATE attivita SET titolo='empty' , descrizione='empty' , logo='empty' , occupato='0' WHERE `attivita`.`id_attivita`=8";
$query = "UPDATE attivita SET titolo = 'empty', descrizione = 'empty', logo = 'empty', occupato = '0' WHERE id_attivita=( SELECT fk_attivita FROM " . $_SESSION["tipo_scuola"] . " WHERE codice = '" . $_SESSION["codice"] . "' )";
$result = mysqli_query($conn, $query) or die("Query fallita: " . mysqli_error($conn) . " " . mysqli_error($conn));
if (!$result) { //if theres any problem
    echo "<center><p style='font-size: 2vw;'>Attivita non eliminata correttamente nella tabella attività.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
    $success = false;
    //$_SESSION["attivita_creata"]="failed" ;
} else {
    $query2 = "UPDATE " . $_SESSION["tipo_scuola"] . " SET fk_attivita = NULL WHERE codice = '" . $_SESSION["codice"] . "' ";
    $result2 = mysqli_query($conn, $query2) or die("Query fallita" . mysqli_error($conn) . " " . mysqli_error($conn));
    if (!$result2) {
        echo "<center><p style='font-size: 2vw;'>Attivita non eliminata correttamente dalla scuola.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
        $success = false;
        //$_SESSION["attivita_creata"]="failed" ;
    }
}

if ($success) {    //if success
    echo "Registrato correttamente ";
    //$_SESSION["registrato"] = "success";
}
echo "<a href='../../index.php'>Esci</a>";
