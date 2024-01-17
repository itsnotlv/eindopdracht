<?php
session_start();

// Controleer of de klant is ingelogd
if (!isset($_SESSION['klantID'])) {
    // Als niet ingelogd, stuur door naar de inlogpagina voor klanten
    header('Location: login_form.html');
    exit();
}

require_once 'Database.php'; // Pas het daadwerkelijke pad aan indien nodig
$database = new Database();

// Haal de auto-informatie op
$carID = isset($_GET['carID']) ? $_GET['carID'] : null;
$carName = isset($_GET['carName']) ? $_GET['carName'] : '';

$sql_auto_info = "SELECT * FROM Autos WHERE AutoID = ?";
$params_auto_info = array($carID);

$stmt_auto_info = $database->pdo->prepare($sql_auto_info);
$stmt_auto_info->execute($params_auto_info);
$row_auto_info = $stmt_auto_info->fetch(PDO::FETCH_ASSOC);

// Controleer of de auto gevonden is
if (!$row_auto_info) {
    // Redirect of foutmelding, afhankelijk van jouw vereisten
    header('Location: rent_car.php');
    exit();
}

// Gebruik de opgehaalde informatie zoals nodig in de rest van je code
$carName = $row_auto_info['Merk'] . ' ' . $row_auto_info['Model'];
$kosten_per_dag = $row_auto_info['Kosten_Per_Dag'];
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

        input,
        select {
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

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #222;
            /* Donkergrijze achtergrond */
            overflow: hidden;
            color: #fff;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;

            padding-bottom: 1px;
        }

        .navbar {
            background-color: rgba(55, 55, 55, 0.8);
            /* Donkergrijs met wat transparantie */
            padding: 15px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            top: 0;
            z-index: 1000;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        form {
            width: 500px;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="beginscherm.php">Home</a></li>
                <li><a href="rent_car.php">Renting</a></li>
                <li><a href="register_form.html">Registreren</a></li>
                <li><a href="klant_factuur.php">Mijn Facturen</a></li>
                <li><a href="logout.php">Uitloggen</a></li>
            </ul>
        </nav>
    </header>

    <h2>Nieuwe Reservering Toevoegen</h2>

    <form method="post">
        <?php
        if (isset($message_reservering)) {
            echo '<p class="success">' . $message_reservering . '</p>';
        }

        if (isset($error_reservering)) {
            echo '<p class="error">' . $error_reservering . '</p>';
        }
        ?>

        <label for="carName">Auto:</label>
        <input type="text" name="carName" value="<?php echo htmlspecialchars($carName); ?>" readonly>

        <label for="verhuurdatum_reservering">Verhuurdatum:</label>
        <input type="date" name="verhuurdatum_reservering" required>

        <label for="huurperiode_reservering">Huurperiode (dagen):</label>
        <input type="number" name="huurperiode_reservering" required>

        <!-- Verborgen velden voor het doorgeven van auto-informatie -->
        <input type="hidden" name="carID" value="<?php echo $carID; ?>">
        <input type="hidden" name="kosten_per_dag" value="<?php echo $kosten_per_dag; ?>">

        <br>

        <input type="submit" id="knoppje" name="toevoegen_reservering" value="Toevoegen">
    </form>

</body>

</html>

<?php
// Verwerk het toevoegen van een reservering-formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toevoegen_reservering'])) {
    $verhuurdatum_reservering = $_POST['verhuurdatum_reservering'];
    $klantID_reservering = $_SESSION['klantID']; // Haal klantID uit de sessie
    $huurperiode_reservering = $_POST['huurperiode_reservering'];

    // Bereken de kosten op basis van de formule
    $kosten_reservering = $huurperiode_reservering * $kosten_per_dag;

    // Voeg reserveringsgegevens toe aan de database
    $sql_reservering = "INSERT INTO Verhuringen (Verhuurdatum, KlantID, AutoID, Huurperiode, Kosten) VALUES (?, ?, ?, ?, ?)";
    $params_reservering = array($verhuurdatum_reservering, $klantID_reservering, $carID, $huurperiode_reservering, $kosten_reservering);

    try {
        $database->pdo->prepare($sql_reservering)->execute($params_reservering);
        $message_reservering = "Reservering succesvol toegevoegd!";
        header('Location: klant_factuur.php');
        exit();
    } catch (PDOException $e) {
        $error_reservering = "Fout bij toevoegen van reservering: " . $e->getMessage();
    }
}
?>