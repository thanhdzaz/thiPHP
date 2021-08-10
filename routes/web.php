<?php

use App\Http\Controllers\customers;
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

Route::get('/customers',[customers::class,'index']);
Route::get('/customers/create',[customers::class,'create']);
Route::post('/customers/create',[customers::class,'createCus']);



?>