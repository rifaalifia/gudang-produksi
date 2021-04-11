<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;

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
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('login');
//});

//Gudang
Route::get('gudang/Printbahan', 'GudangController@Printbahan')->name("gudang.Printbahan");
Route::get('gudang/Printgudang', 'GudangController@Printgudang')->name("gudang.Printgudang");
Route::get('gudang/listbahanbaku', 'GudangController@listbahanbaku')->name("gudang.listbahanbaku");
//Route::post('gudang/listbahanbaku/approve', 'GudangController@approve')->name("gudang.approve");
Route::match(['put', 'patch'],'gudang/listbahanbaku/{listbahanbaku}/changestatus', 'GudangController@changestatus')->name("gudang.changestatus");
Route::resource("gudang","GudangController");


//Produksi
Route::get('produksi/Printproduksi', 'ProduksiController@Printproduksi')->name("produksi.Printproduksi");
Route::resource("produksi", "ProduksiController");

//Signup
Route::resource("Signup", "SignupController");

//Login
Route::get('Login/Logout', 'LoginController@Logout')->name("Login.Logout");
Route::resource("Login", "LoginController");

//Route Halaman Depan
Route::get('/', 'HomeController@index');

