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



// Verwerk het toevoegen van een reservering-formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toevoegen_reservering'])) {
    $verhuurdatum_reservering = $_POST['verhuurdatum_reservering'];
    $klantID_reservering = $_POST['klantID_reservering'];
    $autoID_reservering = $_POST['autoID_reservering'];
    $huurperiode_reservering = $_POST['huurperiode_reservering'];
    $kosten_reservering = $_POST['kosten_reservering'];

    $sql_reservering = "INSERT INTO Verhuringen (Verhuurdatum, KlantID, AutoID, Huurperiode, Kosten) VALUES (?, ?, ?, ?, ?)";
    $params_reservering = array($verhuurdatum_reservering, $klantID_reservering, $autoID_reservering, $huurperiode_reservering, $kosten_reservering);

    try {
        $database->pdo->prepare($sql_reservering)->execute($params_reservering);
        $message_reservering = "Reservering succesvol toegevoegd!";
    } catch (PDOException $e) {
        $error_reservering = "Fout bij toevoegen van reservering: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Reservering Toevoegen</title>
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

    <h2>Nieuwe Reservering Toevoegen</h2>

    <form method="post" action="add_reservering.php">
        <?php
        if (isset($message_reservering)) {
            echo '<p class="success">' . $message_reservering . '</p>';
        }

        if (isset($error_reservering)) {
            echo '<p class="error">' . $error_reservering . '</p>';
        }
        ?>
        <label for="verhuurdatum_reservering">Verhuurdatum:</label>
        <input type="date" name="verhuurdatum_reservering" required>

        <label for="klantID_reservering">Klant ID:</label>
        <input type="number" name="klantID_reservering" required>

        <label for="autoID_reservering">Auto ID:</label>
        <input type="number" name="autoID_reservering" required>

        <label for="huurperiode_reservering">Huurperiode (dagen):</label>
        <input type="number" name="huurperiode_reservering" required>

        <label for="kosten_reservering">Kosten:</label>
        <input type="text" name="kosten_reservering" required>

        <br>

        <input type="submit" id="knoppje" name="toevoegen_reservering" value="Toevoegen">
    </form>

</body>

</html>
