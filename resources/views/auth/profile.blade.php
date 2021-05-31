@extends('layouts.app')
@section('title') Perfil @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Perfil</h1>
    </div>

    <h4>Informa&ccedil;&otilde;es</h4>
    <form action="{{ route('profile.update-info',$user->id) }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ $user->name }}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm" value="{{ $user->email }}" />
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
            </div>
        </div>
        @csrf
        @method('PUT')
    </form>

    <h4>Palavra-passe</h4>
    <form action="{{ route('profile.update-password', $user->id) }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="current_password">Palavra-passe actual</label>
                    <input type="password" name="current_password" id="currentPassword" class="form-control form-control-sm" placeholder="Palavra-passe actual" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="new_password">Nova Palavra-passe</label>
                    <input type="password" name="new_password" id="new_password" class="form-control form-control-sm" placeholder="Nova palavra-passe"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="new_password_confirmation">Confirmar Palavra-passe</label>
                    <input type="password" name="new_password_confirmation" id="password_confirmation" class="form-control form-control-sm" placeholder="Repita a nova palavra-passe"/>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button type="submit" class="btn btn-dark btn-sm">Actualizar Palavra-passe</button>
            </div>
        </div>
        @csrf
        @method('PUT')
    </form>
@endsection
