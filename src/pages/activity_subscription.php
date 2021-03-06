<?php include '../config/connect_db.php'; 

if(isset($_GET['sub'])){
    $id_A = $_POST['standChoosen'];

    $sql = "SELECT matricola FROM studente WHERE username = "."'".$_SESSION['utente']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $matricola = $row['matricola'];

    $k = $_POST['standChoosen'];
    $sql = "INSERT INTO iscrizione(fk_matricola,fk_attivita) VALUES ('$matricola','$k')";
    $resultt = $conn->query($sql);
    header("location: activity_subscription.php?nav=home_studente");
}


?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Iscriviti ad un attivita</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/swiper.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/styles_home.css" rel="stylesheet">

    <link rel="icon" href="../assets/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <?php
    include '../templates/header.php';
    ?>

    <header id="header" class="header">
        <div class="header-content">
        <?php
        if(isset($_SESSION['codice']))
            $codiceMeccanografico = $_SESSION["codice"];

            // connesione al DBMS
            $query = "SELECT * FROM attivita a NATURAL JOIN registra_attivita ra";
            $result = mysqli_query($conn, $query) or die("Query fallita" . mysqli_error($conn) . " " . mysqli_error($conn));
            //QUI SOTTO
            echo "<br>
            <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ID_Attivita</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Logo</th>
                        <th>Data</th>
                        <th>Ora</th>
                        <th>Organizzatore</th>
                        <th>Invio</th>
                    </tr>
                </thead>
            <tbody>
            ";

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) // solo numerico
            {
                //$_SESSION['standChoosen'] = $row[0];
                echo "
                <form method='post' action='activity_subscription.php?nav=home_scuola&sub'>
                <tr>
                    <td> $row[0] </td>
                    <td> $row[1] </td>
                    <td> $row[2] </td>
                    <td> <img src='$row[3]' height='50'> </td>
                    <td> $row[4] </td>
                    <td> $row[5] </td>
                ";

                if ($row[6] != null) echo "<td> $row[6] </td>";
                else if ($row[7] != null) echo "<td> $row[7] </td>";
                else if ($row[8] != null) echo "<td> $row[8] </td>";


                echo "
                    <input type='hidden' name='standChoosen' id='standChoosen' value='$row[0]' readonly>
                    <td><input type='submit' value='Iscriviti'></td>
                </tr>
                </form>
            ";
            }

            echo "
                </tbody>
            </table>
            ";
            ?>
        </div>
    </header>

    <?php
    include '../templates/footer.html';
    ?>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/swiper.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.js"></script>
    <script src="../assets/js/validator.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>