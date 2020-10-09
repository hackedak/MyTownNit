<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use GuzzleHttp\Middleware;

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

//Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'About']);
Route::get('/services', [PagesController::class, 'services']);
Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
