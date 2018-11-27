<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $fillable = [
        'name', 'avatar', 'address', 'phone'
    ];
}
