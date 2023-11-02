// API-sleutel voor het ophalen van weergegevens
const apiKey = "555713c7c23d67b38fcff9175bd0b33d";

// Stad-ID voor Utrecht (kan worden vervangen door het gewenste stad-ID)
const cityId = "2745912";

// Maak een API-aanvraag om weergegevens op te halen
fetch(`http://api.openweathermap.org/data/2.5/weather?id=${cityId}&units=metric&appid=${apiKey}`)
  .then(response => response.json()) // Converteer de respons naar JSON
  .then(data => {
    // Haal de temperatuur in graden Celsius op en rond het af naar het dichtstbijzijnde geheel getal
    const temp = Math.trunc(data.main.temp);
    
    // Haal het weericoon en -omschrijving op
    const icon = "https://openweathermap.org/img/wn/" + data.weather[0].icon + ".png";
    const weather = data.weather[0].description;

    // Update de bron, alt-tekst en titel van het weerbeeld
    document.getElementById('image').src = icon;
    document.getElementById('image').alt = weather;
    document.getElementById('image').title = weather;
    
    // Toon de temperatuur op de webpagina
    document.getElementById("temperature").textContent = temp + "°C";
  })
  .catch(error => console.error(error)); // Vang eventuele fouten op en log ze naar de console
