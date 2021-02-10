<?php include '../config/connect_db.php';

if ($_SESSION["tipo_scuola"] == "scuola_secondo_grado") {
    $date = "2021-11-12";
} else if ($_SESSION["tipo_scuola"] == "universita" || $_SESSION["tipo_scuola"] == "azienda") {
    $date = "2021-11-13";
}

$query = "SELECT id_attivita, ora FROM attivita WHERE giorno = '$date' AND occupato=0 ";
$result = mysqli_query($conn, $query) or die("Query fallita" . mysqli_error($conn) . " " . mysqli_error($conn));

$c = 0;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) // solo numerico
{
    $ore[$c] = "<option value=" . $row['id_attivita'] . ">Attivita " . $row['id_attivita'] . ", Ore: " . $row['ora'] . "</option>";
    $c++;
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Organizza Stand</title>

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
    <?php include '../templates/header.php' ?>

    <header id="header" class="header">
        <div class="header-content">
            <div id="organize-stand-form" class="organize-stand-form">
                <div class="card">
                    <div class="card-body">
                        <form action="../components/submit_activity.php" method="POST" data-toggle="validator" data-focus="false" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="titolo" name="titolo" placeholder="Titolo Attività" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input accept="image/jpeg" type="file" class="form-control-input logo" name="logo" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- <div class="form-group">
                                <input type="time" class="form-control-input" id="ora" name="ora" placeholder="Ora" required>
                                <div class="help-block with-errors"></div>
                            </div> -->
                            <div class="form-group">
                                <select name="id_attivita_ora" class="form-control-input" id="id_attivita_ora">
                                    <option value="" disabled selected>Ora</option>
                                    <?php
                                    foreach ($ore as &$value) {
                                        echo $value;
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea maxlength="256" class="form-control-input description" id="descrizione" name="descrizione" placeholder="Descrizione (max. 256)" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="button-wrapper">
                                <input type="submit" class="btn-solid-reg page-scroll" value="CREA ATTIVITÀ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php include '../templates/footer.html'; ?>

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