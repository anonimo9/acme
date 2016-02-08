<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;

class RegisterController extends BaseController {
    
    public function getShowRegisterPage() {
        echo $this->twig->render('register.html');
    }
    
    public function postShowRegisterPage() {
        
        $errors = [];
        
        $validation_data = [
            "first_name" => "min:5",
            "last_name"  => "min:5",
            "email"      => "email",
            "password"       => "min:5",
        ];
        
        //validate data
        $validator = new Validator();
        $errors = $validator->isValid($validation_data);
        
        // if validation fails, go back to register page
        // and dispaly a error message
        if(sizeof($errors) > 0) {
            // PURE PHP
            // $_SESSION['msg'] = $errors;
            // header("Location: /register");
            
            // TWIG
            echo $this->twig->render('register.html', ['errors' => $errors]);
            exit();
        }
        
        //save this data into a database
        $user = new User();
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->email = $_POST['email'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->save();
    }
    
    public function getShowLoginPage() {
        echo $this->twig->render('login.html');
    }
    
}