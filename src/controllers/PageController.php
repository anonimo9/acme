<?php namespace Acme\Controllers;

class PageController extends BaseController {
    
    
    public function getShowHomePage() {
         //TWIG
         echo $this->twig->render('home.html');
    }
    
    
}