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



// Haal de huidige datum op
$huidigeDatum = date('Y-m-d');

// Haal gereserveerde auto's op voor vandaag
$sql_reserveringen = "SELECT Verhuringen.VerhuurID, Verhuringen.Verhuurdatum, Klant.Naam AS KlantNaam, Autos.Merk, Autos.Model
                      FROM Verhuringen
                      JOIN Klant ON Verhuringen.KlantID = Klant.KlantID
                      JOIN Autos ON Verhuringen.AutoID = Autos.AutoID
                      WHERE Verhuringen.Verhuurdatum = ?";

$statement_reserveringen = $database->pdo->prepare($sql_reserveringen);
$statement_reserveringen->execute([$huidigeDatum]);

$reserveringen = $statement_reserveringen->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Overzicht Gereserveerde Auto's</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #3498db;
        padding: 10px;
        text-align: center;
        color: #fff;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #e74c3c;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #ecf0f1;
    }

    p {
        text-align: center;
        font-size: 18px;
        color: #555;
    }
    h2 {
       text-align: center;
    }
</style>
</head>

<body>


<?php include 'navbar.php'; ?>

    <h2>Gereserveerde Auto's - <?php echo $huidigeDatum; ?></h2>

    <?php if (count($reserveringen) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Reservering ID</th>
                    <th>Verhuurdatum</th>
                    <th>Klant Naam</th>
                    <th>Auto Merk</th>
                    <th>Auto Model</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserveringen as $reservering) : ?>
                    <tr>
                        <td><?php echo $reservering['VerhuurID']; ?></td>
                        <td><?php echo $reservering['Verhuurdatum']; ?></td>
                        <td><?php echo $reservering['KlantNaam']; ?></td>
                        <td><?php echo $reservering['Merk']; ?></td>
                        <td><?php echo $reservering['Model']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Geen gereserveerde auto's voor vandaag.</p>
    <?php endif; ?>

</body>

</html>
