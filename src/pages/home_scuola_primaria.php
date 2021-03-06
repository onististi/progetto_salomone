<?php 
include '../config/connect_db.php'; 

if($_SESSION['tipo_scuola'] != "scuola_primo_grado")
    header('location: ../../index.php?');

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home Scuola Primaria</title>

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
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>Benvenuto <span class="turquoise"> <?php echo $_SESSION["scuola"] ?> </span></h1>
                            <p class="p-large">Registra i tuoi studenti per dargli la possibilità di partecipare agli stand organizzati</p>
                            <form action="">
                                <input type="submit" class="btn-solid-reg page-scroll" value="REGISTRA STUDENTI">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="../assets/images/header-school.svg" alt="alternative">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>;
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