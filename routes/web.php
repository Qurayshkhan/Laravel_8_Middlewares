<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\report;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\reportUnderConstruction;

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

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('groupMiddleware');

Route::get('check',function(){
  return view('check');
})->middleware('role:admin');

Route::get('report',[report::class,'show'])->middleware('construction');
Route::get('report1',[reportUnderConstruction::class,'reportShow'])->middleware('construction');
Route::middleware(['construction'])->group(function(){
    Route::get('stoke', function () {
        return view('stoke');
    });
});