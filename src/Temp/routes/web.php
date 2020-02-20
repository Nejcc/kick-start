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

use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{id}/{locale}/{name}', function ($id, $locale, $name) {
    Session::put('locale_id', $id);
    Session::put('locale_code', $locale);
    Session::put('locale', $name);
    Carbon::setLocale($locale);
    return redirect()->back();
})->name('locale');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//check middleware can method on AppServiceProvider to see all GATES
//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
//
//});

