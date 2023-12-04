<?php

include 'db.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["naam"]) || empty($_POST["Rijbewijsnummer"]) || empty($_POST["Telefoonnummer"]) || empty($_POST["Email"]) || empty($_POST["Wachtwoord"]) || empty($_POST["herhaal_wachtwoord"])) {
        echo 'Vul alle verplichte velden in.';
    } else { 
        $wachtwoord = $_POST['Wachtwoord'];
        $herhaal_wachtwoord = $_POST['herhaal_wachtwoord'];
        if ($wachtwoord !== $herhaal_wachtwoord) {
            echo 'Wachtwoord en herhaald wachtwoord komen niet overeen.';
        } else {
            try {
                $db->InsertUser($_POST['naam'], $_POST['Rijbewijsnummer'], $_POST['Telefoonnummer'], $_POST['Email'], $_POST['Wachtwoord']);
                echo "Data inserted";
            } catch (Exception $e) {
                echo "Failed: " . $e->getMessage();
        }
    }
}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container">
        <div class="registration-form">
            <h1>Registratie</h1>
            <form  method="POST">
                <input type="text" name="naam" placeholder="Naam" required><br>
                <input type="text" name="Rijbewijsnummer" placeholder="Rijbewijsnummer" required><br>
                <input type="tel" name="Telefoonnummer" placeholder="Telefoonnummer" required><br>
                <input type="email" name="Email" placeholder="example@gmail.com" required><br>
                <input type="password" name="Wachtwoord" placeholder="Nieuw wachtwoord" required><br>
                <input type="password" name="herhaal_wachtwoord" placeholder="Herhaal wachtwoord" required><br>
                <div class="sjeje">
                    <input type="submit" value="Registreren">
                </div>
            </form>
        </div>
    </div>

    
</body>

</html>