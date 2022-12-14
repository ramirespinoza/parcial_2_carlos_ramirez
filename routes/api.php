<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('get-customers', [CustomerController::class, 'getCustomers'])->name('api-customers-get');

Route::post('create-customer', [CustomerController::class, 'store'])->name('api-customers-create');

Route::put('update-customer/{id}', [CustomerController::class, 'update'])->name('api-customers-update');

Route::delete('delete-customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('api-customers-delete');