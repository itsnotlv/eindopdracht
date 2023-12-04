CREATE DATABASE Eindopdracht;

Use Eindopdracht;

CREATE TABLE Klant (
    KlantID INT PRIMARY KEY AUTO_INCREMENT,
    Naam VARCHAR(40),
    Rijbewijsnummer VARCHAR(20),
    Telefoonnummer VARCHAR(15),
    Email VARCHAR(50),
    Wachtwoord VARCHAR(255)
);

CREATE TABLE Autos (
    AutoID INT PRIMARY KEY AUTO_INCREMENT,
    Merk VARCHAR(50),
    Model VARCHAR(50),
    Jaar INT,
    Kenteken VARCHAR(15),
    Beschikbaarheid BOOLEAN
);
CREATE TABLE Verhuringen (
    VerhuurID INT PRIMARY KEY AUTO_INCREMENT,
    Verhuurdatum DATE,
    KlantID INT,
    AutoID INT,
    Huurperiode INT,
    Kosten DECIMAL(10, 2),
    FOREIGN KEY (KlantID) REFERENCES Klant(KlantID),
    FOREIGN KEY (AutoID) REFERENCES Autos(AutoID)
);
