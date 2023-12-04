<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container">
        <div class="registration-form">
            <h1>Registratie</h1>
            <form action="register.php" method="post">
                <input type="text" name="naam" placeholder="Naam" required><br>
                <input type="text" name="rijbewijsnummer" placeholder="Rijbewijsnummer" required><br>
                <input type="tel" name="telefoonnummer" placeholder="Telefoonnummer" required><br>
                <input type="email" name="email" placeholder="example@gmail.com" required><br>
                <input type="password" name="wachtwoord" placeholder="Nieuw wachtwoord" required><br>
                <input type="password" name="herhaal_wachtwoord" placeholder="Herhaal wachtwoord" required><br>
                <div class="sjeje">
                    <input type="submit" value="Registreren">
                </div>
            </form>
        </div>
    </div>

    
</body>

</html>
