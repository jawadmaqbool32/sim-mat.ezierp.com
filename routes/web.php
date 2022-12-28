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

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => '\App\Http\Controllers'], function () {
    Route::any('login', [
        'uses' => "LoginController@index",
        'as' => 'login'
    ]);
    Route::post('logout', [
        'uses' => "LoginController@logout",
        'as' => 'logout'
    ]);
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('voucher-type', VoucherTypeController::class);

        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/', 'AccountController@index');
        });
    });
});
