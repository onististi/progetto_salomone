<?php
include 'templates/header.php';

if(!isset($_SESSION['usernameh']) || $_SESSION['usernameh'] == "" )
   header("location:login/index.php");
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>AutoTrasporti onisti</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/login.css">
</head>
<body class="bg-light">

<form action = "nuovo_trasporto.php" method = post>
   <input type="submit" class="fadeIn " value="richiedi un trasporto" name="ordilna" style="float:right"><br><br><br><br>
</form>
   <h1 class = "text-center"> I tuoi trasporti </h1>

<?php
$username = $_SESSION['usernameh'];
$sql = "SELECT id_cliente FROM users WHERE username = '$username'";
$result = $conn ->query($sql);
$row = $result -> fetch_assoc();
$id = $row['id_cliente'];

$sql = "SELECT * FROM trasporto WHERE fk_cliente = '$id'";
$result = $conn->query($sql);

echo "<div class='container'>
<h2>ORDINI</h2>";

if(isset($result)){
   echo "<div class='table-responsive'> <div class='table-responsive'><table class='table'> <thead> <tr>";

   $row=mysqli_fetch_assoc($result);

   if($row != null){
      
   echo "<th> id trasporto </th><th> localita partenza</th><th>località arrivo</th><th>data</th><th>id automezzo</th><th>peso</th><th>consegnato</th>"."<th> posizione</th></tr> </thead>";
   $idLocalita = array();
   $idAutomezzi = array();

   while ($row ){   

      echo "<tr><td>".$row['id_trasporto']."</td><td>";
      $id_trasporto = $row ['id_trasporto'];
      $lp = $row ['fk_località_partenza'];

      $sql = "SELECT nome FROM località WHERE id_località = '$lp'";
      $resultL = $conn -> query($sql);
      $rowL = mysqli_fetch_assoc($resultL);
      echo $rowL['nome']."</td><td>";

      $la = $row ['fk_località_arrivo'];
      $sql = "SELECT nome FROM località WHERE id_località = '$la'";
      $resultLa = $conn -> query($sql);
      $rowLa = mysqli_fetch_assoc($resultLa);
      echo $rowLa['nome'];

      echo"</td><td>".$row['data_trasporto']."</td><td>";
      
      if($row['fk_automezzo'] == null){
         echo "non assegnato";
      }else
         echo $row['fk_automezzo'];
      
      echo"</td><td>".$row['peso_trasporto']." Kg</td><td>";
      
      if($row['consegnato'])
         echo "✔️";
      else{
         echo "❌";

      if(!in_array($row['fk_automezzo'],$idAutomezzi))
         array_push($idAutomezzi,$row['fk_automezzo']);
      }

      if(!in_array($row['fk_località_partenza'],$idLocalita))
         array_push($idLocalita,$row['fk_località_partenza']);
      
      if(!in_array($row['fk_località_arrivo'],$idLocalita))
         array_push($idLocalita,$row['fk_località_arrivo']);
         
      echo"</td><td> <a href = 'storico.php?id=$id_trasporto'> storico </a></td></tr>";
      $row=mysqli_fetch_assoc($result);
   }

   mysqli_free_result($result);  //libera memoria
   echo "</table></tr></table></div></div></div></div>";

//---------------------------------------------------------------LOCALITA-----------------------------------------------------------------//

   echo "<div class='container'>
   <h2>Località usate dai tuoi ordini</h2>
   <div class='table-responsive'> <div class='table-responsive'><table class='table'> <thead> <tr>";

   echo "<th> nome </th><th> cap </th><th> sigla provincia</th>";

   foreach( $idLocalita as $v ){
      $sql = "SELECT * FROM località WHERE id_località = '$v'";
      $result = $conn -> query($sql);
      
      while ($row =  mysqli_fetch_assoc($result))   
         echo "<tr><td>".$row['nome']."</td><td>".$row['cap']."</td><td>".$row['sigla_provincia']."</td></tr>";
   }

   mysqli_free_result($result);  //libera memoria
   echo "</table></tr></table></div></div></div></div>";


//-------------------------------------------------------------AUTOMEZZI---------------------------------------------------------------//
   echo "<div class='container' name = 'iltimo'>
   <h2>gli automezzi che trasportano i tuoi pacchi</h2>
   <div class='table-responsive'> <div class='table-responsive'><table class='table'> <thead> <tr>";

   echo "<th> id automezzo </th><th> tipo </th><th> targa </th><th> nome autista </th></tr> </thead>";

   foreach( $idAutomezzi as $v ){
      $sql = "SELECT * FROM automezzo WHERE id_automezzo = '$v'";
      $result = $conn -> query($sql);
      
      while ($row = mysqli_fetch_assoc($result)){

         $t = $row ['fk_autista'];
         $sqlA = "SELECT nome FROM autista WHERE id_autista = '$t'";
         $resultA = $conn ->query($sqlA);
         $rowA = mysqli_fetch_assoc($resultA);
         $NA = $rowA['nome'];

         echo "<tr><td>".$row['id_automezzo']."</td><td>".$row['tipo_automezzo']."</td><td>".$row['targa']."</td><td>".$NA."</td>";
      }
   }

   }else
      echo "<h2> non hai effettuato ordini </h2>";

   mysqli_free_result($result);  //libera memoria
   echo "</tr></table></table>";
}
echo'</div></div></div></div>';

include 'templates/footer.php'; ?>
</body>
</html>