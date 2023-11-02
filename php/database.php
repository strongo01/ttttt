<?php
$servername = "localhost";
$username = "golf";
$password = "Password01!";
$dbname = "golf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT naam, email, telefoon, geboortedatum, handicap, ervaring FROM inschrijvingen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Naam: " . $row["naam"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>