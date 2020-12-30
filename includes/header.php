<?php 
  include_once 'includes/session.php'; 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>PHP Primer - <?php echo $title; ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid container">
                <a class="navbar-brand" href="index.php">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-item nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-item nav-link" href="register.php">Register</a>
                        <a class="nav-item nav-link" href="viewall.php">View Records</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <?php if(!isset($_SESSION['id'])) { ?>
                          <a class="nav-item nav-link" href="login.php">Login</a>
                        <?php } else { ?>
                            <span class="nav-item nav-link">Hello <?php echo $_SESSION['username'] ?> | </span><a class="nav-item nav-link" href="logout.php">Log out</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
        <br/>
    <div class="container">
        