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
        $spc = substr($_POST['speciality'], 0, strpos($_POST['speciality'], "-"));

        $orig_file = $_FILES["avatar"]["tmp_name"];
        if($orig_file == "") {
            $dest_file = "";
        } else {
            $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $dest_file = $target_dir . str_replace("@", "", str_replace(".", "", $email)) . "." . $ext;
            move_uploaded_file($orig_file, $dest_file);
        }

        $isSuccess = $crud->insert($fname,$lname,$dob,$email,$phone,$spc,$dest_file); 

        if($isSuccess){
            include 'includes/msgsuccess.php';
        } else {
            include 'includes/msgerror.php';
        }
    }
?>  

<div class="card" style="width: 18rem;">
    <img src="<?php  echo empty($orig_file) ? 'uploads/blank.png' : $dest_file; ?>" style="width:200px; height:200px; margin:auto;" class="card-img-top" alt="User Avatar">
    <div class="card-body">
        <h5 class="card-title"><?php  echo $_POST['fname'] . ' ' . $_POST['lname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality']; ?></h6>
        <p class="card-text">Date of birth: <?php echo $_POST['dob'] . '<br/>' . 
                             'Email address: ' . $_POST['email'] . '<br/>' . 
                             'Phone number: ' . $_POST['phone']; ?></p>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?> 