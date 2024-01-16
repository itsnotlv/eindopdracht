<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastLane Autoverhuur</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #222; /* Donkergrijze achtergrond */
            color: #fff;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            gap: 20px;
            font-size: 16px;
        }

        nav p {
            color: #fff;
            cursor: pointer;
            transition: color 0.3s ease-in-out;
        }

        nav p:hover {
            color: #e74c3c; /* Rood accent bij hover */
        }

        #intro-text {
            max-width: 800px;
            margin: 20px auto;
            font-size: 1.2em;
            color: #ccc;
        }

        #car-images {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 30px 0;
        }

        img {
            width: 30%;
            height: 40%;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        img:hover {
            transform: scale(1.1);
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 18px;
            margin-top: 30px;
        }

        footer nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        footer a {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        footer a:hover {
            color: #e74c3c; /* Rood accent bij hover */
        }

        .teksten {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin: 30px 0;
        }

        .tekst,
        .tekst2 {
            border: 5px solid #e74c3c; /* Rode rand */
            padding: 20px;
            border-radius: 10px;
            background-color: #333; /* Donkergrijze achtergrond voor tekstblokken */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .tekst h3,
        .tekst2 h3 {
            margin: 0;
            color: #fff;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <div class="w">
            <h1>FastLane Autoverhuur</h1>
            <div id="logo"></div>
            <nav>
                <p>Home</p>
                <p>Contact</p>
                <p>Locatie</p>
            </nav>
        </div>
    </header>

    <div id="intro-text">
        <p>Welkom bij FastLane Autoverhuur, jouw beste keuze voor snelle en betrouwbare autoverhuurdiensten. Klik op ons FastLane-logo om door te gaan naar de inlogpagina.</p>
    </div>

    <div id="car-images">
        <img src="MercedesBenzEklasse-removebg-preview.png" alt="">
        <img src="fatss.png" alt="" id="fatts">
        <img src="bmw-removebg-preview.png" alt="">
    </div>

    <div class="teksten">
        <div class="tekst">
            <h3>Beste prijzen in alle categorieën. <br> Kom nu snel kijken in onze winkel <br> en dan kunnen wij u
                helpen naar <br>een prachtige huur auto</h3>
        </div>
        <div class="tekst2">
            <h3>Huur met 20% korting! <br> Gebruik code "FAST" als coupon code.</h3>
        </div>
    </div>

    <footer>
        <nav>
            <a href="#">Support</a>
        </nav>
    </footer>
</body>

</html>
