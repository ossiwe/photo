

<!-- MUODOSTETAAN YHTEYS AZURE TIETOKANTAAN YMPÄRISTÖMUUTTUJIEN AVULLA -->

<!-- Haetaan tietokannan tiedot -->
<?php
$serverName = getenv("DB_SERVER");
$database = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

// Testitulostus 
echo "Trying to connect to server: $serverName<br>";
echo "Database: $database<br>";
echo "Username: $username<br>";
// Älä tulosta salasanaa


// PHP Data Objects-yhteyden luonti tietokantaan
try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // jos yhteys onnistuu tulostetaan viesti
    echo "Yhteys tietokantaan onnistui!";
} catch (PDOException $e) {
    // jos yhteys epäonnistuu, tulostetaan virheilmoitus
    die("Tietokantavirhe: " . $e->getMessage());
}
?>
