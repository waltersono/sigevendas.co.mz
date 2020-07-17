@extends('layouts.app')
@section('title') Nova Institui&ccedil;&atilde;o @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ isset($institution) ? 'Actualizar' : 'Nova' }} Institui&ccedil;&atilde;o</h1>
    </div>

    <form action="{{ isset($institution) ? route('institutions.update', $institution->id) : route('institutions.store') }}" method="POST">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                    <input type="text" name="designation" id="designation" class="form-control form-control-sm" 
                    placeholder="Nome da instituicao"
                    value="{{ isset($institution) ? $institution->designation : '' }}"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="address">Endere&ccedil;o <span class="text-danger">*</span> </label>
                    <input type="text" name="address" id="address" class="form-control form-control-sm" 
                    placeholder="Endereco da instituicao"
                    value="{{ isset($institution) ? $institution->address : '' }}"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="contact_1">Contacto Principal <span class="text-danger">*</span></label>
                    <input type="text" name="contact_1" id="contact_1" class="form-control form-control-sm" 
                    placeholder="Contacto Principal"
                    value="{{ isset($institution) ? $institution->contact_1 : '' }}"/>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="contact_2">Contacto Alternativo</label>
                    <input type="text" name="contact_2" id="contact_2" class="form-control form-control-sm" 
                    placeholder="Contacto Alternativo"
                    value="{{ isset($institution) ? $institution->contact_2 : '' }}"/>
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
        @if(isset($institution))
            @method('PUT')
        @endif
    </form>
@endsection
