<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars(trim($_POST["name"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    try {
        // PDO-yhteys SQL-tietokantaan.
        $conn = new PDO("sqlsrv:server=$DB_SERVER;Database=$DB_NAME", $DB_USER, $DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt = $conn->prepare("INSERT INTO Guestbook (name, message) VALUES (:name, :message)");

        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);

        
        $stmt->execute();

        // Ohjataan takaisin pääsivulle.
        header("Location: index.html?success=1"); 
        exit;

    } catch (PDOException $e) {
        // Virheilmoitus
        echo "Error: " . $e->getMessage();
    }
} else {
    
    header("Location: index.html");
    exit;
}
