<?php
include '../config/connect_db.php';
$success = true;

// if ($_SESSION["tipo_scuola"] == "scuola_secondo_grado") {
//     $date = "2021-11-12";
// } else if ($_SESSION["tipo_scuola"] == "universita" || $_SESSION["tipo_scuola"] == "azienda") {
//     $date = "2021-11-13";
// }
//$tmp_path = $_FILES['logo']['tmp_name'];
$codiceMeccanografico = $_SESSION["codice"];
//$pathToTheProject = "/opt/lampp/htdocs/WebSites/progetto_salomone/src"; //WARNING: CAMBIA PER OGNUNO DI NOI!!
//$destination = "$pathToTheProject/uploads/$codiceMeccanografico.jpeg";
$destination = $_SERVER['DOCUMENT_ROOT'] . '/WebSites/progetto_salomone/src/uploads/' . $codiceMeccanografico . ".jpeg"; //WARNING: CAMBIA PER OGNUNO DI NOI!! RIGA JACOPO
//move_uploaded_file($tmp_path, $destination);
$uploaded = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
if ($uploaded) {
    //$query = "UPDATE attivita SET titolo = 'empty', descrizione = 'empty', logo ='empty', occupato = '0'"; //restore originals value
    $query = "UPDATE attivita SET titolo = '" . $_POST['titolo'] . "', descrizione = '" . $_POST['descrizione'] . "', logo ='" . $destination . "', occupato = '1' WHERE  id_attivita= '" . $_POST['id_attivita_ora'] . "' ";
    //print_r($query);
    //echo "<br><br>";

    if (!mysqli_query($conn, $query)) {    //if theres any problem
        echo "<center><p style='font-size: 2vw;'>Attivita: " . $_POST['titolo'] . " non registrata correttamente.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
        $success = false;
        //$_SESSION["attivita_creata"] = "failed";
    } else {
        $query2 = "UPDATE " . $_SESSION["tipo_scuola"] . " SET fk_attivita = '" . $_POST['id_attivita_ora'] . "' WHERE  codice= '" . $codiceMeccanografico . "' ";
        //print_r($query2);

        if (!mysqli_query($conn, $query2)) {    //if theres any problem
            echo "<center><p style='font-size: 2vw;'>Attivita: " . $_POST['titolo'] . " non registrata correttamente.</p><p style='font-size: 1vw;'>Error2: " . mysqli_error($conn) . "</p></center>";
            $success = false;
            //$_SESSION["attivita_creata"] = "failed";
        }
    }
} else {
    echo "<center><p style='font-size: 2vw;'>Logo non spostato correttamente.</p></center>";
    $success = false;
}


if ($success) {    //if success
    echo "Registrata correttamente ";
    //$_SESSION["attivita_creata"] = "success";
}
echo "<a href='../../index.php'>Esci</a>";
