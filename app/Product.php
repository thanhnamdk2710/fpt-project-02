<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Color', 'color_products');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Size', 'size_products');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
