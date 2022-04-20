<?php
namespace Book\Bookxchange\Controller;


require_once __DIR__ .'/../../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RequestController
{
    private $loader;
    private $twig;


    public function __construct($reqst_m){

        $this->loader = new FilesystemLoader(__DIR__ . '/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->reqst_m = $reqst_m;
    }

    public function get_reqsts()
    {
        $requestList = $this->reqst_m->getRequests();
        if($requestList){
        return $this->twig->render('rqst_list.html.twig', ['requestList' => $requestList]);

        }
    }



}