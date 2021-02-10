<?php

function alreadySubmitted($codice)
{
    //! per database di fabio
    // $conn = new mysqli('localhost','adminer','CBC349aa','Tedeschi_salone_orientamento');

    $conn = new mysqli('localhost', 'root', '', 'salone_orientamento'); //HO TOLTO CONNECT.PHP PER COLPA DELLE SESSIONI UFFI

    if ($conn->connect_errno) {
        echo "<h1 style='color:red> CONNESSIONE AL DATABASE FALLITA! </h1>";
        exit();
    }

    $query = "SELECT fk_scuola FROM studente WHERE fk_scuola='$codice'";
    $result = mysqli_query($conn, $query) or die("Query fallita: " . mysqli_error($conn));

    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function alreadyCreatedActivity($codice, $tipo_scuola)
{
    //! per database di fabio
    // $conn = new mysqli('localhost','adminer','CBC349aa','Tedeschi_salone_orientamento');

    $conn = new mysqli('localhost', 'root', '', 'salone_orientamento'); //HO TOLTO CONNECT.PHP PER COLPA DELLE SESSIONI UFFI

    if ($conn->connect_errno) {
        echo "<h1 style='color:red> CONNESSIONE AL DATABASE FALLITA! </h1>";
        exit();
    }

    $query = "SELECT fk_attivita FROM $tipo_scuola WHERE codice='$codice' AND fk_attivita IS NOT NULL";
    $result = mysqli_query($conn, $query) or die("Query fallita: " . mysqli_error($conn));

    if (mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}
