<?php include '../config/connect_db.php';

if(!isset($_SESSION['tipo_scuola']) || $_SESSION['tipo_scuola'] != 'amministratore')
   header("location: ../../index.php");

if(isset($_POST['m'])){

   $nome = $_POST['nome'];
   $codice = $_POST['codice'];
   $pass = $_POST['password'];
   //$tipo = $_POST['tipo'];

   //$pswdh = password_hash($_POST['pswd'],PASSWORD_DEFAULT);
   $passh = password_hash($pass,PASSWORD_DEFAULT);

   $sql = "INSERT INTO ";

   if(isset($_POST['Radio']) && $_POST['Radio'] == 'primo') $sql.="scuola_primo_grado";
   if(isset($_POST['Radio']) && $_POST['Radio'] == 'secondo') $sql.="scuola_secondo_grado";
   if(isset($_POST['Radio']) && $_POST['Radio'] == 'universita') $sql.="universita";
   if(isset($_POST['Radio']) && $_POST['Radio'] == 'azienda') $sql.="azienda";
   
   $sql.="(codice,nome,password) VALUES("."'".$codice."','".$nome."','".$passh."')";

   $result = $conn->query($sql);
   echo $sql;echo $result;
   header("location:administration.php?nav=amministratore");
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Gestisci Stand</title>

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
                        <form action="register_school.php?a" method="POST" data-toggle="validator" data-focus="false" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="titolo" name="nome" placeholder="nome scuola">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control-input" id="titolo" name="codice" placeholder="codice">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control-input logo" name="password" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="radio" class="form-control-input radio" name="Radio" value="primo" required>primo grado
                                <input type="radio" class="form-control-input radio" name="Radio" value="secondo" required>secondo grado
                                <input type="radio" class="form-control-input radio" name="Radio" value="azienda" required>universita
                                <input type="radio" class="form-control-input radio" name="Radio" value="universita" required>azienda
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="button-wrapper">
                                <input type="submit" name="m"class="btn-solid-reg page-scroll" placeholder="REGISTRA SCUOLA">
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