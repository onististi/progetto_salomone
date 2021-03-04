<?php
include '../config/connect_db.php';
$success = true;
$valid=true;

$codiceMeccanografico = $_SESSION["codice"];

if ($_SESSION["tipo_scuola"] == "scuola_secondo_grado") {
    $date = "2021-11-12";
} else if ($_SESSION["tipo_scuola"] == "universita" || $_SESSION["tipo_scuola"] == "azienda") {
    $date = "2021-11-13";
}

$query0 = "SELECT a.ora FROM registra_attivita ra NATURAL JOIN attivita a WHERE id_" . $_SESSION["tipo_scuola"] . "='$codiceMeccanografico'";
$result = mysqli_query($conn, $query0);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    if ($_POST['ora'] . ":00" == $row[0]) {
        echo "<script>
        confirm('Ora gia occupata');
        window.location.href = '../pages/organize_stand.php';
        </script>";
        $valid=false;
    }
}

if($valid){
//$destination = $_SERVER['DOCUMENT_ROOT'] . 'html/Gruppo-Tedeschi-Guzzo-Fallara-Onisti/progetto_salomone/src/uploads' . $codiceMeccanografico . ".jpeg"; //WARNING: CAMBIA PER OGNUNO DI NOI!! RIGA JACOPO
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
            $query2 = "SELECT MAX(id_attivita) FROM attivita";
            $data = mysqli_fetch_array(mysqli_query($conn, $query2));

            //$query3 = "UPDATE " . $_SESSION["tipo_scuola"] . " SET fk_attivita = '$data[0]' WHERE  codice= '" . $codiceMeccanografico . "' ";
            $query3 = "INSERT INTO registra_attivita (id_" . $_SESSION["tipo_scuola"] . ", id_attivita) VALUES ('$codiceMeccanografico', $data[0])";
            if (!mysqli_query($conn, $query3)) {    //if theres any problem
                echo "<center><p style='font-size: 2vw;'>Attivita: " . $_POST['titolo'] . " non registrata correttamente.</p><p style='font-size: 1vw;'>Error2: " . mysqli_error($conn) . "</p></center>";
                $success = false;
            }
        }
    } else if ($_GET['action'] == "manage") {
        $attivita = $_POST['id_attivita'];
        $query = "UPDATE attivita SET titolo = '" . $_POST['titolo'] . "', descrizione = '" . $_POST['descrizione'] . "', logo ='$destination' WHERE  id_attivita= '$attivita' ";
        if (!mysqli_query($conn, $query)) {
            $success = false;
        }
    }
} else {
    echo "<center><p style='font-size: 2vw;'>Logo non spostato correttamente.</p></center>";
    $success = false;
}


if ($success) {    //if success
    echo "Registrata correttamente ";
}
echo "<a href='../../index.php'>Esci</a>";
}
