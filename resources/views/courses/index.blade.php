@extends('layouts.app')
@section('title') Cursos @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cursos</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <h3 class="h4">Filtro</h3>
    <div class="row">
        <div class="col-md-4">
            <label for="institution">Institui&ccedil;&atilde;o</label>
            <input name="institution" id="institution" class="form-control form-control-sm" 
            placeholder="Nome da instituticao"/>
        </div>

        <div class="col-md-4">
            <label for="designation">Designa&ccedil;&atilde;o</label>
            <input name="designation" id="designation" class="form-control form-control-sm" 
            placeholder="Nome do curso"/>
        </div>

        <div class="col-md-4">
            <label for="academicLevel">N&iacute;vel Acad&eacute;mico</label>
            <select name="academicLevel" id="academicLevel" class="form-control form-control-sm">
                <option value="">-- Selecione o n&iacute;vel acad&eacute;mico</option>
                @foreach($academicLevels as $i)
                    <option value="{{ $i->designation }}">{{ $i->designation }}</option>
                @endforeach
            </select>
        </div>

           
    </div>  

    <div class="row mt-3">
        <div class="col-md-4">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control form-control-sm">
                <option value="">-- Selecione o tipo</option>
                <option value="short">Curto</option>
                <option value="long">Longo</option>
            </select>
        </div> 

        <div class="col-md-4">
            <label for="match">Correspond&ecirc;ncia.</label>
            <select name="match" id="match" class="form-control form-control-sm">
                <option value="">-- Selecione uma correspondencia --</option>
                <option value="=">Igual &agrave;</option>
                <option value=">">Maior que</option>
                <option value="<">Menor que</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="duration">Dura&ccedil;&atilde;o (em dias)</label>
            <input type="number" name="duration" id="duration" class="form-control form-control-sm" 
            placeholder="Duracao do curso"/>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-md-3">
            <button type="button" name="search" id="search" class="btn btn-success btn-sm">
                <span data-feather="search"></span> Pesquisar
            </button>
        </div>
    </div>

    <h3 class="h4 mt-5">Lista de Cursos</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="coursesTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Designa&ccedil;&atilde;o</th>
              <th>Instituti&ccedil;&atilde;o</th>
              <th>N&iacute;vel Acad&eacute;mico</th>
              <th>Tipo</th>
              <th>Dura&ccedil;&atilde;o</th>
              <th>Ac&ccedil;&atilde;o</th>
            </tr>
          </thead>
          <tbody>
                
            
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
    <script src="{{ asset('src/js/courses/index.js') }}"></script>
    <script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
    <script src="{{ asset('src/js/script_remove_record_modal_ajax.js') }}"></script>
@endsection
