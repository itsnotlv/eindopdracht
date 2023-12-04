<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["naam"]) || empty($_POST["Rijbewijsnummer"]) || empty($_POST["Telefoonnummer"]) || empty($_POST["Email"]) || empty($_POST["Wachtwoord"])) {
        echo 'empty';
    } else {
        try {
            $db->InsertUser($_POST['naam'], $_POST['Rijbewijsnummer'], $_POST['Telefoonnummer'], $_POST['Email'], $_POST['Wachtwoord']);
            echo "Data inserted";
        } catch (Exception $e) {
            echo "Failed: " . $e->getMessage();
        }
    }
}

?>