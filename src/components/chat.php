<?php 

include '../config/connect_db.php';

$result = array();
$message = isset($_POST['message'])? $_POST['message'] : null;
$from = isset($_SESSION['utente'])? $_SESSION['utente'] : null;
$attivita = isset($_POST['attivita'])? $_POST['attivita'] : null;
$fk_attivita = isset($_GET['fk_attivita'])? $_GET['fk_attivita'] : null;

// $fk_attivita = 14;

if(!empty($message) && !empty($from)){ 
   $sql = "INSERT INTO chat(message,sender,fk_attivita) VALUES ("."'$message'".","."'$from'".","."$attivita".")";
   $result = $conn->query($sql);
} 

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$items = $conn->query("SELECT * FROM chat WHERE id >". $start ." AND fk_attivita = ".$fk_attivita);
while($row = $items -> fetch_assoc()){
   $result['items'][]=$row;
}

header('Access-Control-allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);
?>