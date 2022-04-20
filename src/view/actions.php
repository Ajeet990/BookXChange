<?php
include '../../vendor/autoload.php';
include '../config/db.php';
// include '../include/header.php';

use Book\Bookxchange\Model\BookModel;
use Book\Bookxchange\Model\UserModel;

$user_m = new UserModel($conn);
$book_m = new BookModel($conn);

$user = new \Book\Bookxchange\Controller\UserController($user_m);
$book = new \Book\Bookxchange\Controller\BookController($book_m);


if(isset($_POST['update_user'])){
    $id = intval($_GET['id']);
    $uName = $_POST['u_name'];
    $uMobile = $_POST['u_mobile'];
    $uAddress = $_POST['u_address'];
    $uEmail = $_POST['u_email'];
    $uRating = $_POST['u_rating'];

    $user->updateUser($id, $uName, $uMobile, $uAddress, $uEmail, $uRating);
    

}

if(isset($_GET['id']) && isset($_GET['action']))
{
    $id = intval($_GET['id']);
    $action = $_GET['action'];

    if($action == "deleteUser"){
        $user->deleteUser($id);
    } elseif ($action == "blockUser"){
        $user->blockUser($id);
    } elseif ($action == "unBlockUser"){
        $user->unBlockUser($id);
    } elseif ($action == "block_book"){
        $book->blockBook($id);
        // echo "blocking books ".$id;
        
        
    } elseif ($action == "unblockBook"){
        $book->unBlockBook($id);
    } elseif ($action == "delete_book") {
        $book->deleteBook($id);
        // echo "Deleting book id ".$id;
    }

}

?>
