<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhanMemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\HomeController;
use App\Htpp\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyChildController;
use App\Http\Controllers\RoomController;
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



Route::middleware(['auth'])->group(function () {
	Route::get('/dashboard',[HomeController::class,'index'])->name('home');
	Route::resource('category', CategoryController::class);
	Route::resource('products', ProductController::class);
	Route::get('orders/search', 'OrderController@SearchOrder');
	Route::get('orders/printf/{id}', 'OrderController@PrinfInOrder');
	Route::get('orders/delete/{id}', 'OrderController@destroy');
	Route::resource('orders', OrderController::class);
	Route::resource('Unit', UnitController::class);
	Route::get('/phanmem', [PhanMemController::class, 'index']);
	Route::get('/listproduct',[ProductController::class,'listproduct']);
	Route::get('/searchproduct',[ProductController::class,'searchproduct']);
	Route::get('/product/setstatus/{id}',[ProductController::class,'SetStatusProduct']);
	Route::get('/product/restoredeleteproduct/{id}',[ProductController::class,'RestoreDeleteProduct']);
	Route::delete('/product/forcedeleteproduct/{id}',[ProductController::class,'ForceDeleteProduct']);
	Route::PUT('products/update/{$id}',[ProductController::class,'update'])->name('products.update');
	Route::get('/logout','Auth\LoginController@logout')->name('logout');

	Route::get('/room','RoomController@index');
	Route::get('/room/show/{id}','RoomController@show');
	 Route::post('/room/SaveRoom','RoomController@save');
	Route::post('/room/SaveArea','AreaController@save');
	Route::get('/room/ListArea','AreaController@ListArea');
	Route::post('/room/{id}','RoomController@update');
    Route::delete('room/delete/{id}','RoomController@delete');
	Route::delete('/room/DeleteArea/{id}','AreaController@delete');
	Route::get('/room/AreaFindRoom/{id}','SoftWareController@AreaFindRoom');
	Route::get('/software','SoftWareController@index');
	Route::get('/software/ListProductInCategory/{id}','SoftWareController@ListProductInCategory');
	Route::post('software/TimeMoney','TimeController@TimeMoneyInOrder');
	Route::post('software/VAT','SoftWareController@VatOrderInRoom');
	Route::post('software/searchproducts','SoftWareController@SearchProduct');
	Route::post('software/DiscountMoneyTimeInOrder','TimeController@DiscountMoneyTimeInOrder');
	Route::post('software/DiscountOrderInRoom','SoftWareController@DiscountOrderInRoom');
	Route::post('software/MoveRoom','SoftWareController@MoveRoom');
	Route::get('software/Order/Payment/{id}','SoftWareController@Payment');
	Route::get('software/Order/tamtinh/{id}','SoftWareController@tamtinh');
	Route::get('/software/{id}','SoftWareController@TimeRoom');
	Route::get('software/room/{id}','SoftWareController@OrderInRoom');
	Route::get('software/room/active/{id}','SoftWareController@CheckRoomActive');
	Route::get('software/OrderInRoom/{id}','SoftWareController@OrderInRoom');
	Route::post('software/AddOrderProduct/{id}','SoftWareController@addProductInRoom');
	Route::post('software/MinusOrPlusProductInOrder','SoftWareController@MinusOrPlusProductInOrder');
	Route::post('software/DiscountProductInOrder','SoftWareController@DiscountProductInOrder');
	Route::delete('software/DeleteProductInOrder','SoftWareController@DeleteProductInOrder');
	Route::get('thongke','ThongkeController@thongke');
	Route::get('thongke/search','ThongkeController@searchthongke');
	Route::get('employee','employeecontroller@index');
	Route::get('employee/create','employeecontroller@create_show');
	Route::post('employee/create','employeecontroller@create');
	Route::get('employee/edit/{id}','employeecontroller@show');
	Route::post('employee/edit/{id}','employeecontroller@update');
	Route::get('employee/delete/{id}','employeecontroller@delete');
	Route::get('doimk','DoimatkhauController@index');
	Route::post('doimk','DoimatkhauController@doimk');
});
Route::get('login','Auth\LoginController@show')->name('login');
Route::get('register','Auth\RegisterController@show')->name('register.show');
Route::post('register','Auth\RegisterController@register');
Route::post('login','Auth\LoginController@login');







