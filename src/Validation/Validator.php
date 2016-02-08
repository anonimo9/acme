<?php namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator {
    public function isValid($validation_data) {
        
        $errors = [];
        
        foreach($validation_data as $name => $value) {
            if(isset($_REQUEST[$name])) {
                $exploded = explode(":", $value);
            
                switch($exploded[0]) {
                    case 'min':
                        $min = $exploded[1];
                        if(Valid::stringType()->length($min)->Validate($_REQUEST[$name]) == false) {
                            $errors[] = $name . " must be at leat" . $min . " chearacters long";
                        }
                        break;
                    case 'email':
                        if(Valid::email()->Validate($_REQUEST[$name]) == false) {
                            $errors[] = "Email address is invalid!";
                        }
                        break; 
                    default: 
                        // do nothing
                }
            } else {
                $errors[] = "No value found!";
            }
        }
        return $errors;
    }
}

