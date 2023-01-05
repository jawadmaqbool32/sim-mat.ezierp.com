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
        Route::get('/', [
            'uses' => "HomeController@index",
            'as' => "dashboard"
        ]);

        // Resources
        Route::resource('file', FileContentController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('voucher-types', VoucherTypeController::class);
        Route::resource('stocks', StockController::class);
        Route::resource('sales', SaleController::class);
        Route::resource('orders', OrderController::class);


        //Groups
        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/', 'AccountController@index');
        });
        Route::group(['prefix' => 'order'], function () {
            Route::post('cancel/{id}', "OrderController@cancel")->name('order.cancel');
            Route::post('mark/paid/{id}', "OrderController@markPaid")->name('order.mark.paid');
            Route::post('order/refund/{id}', "OrderController@refund")->name('order.refund');
        });
    });



    //Print Routes
    Route::group(['prefix' => 'print'], function () {
        Route::get('/order/{id}', [
            'uses' => "OrderController@print",
            'as' => "order.print"
        ]);
        Route::get('/stock/{type}', [
            'uses' => "StockController@print",
            'as' => "print.stock"
        ]);
        Route::get('/sales/{from}/{to}', [
            'uses' => "SaleController@print",
            'as' => "print.sales"
        ]);
    });
});
