@extends('templates/login_layout')
@section('content')


<div class="login-wrapper">
    <div class="login-box">


        <h3 class="text-center">Login</h3>
        <hr>
        <form action="{{ route('login_submit') }}" method="post">

            <!-- @csrf - impede que o formulário seja submetido de uma fonte externa -->
            @csrf
            <div class="mb-3">
                <label class="form-label" for="text_username">Usuário</label>
                <input class="form-control" type="text" id="text_username" name="text_username" placeholder="Usuário" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="text_password">Senha</label>
                <input class="form-control" type="password" id="text_password" name="text_password" placeholder="Senha" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-dark w-100">Entrar</button>
            </div>

        </form>

    </div>
</div>


@endsection