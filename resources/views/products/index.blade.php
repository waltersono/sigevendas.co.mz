@extends('layouts.app')
@section('title') Produtos @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
    </a>
</div>

<h3 class="h4">Filtro</h3>
<div class="row">
    <div class="col-md-4">
        <label for="store">Estabelecimento</label>
        <select name="store" id="store" class="form-control form-control-sm">
            <option value="">-- Selecione o estabelecimento --</option>
            @foreach($stores as $i)
            <option value="{{ $i->id }}">{{ $i->designation }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="category">Categoria</label>
        <select name="category" id="category" class="form-control form-control-sm">
            <option value="">-- Selecione o categoria --</option>

        </select>
    </div>
    <div class="col-md-4">
        <label for="supplier">Fornecedor</label>
        <select name="supplier" id="supplier" class="form-control form-control-sm">
            <option value="">-- Selecione o fornecedor --</option>

        </select>
    </div>
</div>

<div class="row mt-3 mb-4">
    <div class="col-md-3">
        <button type="button" name="search" id="search" class="btn btn-secondary btn-sm">
            <span data-feather="search"></span> Pesquisar
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="tableProducts">
        <thead>
            <tr>
                <th>#</th>
                <th>Estabelecimentos</th>
                <th>Categoria</th>
                <th>Fornecedor</th>
                <th>Designa&ccedil;&atilde;o</th>
                <th>Quantidade</th>
                <th>Pre&ccedil;o <strong>(MT)</strong></th>
                <th>Ac&ccedil;&atilde;o</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="10" class="text-center font-weight-bold">Pesquisa com os filtros acima</td>
            </tr>
        </tbody>
        <form action="" id="deleteModalForm" method="POST">
            @include('partials.modal')
            @csrf
            @method('DELETE')
        </form>
    </table>
    @include('partials.add_quantity_modal')
</div>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <div class="spinner-border" id="spinner" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('partials.delete_scripts')
<script src="{{ asset('src/js/products/index.js') }}"></script>
@endsection