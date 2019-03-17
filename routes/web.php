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

Route::prefix('admin')->group(function() {
    Auth::routes(['register' => false]);

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/{any}', function () {
            return view('admin.dashboard');
        })->where('any', '.*');
    });
});

/*
 * Public routes
 */
Route::get('/', 'HomeController@index')->name('home');

Route::get('/blog/{slug}', 'HomeController@post')
    ->where('slug', '[\w-]+')
    ->name('post');

