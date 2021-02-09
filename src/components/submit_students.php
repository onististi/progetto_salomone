<?php
include '../config/connect_db.php';
$success = true;

$tmp_path = $_FILES['list_students']['tmp_name'];

$file = fopen($tmp_path, 'r');
while ($data = fgetcsv($file)) {
    $student = implode('', $data);
    $student_data = explode(";", $student);

    //create user & pass & codice
    $codiceMeccanografico = $_SESSION["codice"];
    $appUsername = strtolower($student_data[2] . "." . $student_data[3]);
    $username =  str_replace(' ', '_', $appUsername);
    $cryptpass = crypt($student_data[3], '$5$idkanysus$');

    //query
    $query = "INSERT INTO studente (matricola ,fk_scuola ,nome, cognome, username, password ,sesso, mail, classe, data_nascita)
			VALUES ('$student_data[0]','$codiceMeccanografico','$student_data[1]', '$student_data[2]', '$username', '$cryptpass', '$student_data[3]', '$student_data[4]', '$student_data[5]', '$student_data[6]')";

    if (!mysqli_query($conn, $query)) {    //if theres any problem
        echo "<center><p style='font-size: 2vw;'>$username non registrato correttamente.</p><p style='font-size: 1vw;'>Error: " . mysqli_error($conn) . "</p></center>";
        $success = false;
        $_SESSION["registrato"] = "failed";
    }
}

if ($success) {    //if success
    echo "Registrato correttamente ";
    $_SESSION["registrato"] = "success";
}
echo "<a href='../../index.php'>Esci</a>";


fclose($file);
//remove file
//
