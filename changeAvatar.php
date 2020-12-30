<?php 
    $title='Edit Avatar';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $orig_file = $_FILES["avatar"]["tmp_name"];
        $exitthis = 1;
        if($orig_file == "") {
            $dest_file = "";
        } else {
            $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
            $target_dir = 'uploads/';
            $dest_file = $target_dir . str_replace("@", "", str_replace(".", "", $email)) . "." . $ext;
            
            //delete all existing files for this user
            //we have to do this due to different image types
            $files = glob( $target_dir . str_replace("@", "", str_replace(".", "", $email)) . "*");
            foreach($files as $file){
                if(is_file($file)){
                    unlink($file);
                }
            }

            move_uploaded_file($orig_file, $dest_file);
            $result = $crud->updateAvatar($id, $dest_file);
            if(!$result) {
                echo '<div class="alert alert-danger" role="alert" style="text-align:center;">Unexpected error.</div>';
                $exitthis = 0;
            }
        }

        if($exitthis == 1) {
            $loc = 'edit.php?id=' . $id;
            header("Location: " . $loc);
        }
    }

    if(!isset($_GET['id'])) {
        include 'includes/msgerror.php';
    } else {
        $record = $crud->viewRecord($_GET['id']);
?>  

<h1 class="text-center">Edit Avatar</h1>

<form id="form" action=<?php echo '"' . htmlentities($_SERVER['PHP_SELF']) . '"' ?> method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
    <input name="email" type="hidden" value="<?php echo $record['email']; ?>">
    <div class="mb-3">
        <div class="mb-3">
        <img src="<?php echo empty($record['avatar_path']) ? 'uploads/blank.png' : $record['avatar_path']; ?>" style="width: 50px;">
            <input name="avatar" type="file" accept="image/*" value="" id="avatar">
        </div>
 
    </div>
    <div class="d-grid gap-2">
        <button name="submit" type="submit" class="btn btn-primary">Save changes</button> <a href="edit.php?id=<?php echo $record['id']; ?>" class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?php } ?>

<?php require_once 'includes/footer.php'; ?> 