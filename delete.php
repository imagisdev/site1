<?php 
    require_once 'db/conn.php';
    if(!isset($_GET['id'])) {
        echo '<h1>Error!</h1>';
    } else {
        $id = $_GET['id'];
        $result = $crud->deleteRecord($id);
        if($result){
            header("Location: viewall.php");
        } else {
            include 'includes/msgerror.php';
        }
    }
?> 