<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $onderwerp = $_POST["onderwerp"];
    $bericht = $_POST["bericht"];

    $ontvanger_email = "jouw@emailadres.com"; // Het e-mailadres van de ontvanger
    $onderwerp_email = "Contactformulier Golfclub - $onderwerp";
    $bericht_email = "Naam: $naam\nE-mailadres: $email\nOnderwerp: $onderwerp\nBericht:\n$bericht";

    mail($ontvanger_email, $onderwerp_email, $bericht_email);

    // Hier kun je een bevestigingspagina of bericht weergeven aan de gebruiker
    echo "Bedankt voor je bericht. We zullen zo snel mogelijk contact met je opnemen.";
}
?>
