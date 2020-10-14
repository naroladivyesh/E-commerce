<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/Teeshalacehome','ProductsController@ShowAllProduct');
// Route::get('/divyesh', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// //Route::get('/home1','UserController@index');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//************************************************************************************
//********************************************************************* */
//********************************************************************* */
//Route::get('/admin','AdminController@login');

//************************************************************************************
//********************************************************************* */
//********************************************************************* */

// Route::get('/','IndexController@index'); 
    
//************************************************************************************
//********************************************************************* */
//********************************************************************* */


//This is For Registration Of Admin users
Auth::routes();

//This is Home Index page start
Route::get('/','IndexController@index'); 
// end

// Category Listing Page
Route::get('/products/{url}','ProductsController@products');

//Product Detail Page
Route::get('/product/{id}','ProductsController@product');

//Get Product Attributes
Route::get('/get-product-price','ProductsContoller@getProductPrice');

////////////////////////////////////
/////////////
///////////   Admin start here
////////////
////////////////////////////////////

Route::match(['get','post'],'/admin','AdminController@login')->name('login');

// Admin Panel  related Below all things are  
Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard') ;
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
    // Categories Route Admin
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::get('/admin/view-categories','CategoryController@viewCategories');
    //Products Routes
    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::get('/admin/view-products','ProductsController@viewProducts');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
    // Products Attributes
    Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
    Route::get('/admin/delete-attributes/{id}','ProductsController@deleteAttributes');
});

//Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/logout','AdminController@logout');

    