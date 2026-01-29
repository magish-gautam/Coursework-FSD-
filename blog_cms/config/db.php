<?php
$host = "localhost";
$dbname = "np03cs4a240172";
$user = "np03cs4a240172";
$pass = "HiurFou7D1";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
