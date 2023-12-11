<?php
try {
    $host = 'localhost';
    $database = 'local.vpd111.com';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $pdo = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
