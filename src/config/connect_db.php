<?php
session_start();

//!per datbase di fabio scommentare solo la riga con dbFabio !!!

//$db = parse_ini_file('dbDabio.ini) 
$db = parse_ini_file('db.ini');

//! per database di fabio
//$conn = new mysqli('localhost', 'adminer', 'CBC349aa', 'Tedeschi_salone_orientamento');

//! per database locale Tiziano
//$conn = new mysqli('localhost','root','','salone_orientamento');
$conn = new mysqli($db['server'],$db['username'],$db['password'],$db['db']) or die ('impossibile connettersi ');

if ($conn->connect_errno) {
  echo "<h1 style='color:red> CONNESSIONE AL DATABASE FALLITA! </h1>";
  exit();
}
