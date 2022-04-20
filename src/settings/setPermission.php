<?php
include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';


if(isset($_POST['set_permission_user'])){

    if(!empty($_POST['permission']) ){
        $user_table = (in_array('user', $_POST['permission'])) ? "yes" : "no";
        $book_table = (in_array('book', $_POST['permission'])) ? "yes" : "no";
        $request = (in_array('rqst', $_POST['permission'])) ? "yes" : "no";
        $sett = (in_array('setting', $_POST['permission'])) ? "yes" : "no";
        // echo $user_table." ".$book_table." ".$request." ".$setting;
        $permission->set_permission_user($user_table, $book_table, $request, $sett);
        

    }
}
if(isset($_POST['set_permission_book'])){

    if(!empty($_POST['permission']) ){
        $user_table = (in_array('user', $_POST['permission'])) ? "yes" : "no";
        $book_table = (in_array('book', $_POST['permission'])) ? "yes" : "no";
        $request = (in_array('rqst', $_POST['permission'])) ? "yes" : "no";
        $sett = (in_array('setting', $_POST['permission'])) ? "yes" : "no";
        // echo $user_table." ".$book_table." ".$request." ".$setting;
        $permission->set_permission_book($user_table, $book_table, $request, $sett);
        

    }
}

?>