<?php
session_start();

//! per database di fabio
$conn = new mysqli('localhost', 'adminer', 'CBC349aa', 'Tedeschi_salone_orientamento');

//! per database locale Tiziano
//$conn = new mysqli('localhost','root','','salone_orientamento');

if ($conn->connect_errno) {
  echo "<h1 style='color:red> CONNESSIONE AL DATABASE FALLITA! </h1>";
  exit();
}
