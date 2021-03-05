<?php 
include '../config/connect_db.php';

$sql ="SELECT * FROM iscrizione JOIN studente on studente.matricola = iscrizione.fk_matricola WHERE studente.username="."'".$_SESSION['utente']."'";

$result =$conn->query($sql);
$row = $result->fetch_assoc();

include "../templates/header.html";
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/swiper.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/styles_home.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/favicon.png">
     <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/swiper.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.js"></script>
    <script src="../assets/js/validator.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
   <title>Presentazione</title>
<style>

.chat{background-color:black;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.col-md-auto{
   background-color:white;
   margin-right:0%;
   text-align:center;
}
video{
   flex:left;
}
</style>
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col">

                     <video width="1000" height="800" controls>
                        <source src="" type="video/mp4">
                      </video> 

                    </div>
                    <div class="col-md-auto chat">

                       kkdskdsk

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>