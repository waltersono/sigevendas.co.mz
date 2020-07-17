@extends('layouts.app')
@section('title') Nova Carreira @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($career) ? 'Actualizar' : 'Nova' }} Carreira</h1>
    </div>

    <form action="{{ isset($career) ? route('careers.update', $career->id) : route('careers.store') }}" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da Carreira" required
                    value="{{ isset($career) ? $career->designation : '' }}"/>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-sm">
                <span data-feather="save"></span> Salvar
            </button>
            </div>
        </div>
        @csrf
        @if(isset($career))
            @method('PUT')
        @endif
    </form>
@endsection
