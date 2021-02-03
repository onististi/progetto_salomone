<?php include '../config/connect_db.php'; ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home Scuola</title>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../styles/css/bootstrap.css" rel="stylesheet">
    <link href="../styles/css/fontawesome-all.css" rel="stylesheet">
    <link href="../styles/css/swiper.css" rel="stylesheet">
	<link href="../styles/css/magnific-popup.css" rel="stylesheet">
	<link href="../styles/css/styles.css" rel="stylesheet">
    <link href="../styles/css/styles_home.css" rel="stylesheet">
	
    <link rel="icon" href="../styles/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <?php include '../templates/header.php' ?>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>Benvenuto <span class="turquoise"><?php echo $_SESSION["scuola"] ?></span></h1>
                            <p class="p-large">Organizza il tuo stand per far conoscere la tua scuola agli studenti</p>
                            <input type="button" class="btn-solid-reg page-scroll" onclick="location.href = 'organize_stand.php?nav=home_scuola';" value="ORGANIZZA STAND">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="../styles/images/header-school.svg" alt="alternative">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php include '../templates/footer.html'; ?>

    <script src="../styles/js/jquery.min.js"></script>
    <script src="../styles/js/popper.min.js"></script>
    <script src="../styles/js/bootstrap.min.js"></script>
    <script src="../styles/js/jquery.easing.min.js"></script>
    <script src="../styles/js/swiper.min.js"></script>
    <script src="../styles/js/jquery.magnific-popup.js"></script>
    <script src="../styles/js/validator.min.js"></script>
    <script src="../styles/js/scripts.js"></script>
</body>
</html>