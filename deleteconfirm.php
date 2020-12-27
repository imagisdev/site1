<?php 
    $title='Confirm Delete';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!isset($_GET['id'])) {
        echo '<h1>Error!</h1>';
    } else {
        $result=$crud->viewRecord($_GET['id']);     
?>  

<div class="alert alert-warning" role="alert">
  Are you sure?
</div>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php  echo $result['fname'] . ' ' . $result['lname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['description']; ?></h6>
        <p class="card-text">Date of birth: <?php echo $result['dob'] . '<br/>' . 
                             'Email address: ' . $result['email'] . '<br/>' . 
                             'Phone number: ' . $result['phone']; ?></p>
        <a href="delete.php?id=<?php echo $result['id'] ?>" class="card-link">Delete</a>
        <a href="viewall.php" class="card-link">Cancel</a>
    </div>
</div>

<?php } ?>

<?php require_once 'includes/footer.php'; ?> 