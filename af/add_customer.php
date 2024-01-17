<?php
session_start();

// Controleer of de medewerker is ingelogd
if (!isset($_SESSION['medewerkerID'])) {
    // Als niet ingelogd, stuur door naar de inlogpagina voor medewerkers
    header('Location: login_form.html');
    exit();
}

require_once 'Database.php'; // Pas het daadwerkelijke pad aan indien nodig
$database = new Database();



// Verwerk het toevoegen van een klant-formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toevoegen_klant'])) {
    $naam_klant = $_POST['naam_klant'];
    $straat_klant = $_POST['straat_klant'];
    $postcode_klant = $_POST['postcode_klant'];
    $rijbewijsnummer_klant = $_POST['rijbewijsnummer_klant'];
    $telefoonnummer_klant = $_POST['telefoonnummer_klant'];
    $email_klant = $_POST['email_klant'];
    $wachtwoord_klant = password_hash($_POST['wachtwoord_klant'], PASSWORD_DEFAULT);

    $sql_klant = "INSERT INTO Klant (Naam, Straat, Postcode, Rijbewijsnummer, Telefoonnummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params_klant = array($naam_klant, $straat_klant, $postcode_klant, $rijbewijsnummer_klant, $telefoonnummer_klant, $email_klant, $wachtwoord_klant);

    try {
        $database->pdo->prepare($sql_klant)->execute($params_klant);
        $message_klant = "Klant succesvol toegevoegd!";
    } catch (PDOException $e) {
        $error_klant = "Fout bij toevoegen van klant: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Klant Toevoegen</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

       

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        .success {
            color: #2ecc71;
        }

        .error {
            color: #e74c3c;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

<?php include 'navbar.php'; ?>

    <h2>Nieuwe Klant Toevoegen</h2>

    <form method="post" action="add_klant.php">
        <?php
        if (isset($message_klant)) {
            echo '<p class="success">' . $message_klant . '</p>';
        }

        if (isset($error_klant)) {
            echo '<p class="error">' . $error_klant . '</p>';
        }
        ?>
        <label for="naam_klant">Naam:</label>
        <input type="text" name="naam_klant" required>

        <label for="straat_klant">Straat:</label>
        <input type="text" name="straat_klant" required>

        <label for="postcode_klant">Postcode:</label>
        <input type="text" name="postcode_klant" required>

        <label for="rijbewijsnummer_klant">Rijbewijsnummer:</label>
        <input type="text" name="rijbewijsnummer_klant" required>

        <label for="telefoonnummer_klant">Telefoonnummer:</label>
        <input type="text" name="telefoonnummer_klant" required>

        <label for="email_klant">E-mail:</label>
        <input type="email" name="email_klant" required>

        <label for="wachtwoord_klant">Wachtwoord:</label>
        <input type="password" name="wachtwoord_klant" required>

        <br>

        <input type="submit" id="knoppje" name="toevoegen_klant" value="Toevoegen">
    </form>

</body>

</html>
