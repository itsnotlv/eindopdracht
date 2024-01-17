<?php
session_start();

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

    function LoginUser($email, $password)
    {
        try {


            $stmt = $this->pdo->prepare("SELECT MedewerkerID, Email, Wachtwoord FROM Medewerker WHERE Email = ?");
            $stmt->execute([$email]);

            // Fetch the user data

            $medewerker = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($medewerker && password_verify($password, $medewerker['Wachtwoord'])) {
                // Successful login for medewerker
                $_SESSION['medewerkerID'] = $medewerker['MedewerkerID'];
                header("Location: add_car.php");
                exit();
            } else {
                $stmt = $this->pdo->prepare("SELECT KlantID, Email, Wachtwoord, Naam FROM Klant WHERE Email = ?");
                $stmt->execute([$email]);

                $klant = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($klant && password_verify($password, $klant['Wachtwoord'])) {
                    // Successful login
                    $_SESSION['gebruikersnaam'] = $klant['Naam'];
                    $_SESSION['klantID'] = $klant['KlantID'];
                    header("Location: rent_car.php");
                    exit();
                } else {

                    // Invalid credentials
                    echo "Invalid email or password.";
                }
            }
            // Verify the password

        } catch (PDOException $e) {
            // Display any errors that occur during the login process
            echo "Error: " . $e->getMessage();
        }
    }
}

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo 'Vul alle verplichte velden in.';
    } else {
        try {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db->LoginUser($email, $password);
        } catch (Exception $e) {
            echo "Failed: " . $e->getMessage();
        }
    }
}

?>