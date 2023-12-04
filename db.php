<?php

class Database {
    public $pdo;

    public function __construct($db="eindopdracht", $user="root", $pass="", $host="localhost:3307")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully to $db" . "<br />\n";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

      public function InsertUser($naam, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord)
      {
          $sql = "INSERT INTO Klant (Naam, Rijbewijsnummer, Telefoonnummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?)";
          $stmt = $this->pdo->prepare($sql);

          $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
          $stmt->execute([$naam, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord]);
      }
  }

?>