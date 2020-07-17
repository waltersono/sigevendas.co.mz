@extends('layouts.app')
@section('title') Unidades Org&acirc;nicas @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Unidades Org&acirc;nicas</h1>
        <a href="{{ route('organicUnities.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Designa&ccedil;&atilde;o</th>
              <th>Director Geral</th>
              <th>D.Adjunto</th>
              <th>Ac&ccedil;&atilde;o</th>
            </tr>
          </thead>
          <tbody>
                @if(count($organicUnities))
                    <?php $cont = 0; ?> 
                    @foreach($organicUnities as $organic_unity)
                        <tr>
                            <td>{{ ++$cont }}</td>
                            <td>{{ $organic_unity->designation }}</td>
                            <td>{{ $organic_unity->generalManager()['name'] }} {{ $organic_unity->generalManager()['surname'] }}</td>
                            <td>{{ $organic_unity->deputyDirector()['name'] }} {{ $organic_unity->deputyDirector()['surname'] }}</td>
                            <td>
                                <a href="{{ route('organicUnities.show', $organic_unity->id) }}" class="btn btn-info btn-sm">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="{{ route('organicUnities.edit', $organic_unity->id) }}" class="btn btn-warning btn-sm">
                                    <span data-feather="edit"></span>
                                </a>
                                <a 
                                    class="btn btn-danger btn-sm"
                                    data-toggle="modal"
                                    data-target="#exampleModal"
                                    onclick="handleDelete('Confirmar Remocao', 
                                    'Tem certeza que deseja remover este registo', 
                                    'organicUnities',
                                    {{ $organic_unity->id }})">
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
                            <td colspan="5" class="text-center font-weight-bold">Nenhum registo encontrado</td>
                        </tr>
                @endif
          </tbody>
        </table>
      </div>
@endsection
@section('scripts')
    <script>
        function handleDelete(title, message, route, id){
            $('#exampleModal').modal('show');
            $('.modal-title').html(title);
            $('.modal-body').html(message);
            $('#exampleModal .btn-primary').addClass('btn-danger');
			var form = document.getElementById('deleteModalForm');
			form.action = '/' + route + '/' + id;
        }
    </script>
@endsection
