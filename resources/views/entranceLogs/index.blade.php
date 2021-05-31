@extends('layouts.app')
@section('title') Entradas @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Entradas</h1>
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
<br>
<div class="row">
    <div class="col-md-4">
        <label for="day">Dia</label>
        <input type="number" id="day" class="form-control form-control-sm" placeholder="Dia" min="1" max="31">
    </div>
    <div class="col-md-4">
        <label for="month">Mes</label>
        <select id="month" class="form-control form-control-sm">
            <option value="">-- Selecione o mes --</option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Marco</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="year">Ano</label>
        <select id="year" class="form-control form-control-sm">
            <option value="">-- Selecione o ano --</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
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
    <table class="table table-striped table-sm" id="entranceLogsTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Data/Hora</th>
                <th>Categoria</th>
                <th>Produto</th>
                <th>Qtd Anterior</th>
                <th>Qtd Adicionada</th>
                <th>Qtd Recente</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <div class="spinner-border" id="spinner" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/entranceLogs/index.js') }}"></script>
<script src="{{ asset('src/js/script_remove_record_modal.js') }}"></script>
<script src="{{ asset('src/js/script_remove_record_modal_ajax.js') }}"></script>
@endsection