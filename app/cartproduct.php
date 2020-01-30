<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartproduct extends Model
{
    protected $primaryKey = 'id';
    public function product()
    {
        return $this->belongsTo('App\Product', 'productid', 'id');
    }
}
