<?php 
if ($_GET['nav'] == 'scuola') {
    echo "<nav class='navbar navbar-expand-lg navbar-dark navbar-custom fixed-top'>
                <a class='navbar-brand logo-image' href='../../index.php'><img src='../assets/images/logo.png' alt='alternative'></a>
                <h3 class='navbar-brand logo-text'>Login Scuola</h3>
                
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-awesome fas fa-bars'></span>
                    <span class='navbar-toggler-awesome fas fa-times'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='../../index.php'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='login_studente.php?nav=studente'>Login Studente</a>
                        </li>
                    </ul>
                </div>
            </nav>";
} else if ($_GET['nav'] == 'studente') {
    echo "<nav class='navbar navbar-expand-lg navbar-dark navbar-custom fixed-top'>
                <a class='navbar-brand logo-image' href='../../index.php'><img src='../assets/images/logo.png' alt='alternative'></a>
                <h3 class='navbar-brand logo-text'>Login Studente</h3>
                
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-awesome fas fa-bars'></span>
                    <span class='navbar-toggler-awesome fas fa-times'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='../../index.php'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='login_scuola.php?nav=scuola'>Login Scuola</a>
                        </li>
                    </ul>
                </div>
            </nav>";
} else if ($_GET['nav'] == 'home_scuola') {
    echo "<nav class='navbar navbar-expand-lg navbar-dark navbar-custom fixed-top'>
                <a class='navbar-brand logo-image' href='home_scuola.php?nav=home_scuola'><img src='../assets/images/logo.png' alt='alternative'></a>
                <h3 class='navbar-brand logo-text'>Home Scuola</h3>
                
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-awesome fas fa-bars'></span>
                    <span class='navbar-toggler-awesome fas fa-times'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='organize_stand.php?nav=home_scuola'>Organizza Attività</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href=''>Registra Studenti</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='../../index.php'>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>";
} else if ($_GET['nav'] == 'home_studente') {
    echo "<nav class='navbar navbar-expand-lg navbar-dark navbar-custom fixed-top'>
                <a class='navbar-brand logo-image' href='home_studente.php?nav=home_studente'><img src='../assets/images/logo.png' alt='alternative'></a>
                <h3 class='navbar-brand logo-text'>Home Studente</h3>
                
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-awesome fas fa-bars'></span>
                    <span class='navbar-toggler-awesome fas fa-times'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href=''>Programma</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href=''>Iscrizione Attività</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='../../index.php'>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>";
}
?>