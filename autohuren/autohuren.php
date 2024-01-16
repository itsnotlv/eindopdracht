<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autoverhuur</title>
  <style>
    
    body {
  font-family: 'Arial', sans-serif;
  background-color: #1a1a1a; /* Donkergrijze achtergrond */
  color: #fff; /* Witte tekstkleur */
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

.car-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  padding: 20px;
}

.car-box {
  background-color: #2c2c2c; /* Donkergrijze auto-box achtergrond */
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Donkere schaduw */
  margin: 15px;
  overflow: hidden;
  width: 250px;
  cursor: pointer;
  transition: transform 0.3s ease-in-out;
}

.car-box:hover {
  transform: scale(1.05);
}

.car-image {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-bottom: 1px solid #444; /* Donkere scheiding tussen afbeelding en details */
}

.car-details {
  padding: 15px;
}

h2, p {
  margin: 0;
}

.car-price {
  font-weight: bold;
  color: #3498db; /* Blauw prijsaccent bij hover */
}

.selected {
  border: 2px solid #3498db;
  box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
}

.hovered {
  border: 2px solid #e74c3c;
  box-shadow: 0 0 10px rgba(231, 76, 60, 0.5);
}

  

  </style>
</head>
<body>

  <header>
    <h1>Fastlane Autoverhuur</h1>
  </header>

  <div class="car-container">
    <div class="car-box">
      <img class="car-image" src="AUDDI-removebg-preview.png" alt="Auto 1">
      <div class="car-details">
        <h2>Audi Etron</h2>
        <p>Kenteken: 123-ABC</p>
        <p>houdbaarheid datum <br> 01-08-2026</p>
        <p class="car-price">Prijs: €50 per dag</p>
      </div>
    </div>

    <div class="car-box">
      <img class="car-image" src="merri.png" alt="Auto 2">
      <div class="car-details">
        <h2>Mercedes amg</h2>
        <p>Kenteken: 456-DEF</p>
        <p>houdbaarheid datum <br> 17-08-2027</p>
        <p class="car-price">Prijs: €60 per dag</p>
        
      </div>
    </div>

    <div class="car-box">
      <img class="car-image" src="mercii.png" alt="Auto 2">
      <div class="car-details">
        <h2>Mercedes-Benz G-Klasse</h2>
        <p>Kenteken: 454-GWF</p>
        <p>houdbaarheid datum <br> 16-02-2027</p>
        <p class="car-price">Prijs: €45 per dag</p>
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="brjJA.png" alt="Auto 2">
      <div class="car-details">
        <h2>ford fiesta</h2>
        <p>Kenteken: 891-TLS</p> 
         <p>houdbaarheid datum <br> 22-04-2026</p>
        <p class="car-price">Prijs: €25 per dag</p>
      
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="bmw_6_serie-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Bmw 6 serie</h2>
        <p>Kenteken: 478-LCS</p>
        <p>houdbaarheid datum <br> 11-08-2027</p>
        <p class="car-price">Prijs: €55 per dag</p>
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="MercedesBenzEklasse-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Mercedes-Benz-Eklasse</h2>
        <p>Kenteken: 900-WSE</p>
        <p>houdbaarheid datum <br> 15-04-2027</p>
        <p class="car-price">Prijs: €72 per dag</p>
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="lamb-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Lamborghini huracan</h2>
        <p>Kenteken: 891-TLS</p>
        <p>houdbaarheid datum <br> 16-08-2026</p>
        <p class="car-price">Prijs: €90 per dag</p>
      </div>
    </div>



    <div class="car-box">
      <img class="car-image" src="bmwese-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Bmw M3</h2>
        <p>Kenteken: 156-ASC</p>
        <p>houdbaarheid datum <br> 05-06-2025</p>
        <p class="car-price">Prijs: €56 per dag</p>
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="audi_rs6-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Audi rs6</h2>
        <p>Kenteken: 912-RLS</p>
        <p>houdbaarheid datum <br> 6-02-2026</p>
        <p class="car-price">Prijs: €66 per dag</p>
      </div>
    </div>


    <div class="car-box">
      <img class="car-image" src="porgg-removebg-preview.png" alt="Auto 2">
      <div class="car-details">
        <h2>Porsche 911</h2>
        <p>Kenteken: 156-PLS</p>
        <p>houdbaarheid datum <br> 14-04-2026</p>
        <p class="car-price">Prijs: €78 per dag</p>
      </div>
    </div>
  </div>




  <script>
  // Functie om naar een andere pagina te navigeren met de geselecteerde auto-details
  function navigateToDetailsPage(name, licensePlate, price) {
    // Hier kun je de URL bouwen op basis van de geselecteerde auto-details
    const detailsUrl = `details.html?name=${encodeURIComponent(name)}&licensePlate=${encodeURIComponent(licensePlate)}&price=${price}`;

    // Navigeer naar de nieuwe pagina
    window.location.href = detailsUrl;
  }

  // Voeg een click event listener toe aan elke auto-box om naar de detailspagina te navigeren en te markeren
  document.querySelectorAll('.car-box').forEach(carBox => {
    carBox.addEventListener('click', function () {
      // Haal de auto-details op
      const carName = carBox.querySelector('h2').innerText;
      const licensePlate = carBox.querySelector('p:nth-child(2)').innerText.split(': ')[1];
      const price = parseFloat(carBox.querySelector('.car-price').innerText.split(' ')[1]);

      // Voeg de 'selected' klasse toe aan de geselecteerde auto-box
      document.querySelectorAll('.car-box').forEach(box => box.classList.remove('selected'));
      carBox.classList.add('selected');

      // Roep de functie aan om naar de detailspagina te navigeren
      navigateToDetailsPage(carName, licensePlate, price);
    });

    // Voeg een event listener toe voor hover effect
    carBox.addEventListener('mouseenter', function () {
      carBox.classList.add('hovered');
    });

    carBox.addEventListener('mouseleave', function () {
      carBox.classList.remove('hovered');
    });
  });
</script>

</body>
</html>
