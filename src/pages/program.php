<?php include '../config/connect_db.php'; 

$sql ="SELECT attivita.* FROM iscrizione JOIN studente on studente.matricola = iscrizione.fk_matricola JOIN attivita on iscrizione.fk_attivita = attivita.id_attivita WHERE studente.username="."'".$_SESSION['utente']."' order by attivita.ora";
$result =$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Programma</title>

     <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/swiper.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet"> 
    <link href="../assets/css/program.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">
<?php include '../templates/header.php';?>

<header id="header" class="header">
    <div class="header-content">
        <div class="container">

        <form action="presentation.php" method="post">

        <?php while ($row = $result->fetch_assoc()){ ?>
              <div class="courses-container">
                    <div class="course">
                        <div class="course-info">
                            <div class="progress-container">
                                <span class="progress-text">
                                    dalle ore 
                                        <?php echo $row['ora']; ?> 
                                </span>
                            </div>
                            <img src=<?php echo"'".$row['logo']."'"?> width="40" height="40"> <h2> <?php echo $row['titolo']; ?>  </h2>
                            <h6><?php echo $row['descrizione']; ?> </h6>
                            <button class="btn" name="ChosenStand" value=<?php echo $row['id_attivita'] ?>> Partecipa</button>
                        </div>
                    </div>
                </div>  
        <?php } ?>
         
            </div>
        </div>
    </div>
    </form>
</header>

<?php include '../templates/footer.html'; ?>
</body>
</html>