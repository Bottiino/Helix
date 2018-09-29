<?php
    $dsn = 'mysql:host=localhost;dbname=helix';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../Php/database_error.php');
        exit();
    }
?>