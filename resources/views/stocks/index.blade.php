@extends('layouts.app')
@section('title') Estoque @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estoque</h1>
    <a href="{{ route('products.create') }}" class="btn btn-secondary btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
    </a>
</div>

<h3 class="h4">Filtro</h3>
<div class="row">
    <div class="col-md-6">
        <label for="store">Estabelecimento</label>
        <select name="store" id="store" class="form-control form-control-sm">
            <option value="">-- Selecione o estabelecimento --</option>
            @foreach($stores as $i)
            <option value="{{ $i->id }}">{{ $i->designation }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="category">Categoria</label>
        <select name="category" id="category" class="form-control form-control-sm">
            <option value="">-- Selecione o categoria --</option>
            @foreach($categories as $i)
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
    <table class="table table-striped table-sm" id="tableProducts">
        <thead>
            <tr>
                <th>#</th>
                <th>Estabelecimentos</th>
                <th>Categoria</th>
                <th>Designa&ccedil;&atilde;o</th>
                <th>Pre&ccedil;o <strong>(MT)</strong></th>
                <th>Quantidade</th> 
                <th>Ac&ccedil;&atilde;o</th>
            </tr>
        </thead>
        <tbody>
            @if(count($products))
            <?php $cont = 0; ?>
            @foreach($products as $i)
            <tr>
                <td>{{ ++$cont }}</td>
                <td>{{ $i->store->designation }}</td>
                <td>{{ $i->category->designation }}</td>
                <td>{{ $i->designation }}</td>
                <td>{{ $i->price }}</td>
                <td>{{ $i->quantity }}</td>
                <td>
                    <a href="{{ route('products.show', $i->id) }}" class="btn btn-info btn-sm">
                        <span data-feather="eye"></span>
                    </a>
                    <a href="{{ route('products.edit', $i->id) }}" class="btn btn-warning btn-sm">
                        <span data-feather="edit"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="handleDelete('Confirmar Remocao', 
                                    'Tem certeza que deseja remover este registo', 
                                    'products',
                                    {{ $i->id }})">
                        <span data-feather="x"></span>
                    </a>

                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center font-weight-bold">Nenhum registo encontrado!</td>
            </tr>
            @endif
        </tbody>
        <form action="" id="deleteModalForm" method="POST">
            @include('partials.modal')
            @csrf
            @method('DELETE')
        </form>
    </table>
</div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/products/index.js') }}"></script>
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
<script src="{{ asset('src/js/script_remove_record_modal_ajax.js') }}"></script>
@endsection