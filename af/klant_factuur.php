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

// Haal factuurgegevens op uit de database
$klantID = $_SESSION['klantID'];
$sql_facturen = "SELECT * FROM Verhuringen WHERE KlantID = ?";
$params_facturen = array($klantID);

try {
    $result_facturen = $database->pdo->prepare($sql_facturen);
    $result_facturen->execute($params_facturen);
    $facturen = $result_facturen->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_facturen = "Fout bij ophalen van facturen: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Mijn Facturen</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        header {
            background-color: #333;
            color: #fff;
            padding-bottom: 1px;
        }

        .navbar {
            background-color: rgba(55, 55, 55, 0.8);
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        h2 {
            text-align: center;
        }

        .error {
            color: #e74c3c;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="beginscherm.php">Home</a></li>
            <li><a href="rent_car.php">Renting</a></li>
            <li><a href="register_form.html">Registreren</a></li>
            <li><a href="klant_factuur.php">Mijn Facturen</a></li>
            <li><a href="logout.php">Uitloggen</a></li>
        </ul>
    </nav>

    <h2>Mijn Facturen</h2>

    <?php
    if (isset($error_facturen)) {
        echo '<p class="error">' . $error_facturen . '</p>';
    } else {
        if (count($facturen) > 0) {
            echo '<table>';
            echo '<tr><th>VerhuurID</th><th>Verhuurdatum</th><th>AutoID</th><th>Huurperiode (dagen)</th><th>Kosten</th></tr>';
            foreach ($facturen as $factuur) {
                echo '<tr>';
                echo '<td>' . $factuur['VerhuurID'] . '</td>';
                echo '<td>' . $factuur['Verhuurdatum'] . '</td>';
                echo '<td>' . $factuur['AutoID'] . '</td>';
                echo '<td>' . $factuur['Huurperiode'] . '</td>';
                echo '<td>' . $factuur['Kosten'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Geen facturen gevonden.</p>';
        }
    }
    ?>

</body>

</html>