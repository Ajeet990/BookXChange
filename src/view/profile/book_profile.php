<?php

include '../../../vendor/autoload.php';
include '../../config/db.php';
include '../../include/header.php';


if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    echo $book->book_profile($id);
    // echo "inside book Profile";
}

?>