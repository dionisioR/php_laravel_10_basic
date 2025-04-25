<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/main',[nomeController::class,'metodo']);
// Route::get('/main',[Main::class,'index']);
Route::get('/',[Main::class,'index'])->name('index');

// login routes
Route::get("/login",[Main::class,'login'])->name('login');
Route::post("/login_submit",[Main::class,'login_submit'])->name('login_submit');

// main page
Route::get("/main",[Main::class,'main'])->name('main');

