<?php include '../config/connect_db.php'; ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login Studente</title>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../styles/css/bootstrap.css" rel="stylesheet">
    <link href="../styles/css/fontawesome-all.css" rel="stylesheet">
    <link href="../styles/css/swiper.css" rel="stylesheet">
	<link href="../styles/css/magnific-popup.css" rel="stylesheet">
	<link href="../styles/css/styles.css" rel="stylesheet">
	<link href="../styles/css/styles_login.css" rel="stylesheet">
	
    <link rel="icon" href="../styles/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <?php include '../templates/header_login_studente.html' ?>

    <header id="header" class="header">
        <div class="header-content">
            <div id="login-form" class="login-form">
                <div class="card">
                    <div class="card-body">
                        <form action="../index.php" method="POST" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="username" name="username" placeholder="Username" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password" placeholder="Password" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="button-wrapper">
                                <input type="submit" class="btn-solid-reg page-scroll" value="ACCEDI">
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