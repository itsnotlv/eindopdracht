<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg Medewerker Toe</title>
</head>
<body>

    <h2>Voeg Medewerker Toe</h2>

    <?php
    class Database
    {
        public $pdo;
    
        public function __construct($db = "eindopdracht", $user = "root", $pass = "", $host = "localhost:3307")
        {
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                // set the PDO error mode to exception
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Voeg het PHP-script hier toe om de medewerker aan de database toe te voegen
        // Gebruik dezelfde Database-klasse of pas het script aan op basis van je behoeften
        // Hieronder vind je een eenvoudig voorbeeld (niet veilig voor productie, voeg beveiligingen toe)
        $db = new Database();

        $email = $_POST['email'];
        $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO Medewerker (Email, Wachtwoord) VALUES ('$email', '$wachtwoord')";

        try {
            $db->pdo->exec($sql);
            echo "Medewerker succesvol toegevoegd!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>

    <form method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" required><br>

        <input type="submit" value="Toevoegen">
    </form>

</body>
</html>
