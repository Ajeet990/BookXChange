<?php
    // session_start();
    include 'vendor/autoload.php';
    
    include 'src/config/db.php';
    include 'src/include/header.php';


    if(isset($_SESSION['admin']) && $_SESSION['admin'] == "false"){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry </strong> Invalid credentials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['admin']);
    }

    if(!isset($_SESSION['login']) ){
        include 'src/include/loginForm.php';
    }

    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">


  </head>
  <body>
    

    <script src="bootstrap/js/boostrap.js"></script>
  </body>
</html>