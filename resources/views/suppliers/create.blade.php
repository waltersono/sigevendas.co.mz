@extends('layouts.app')
@section('title') Novo Fornecedor @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ isset($supplier) ? 'Actualizar' : 'Novo' }} Fornecedor</h1>
</div>

<form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="store">Estabelecimento <span class="text-danger">*</span></label>
                <select name="store" id="store" class="form-control form-control-sm">
                    <option value="">-- Selecione o estabelecimento --</option>
                    @foreach($stores as $i)
                    <option value="{{ $i->id }}" @if(isset($supplier)) @if($i->id == $supplier->store_id)
                        selected
                        @endif
                        @endif
                        >{{ $i->designation }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="designation">Designacao <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control form-control-sm" placeholder="Nome do Fornecedor" value="{{ isset($supplier) ? $supplier->designation : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="contact">Contacto </label>
                <input type="number" name="contact" id="contact" class="form-control form-control-sm" placeholder="Introduza o contacto" value="{{ isset($supplier) ? $supplier->contact : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Introduza o email" value="{{ isset($supplier) ? $supplier->email : '' }}" />
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
    @if(isset($supplier))
    @method('PUT')
    @endif
</form>
@endsection