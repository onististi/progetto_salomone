<?php
include '../config/connect_db.php';

if (isset($_POST["standChoosen"])) $stand = $_POST["standChoosen"];
$matricola = $_SESSION["matricola"];

$query = "INSERT INTO iscrizione(fk_matricola, fk_attivita) VALUES ('$matricola', '$stand')";
$result = mysqli_query($conn, $query) or die("Query fallita:  " . mysqli_error($conn));

header("Location: ../pages/home_studente.php?nav=studente");

?>