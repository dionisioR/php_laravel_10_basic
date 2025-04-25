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

Route::get('/', function () {
    // echo "Gestor de tarefas";
    //----------------------------------------------------
    try {
        //Testar conexão com o banco de dados
        DB::connection()->getPdo();
        echo "Conexão com o banco de dados estabelecida com sucesso." . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Não possível conectar ao banco de dados. Erro: " . $e->getMessage());
    }
});

// Route::get('/main',[nomeController::class,'metodo']);
Route::get('/main',[Main::class,'index']);
