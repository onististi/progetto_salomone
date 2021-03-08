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
