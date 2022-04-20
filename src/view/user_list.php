<?php
include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';


if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success </strong>'.$_SESSION['success'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']);
}
if(isset($_SESSION['fail'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sorry </strong>'.$_SESSION['fail'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['fail']);
}

echo $user->get_users();
?>