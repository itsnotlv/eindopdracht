<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #333333, #1a1a1a);
            background-size: cover;
            background-repeat: no-repeat;
            height: 120vh;
            overflow: hidden;
            color: #fff;
        }

        .navbar {
            background-color: rgba(55, 55, 55, 0.8); /* Donkergrijs met wat transparantie */
            padding: 15px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
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
        }

      
        h2 {
            color: #fff;
        }

        form {
            display: grid;
            gap: 15px;
            text-align: center;
            margin-top: 200px;
            border: white 4px solid;
            border-radius: 7px;
            width: 40%;
            height: auto;
        }

        input {
            padding: 8px;
            border: 1px solid #999; /* Donkergrijs randje */
            border-radius: 4px;
            width: 97%;
            color: #333; /* Donkergrijs tekstkleur */
            background-color: #ddd; /* Lichtgrijs achtergrondkleur */
        }

        button {
            background-color: #e74c3c; /* Rood */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .signup-link {
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
        }
        .login-containe{

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
          height: 100vh;


        }
    </style>
    <title>Login</title>
</head>
<body>
    <!-- Niet ingelogd navigatiebalk -->
    <nav class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Over Ons</a></li>
            <li><a href="#">Contact</a></li>
            <li class="login-link"><a href="login.html">Inloggen</a></li>
        </ul>
    </nav>

    <!-- Inlogformulier -->
    <div class="login-containe">
      
        <form action="login.php" method="post">
              <h2>Login</h2>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Inloggen</button><br>
            
            <a class="signup-link" href="signup.html">Geen account? Registreer nu!</a>
        </form>

        
    </div>
</body>
</html>

