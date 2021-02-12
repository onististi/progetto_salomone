<?php
include '../config/connect_db.php';
$success = true;

if ($_SESSION["tipo_scuola"] == "scuola_secondo_grado") {
    $date = "2021-11-12";
} else if ($_SESSION["tipo_scuola"] == "universita" || $_SESSION["tipo_scuola"] == "azienda") {
    $date = "2021-11-13";
}

$codiceMeccanografico = $_SESSION["codice"];
$destination = $_SERVER['DOCUMENT_ROOT'] . '/WebSites/progetto_salomone/src/uploads/' . $codiceMeccanografico . ".jpeg"; //WARNING: CAMBIA PER OGNUNO DI NOI!! RIGA JACOPO
$uploaded = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);

if ($uploaded) {
    if ($_GET['action'] == "create") {
        $query = "INSERT INTO attivita (titolo, descrizione, logo, ora, giorno)
            VALUES ('" . $_POST['titolo'] . "', '" . $_POST['descrizione'] . "', '$destination', '" . $_POST['ora'] . "', '$date')";

        if (!mysqli_query($conn, $query)) {    //if theres any problem
            echo "<center><p style='font-size: 2vw;'>Attivita: " . $_POST['titolo'] . " non registrata correttamente.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
            $success = false;
        } else {
            $query2="SELECT MAX(id_attivita) FROM attivita";
            $data = mysqli_fetch_array(mysqli_query($conn, $query2));

            $query3 = "UPDATE " . $_SESSION["tipo_scuola"] . " SET fk_attivita = '$data[0]' WHERE  codice= '" . $codiceMeccanografico . "' ";
            if (!mysqli_query($conn, $query3)) {    //if theres any problem
                echo "<center><p style='font-size: 2vw;'>Attivita: " . $_POST['titolo'] . " non registrata correttamente.</p><p style='font-size: 1vw;'>Error2: " . mysqli_error($conn) . "</p></center>";
                $success = false;
            }
        }
    } else if ($_GET['action'] == "manage") {
        $attivita = $_POST['id_attivita'];
        $query = "UPDATE attivita SET titolo = '" . $_POST['titolo'] . "', descrizione = '" . $_POST['descrizione'] . "', logo ='$destination' WHERE  id_attivita= '$attivita' ";
    }
} else {
    echo "<center><p style='font-size: 2vw;'>Logo non spostato correttamente.</p></center>";
    $success = false;
}


if ($success) {    //if success
    echo "Registrata correttamente ";
}
echo "<a href='../../index.php'>Esci</a>";
