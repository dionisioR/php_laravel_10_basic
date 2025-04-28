<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Main extends Controller
{
    //==========================================================
    // main page
    //==========================================================
    public function index()
    {
        $data = [
            'title' => 'Gestor de tarefas',
        ];
        return view('main', $data);
    }

    //==========================================================
    // login
    //==========================================================
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login_frm', $data);
    }

    public function login_submit(Request $request)
    {
        //form validade - vamos validar os campos do formulário
        $request->validate([
            'text_username' => 'required|min:3',
            'text_password' => 'required|min:3',
        ], [
            'text_username.required' => 'O campo nome de usuário é obrigatório',
            'text_username.min' => 'O campo nome de usuário deve ter no mínimo 3 caracteres',
            'text_password.required' => 'O campo senha é obrigatório',
            'text_password.min' => 'O campo senha deve ter no mínimo 3 caracteres',
        ]);

        // get form data
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        // check if user exists
        $model = new UserModel();
        // se o usuário não existir, o método first() retorna null
        // se o usuário existir, o método first() retorna o primeiro registro encontrado com todos os campos
        $user = $model->where('username', '=', $username)
            ->whereNull('deleted_at')
            ->first();
        if ($user) {
            // check if password is correct
            if(password_verify($password, $user->password)){
                $session_data = [
                    'id' => $user->id,
                    'username' => $user->username,
                ];
                // set session data
                session()->put($session_data);
                // redirect to index page
                return redirect()->route('index');
            }
        }
        // invalid login
        return redirect()
            ->route('login')
            ->withInput()
            ->with('login_error', 'Usuário ou senha inválidos');
    }

    //==========================================================
    // logout
    //==========================================================
    public function logout()
    {
        session()->forget('username');
        return redirect()->route('login');
    }
}
