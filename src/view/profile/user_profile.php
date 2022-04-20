<?php

include '../../../vendor/autoload.php';
include '../../config/db.php';
include '../../include/header.php';


if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    echo $user->user_profile($id);
}

?>