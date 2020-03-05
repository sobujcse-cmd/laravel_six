<?php

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
//Route::get('/', function () {
   // return view('welcome');
   //}); 
Route::get('/','hello@home'); 
    
Route::get('about', function () {
    return view('about');
   });
Route::get('contact', function () {
    return view('pages.contact');
   });

//category cruds are here

Route::get('add/category', 'hello@addcategory')->name('add.category');
Route::post('store/category', 'hello@storecategory')->name('store.category');
Route::get('all/category', 'hello@allcategory')->name('all.category');
Route::get('view/category/{id}','hello@viewcategory');
Route::get('delete/category/{id}','hello@deletecategory');
Route::get('edit/category/{id}','hello@editcategory');
Route::post('update/category/{id}','hello@updatecategory');
//post category are here

Route::get('write/post', 'postcontroller@writepost')->name('write.post');
Route::post('store/post','postcontroller@storepost');
Route::get('all/post','postcontroller@allpost')->name('all.post');
Route::get('view/post/{id}','postcontroller@ViewPost');
Route::get('edit/post/{id}','postcontroller@EditPost');
Route::post('update/post/{id}','postcontroller@UpdatePost');
Route::get('delete/post/{id}','postcontroller@DeletePost');

    
 
 


 
 

 





