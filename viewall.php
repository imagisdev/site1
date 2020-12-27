<?php 
    $title='View All';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $result = $crud->getRecords();
?>  

<h1 class="text-center">All Records</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>DOB</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Speciality</th>
        <th>Action</th>
    </tr>
    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['fname'] ?></td>
            <td><?php echo $r['lname'] ?></td>
            <td><?php echo $r['dob'] ?></td>
            <td><?php echo $r['email'] ?></td>
            <td><?php echo $r['phone'] ?></td>
            <td><?php echo $r['description'] ?></td>
            <td>
                <a href="view.php?id=<?php echo $r['id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="deleteconfirm.php?id=<?php echo $r['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php }; ?>
</table>

<?php require_once 'includes/footer.php'; ?> 