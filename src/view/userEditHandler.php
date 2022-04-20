<?php
include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';

if(isset($_GET['id']) && isset($_GET['action'])){
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    if ($action == "editUser"){
        echo $user->editUserForm($id);
    }
}
?>