<?php 
    $title='Login';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = strtolower(trim($_POST['username']));
        $pass = $_POST['password'];
        $new_pass = md5($pass . $username);

        $result = $user->getUser($username, $new_pass);

        if(!$result) {
            echo '<div class="alert alert-danger" role="alert" style="text-align:center;">Invalid username or password.</div>';
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['userid'];
            header("Location: index.php");
        }
    }
?>  

<div class="card text-center" style="width:50%;  margin: auto;">
    <div class="card-header">
        <strong><?php echo $title; ?></strong>
    </div>
    <div class="card-body">
        <p class="card-text">
            <form action=<?php echo '"' . htmlentities($_SERVER['PHP_SELF']) . '"' ?> method="post">
                <table class="table table-sm">
                    <tr>
                        <td><label for="username">Username: *</label></td>
                        <td><input type="text" name="username" class="form-control" id="username" value=<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username']; ?>></td>
                    </tr>
                    <tr>
                        <td><label for="username">Password: *</label></td>
                        <td><input type="password" name="password" class="form-control" id="password"></td>
                    </tr>
                </table>
                <input type="submit" value="Login" class="btn btn-primary btn-block">
            </form>
        </p>
    </div>
    <div class="card-footer text-muted" style="text-align: right;">
        <a href="#">Forgot Password<a>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>