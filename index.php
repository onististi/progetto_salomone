<?php 
include 'src/config/connect_db.php';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Salone Orientamento</title>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="src/assets/css/bootstrap.css" rel="stylesheet">
    <link href="src/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="src/assets/css/swiper.css" rel="stylesheet">
	<link href="src/assets/css/magnific-popup.css" rel="stylesheet">
	<link href="src/assets/css/styles.css" rel="stylesheet">
	
    <link rel="icon" href="styles/images/icon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <?php include 'src/templates/header.html' ?>

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">Salone Orientamento</span></h1>
                            <p class="p-large">Scegli il tuo percorso formativo o lavorativo partecipando a vari stand proposti da varie scuole ed aziende</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="src/assets/images/header-teacher.svg" alt="alternative">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="info" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Informazioni su Salone Orientamento</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <img class="card-image" src="src/assets/images/info-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Iscriviti</span></h4>
                            <p>Iscriviti allo stand che richiama di più la tua passione scolastica e in cui ti vedi nel futuro</p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <img class="card-image" src="src/assets/images/info-icon-2.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Partecipa</span></h4>
                            <p>Raggiungi altri studenti con la tua stessa passione e partecipate ad una presentazione con esperti</p>
                        </div>
                    </div>
                    
                    <div class="card">
                        <img class="card-image" src="src/assets/images/info-icon-3.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Scegli</span></h4>
                            <p>Dopo attente riflessioni scegli il percorso che vuoi intraprendere e fallo tuo!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'src/templates/footer.html'; ?>

    <script src="src/assets/js/jquery.min.js"></script>
    <script src="src/assets/js/popper.min.js"></script>
    <script src="src/assets/js/bootstrap.min.js"></script>
    <script src="src/assets/js/jquery.easing.min.js"></script>
    <script src="src/assets/js/swiper.min.js"></script>
    <script src="src/assets/js/jquery.magnific-popup.js"></script>
    <script src="src/assets/js/validator.min.js"></script>
    <script src="src/assets/js/scripts.js"></script>
</body>
</html>