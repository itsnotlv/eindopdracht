<?php

class Database {
    public $pdo;

    public function __construct($db= "eindopdracht", $user="root", $pass="", $host="localhost:3307")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully to $db";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

     function InsertUser($naam, $straat, $postcode, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord)
      { 
        
        $sql = "INSERT INTO Klant (Naam, Straat, Postcode, Rijbewijsnummer, Telefoonnummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->execute([$naam, $straat, $postcode, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord]);
      }
  

    }

    $db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["naam"]) || empty($_POST["straat"]) || empty($_POST["postcode"]) || empty($_POST["rijbewijsnummer"]) || empty($_POST["telefoonnummer"]) || empty($_POST["email"]) || empty($_POST["wachtwoord"]) || empty($_POST["herhaal_wachtwoord"])) {
        echo 'Vul alle verplichte velden in.';
    } else {
        $wachtwoord = $_POST['wachtwoord'];
        $herhaal_wachtwoord = $_POST['herhaal_wachtwoord'];
        if ($wachtwoord !== $herhaal_wachtwoord) {
            echo 'Wachtwoord en herhaald wachtwoord komen niet overeen.';
        } else {
            try {
                $db->InsertUser($_POST['naam'], $_POST['straat'], $_POST['postcode'], $_POST['rijbewijsnummer'], $_POST['telefoonnummer'], $_POST['email'], $_POST['wachtwoord']);
                echo "<script> console.log('Data inserted')</script>";
                // naar login pagina
                header("Location: login_form.html");
                
            } catch (Exception $e) {
                echo "Failed: try again" . $e->getMessage();
            }
        }
    }
}

?>