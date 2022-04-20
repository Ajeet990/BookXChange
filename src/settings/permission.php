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
//showing the list of permission
// print_r($permission);
echo $permission->permission();



?>