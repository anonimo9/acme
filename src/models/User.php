<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent 
{
    // reikia nustatyti false, nes elequent iesko db created and updated fields. To mes neturime
    // public $timestamps = false;
    
    // user can have many testimonials o testimonials modeli atvirsciai, testimonial gali tureti tik 1 user.
    public function testimonials()
    {
        return $this->hasMany('Acme\Models\Testimonial');
    }
}