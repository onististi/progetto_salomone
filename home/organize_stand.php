<?php include '../config/connect_db.php'; ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Organizza Stand</title>
    
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
            <div id="organize-stand-form" class="organize-stand-form">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="titolo" name="titolo" placeholder="Titolo Attività" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input accept="image/png, image/jpeg" type="file" class="form-control-input logo" id="logo" name="logo" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control-input" id="ora" name="ora" placeholder="Ora" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <textarea maxlength="256" class="form-control-input description" id="descrizione" name="descrizione" placeholder="Descrizione (max. 256)" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="button-wrapper">
                                <input type="submit" class="btn-solid-reg page-scroll" value="CREA STAND">
                            </div>
                        </form>
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