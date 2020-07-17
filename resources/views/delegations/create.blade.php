@extends('layouts.app')
@section('title') Novo Delega&ccedil;&atilde;o @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($delegation) ? 'Actualizar' : 'Novo' }} Delega&ccedil;&atilde;o</h1>
    </div>

    <form action="{{ isset($delegation) ? route('delegations.update', $delegation->id) : route('delegations.store') }}" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da Delega&ccedil;&atilde;o"
                    value="{{ isset($delegation) ? $delegation->designation : '' }}"/>
                </div>
            </div>
            @if(isset($delegation))
            <div class="col-md-6">
                <div class="form-group">
                    <label for="deputy_id">Delegado</label>
                    <select name="deputy_id" id="deputy_id" class="form-control form-control-sm">
                        <option value="">-- Selecione um funcionario -- </option>
                        @foreach($employees as $i)
                        <option value="{{ $i->id }}"
                            @if(isset($delegation))
                                @if($delegation->deputy_id == $i->id)
                                    selected
                                @endif
                            @endif
                        >{{ $i->name }} {{ $i->surname }}</option>
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
        @if(isset($delegation))
            @method('PUT')
        @endif
    </form>
@endsection
