<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    try {
        $conn = new PDO("sqlsrv:server=$DB_SERVER; Database=$DB_NAME", $DB_USER, $DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO Guestbook (name, message) VALUES (:name, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        echo "Kiitos viestistäsi! <a href='index.html'>Palaa takaisin</a>";
    } catch (PDOException $e) {
        echo "Tietokantavirhe: " . $e->getMessage();
    }
}
?>
