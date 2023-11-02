<?php
$dbhost = "localhost"; // database host
$dbuser = "jouw_gebruikersnaam"; // database gebruikersnaam
$dbpass = "jouw_wachtwoord"; // database wachtwoord
$dbname = "jouw_database"; // database naam

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Databaseverbinding mislukt: " . $conn->connect_error);
}
?>
<?php
include("db_connect.php"); // Include het databaseverbindingsscript

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $telefoon = $_POST["telefoon"];
    $geboortedatum = $_POST["geboortedatum"];
    $handicap = $_POST["handicap"];
    $ervaring = $_POST["ervaring"];

    // Voer een SQL-query uit om de gegevens in de database in te voegen
    $sql = "INSERT INTO golfclub_deelnemers (naam, email, telefoon, geboortedatum, handicap, ervaring)
            VALUES ('$naam', '$email', '$telefoon', '$geboortedatum', '$handicap', '$ervaring')";

    if ($conn->query($sql) === TRUE) {
        echo "Bedankt voor het inschrijven!";
    } else {
        echo "Er is een fout opgetreden: " . $conn->error;
    }

    $conn->close();
}
?>
