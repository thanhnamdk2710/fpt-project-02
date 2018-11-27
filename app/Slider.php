<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
        'title', 'image', 'note', 'status'
    ];
}
