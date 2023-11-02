// Haal de knop op:
let mybutton = document.getElementById("myBtn");

// Wanneer de gebruiker 20px vanaf de bovenkant van het document scrolt, laat de knop zien
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block"; // Toon de knop
  } else {
    mybutton.style.display = "none"; // Verberg de knop
  }
}

// Wanneer de gebruiker op de knop klikt, scroll naar de bovenkant van het document met een soepele animatie
function topFunction() {
  // Haal de huidige scrollpositie op
  let currentScroll = document.documentElement.scrollTop || document.body.scrollTop;

  // Bereken het aantal stappen voor de animatie (je kunt de waarde aanpassen voor de snelheid)
  let scrollStep = -currentScroll / 20; // Pas de noemer aan voor de snelheid

  // Maak een interval dat de soepele scrollanimatie afhandelt
  let scrollInterval = setInterval(function() {
    // Bereken de nieuwe scrollpositie
    currentScroll += scrollStep;

    // Controleer of we de bovenkant of de doelpositie hebben bereikt
    if (currentScroll <= 0) {
      clearInterval(scrollInterval); // Stop de animatie wanneer we de bovenkant bereiken
    }

    // Scroll naar de nieuwe positie
    document.documentElement.scrollTop = currentScroll;
    document.body.scrollTop = currentScroll;
  }, 15); // Pas het interval aan voor soepelheid (lagere waarden maken het soepeler)

  // Als alternatief kun je de ingebouwde "scrollIntoView" -methode gebruiken voor een vloeiendere scrollen:
  // document.body.scrollIntoView({ behavior: 'smooth' });
}
