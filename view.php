<?php 
    $title='View Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(!isset($_GET['id'])) {
        include 'includes/msgerror.php';
    } else {
        $result=$crud->viewRecord($_GET['id']);     
?>  

<h1 class="text-center">View Records</h1>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php  echo $result['fname'] . ' ' . $result['lname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['description']; ?></h6>
        <p class="card-text">Date of birth: <?php echo $result['dob'] . '<br/>' . 
                             'Email address: ' . $result['email'] . '<br/>' . 
                             'Phone number: ' . $result['phone']; ?></p>
    </div>
</div>
<br/>
<a href="viewall.php" class="btn btn-primary">View all</a>
<a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-warning">Edit</a>
<a href="deleteconfirm.php?id=<?php echo $result['id'] ?>" class="btn btn-danger">Delete</a>
<?php } ?>

<?php require_once 'includes/footer.php'; ?> 