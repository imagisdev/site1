<?php 
    $title='Register';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $result = $crud->getSpecialties();
?>  

<h1 class="text-center">Registration</h1>

<form method="post" action="success.php">
    <div class="mb-3">
        <label for="fname" class="form-label">First name</label>
        <input required name="fname" type="text" class="form-control" id="fname">
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last name</label>
        <input required name="lname" type="text" class="form-control" id="lname">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of birth</label>
        <input name="dob" type="text" class="form-control" id="dob">
    </div>
    <div class="mb-3">
        <label for="specialty" class="form-label">Area of expertise</label>
        <select name="speciality" class="form-control" aria-label="Select">
            <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id']; ?>"><?php echo $r['description']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input required name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input name="phone" type="text" class="form-control" id="phone" aria-describedby="phonehelp">
        <div id="phonehelp" class="form-text">We'll never share your phone number with anyone else.</div>
    </div>
    <div class="d-grid gap-2">
        <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</form>

<?php require_once 'includes/footer.php'; ?> 