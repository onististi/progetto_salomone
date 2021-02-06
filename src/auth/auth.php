<?php

include "../config/connect_db.php";

if ((isset($_POST["codice_scuola"])) && (isset($_POST["password"]))) {
    $codice_scuola = htmlspecialchars($_POST["codice_scuola"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = "SELECT codice, password, nome, tipo FROM scuola WHERE codice = '" . $codice_scuola . "' AND password = '" . $password . "'";

    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0)  {
        $_SESSION["codice"] = $data["codice"];
        $_SESSION["scuola"] = $data["nome"];
        $_SESSION["tipo_scuola"] = $data["tipo"];
        header("Location: ../pages/home_scuola.php?nav=home_scuola");
    } else {
        mysqli_close($conn);
        header("Location: login_scuola.php");
    }
}

if ((isset($_POST["username"])) && (isset($_POST["password"]))) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = "SELECT username, password FROM studente WHERE username = '" . $username . "' AND password = '" . $password . "'";

    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0)  {
        $_SESSION["utente"] = $data["username"];
        header("Location: ../pages/home_studente.php?nav=home_studente");
    } else {
        mysqli_close($conn);
        header("Location: login_studente.php");
    }
}

?>