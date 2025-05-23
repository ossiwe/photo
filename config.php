<!-- <?php
$serverName = getenv("DB_SERVER");
$database = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Yhteysvirhe: " . $e->getMessage());
}
?> -->

<?php
$serverName = getenv("DB_SERVER");
$database = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");

echo "Trying to connect to server: $serverName<br>";
echo "Database: $database<br>";
echo "Username: $username<br>";
// Älä tulosta salasanaa

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Yhteys tietokantaan onnistui!";
} catch (PDOException $e) {
    die("Tietokantavirhe: " . $e->getMessage());
}
?>
