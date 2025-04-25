<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(){
        // echo "Laravel 10 - Gestor de tarefas";
        //-----------------------------------------
        $data = [
            'title' => 'Laravel 10 - Gestor de tarefas',
            'description' => 'Aplicação para gerenciar tarefas com Laravel 10'
        ];
        return view('main', $data);
    }
}
