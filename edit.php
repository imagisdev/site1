<?php 
    $title='Edit Record';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    $result = $crud->getSpecialties();
    if(!isset($_GET['id'])) {
        include 'includes/msgerror.php';
    } else {
        $gid = $_GET['id'];
        if(substr($gid, 0, 1)=='r') {
            $gid = substr($gid, 1);
            $result1 = $crud->getAvatarlink($gid);
            $avatarFile = $result1['avatar_path'];
            unlink($avatarFile);
            $result1 = $crud->deleteAvatar($gid);
        } 
        $record = $crud->viewRecord($gid);
?>  

<h1 class="text-center">Edit record</h1>

<form method="post" action="editsuccess.php">
    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
    <div class="mb-3">
        <label for="fname" class="form-label">First name</label>
        <input name="fname" type="text" class="form-control" id="fname" value="<?php echo $record['fname']; ?>">
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last name</label>
        <input name="lname" type="text" class="form-control" id="lname" value="<?php echo $record['lname']; ?>">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of birth</label>
        <input name="dob" type="text" class="form-control" id="dob" value="<?php echo $record['dob']; ?>">
    </div>
    <div class="mb-3">
        <label for="specialty" class="form-label">Area of expertise</label>
        <select name="speciality" class="form-control" aria-label="Select">
            <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id']; ?>" <?php if($r['specialty_id'] == $record['specialty_id']) echo 'Selected' ?>>
                    <?php echo $r['description']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $record['email']; ?>">
        <div id="emailHelp" class="form-text" style="font-size:12px;">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input name="phone" type="text" class="form-control" id="phone" aria-describedby="phonehelp" value="<?php echo $record['phone']; ?>">
        <div id="phonehelp" class="form-text" style="font-size:12px;">We'll never share your phone number with anyone else.</div>
    </div>
    <div class="mb-3">
        <img src="<?php echo empty($record['avatar_path']) ? 'uploads/blank.png' : $record['avatar_path']; ?>" style="width: 50px;">
        <?php echo empty($record['avatar_path']) ? '' : '<a href="edit.php?id=r' . $record['id'] . '" class="card-link" onClick="return confirm(\'Are you sure you want remove your avatar?\')">Remove Image</a>'; ?>
        <?php echo '<a href="changeAvatar.php?id=' . $record['id'] . '" class="card-link">Change Image</a>'; ?>
 
    </div>
    <div class="d-grid gap-2">
        <button name="submit" type="submit" class="btn btn-primary">Save changes</button> <a href='viewall.php' class='btn btn-secondary'>Cancel</a>
    </div>
</form>
<?php } ?>
<?php require_once 'includes/submitdisable.php'; ?>
<?php require_once 'includes/footer.php'; ?> 