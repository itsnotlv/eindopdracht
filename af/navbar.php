<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverhuur - Admin Panel</title>
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

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        nav {
            background-color: #333;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }   

        #knoppje {
            background-color: #e74c3c;
        }

        label {
            color: white;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        .navbar {
            background-color: rgba(55, 55, 55, 0.8); /* Donkergrijs met wat transparantie */
            padding: 15px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            top: 0;
            z-index: 1000;
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="rent_car.php">Car Renting</a>
        <a href="add_car.php">Auto Toevoegen</a>
        <a href="add_customer.php">Klant Toevoegen</a>
        <a href="add_reservering.php">Reservering Toevoegen</a>
        <a href="overzicht.php">Overzicht</a>
        <a href="logout.php">Uitloggen</a>
    </nav>
</body>

</html>