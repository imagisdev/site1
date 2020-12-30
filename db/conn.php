<?php 
    $host = 'localhost';
    $db = 'site1_db'; 
    $usern = 'root';
    $pass = '';
    
    /*
    $host = 'desaiconsulting.ca';
    $db = 'db8at6ctvuw0ro'; 
    $usern = 'u9jumxnp9w30k';
    $pass = '8kdgf5fwp1d4';
    */

    $charset = 'utf8mb4';
    $dsn = 'mysql:host=' . $host . ';dbname' . $db . ';charset=' . $charset; 
    
    try {
        $pdo = new PDO($dsn, $usern, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo, $db);
    require_once 'user.php';
    $user = new user($pdo, $db);
?>