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

// Verwerk het toevoegen van een auto-formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toevoegen_auto'])) {
    $merk_auto = $_POST['merk_auto'];
    $model_auto = $_POST['model_auto'];
    $jaar_auto = $_POST['jaar_auto'];
    $kenteken_auto = $_POST['kenteken_auto'];
    $kosten_per_dag_auto = $_POST['kosten_per_dag_auto']; // Voeg deze regel toe
    $beschikbaarheid_auto = isset($_POST['beschikbaarheid_auto']) ? 1 : 0;

    $sql_auto = "INSERT INTO Autos (Merk, Model, Jaar, Kenteken, Kosten_Per_Dag, Beschikbaarheid) VALUES (?, ?, ?, ?, ?, ?)"; // Voeg Kosten_Per_Dag toe
    $params_auto = array($merk_auto, $model_auto, $jaar_auto, $kenteken_auto, $kosten_per_dag_auto, $beschikbaarheid_auto);

    try {
        $database->pdo->prepare($sql_auto)->execute($params_auto);
        $message_auto = "Auto succesvol toegevoegd!";
    } catch (PDOException $e) {
        $error_auto = "Fout bij toevoegen van auto: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Auto Toevoegen</title>
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
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>
    <h2>Nieuwe Auto Toevoegen</h2>

    <form method="post" action="add_car.php">
        <?php
        if (isset($message_auto)) {
            echo '<p class="success">' . $message_auto . '</p>';
        }

        if (isset($error_auto)) {
            echo '<p class="error">' . $error_auto . '</p>';
        }
        ?>
        <label for="merk_auto">Merk:</label>
        <input list="merk_auto" name="merk_auto" required>
        <datalist id="merk_auto">
            <option value="fiat">
            <option value="mercedes">
            <option value="audi">
            <option value="volvo">
            <option value="saab">
        </datalist>

        <label for="model_auto">Model:</label>
        <select name="model_auto" required>
            <option value="model1">Model 1</option>
            <option value="model2">Model 2</option>
            <option value="model3">Model 3</option>
            <!-- Voeg meer modelopties toe indien nodig -->
        </select>

        <label for="jaar_auto">Jaar:</label>
        <select name="jaar_auto" required>
            <?php
            // Dynamisch jaar opties genereren
            $currentYear = date('Y');
            for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
        </select>

        <label for="kenteken_auto">Kenteken:</label>
        <input type="text" name="kenteken_auto" required>

        <label for="kosten_per_dag_auto">Kosten per dag:</label>
        <input type="text" name="kosten_per_dag_auto" required>

        <label for="beschikbaarheid_auto">Beschikbaarheid:</label>
        <input type="checkbox" name="beschikbaarheid_auto">

        <br>

        <input type="submit" id="knoppje" name="toevoegen_auto" value="Toevoegen">
    </form>

</body>

</html>