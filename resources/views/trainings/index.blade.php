@extends('layouts.app')
@section('title') Forma&ccedil;&otilde;es @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Forma&ccedil;&otilde;es</h1>
        <a href="{{ route('trainings.create') }}" class="btn btn-success btn-sm float-right">
        <span data-feather="plus"></span> Adicionar
        </a>
    </div>

    <h3 class="h4">Filtro</h3>
    <div class="row">
        <div class="col-md-4">
            <label for="course">Curso</label>
            <input name="course" id="course" class="form-control form-control-sm" 
            placeholder="Nome do curso"/>
        </div>

        <div class="col-md-4">
            <label for="start_date">Data de inicio</label>
            <input type="date" name="start_date" id="start_date" class="form-control form-control-sm"/>
        </div>

        <div class="col-md-4">
            <label for="finished">Situa&ccedil;&atilde;o</label>
            <select name="finished" id="finished" class="form-control form-control-sm">
                <option value="">-- Selecione a situa&ccedil;&atilde;o --</option>
                <option value="1">Sim</option>
                <option value="0">Nao</option>
            </select>
        </div>
    </div> 
    <div class="row mt-4">
        <div class="col-md-4">
            <label for="central">Central</label>
            <select name="central" id="central" class="form-control form-control-sm">
                <option value="">-- Selecione o n&iacute;vel --</option>
                <option value="1">Sim</option>
                <option value="0">N&atilde;o</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="division_id">Departamento/Delega&ccedil;&atilde;o</label>
            <input type="hidden" name="hiddenDivision" id="hiddenDivision" value="{{ isset($repartition) ? $repartition->division_id : "" }}">
            <select name="division_id" id="division_id" class="form-control form-control-sm">
                <option value="">-- Selecione o departamento/delega&ccedil;&atilde;o --</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="employee_id">Funcion&aacute;rio</label>
            <select name="employee_id" id="employee_id" class="form-control form-control-sm">
                <option value="">-- Selecione um funcion&aacute;rio --</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <button type="button" name="search" id="search" class="btn btn-success btn-sm">
                <span data-feather="search"></span> Pesquisar
            </button>
        </div>
    </div>
    
    <h3 class="h4 mt-5">Lista de Forma&ccedil;&otilde;es</h3>

    <div class="table-responsive">
        <table class="table table-striped table-sm" id="trainingsTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Curso</th>
              <th>Data Inicio</th>
              <th>Dura&ccedil;&atilde;o</th>
              <th>Funcion&aacute;rio</th>
              <th>Situa&ccedil;&atilde;o</th>
              <th>Ac&ccedil;&atilde;o</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
<script src="{{ asset('src/js/trainings/index.js') }}"></script>

@endsection
