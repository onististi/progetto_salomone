<?php

include "../config/connect_db.php";

if ((isset($_POST["codice_scuola"])) && (isset($_POST["password"]))) {
    unset($_SESSION['utente']);
    $codice_scuola = htmlspecialchars($_POST["codice_scuola"]);
    $password = htmlspecialchars($_POST["password"]);

    if (checkLogin("scuola_primo_grado", $codice_scuola,  $password, $conn)) {
        $_SESSION["tipo_scuola"] = "scuola_primo_grado";
        header("Location: ../pages/home_scuola_primaria.php?nav=home_scuola");

    } else if (checkLogin("scuola_secondo_grado", $codice_scuola,  $password, $conn)) {
        $_SESSION["tipo_scuola"] = "scuola_secondo_grado";
        header("Location: ../pages/home_scuola_secondaria.php?nav=home_scuola");

    } else if (checkLogin("universita", $codice_scuola,  $password, $conn)) {
        $_SESSION["tipo_scuola"] = "universita";
        header("Location: ../pages/home_universita.php?nav=home_scuola");

    } else if (checkLogin("azienda", $codice_scuola,  $password, $conn)) {
        $_SESSION["tipo_scuola"] = "azienda";
        header("Location: ../pages/home_azienda.php?nav=home_scuola");

    }else if(checkLogin("amministratore",$codice_scuola, $password, $conn)){
        $_SESSION["tipo_scuola"] = "amministratore";
        header("Location: ../pages/administration.php?nav=amministratore");
     
    } else 
        header("Location: login_scuola.php?nav=scuola&e");   
}

if ((isset($_POST["username"])) && (isset($_POST["password"]))) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $cryptpass = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT username, password FROM studente WHERE username = '" . $username . "'";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if(password_verify($_POST['password'],$row['password'])){
        $_SESSION["utente"] = $row["username"];
        unset($_SESSION['tipo_scuola']);
        header("location:../pages/home_studente.php?nav=home_studente");
    }else{
        mysqli_close($conn);
        echo $_POST['password'];
        echo $row['password'];
        header("Location: login_studente.php?nav=studente&e");
    }
    // $result = mysqli_query($conn, $query);
    // $data = mysqli_fetch_array($result);

    // if (mysqli_num_rows($result) > 0) {
    //     $_SESSION["utente"] = $data["username"];
    //     unset($_SESSION['tipo_scuola']);
    //     header("Location: ../pages/home_studente.php?nav=home_studente");
    // } else {
    //     mysqli_close($conn);
    //     header("Location: login_studente.php?nav=studente");
    // }
}

function checkLogin($tipo_scuola, $codice, $pass, $conn){

    if($tipo_scuola =='amministratore'){
        $query = "SELECT username, password FROM  amministratore WHERE username = '" . $codice . "'";
        $result =$conn->query($query);
        $row = $result->fetch_assoc();

        if(password_verify($pass,$row['password'])){
            $_SESSION["scuola"] =$row['nome'];
            return true;
        }else
            return false;
        // $result = mysqli_query($connection, $query);
        // if (mysqli_num_rows($result) == 0) {
        //     return false;
        // } else {
        //     $data = mysqli_fetch_array($result);
        //     $_SESSION["codice"] = $data["codice"];
        //     $_SESSION["scuola"] = $data["nome"];
        //     mysqli_close($connection);
        //     return true;
        // }
    }else{

        $query = "SELECT password, nome FROM " . $tipo_scuola . " WHERE codice = '" . $codice . "'";
        $result =$conn->query($query);
        $row = $result->fetch_assoc();

        if(password_verify($pass,$row['password'])){
            $_SESSION['codice'] = $codice;
            $_SESSION["scuola"] =$row['nome'];
            return true;
        }else
        return false;

        // $query = "SELECT codice, password, nome FROM " . $tipo_scuola . " WHERE codice = '" . $codice . "' AND password = '" . $pass . "'";
        // $result = mysqli_query($connection, $query);
        // if (mysqli_num_rows($result) == 0) {
        //     return false;
        // } else {
        //     $data = mysqli_fetch_array($result);
        //     $_SESSION["codice"] = $data["codice"];
        //     $_SESSION["scuola"] = $data["nome"];
        //     mysqli_close($connection);
        //     return true;
        // }
    }
}

?>
