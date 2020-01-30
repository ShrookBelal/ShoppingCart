<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function getRate()
    {
        $rate = Review::where("product_id", $this->id)->avg('rate');
        return $rate;
    }
    function getLike()
    {
        $rate = Review::where("product_id", $this->id)->sum('like');
        return $rate;
    }
}
