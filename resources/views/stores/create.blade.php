@extends('layouts.app')
@section('title') Novo Estabelecimento @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ isset($store) ? 'Actualizar' : 'Novo' }} Estabelecimento</h1>
</div>

<form action="{{ isset($store) ? route('stores.update', $store->id) : route('stores.store') }}" method="POST">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="designation">Designacao <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control form-control-sm" placeholder="Nome do estabelecimento" value="{{ isset($store) ? $store->designation : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="address">Endereco <span class="text-danger">*</span> </label>
                <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Endereco do estabelecimento" value="{{ isset($store) ? $store->address : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="nuit">NUIT </label>
                <input type="number" name="nuit" id="nuit" class="form-control form-control-sm" placeholder="Introduza o NUIT" value="{{ isset($store) ? $store->nuit : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="contact">Contacto </label>
                <input type="number" name="contact" id="contact" class="form-control form-control-sm" placeholder="Introduza o contacto" value="{{ isset($store) ? $store->contact : '' }}" />
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
    @if(isset($store))
    @method('PUT')
    @endif
</form>
@endsection