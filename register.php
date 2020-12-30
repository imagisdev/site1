<?php 
    $title='Register';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $result = $crud->getSpecialties();
?>  

<h1 class="text-center">Registration</h1>

<form method="post" action="success.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="fname" class="form-label">First name</label>
        <input required name="fname" type="text" value="" class="form-control" id="fname">
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last name</label>
        <input required name="lname" type="text" value="" class="form-control" id="lname">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of birth</label>
        <input name="dob" type="text" value="" class="form-control" id="dob">
    </div>
    <div class="mb-3">
        <label for="specialty" class="form-label">Area of expertise</label>
        <select name="speciality" class="form-control" aria-label="Select">
            <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'] . "-" . $r['description']; ?>"><?php echo $r['description']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input required name="email" type="email" class="form-control" value="" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text" style="font-size:12px;">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input name="phone" type="text" class="form-control" value="" id="phone" aria-describedby="phonehelp">
        <div id="phonehelp" class="form-text" style="font-size:12px;">We'll never share your phone number with anyone else.</div>
    </div>
    <div class="mb-3">
        <span>Upload your avatar: </span>
        <input name="avatar" type="file"  accept="image/*"  value="Upload Avatar" id="avatar" aria-describedby="avatarhelp">
    </div>
    <br/>
    <div class="d-grid gap-2">
        <button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<?php require_once 'includes/submitdisable.php'; ?>
<?php require_once 'includes/footer.php'; ?> 