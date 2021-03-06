@extends('layouts.app')
@section('title') Categorias @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorias</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
    </a>
</div>

<h3 class="h4">Filtro</h3>
<div class="row">
    <div class="col-md-12">
        <label for="store">Estabelecimento</label>
        <select name="store" id="store" class="form-control form-control-sm">
            <option value="">-- Selecione o estabelecimento --</option>
            @foreach($stores as $i)
            <option value="{{ $i->id }}">{{ $i->designation }}</option>
            @endforeach
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
    <table class="table table-striped table-sm" id="categoriesTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Estabelecimento</th>
                <th>Categoria</th>
                <th>Ac&ccedil;&atilde;o</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center font-weight-bold">Pesquisa com os filtros acima</td>
            </tr>
        </tbody>
    </table>
    <form action="" id="deleteModalForm" method="POST">
        @include('partials.modal')
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/categories/index.js') }}"></script>
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
@endsection