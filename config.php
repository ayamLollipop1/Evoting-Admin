<?php

try {

    $host     = "localhost";
    $dbname   = "evoting";
    $user     = "root";
    $password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
}

require_once 'functions/cruds.php';
$crud = new crud($pdo);


?>
