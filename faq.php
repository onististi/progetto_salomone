<?php

if(session_status() == PHP_SESSION_NONE)
    @session_start();
 
if(isset($_GET['path'])){
$filename = $_GET['path'];

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($filename).'"');
header('Content-Length: ' . filesize($filename));
header('Pragma: public');
flush();

readfile($filename);

die();
}
    
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Faq</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="src/assets/css/bootstrap.css" rel="stylesheet">
    <link href="src/assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="src/assets/css/swiper.css" rel="stylesheet">
    <link href="src/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="src/assets/css/styles.css" rel="stylesheet">

    <link rel="icon" href="src/assets/images/favicon.png">
</head>
<style>
img{}


</style>
<body data-spy="scroll" data-target=".fixed-top">
    <?php include 'src/templates/header.html' ?>

    <header id="header" class="header center">
        <div class="header-content center">
            <div id="info" class="cards-1">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <h3><a href="faq.php?path=src/assets/images/pdf/pdf.pdf">Scarica il file PDF</a></h3> 
                        <img src="src/assets/images/pdf/1.png">
                        <img src="src/assets/images/pdf/2.png">
                        <img src="src/assets/images/pdf/3.png">
                        <img src="src/assets/images/pdf/4.png">
                        <img src="src/assets/images/pdf/5.png">
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </header>
     
    
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