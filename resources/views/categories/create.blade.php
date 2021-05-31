@extends('layouts.app')
@section('title') Nova Categoria @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ isset($category) ? 'Actualizar' : 'Nova' }} Categoria</h1>
</div>

<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="store">Estabelecimento <span class="text-danger">*</span></label>
                <select name="store" id="store" class="form-control form-control-sm">
                    <option value="">-- Selecione o estabelecimento --</option>
                    @foreach($stores as $i)
                    <option value="{{ $i->id }}" @if(isset($category)) @if($i->id == $category->store_id)
                        selected
                        @endif
                        @endif
                        >{{ $i->designation }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="designation">Designacao <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control form-control-sm" placeholder="Nome do Categoria" value="{{ isset($category) ? $category->designation : '' }}" />
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
    @if(isset($category))
    @method('PUT')
    @endif
</form>
@endsection