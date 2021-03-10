<?php include '../config/connect_db.php'; 

if(isset($_GET['sub'])){
    $id_A = $_POST['ChosenStand'];
    $sql = "SELECT matricola FROM studente WHERE username = "."'".$_SESSION['utente']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $matricola = $row['matricola'];

    $k = $_POST['ChosenStand'];
    $sql = "INSERT INTO iscrizione(fk_matricola,fk_attivita) VALUES ('$matricola','$k')";
    $resultt = $conn->query($sql);
    //header("location: activity_subscription.php?nav=home_studente");
   print_r($result);
   echo $id_A;
}

$s ="SELECT count(*) FROM iscrizione group by iscrizione.fk_attivita";
$r = $conn->query($s);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Iscriviti ad un attivita</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/swiper.css" rel="stylesheet">
    <link href="../assets/css/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/styles_home.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/favicon.png">
</head>
<style>

.btn {
	background-color: #2A265F;
	border: 0;
	border-radius: 50px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
	color: #fff;
	font-size: 16px;
	padding: 12px 25px;
	bottom: 30px;
	right: 30px;
	letter-spacing: 1px;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #007bff;
}

.floating-btn:focus {
	outline: none;
}

.numerino{
}
</style>

<body data-spy="scroll" data-target=".fixed-top">
    <?php
    include '../templates/header.php';
    ?>

    <header id="header" class="header">
        <div class="header-content">
        <?php
        if(isset($_SESSION['codice']))
            $codiceMeccanografico = $_SESSION["codice"];

            // connesione al DBMS query per le attivita a cui non è iscritto
            $query = "SELECT * from attivita NATURAL JOIN registra_attivita  WHERE attivita.id_attivita NOT IN(SELECT id_attivita FROM attivita JOIN iscrizione on iscrizione.fk_attivita = attivita.id_attivita JOIN studente on studente.matricola = iscrizione.fk_matricola WHERE studente.username = "."'".$_SESSION['utente']."')";
            
            $result = mysqli_query($conn, $query) or die("Query fallita" . mysqli_error($conn) . " " . mysqli_error($conn));
            echo "<br>
            <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ID_Attivita</th>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Logo</th>
                        <th>Data</th>
                        <th>Ora</th>
                        <th>Organizzatore</th>
                        <th>Numero partecipanti</th>
                        <th>Invio</th>
                    </tr>
                </thead>
            <tbody>";

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) // solo numerico
            {   $ro = $r->fetch_assoc();
                //$_SESSION['standChoosen'] = $row[0];
                echo "
                <form method='post' action='activity_subscription.php?nav=home_scuola&sub'>
                <tr>
                    <td> $row[0] </td>
                    <td> $row[1] </td>
                    <td> $row[2] </td>
                    <td> <img src='$row[3]' height='50'> </td>
                    <td> $row[4] </td>
                    <td> $row[5] </td>
                    
                ";

                if ($row[6] != null) echo "<td> $row[6] </td>";
                else if ($row[7] != null) echo "<td> $row[7] </td>";
                else if ($row[8] != null) echo "<td> $row[8] </td>";
            
               echo" <td class='numerino'>"; 
                if($ro['count(*)'])
                  echo $ro['count(*)'] ;
               else
                    echo"0";
                echo "/20</td>";

                    ?>
                    <td><button class="btn" name="ChosenStand" value=<?php echo $row[0];

                    if($ro['count(*)'] >=20) //!per se sono piu di 20 fa mhanz
                        echo 'disabled';
                    ?>> Partecipa</button></td>
                </tr>
                </form>
            <?php
            }

            echo "
                </tbody>
            </table>
            ";
            ?>
        </div>
    </header>

    <?php
    include '../templates/footer.html';?>

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