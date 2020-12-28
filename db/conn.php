<?php 
    $host = 'localhost';
    $db = 'site1_db'; //Needs to be updated on cron.php as well
    $user = 'root';
    $pass = '';
     
    $host = 'desaiconsulting.ca';
    $db = 'db8at6ctvuw0ro'; //Needs to be updated on cron.php as well
    $user = 'u9jumxnp9w30k';
    $pass = '8kdgf5fwp1d4';

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