<?php include '../config/connect_db.php'; ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registra Studenti</title>
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
                        <form action="../components/submit_students.php" method="POST" data-toggle="validator" data-focus="false" enctype="multipart/form-data">
                            <div class="form-group">
                                <input accept="text/csv" type="file" class="form-control-input list" name="list_students" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="button-wrapper">
                                <input type="submit" class="btn-solid-reg page-scroll" value="REGISTRA STUDENTI">
                            </div>
                        </form>
                        <a href="../doc/formato.csv" download>SCARICA TEMPLATE
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