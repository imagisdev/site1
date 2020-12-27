<?php 
    $title='Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $spc = $_POST['speciality'];

        $isSuccess = $crud->insert($fname,$lname,$dob,$email,$phone,$spc); 

        if($isSuccess){
            include 'includes/msgsuccess.php';
        } else {
            include 'includes/msgerror.php';
        }
    }
?>  



<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php  echo $_POST['fname'] . ' ' . $_POST['lname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality']; ?></h6>
        <p class="card-text">Date of birth: <?php echo $_POST['dob'] . '<br/>' . 
                             'Email address: ' . $_POST['email'] . '<br/>' . 
                             'Phone number: ' . $_POST['phone']; ?></p>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?> 