<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});
// Route::get('product/filterHobies', [ProductController::class, 'filterHobies']);
// Product Controller
Route::controller(ProductController::class)->group(function () {
    Route::get('product', 'index');
    Route::post('product/getDataAll', 'getDataAll');
    Route::get('product/GetDataSelect', 'GetDataSelect');
    Route::post('product/Insert', 'Insert');
    Route::put('product/Update', 'Update');
    Route::delete('product/destroy', 'destroy');
    Route::get('product/selectHobies', 'selectHobies');
});

// ...
