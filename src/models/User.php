<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    // reikia nustatyti false, nes elequent iesko db created and updated fields. To mes neturime
    public $timestamps = false;
}