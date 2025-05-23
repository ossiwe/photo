<?php
require_once 'config.php';

try {
    $conn = new PDO("sqlsrv:server=$DB_SERVER; Database=$DB_NAME", $DB_USER, $DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT name, message, submitted_at FROM Guestbook ORDER BY submitted_at DESC");

    echo "<h2>Vieraskirjan viestit</h2>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $safeName = htmlspecialchars($row['name']);
        $safeMessage = nl2br(htmlspecialchars($row['message']));
        $timestamp = $row['submitted_at'];

        echo "<p><strong>$safeName</strong>: $safeMessage<br><small>$timestamp</small></p><hr>";
    }

    echo "<p><a href='index.html'>Takaisin</a></p>";
} catch (PDOException $e) {
    echo "Tietokantavirhe: " . $e->getMessage();
}
?>
