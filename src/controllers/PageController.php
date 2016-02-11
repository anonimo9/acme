<?php namespace Acme\Controllers;

use Acme\Models\Page;
use Acme\Auth\LoggedIn;

class PageController extends BaseController {
    
    
    public function getShowHomePage() {
         //TWIG
         echo $this->twig->render('home.html');
    }
    
    public function getShowPage() {
        
        // if someone enter random uri example - bret, skdskd, dskd
        $browser_title = '';
        $page_content = '';
        
        // extract page name from the url - with packages SLUGIFY
        $uri = explode("/", $_SERVER['REQUEST_URI']);
        $target = $uri[1];
        
        // find matching page in the DB
        $page = Page::where('slug', '=', $target)->get();

        // look up page content
        foreach($page as $item) {
            $browser_title = $item->browser_title;
            $page_content = $item->page_content;
        }
        
        if(strlen($browser_title) == 0) {
            header("HTTP/1.0 404 Not Found");
            header("Location: /page-not-found");
            exit();
        }
        
        // pass content to some TWIG template
        // render template
        echo $this->twig->render('generic-page.html', [
            'browser_title' => $browser_title,
            'page_content'  => $page_content
        ]);
    }
    
    public function getShow404() {
        echo $this->twig->render('page-not-found.html');
    }
    
}