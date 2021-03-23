<?php



function alreadySubmitted($codice)  //studenti
{
    $db = parse_ini_file('../config/dbFabio.ini');
    //! per database di fabio
    //$conn = new mysqli('localhost', 'adminer', 'CBC349aa', 'Tedeschi_salone_orientamento');

    //$conn = new mysqli('localhost', 'root', '', 'salone_orientamento'); //HO TOLTO CONNECT.PHP PER COLPA DELLE SESSIONI UFFI

    $conn = new mysqli($db['server'], $db['username'], $db['password'], $db['db']) or die('impossibile connettersi ');
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
    $db = parse_ini_file('../config/dbFabio.ini');

    //! per database di fabio
    //$conn = new mysqli('localhost', 'adminer', 'CBC349aa', 'Tedeschi_salone_orientamento');

    //$conn = new mysqli('localhost', 'root', '', 'salone_orientamento'); //HO TOLTO CONNECT.PHP PER COLPA DELLE SESSIONI UFFI

    $conn = new mysqli($db['server'], $db['username'], $db['password'], $db['db']) or die('impossibile connettersi ');
    if ($conn->connect_errno) {
        echo "<h1 style='color:red> CONNESSIONE AL DATABASE FALLITA! </h1>";
        exit();
    }

    $query = "SELECT id_" . $_SESSION["tipo_scuola"] . " FROM registra_attivita WHERE id_" . $_SESSION["tipo_scuola"] . "='$codice'";
    $result = mysqli_query($conn, $query) or die("Query fallita: " . mysqli_error($conn));

    if (mysqli_num_rows($result) == 0)
        return false;
    else
        return true;
}
