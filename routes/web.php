<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
require_once "user.php";

//Route::get('/','HomeController@index');

Route::get("/new-category","CategoryController@newcatrgory");
Route::post("/save-category","CategoryController@saveCategory");

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'WebController@index');
    Route::group(['prefix' => 'store'], function () {
        Route::get('/', 'StoreController@store')->name('store');
        Route::get('/new', 'StoreController@newStore');
        Route::post('/save', 'StoreController@saveStore');
        Route::get('/edit/{id}', 'StoreController@edit');
        Route::put('/update/{id}', 'StoreController@update');
        Route::get('/delete/{id}', 'StoreController@delete');
        //tim kiem kv
        Route::get('/sear', 'StoreController@tkHn')->name('kv-hanoi');
        Route::get('/sdanang', 'StoreController@tkDn')->name('kv-danang');
        Route::get('/shcm', 'StoreController@tkHcm')->name('kv-hcm');
        Route::get('/skvk', 'StoreController@tkKvk')->name('kv-khac');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', 'SlideController@index')->name('slide');
        Route::get('/new', 'SlideController@new')->name('new-slide');
        Route::post('/save', 'SlideController@save')->name('save-slide');
        Route::get('/check/{id}', 'SlideController@check');
        Route::get('/edit/{id}', "SlideController@edit")->name('edit-slide');
        Route::put('/update/{id}', "SlideController@update");
        Route::get('/delete/{id}', "SlideController@delete");
    });

    Route::group(['prefix' => "product"], function () {
        Route::get('/listProduct', 'ProductController@listProduct')->name("listPro");
        Route::get('/newProduct', 'ProductController@newProduct')->name("newPro");
        Route::post('/saveProduct', 'ProductController@saveProduct')->name('savePro');
    });

    Route::group(['prefix' => 'type-product'], function () {
        Route::get('/listCategory',"CategoryController@viewList"
        )->name("listCategory");
        Route::post('/deteleCategory/{id}',"CategoryController@deleteCategory")->name("deleteCategory");
    });
    //news
    Route::group(['prefix' => "news"], function () {
        Route::get('/listnews', "news@list")->name("listnews");
    });
    });


Route::group(['prefix' => 'type-product'], function () {
    Route::get('/listCategory',"CategoryController@viewList"
    )->name("listCategory");
    Route::post('/deteleCategory/{id}',"CategoryController@deleteCategory")->name("deleteCategory");
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix"=>"user"],function (){
    Route::get("/details/{id}","HomeController@details")->name("details");
    Route::get("/addtoCart","HomeController@addToCart")->name("addToCart");
    Route::get("/list/{id}","HomeController@list")->name("list");
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

