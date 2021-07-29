@extends('layouts.app')
@section('title') Estabelecimentos @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estabelecimentos</h1>
    <a href="{{ route('stores.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Designacao</th>
                <th>Endereco</th>
                <th>NUIT</th>
                <th>Contacto</th>
                <th>Lincenca</th>
                <th>Ac&ccedil;&atilde;o</th>
            </tr>
        </thead>
        <tbody>
            @if(count($stores))
            <?php $cont = 0; ?>
            @foreach($stores as $i)
            <tr>
                <td>{{ ++$cont }}</td>
                <td>{{ $i->designation }}</td>
                <td>{{ $i->address }}</td>
                <td>{{ $i->nuit }}</td>
                <td>{{ $i->contact }}</td>
                <td><span class="badge badge-success">Fase de Teste</span></td>
                <td>
                    <a href="{{ route('stores.show', $i->id) }}" class="btn btn-info btn-sm">
                        <span data-feather="eye"></span>
                    </a>
                    <a href="{{ route('stores.edit', $i->id) }}" class="btn btn-warning btn-sm">
                        <span data-feather="edit"></span>
                    </a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="handleDelete('Confirmar Remocao', 
                                    'Tem certeza que deseja remover este registo', 
                                    'stores',
                                    {{ $i->id }})">
                        <span data-feather="x"></span>
                    </a>
                    <form action="" id="deleteModalForm" method="POST">
                        @include('partials.modal')
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10" class="text-center font-weight-bold">Nenhum registo encontrado</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@include('partials.delete_scripts')
@endsection