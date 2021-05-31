@extends('layouts.app')
@section('title') Novo Usu&aacute;rio @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ isset($user) ? 'Actualizar' : 'Novo' }} Usu&aacute;rio</h1>
</div>

<form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Nome <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Nome do utilizador" value="{{ isset($user) ? $user->name : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span> </label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Email do utilizador" value="{{ isset($user) ? $user->email : '' }}" />
            </div>
        </div>

        @if(Auth::user()->role == 'Administrator')
        <div class="col-md-3">
            <div class="form-group">
                <label for="role">Papel<span class="text-danger">*</span></label>
                <select name="role" id="role" class="form-control form-control-sm">
                    <option value="Manager" @if(isset($user)) @if($user->role == 'Manager')
                        selected
                        @endif
                        @endif
                        >Manager</option>
                    <option value="Administrator" @if(isset($user)) @if($user->role == 'Administrator')
                        selected
                        @endif
                        @endif
                        >Administrador</option>
                </select>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="form-group">
                <label for="store">Estabelecimento:</label>
                <select name="store" id="store" class="form-control form-control-sm">
                    <option value="">-- Selecione um estabelecimento --</option>
                    @foreach($stores as $i)
                        <option value="{{ $i->id }}"
                            @if(isset($user))
                                @if($user->store_id == $i->id)
                                    selected
                                @endif
                            @endif
                        >{{ $i->designation }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @endif
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-sm">
                <span data-feather="save"></span> Salvar
            </button>
        </div>
    </div>
    @csrf
    @if(isset($user))
    @method('PUT')
    @endif
</form>
@endsection