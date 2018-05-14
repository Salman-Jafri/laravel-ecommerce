<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {

        return "Rs ".number_format($this->price,2);

    }
    public function increasePercent()
    {

        return ($this->price*0.25)+$this->price;

    }

}
