@extends('layouts.app')
@section('title') N&iacute;vel Acad&eacute;mico @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">N&iacute;vel Acad&eacute;mico</h1>
        <a href="{{ route('academicLevels.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Designa&ccedil;&atilde;o</th>
              <th>Ac&ccedil;&atilde;o</th>
            </tr>
          </thead>
          <tbody>
                @if(count($academicLevels))
                    <?php $cont = 0; ?> 
                    @foreach($academicLevels as $academicLevel)
                        <tr>
                            <td>{{ ++$cont }}</td>
                            <td>{{ $academicLevel->designation }}</td>
                            <td>
                                <a href="{{ route('academicLevels.show', $academicLevel->id) }}" class="btn btn-info btn-sm">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="{{ route('academicLevels.edit', $academicLevel->id) }}" class="btn btn-warning btn-sm">
                                    <span data-feather="edit"></span>
                                </a>
                                <a 
                                    class="btn btn-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    onclick="handleDelete('Confirmar Remocao', 
                                    'Tem certeza que deseja remover este registo', 
                                    'academicLevels',
                                    {{ $academicLevel->id }})">
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
                            <td colspan="4" class="text-center font-weight-bold">Nenhum registo encontrado</td>
                        </tr>
                @endif
          </tbody>
        </table>
      </div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
@endsection
