<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller\CategoryController;
class Category extends Model
{
    
    // protected $table = "categories";
    // public $timestamps = false;
    // protected $fillable = [
    //     'parent_id',
    //     'name',
    //     'description',
    //     'url',
    //     'status',
    //     'remember_token',
        
    // ];
    public function categories()
    {
        return $this->hasMany('App\Category','parent_id');
        
    }
    public function products()
    {
        return $this->hasMany('App\Product','category_id');
    }
    
}
