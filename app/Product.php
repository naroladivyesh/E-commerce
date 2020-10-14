<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function attributes(){
        return $this->hasMany('App\ProductsAttribute','product_id'); 
    }
    public function Category()
    {
        # code...
        return $this->belogsTo('App\Category');
    }
    
}
