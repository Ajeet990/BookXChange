<?php
namespace Book\Bookxchange\Controller;


require_once __DIR__ .'/../../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class UserController
{
    private $loader;
    private $twig;


    public function __construct($user_m){

        $this->loader = new FilesystemLoader(__DIR__ . '/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->user_m = $user_m;
    }

    public function get_users()
    {

        $u_list = $this->user_m->get_users_model();
        return $this->twig->render('user_list.html.twig', ['u_array' => $u_list]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location:../../index.php');
    }

    public function login($uname, $upass)
    {
        // global $admin_m;
        $login_rst = $this->user_m->login_model($uname, $upass);
        if($login_rst){
            $_SESSION['login'] = "success";
            if($uname == "superadmin"){
                $_SESSION['loggedIn'] = "superadmin";
            } elseif($uname == "bookManager") {
                $_SESSION['loggedIn'] = "bookManager";
            } elseif($uname == "userManager"){
                $_SESSION['loggedIn'] = "userManager";
            }

            // header('location:index.php');
            header('location:src/view/welcome.php');
            exit;
        } else {
            
            $_SESSION['admin'] = "false";

            header('location:index.php');
            exit;
            
        }
    }

    public function get_all_data()
    {
        // $all_data = $this->user_m->get_all_data_model();
        // if ($all_data) {
        //     return $this->twig->render('all_data.html.twig', ['all_data' => $all_data]);

        // }
        $userData = $this->user_m->getUserData();
        $bookData = $this->user_m->getBookData();
            return $this->twig->render('all_data.html.twig', ['userData' => $userData, 'bookData' => $bookData]);

    }

    public function user_profile(int $id)
    {
        //fetching user details.
        $userDetails = $this->user_m->getUserDetails($id);
        //fetching book details for that user.
        $userBookProfile = $this->user_m->userBookDetailsModel($id);
        $original_date = $userDetails['join_date'];
        // Creating timestamp from given date
        $timestamp = strtotime($original_date);
        // Creating new date format from that timestamp
        $joining_date = date("d-m-Y", $timestamp);
        return $this->twig->render('user_profile.html.twig', ['userBookProfile' => $userBookProfile, 'userDetails' => $userDetails, 'joining_date' => $joining_date]);
        


    }

    public function deleteUser(int $id){
        $dltRst = $this->user_m->deleteUserModel($id);
        if($dltRst){
            $_SESSION['success'] = "user Deleted successfully";
            header('location:user_list.php');
        } else {
            $_SESSION['fail'] = "Some problem occured. please try again.";
            header('location:user_list.php');
        }
    }
    public function blockUser(int $id){
        $blkRst = $this->user_m->blockUserModel($id);
        if($blkRst){
            $_SESSION['success'] = "user Blocked successfully";
            header('location:user_list.php');
        } else {
            $_SESSION['fail'] = "Some problem occured. please try again.";
            header('location:user_list.php');
        }

    }

    public function editUserForm(int $id)
    {
        $editUser = $this->user_m->editUserFormModel($id);
        // echo "<pre>";
        // print_r($editUser);
        return $this->twig->render('edit_user_form.html.twig', ['editUser' => $editUser]);

    }

    public function updateUser(int $id, $uName, $uMobile, $uAddress, $uEmail, $uRating)
    {
        $updateRst = $this->user_m->updateUserModel($id, $uName, $uMobile, $uAddress, $uEmail, $uRating);
        if($updateRst){
            $_SESSION['success'] = "User updated successfully";
            header('location:user_list.php');
        } else {
            $_SESSION['fail'] = "Not update please try again";
            header('location:user_list.php');

        }
    }

    public function unBlockUser(int $id)
    {
        $ubBlkRst = $this->user_m->unBlockUserModel($id);
        if($ubBlkRst){
            $_SESSION['success'] = "successfully unblocked";
            header('location:user_list.php');


        }

    }


}