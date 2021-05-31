@extends('layouts.app')
@section('title') {{ isset($product) ? 'Actualizar' : 'Novo' }} Produto @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ isset($product) ? 'Actualizar' : 'Novo' }} Produto</h1>
</div>

<form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="store">Estabelecimento<span class="text-danger">*</span></label>
                <select name="store" id="store" class="form-control form-control-sm">
                    <option value="">-- Selecione o estabelecimento --</option>
                    @foreach($stores as $i)
                    <option value="{{ $i->id }}" @if(isset($product)) @if($i->id == $store_id)
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
                <label for="category">Categoria <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-control form-control-sm">
                    <option value="">-- Selecione o categoria --</option>
                </select>
                <input type="hidden" id="category_id" name="category_id" value="{{ isset($product) ? $product->category_id : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="designation">Designa&ccedil;&atilde;o <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control form-control-sm" placeholder="Nome do Produto" value="{{ isset($product) ? $product->designation : '' }}" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="price">Pre&ccedil;o <strong>(MT)</strong><span class="text-danger">*</span></label>
                <input type="number" name="price" id="price" class="form-control form-control-sm" placeholder="Introduza o preco do produto" value="{{ isset($product) ? $product->price : '' }}" step=".01" />
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <button type="submit" class="btn btn-secondary btn-sm">
                <span data-feather="save"></span> Salvar
            </button>
        </div>
    </div>
    @csrf
    @if(isset($product))
    @method('PUT')
    @endif
</form>
@endsection
@section('scripts')
<script src="{{ asset('src/js/products/create.js') }}"></script>
@endsection