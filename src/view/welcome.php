<?php
include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';
if(isset($_SESSION['admin']) && $_SESSION['admin'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Welcome </strong> You are logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['admin']);
}
if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success </strong>'.$_SESSION['success'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['success']);
}

echo $user->get_all_data();

?>
