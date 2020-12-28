<?php 
    $host = 'localhost';
    $db = 'site1_db'; //Needs to be updated on cron.php as well
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = 'mysql:host=' . $host . ';dbname' . $db . ';charset=' . $charset; 
    
    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>