@extends('layouts.app')
@section('title')
Entrar
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('src/vendor/signin/signin.css') }}">
@endsection
@section('content')
<form action="{{ route('authenticate') }}" method="POST" class="form-signin text-center">
    @include('partials.errors')
    @include('partials.alerts')

    <h4 class="h5 mb-0 font-weight-bold text-light">SGV</h4>
    <h4 class="h5 mb-3 font-weight-bold text-light">Sistema Gestao de Vendas</h4>

    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" autofocus>

    <label for="inputPassword" class="sr-only">Palavra-passe</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Palavra-passe">

    <button type="submit" class="btn btn-sm btn-success btn-block" type="submit">Entrar</button>
    @csrf
    <p class="text-center text-light mt-2 mb-0">
        Copyright © <?php echo date('yy');?> <strong>SGV</strong>. Todos os Direitos Reservados.
    </p>
    <p class="text-center text-light mt-0">
        Desenvolvido pela <a href="http://www.google.com" target="_blank" class="text-light">SoftTech,Lda</a>.
    </p>
</form>
@endsection