<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return view('welcome');
});
*/


//Categoríaas
Route::get('articulos/{categoria_id}','CategorieController@categ')->name('articulos.categ');
//Contacto
Route::get('contact-us', 'StaticController@contactUS')->name('contact-us');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);

//Articulos
Route::get('articulo/{id}','StaticController@show')->name('articulo.show');
Route::get('','StaticController@home')->name('index');

//Usuarios
Route::get('user/create','UsersController@usercreate')->name('user.create');
Route::post('user/create',  'UsersController@userstore')->name('user.store');
Route::get('user/login','UsersController@login')->name('user.login');
Route::post('user/validate',  'UsersController@validation')->name('user.validate');
Route::get('user/validate',  'UsersController@validation')->name('user.validate');
Route::get('user/publications','UsersController@publicationstable')->name('user.publicationstable');
//Usuarios articulos
Route::get('publication/create','UsersController@create')->name('articulo.create');
Route::post('publication/create',  'UsersController@store')->name('articulo.store');
Route::get('publication/store','UsersController@create')->name('articulo.create');
Route::get('publication/{id}','UsersController@edit')->name('articulo.edit');
Route::post('publication/{id}','UsersController@update')->name('articulo.update');
Route::post('publication/update','UsersController@update')->name('posts.update');
Route::get('publication/{id}/delete','UsersController@delete')->name('articulo.delete');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){


    //USUARIOS

    Route::get('tableusers','AdminController@tableusers')->name('tableusers');
    Route::get('user/create','AdminUserController@usercreate')->name('user.create');
    Route::post('user/create',  'AdminUserController@userstore')->name('user.store');
    Route::get('user/store','AdminUserController@usercreate')->name('user.create');
    Route::post('user/{id}','AdminUserController@userupdate')->name('user.update');
    //Route::post('user/update','AdminUserController@userupdate')->name('user.update');
    Route::get('user/{id}','AdminUserController@useredit')->name('user.edit');
    Route::get('user/{id}/delete','AdminUserController@userdelete')->name('user.delete');



    //PUBLICACIONES

    Route::get('tablehome','AdminController@showtable')->name('tablehome');
    Route::get('articulo/create','AdminController@create')->name('articulo.create');
    Route::post('articulo/create',  'AdminController@store')->name('articulo.store');
    Route::get('articulo/store','AdminController@create')->name('articulo.create');
    Route::get('', 'HomeController@index')->name('index');
    Route::get('articulo/{id}','AdminController@edit')->name('articulo.edit');
    Route::post('articulo/{id}','AdminController@update')->name('articulo.update');
    Route::post('posts/update','AdminController@update')->name('posts.update');
    Route::get('articulo/{id}/delete','AdminController@delete')->name('articulo.delete');



});
Route::post('/perfil', 'UsersController@updateProfile')->name('web.users.updateProfile');
