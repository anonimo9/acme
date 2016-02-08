<?php namespace Acme\Controllers;

use duncan3dc\Laravel\BladeInstance;

class BaseController {
    // TWIG TEMPLATE    
    protected $loader;
    protected $twig;
    
    public function __construct() {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__.'/../../views');
        $this->twig = new \Twig_Environment($this->loader, array(
    'cache' => false, 'debug' => true));
        $this->twig->addGlobal("session", $_SESSION);
        
    }
    
}