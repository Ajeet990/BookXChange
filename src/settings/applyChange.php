<?php

include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';



if(isset($_POST['apply'])){
    
    $title = $_POST['site_title'];
    $logo = $_FILES['logo'];
    $mail = $_POST['mail_from'];
    $welcome = $_POST['welcome_text'];
    // echo $logo." ".$logo." ".$mail." ".$welcome;

    if($logo['name'] != ""){
        $setting->updateLogo($logo);
    }

    $setting->applyChange($title, $mail, $welcome);

}


?>