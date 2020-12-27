<?php 
    $title='Home';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $result = $crud->getSpecialties();
?>  

<h1 class="text-center">Welcome!</h1>



<?php require_once 'includes/footer.php'; ?> 