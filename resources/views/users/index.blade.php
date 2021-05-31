@extends('layouts.app')
@section('title') Usu&aacute;rios @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usu&aacute;rios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Estabelecimento</th>
                <th>Ac&ccedil;&atilde;o</th>
            </tr>
        </thead>
        <tbody>
            @if(count($users))
            <?php $cont = 0; ?>
            @foreach($users as $user)
            <tr>
                <td>{{ ++$cont }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getWorkStore($user->id) }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                        <span data-feather="eye"></span>
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <span data-feather="edit"></span>
                    </a>
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
    <form action="" id="deleteModalForm" method="POST">
        @include('partials.modal')
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
@endsection