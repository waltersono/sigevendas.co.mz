@extends('layouts.app')
@section('title')
SIGEF | Signin
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('src/vendor/signin/signin.css') }}">
@endsection
@section('content')
    <form action="{{ route('authenticate') }}" method="POST" class="form-signin text-center">
        @include('partials.errors')
        @include('partials.alerts')
        <img class="mb-0" src="{{ asset('src/img/inas-logo.png') }}" alt="" width="102" height="72">
        <h4 class="h4 mb-3 font-weight-normal">Instituto Nacional de Accao Social</h4>

        <h4 class="h4 mb-0 font-weight-normal">SIGEF</h4>
        <h4 class="h5 mb-3 font-weight-normal">Sistema de Gestao de Formacoes</h4>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>

        <label for="inputPassword" class="sr-only">Palavra-passe</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

        <div class="checkbox mb-3 text-left">
            <label>
                <input type="checkbox" name="remember" id="remember"> Lembre-se de mim
            </label>
        </div>

        <button type="submit" class="btn btn-sm btn-success btn-block" type="submit">Entrar</button>
        @csrf
        <p class="mt-5 mb-3 text-muted">&copy; Todos Direitos Resevados 2020 - INAS - RTICI - <a href="http://inas.gov.mz" >www.inas.gov.mz</a></p>
    </form>
@endsection