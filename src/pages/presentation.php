<?php 
include '../config/connect_db.php';
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/presentation.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/favicon.png">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
   <title>Presentazione</title>
</head>
<body data-spy="scroll" data-target=".fixed-top">
<?php include '../templates/header.php'; ?>

    <header id="header" class="header">
        <div class="header-content">
                <div class="row">
                    <div class="coll">
                     <video width="100%" height="700" controls>
                        <source src="" type="video/mp4">
                      </video> 

                    </div>
                    <div class="chat">
                       
                     <!-- Chat Box-->
                            <div class="col-10 px-0">
                            <div class="px-6 py-4 chat-box bg-white">
                                <!-- Sender Message-->
                                <div class="media w-50 mb-3">
                                <div class="media-body ml-3">
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                    </div>
                                    <p class="small text-muted">12:00  | giorno 13</p>
                                </div>
                                </div>

                                <!-- Reciever Message-->
                                <div class="media w-50 ml-auto mb-3">
                                <div class="media-body">
                                    <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">Negro negro</p>
                                    </div>
                                    <p class="small text-muted">12:00 | giorno 13</p>
                                </div>
                                </div>

                            </div>

                            <!-- Typing area -->
                            <form action="#" class="bg-light" id="send-container">
                                <div class="input-group">
                                <input type="text" autofocus placeholder="Type a message" aria-describedby="button-addon2" id="message-input" class="form-control rounded-0 border-0 py-4 bg-light">
                                <div class="input-group-append">
                                    <button id="send-button" type="submit" class="btn btn-link" value="send"> <i class="fa fa-paper-plane"></i></button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script>



</script>

</body>
</html>