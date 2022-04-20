<?php
namespace Book\Bookxchange\Controller;


require_once __DIR__ .'/../../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PermissionController
{
    private $loader;
    private $twig;


    public function __construct($permission_m){

        $this->loader = new FilesystemLoader(__DIR__ . '/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->permission_m = $permission_m;
    }


    //function to show the list of all permission for the userManager and bookManager.
    public function permission()
    {
        $permissionRst = $this->permission_m->permission_model();
        if($permissionRst){
        return $this->twig->render('permission.html.twig',["permission" => $permissionRst]);
        }


    }

    //function to set permission for the userManager.
    public function set_permission_user(string $user_table,string $book_table,string $request,string $setting)
    {
        $userRst = $this->permission_m->set_permission_user_model($user_table, $book_table, $request, $setting);
        if($userRst){
            $_SESSION['success'] = "User admin permission successfully assigned";
            header('location:permission.php');
            exit;
        }
    }

    // functio to set permission for the book manager.
    public function set_permission_book(string $user_table,string $book_table,string $request,string $setting)
    {
        $bookRst = $this->permission_m->set_permission_book_model($user_table, $book_table, $request, $setting);
        if($bookRst){
            $_SESSION['success'] = "Book Manager permission successfully assigned";
            header('location:permission.php');
            exit;
        }
    }

        //Function to get the access for the user manager.
        public function get_access_user()
        {
    
            $user = $this->permission_m->get_access_user_model();
            return $user;
        }
    
        //function to get the access for the book manager.
        public function get_access_book()
        {
    
            $book = $this->permission_m->get_access_book_model();
            return $book;
        }
}