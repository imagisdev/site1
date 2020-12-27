<?php 
    $title='Record updated';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $spc = $_POST['speciality'];

        $isSuccess = $crud->update($id, $fname, $lname, $dob, $email, $phone, $spc); 

        if($isSuccess){
            include 'includes/msgsuccess.php';
        } else {
            include 'includes/msgerror.php';
        }
    } else {
        include 'includes/msgerror.php';
    }
?>  

<a href=viewall.php class="btn btn-primary">Back</a>