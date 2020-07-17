@extends('layouts.app')
@section('title') Institui&ccedil;&otilde;es @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Institui&ccedil;&otilde;es</h1>
        <a href="{{ route('institutions.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Designa&ccedil;&atilde;o</th>
              <th>Endere&ccedil;o</th>
              <th>Contacto 1</th>
              <th>Contacto 2</th>
              <th>Ac&ccedil;&atilde;o</th>
            </tr>
          </thead>
          <tbody>
                @if(count($institutions))
                    <?php $cont = 0; ?> 
                    @foreach($institutions as $institution)
                        <tr>
                            <td>{{ ++$cont }}</td>
                            <td>{{ $institution->designation }}</td>
                            <td>{{ $institution->address }}</td>
                            <td>{{ $institution->contact_1 }}</td>
                            <td>{{ $institution->contact_2 }}</td>
                            <td>
                                <a href="{{ route('institutions.show', $institution->id) }}" class="btn btn-info btn-sm">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="{{ route('institutions.edit', $institution->id) }}" class="btn btn-warning btn-sm">
                                    <span data-feather="edit"></span>
                                </a>
                                <a 
                                    class="btn btn-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    onclick="handleDelete('Confirmar Remocao', 
                                    'Tem certeza que deseja remover este registo', 
                                    'institutions',
                                    {{ $institution->id }})">
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
                            <td colspan="6" class="text-center font-weight-bold">Nenhum registo encontrado</td>
                        </tr>
                @endif
          </tbody>
        </table>
      </div>
      {{ $institutions->links() }}
@endsection
@section('scripts')
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>

@endsection
