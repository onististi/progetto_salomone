<?php 
include 'config/connect_db.php';

if(isset($_SESSION['studente']) || isset($_SESSION['scuola']))
    header('location: home/index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Salone Orientamento</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="styles/css/bootstrap.css" rel="stylesheet">
    <link href="styles/css/fontawesome-all.css" rel="stylesheet">
    <link href="styles/css/swiper.css" rel="stylesheet">
	<link href="styles/css/magnific-popup.css" rel="stylesheet">
	<link href="styles/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="styles/images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">


  <?php include 'templates/header.php' ?>

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">Salone Orientamento</span></h1>
                            <p class="p-large">Scegli il tuo percorso formativo o lavorativo partecipando a vari stand proposti da varie scuole ed aziende</p>
                            <!-- <a class="btn-solid-lg page-scroll" href="#services">INFORMAZIONI</a> -->
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="styles/images/header-teamwork.svg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

<!-- Services -->
<div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Informazioni su Salone Orientamento</h2>
                    <!-- <p class="p-heading p-large">We serve small and medium sized companies in all tech related industries with high quality growth services which are presented below</p> -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="styles/images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Iscriviti</span></h4>
                            <p>Iscriviti allo stand che richiama di più la tua passione scolastica e in cui ti vedi nel futuro</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="styles/images/services-icon-2.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Partecipa</span></h4>
                            <p>Raggiungi altri studenti con la tua stessa passione e partecipate ad una presentazione con esperti</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="styles/images/services-icon-3.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title"><span class="turquoise">Scegli</span></h4>
                            <p>Dopo attente riflessioni scegli il percorso che vuoi intraprendere e fallo tuo!</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->

<?php include 'templates/footer.php'; ?>

    <!-- Scripts -->
    <script src="styles/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="styles/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="styles/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="styles/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="styles/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="styles/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="styles/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="styles/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>