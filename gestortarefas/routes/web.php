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

// route with middleware
Route::middleware("CheckLogout")->group(function () {
    Route::get("/login", [Main::class, 'login'])->name('login');
    Route::post("/login_submit", [Main::class, 'login_submit'])->name('login_submit');
});


// Grupo de rotas protegidas - só podem ser acessadas se o usuário estiver logado
Route::middleware("CheckLogin")->group(function () {
    Route::get("/", [Main::class, 'index'])->name('index');
    Route::get("/logout", [Main::class, 'logout'])->name('logout');

    // Tasks - new
    Route::get('/new_task', [Main::class, 'new_task'])->name('new_task');
    Route::post('/new_task_submit', [Main::class, 'new_task_submit'])->name('new_task_submit');
 
    // Tasks - edit
    Route::get('/edit_task/{id}', [Main::class, 'edit_task'])->name('edit_task');
    Route::post('/edit_task_submit', [Main::class, 'edit_task_submit'])->name('edit_task_submit');

    // Tasks - delete
    Route::get('/delete_task/{id}', [Main::class, 'delete_task'])->name('delete_task');
    Route::post('/delete_task_confirm/{id}', [Main::class, 'delete_task_submit'])->name('delete_task_submit');
});
