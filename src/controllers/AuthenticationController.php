<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use Acme\Auth\LoggedIn;
use Acme\Email\SendEmail;


class AuthenticationController extends BaseController {
    
    public function getShowLoginPage() {
        echo $this->twig->render('login.html');
    }
    
    public function postShowLoginPage() {
        $okay = true;
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // look up the user
        $user = User::where('email', '=', $email)
            ->first();
        
        if($user != null) {
            // validate information
            // verify, irasome password kur ivede naudotojas ir pass kuris yra duomenu bazeje, kad patikrintu.
            // password_verify naudojamas su password_hash kuris uzkoduoja slaptazodi.
            if(!password_verify($password, $user->password)) {
                $okay = false;
            } 
        } else {
            $okay = false;
        }
        
        if($okay) {
            $_SESSION['user'] = $user;
            header("Location: /");
            exit();
        } else {
            $_SESSION['msg'] = ["Invalid login"];
            echo $this->twig->render('login.html', ['errors' => $_SESSION['msg']]);
            unset($_SESSION['msg']);
            exit();
        }
    }
    
    public function getLogout() {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /login");
        exit();
    }
    
    public function getTestUser() {
        print_r(LoggedIn::user()->first_name);
    }
    
    public function getTestEmail() {
        SendEmail::sendEmail('mantas@gmail.com', 'My test subject', 'My Message');
        echo "Sent Mail!";
    }
    
}