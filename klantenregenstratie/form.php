<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Lane Registratie</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #333333, #1a1a1a);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            overflow: hidden;
            color: #fff;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .registration-form {
            background-color: rgba(51, 51, 51, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            color: #fff;
        }

        form {
            display: grid;
            gap: 15px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #ff6600; /* Oranje kleur voor een vleugje autokleur */
            color: #fff;
            cursor: pointer;
        }

        .address-container {
            display: flex;
            gap: 15px;
            justify-content: space-between;
        }

        #im {
            border: 4px solid;
            width: 400px;
            margin-left: 10px;
            height: 300px;
        }

        #im2 {
            border: 4px solid;
            width: 400px;
            margin-right: 10px;
            height: 300px;
        }

        h2 {
            margin-left: 10%;
            color: white;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Over Ons</a>
        <a href="#">Diensten</a>
        <a href="#">Contact</a>
    </div>

    <div class="container">
        <div class="registration-form">

            <h1>Welkom bij Fast Lane Registratie</h1>
            <form action="register.php" method="post">
                <input type="text" name="naam" placeholder="Naam" required>
                <input type="text" name="rijbewijsnummer" placeholder="Rijbewijsnummer" required>
                <input type="tel" name="telefoonnummer" placeholder="Telefoonnummer" required>
                <input type="email" name="email" placeholder="Voorbeeld@gmail.com" required>
                <input type="password" name="wachtwoord" placeholder="Nieuw wachtwoord" required>
                <input type="password" name="herhaal_wachtwoord" placeholder="Herhaal wachtwoord" required>
                <div class="address-container">
                    <input type="text" name="straat" placeholder="Straat" required>
                    <input type="text" name="postcode" placeholder="Postcode" required>
                </div>
                <div class="sjeje">
                    <input type="submit" value="Registreren">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
