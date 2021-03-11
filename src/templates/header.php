<?php 
// if(isset($_SESSION['tipo_scuola']))
//     echo $_SESSION['tipo_scuola'];
//  if(isset($_SESSION['utente']))
//     echo $_SESSION['utente'];
   include '../components/checkDB.php';
   echo "<nav class='navbar navbar-expand-lg navbar-dark navbar-custom fixed-top'>
            <a class='navbar-brand logo-image' href='../../index.php'><img src='../assets/images/logo.png' alt='alternative'></a>
            <h3 class='navbar-brand logo-text'>";    //</h3>

if(isset($_GET['nav'])){
      $get = $_GET['nav']; 
   if( $get == 'scuola')
      echo'Login Scuola / Azienda';
   else if( $get == 'studente')
      echo'Login Studente';
   else if( $get == 'home_scuola')
      echo'Home Scuola';
   else if( $get == 'home_studente')
      echo'Home Studente';   
   else if($get == 'presentation')
      echo 'Presentazione attività';

   echo"</h3>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' 
      aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
         <span class='navbar-toggler-awesome fas fa-bars'></span>
         <span class='navbar-toggler-awesome fas fa-times'></span>
      </button>"; //!prima parte

   echo"<div class='collapse navbar-collapse' id='navbarsExampleDefault'>
            <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>";

   //?per login student, scuola e home studente         
   $m = "<a class='nav-link page-scroll' href='../../index.php'>Home</a>
         </li>
         <li class='nav-item'>";
   
   if($get== 'scuola')
      $m.="<a class='nav-link page-scroll' href='login_studente.php?nav=scuola'>Login Studente</a>";
   if ($get== 'studente')
      $m.="<a class='nav-link page-scroll' href='login_scuola.php?nav=scuola'>Login Scuola / Azienda </a>";
   if($get== 'home_studente'){
      $m .='<a class="nav-link page-scroll" href="program.php?nav=home_studente">Programma</a> <li class="nav-item">
                        <a class="nav-link page-scroll" href="activity_subscription.php?nav=home_studente">Iscrizione Attività</a>
                     </li>';
   }            
      
   if($get == 'scuola' || $get == 'studente' || $get == 'home_studente')
      echo $m;
   //?---------------------------------------------- scuola primo grado -----------------------------------------

   if($get == 'home_scuola' && $_SESSION["tipo_scuola"] == "scuola_primo_grado"){

      if (alreadySubmitted($_SESSION["codice"]))
        echo "<a class='nav-link page-scroll' href='register_students.php?nav=home_scuola' style='color:red;'>Studenti gia registrati</a>";
      else
        echo "<a class='nav-link page-scroll' href='register_students.php?nav=home_scuola'>Registra Studenti</a>";    
      echo "</li>";
   }

//?---------------------------------------------- scuola secondo -----------------------------------------

   if($get == "home_scuola" && $_SESSION['tipo_scuola'] == "scuola_secondo_grado"){

       if (alreadyCreatedActivity($_SESSION["codice"], $_SESSION["tipo_scuola"]))
        echo "<a class='nav-link page-scroll' href='choose_stand_to_manage.php?nav=home_scuola'>Gestisci attività</a>
            </li>";
    
    echo "<li class='nav-item'>
            <a class='nav-link page-scroll' href='organize_stand.php?nav=home_scuola'>Organizza Attività</a>
         </li>";

    if (alreadySubmitted($_SESSION["codice"]))
        echo "<li class='nav-item'>
                  <a class='nav-link page-scroll' href='students.php?nav=home_scuola' style='color:red;'>Studenti già registrati</a>
               </li>";
     else 
        echo "<li class='nav-item'>
                  <a class='nav-link page-scroll' href='register_students.php?nav=home_scuola'>Registra studenti</a>
               </li>";
   }

//?---------------------------------------------- uni -----------------------------------------
   if($get == "home_scuola" && $_SESSION['tipo_scuola'] == "università"){
      if (alreadyCreatedActivity($_SESSION["codice"], $_SESSION["tipo_scuola"]))
         echo "<a class='nav-link page-scroll' href='choose_stand_to_manage.php?nav=home_scuola'>Gestisci attività</a>
            </li>";
   }
//?---------------------------------------------- azienda -----------------------------------------

   if($get == 'home_scuola' && $_SESSION['tipo_scuola'] == "azienda"){
      if (alreadyCreatedActivity($_SESSION["codice"], $_SESSION["tipo_scuola"]))
         echo "<a class='nav-link page-scroll' href='choose_stand_to_manage.php?nav=home_scuola'>Gestisci attività</a>
            </li>"; //* il <li> che viene aperto a riga 30
   }

   if($get == 'home_scuola' && ($_SESSION['tipo_scuola'] == "azienda" || $_SESSION['tipo_scuola'] == "azienda")) //?seconda parte uni
      echo "<li class='nav-item'>
               <a class='nav-link page-scroll' href='organize_stand.php?nav=home_scuola'>Organizza Attività</a>
            </li>";

   if($get == 'amministratore' && $_SESSION['tipo_scuola'] == "amministratore"){
         echo "<a class='nav-link page-scroll' href='register_school.php?nav=amministratore'>Inserisci Scuola</a>
            </li>"; //* il <li> che viene aperto a riga 30
         }

      echo "<li class='nav-item'>
               <a class='nav-link page-scroll' href='../../index.php?l'>Logout</a>
            </li>
            </ul>
         </div>
      </nav>";
 }
?>