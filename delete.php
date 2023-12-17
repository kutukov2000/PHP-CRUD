<?php
include($_SERVER["DOCUMENT_ROOT"] . "/config/connection_database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    global $pdo;

    $stmt = $pdo->prepare('DELETE FROM categories WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

header("Location: ../");
exit();
