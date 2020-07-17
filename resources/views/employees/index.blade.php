@extends('layouts.app')
@section('title') Funcion&aacute;rios @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Funcion&aacute;rios</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <h3 class="h4">Filtro</h3>
    <div class="row">
        <div class="col-md-4">
            <label for="central">Central</label>
            <select name="central" id="central" class="form-control form-control-sm">
                <option value="2">-- Selecione uma op&ccedil;&atilde;o</option>
                <option value="1">Sim</option>
                <option value="0">N&atilde;o</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="division_id">Divis&atilde;o</label>
            <select name="division_id" id="division_id" class="form-control form-control-sm">
                <option value="">-- Selecione uma op&ccedil;&atilde;o</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="repartition_id">Reparti&ccedil;&atilde;o</label>
            <select name="repartition_id" id="repartition_id" class="form-control form-control-sm">
                <option value="">-- Selecione uma op&ccedil;&atilde;o</option>
            </select>
        </div>
    </div>  
    
    <div class="row mt-3">
        <div class="col-md-3">
            <button type="button" name="pesquisar" id="pesquisar" class="btn btn-success btn-sm">
                <span data-feather="search"></span> Pesquisar
            </button>
        </div>
    </div>

    <h3 class="h4 mt-5">Lista de Funcion&aacute;rios</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm" id="employeesTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Apelido</th>
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
    <script src="{{ asset('src/js/employees/index.js') }}"></script>
    <script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
    <script src="{{ asset('src/js/script_remove_record_modal_ajax.js') }}"></script>
@endsection
