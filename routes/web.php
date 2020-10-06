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
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get(config('app.root').'/dashboard', function () {
    return view('auths.dashboard');
})->name('dashboard');

Route::resource(config('app.root').'/users', 'App\Http\Controllers\UsersController', [
	'names' => [
		'index' => 'users',
		'create' => 'users.create',
		'store' => 'users.store',
	]
]);

Route::resource(config('app.root').'/packet', 'App\Http\Controllers\PacketController', [
	'names' => [
		'index' => 'packet',
		'create' => 'packet.create',
		'store' => 'packet.store',
	]
]);

Route::get(config('app.root').'/customers/{id}/invoice', 'App\Http\Controllers\InvoiceController@invoice');
Route::get(config('app.root').'/customers/{id}/pembayaran', 'App\Http\Controllers\PaymentController@pembayaran');
Route::get(config('app.root').'/customers/{id}/pembayaran/create', 'App\Http\Controllers\PaymentController@create');
Route::post(config('app.root').'/customers/{id}/pembayaran', 'App\Http\Controllers\PaymentController@store');
Route::delete(config('app.root').'/customers/{id}/pembayaran/{inid}/delete', 'App\Http\Controllers\PaymentController@destroy');
Route::delete(config('app.root').'/customers/{id}/pembayaran/{inid}/cancel', 'App\Http\Controllers\PaymentController@cancel');

Route::resource(config('app.root').'/customers', 'App\Http\Controllers\CustomersController', [
	'names' => [
		'index' => 'customers',
		'create' => 'customers.create',
		'store' => 'customers.store',
	]
]);

Route::get(config('app.root').'/hotspot/{id}/stock', 'App\Http\Controllers\StockController@index');
Route::get(config('app.root').'/hotspot/{id}/stock/create', 'App\Http\Controllers\StockController@create');
Route::post(config('app.root').'/hotspot/{id}/stock', 'App\Http\Controllers\StockController@store');
Route::delete(config('app.root').'/hotspot/{id}/stock/{sid}', 'App\Http\Controllers\StockController@destroy');
Route::get(config('app.root').'/hotspot/{id}/stock/{sid}/edit', 'App\Http\Controllers\StockController@edit');
Route::patch(config('app.root').'/hotspot/{id}/stock/{sid}', 'App\Http\Controllers\StockController@update');
Route::resource(config('app.root').'/hotspot', 'App\Http\Controllers\HotspotController', [
	'names' => [
		'index' => 'hotspot',
		'create' => 'hotspot.create',
		'store' => 'hotspot.store',
	]
]);
