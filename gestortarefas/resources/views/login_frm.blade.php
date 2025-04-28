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
                <input class="form-control" type="text" id="text_username" name="text_username" placeholder="Usuário" required value="{{old('text_username')}}">
                @error('text_username')
                    <div class="text-danger">{{ $errors->get('text_username')[0] }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text_password">Senha</label>
                <input class="form-control" type="password" id="text_password" name="text_password" placeholder="Senha" required value="{{old('text_password')}}">
                @error('text_password')
                <div class="text-danger">{{ $errors->get('text_password')[0] }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-dark w-100">Entrar</button>
            </div>

            @if (session()->has('login_error'))
                <div class="alert alert-danger p-2 text-center">
                    <small class="m-0">{{ session()->get('login_error') }}</small>
                </div>
            @endif
        </form>

        {{-- se existir qualquer erro, exibe na tela --}}
        {{-- @if($errors->any())
            <div class="alert alert-danger p-2">
                @foreach ($errors->all() as $error)
                    <small class="m-0">{{ $error }}</small><br>
                @endforeach
            </div>
        @endif --}}

    </div>
</div>


@endsection