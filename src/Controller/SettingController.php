<?php
namespace Book\Bookxchange\Controller;


require_once __DIR__ .'/../../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class SettingController
{


    private $loader;
    private $twig;
    private $setting_m;
    //constructor for the setting COntroller. $setting_m is the object for the setting model.
    public function __construct($setting_m){

        $this->loader = new FilesystemLoader(__DIR__ . '/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->setting_m = $setting_m;
    }

    //functionto display all the settings in setting page.
    public function allSettings()
    {

        $allSetting = $this->setting_m->allSettings_model();
        // echo "<pre>";
        // print_r($allSetting);
        return $this->twig->render('setting.html.twig',["all_setting" => $allSetting]);
        
        
    }
    //function to apply the changes that are done in the setting page. $title holds the value of title page, $mail holds value for the mail from(Mail address) and $welcome holds the welcome message at the begining.
    public function applyChange(string $title,string $mail,string $welcome)
    {

            
        $setTitle = $this->setting_m->setTitleModel($title);
         if($setTitle){
                // $_SESSION['success'] = "Successfully applied your Site name";
                header('location:setting.php');
            }

        $setMail = $this->setting_m->setMailModel($mail);
         if($setMail){
                // $_SESSION['success'] = "Successfully applied your mail";
                header('location:setting.php');
            }

        $setWlc = $this->setting_m->setWlcModel($welcome);
         if($setWlc){
                // $_SESSION['success'] = "Successfully applied your welcome message";
                header('location:setting.php');
            }


    }
    //function to upload logo in the navbar.
    public function updateLogo($logo)
    {
        // global $setting_m;
        $logo = $this->setting_m->updateLogo_model($logo);
        if($logo){
            $_SESSION['success'] = "Successfully applied your Logo";
            // return $this->twig->render('setting.html.twig',["all_setting" => $applyResult]);
            header('location:setting.php');
        }


    }

    //function to show title at the top of the page.
    public function getTitle()
    {

        $title = $this->setting_m->getTitle_model();
        return $title;
    }


    //function to show the welcome message the the login Form.
    public function getWelcome()
    {

        $welcome = $this->setting_m->getWelcome_model();
        return $welcome;
    }
    //function to show the logo.
    public function getLogo()
    {
        $logo = $this->setting_m->getLogo_model();
        $logo_name = $logo['value'];
        $logo_name = substr($logo_name, 7);
        return $logo_name;

    }






}