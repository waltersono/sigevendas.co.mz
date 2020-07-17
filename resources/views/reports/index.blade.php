@extends('layouts.app')
@section('title') Relat&oacute;rios @endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('src/css/reports/index.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Relat&oacute;rios</h1>
    </div>

    <h3 class="h4">Filtro</h3>
    <div class="row">
        <div class="col-md-3">
            <label for="central">Central</label>
            <select name="central" id="central" class="form-control form-control-sm">
                <option value="">-- Selecione uma op&ccedil;&atilde;o</option>
                <option value="1">Sim</option>
                <option value="0">N&atilde;o</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="division_id">Divis&atilde;o</label>
            <select name="division_id" id="division_id" class="form-control form-control-sm">
                <option value="">-- Selecione uma op&ccedil;&atilde;o</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="repartition_id">Reparti&ccedil;&atilde;o</label>
            <select name="repartition_id" id="repartition_id" class="form-control form-control-sm">
                <option value="">-- Selecione uma reparti&ccedil;&atilde;o</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="report_id">Relat&oacute;rio</label>
            <select name="report_id" id="report_id" class="form-control form-control-sm">
                <option value="">-- Selecione uma relat&oacute;rio</option>
                @foreach($reports as $r)
                    <option value="{{ $r->id }}">{{ $r->designation }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button type="button" id="search" class="btn btn-success btn-sm">
                <span data-feather="search"></span> Pesquisar
            </button>
            <button type="button" id="download" class="btn btn-dark btn-sm">
                <span data-feather="download"></span> Descarregar
            </button>
            <button class="btn btn-light btn-sm"><div class="loader"></div></button>
            

        </div>
    </div>

    <div class="row mt-4" id="rowTable">
        <div class="col-md-12">
            <table class="table table-striped table-sm" id="reportsTable1">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>N&iacute;vel</th>
                    <th>Curso</th>
                    <th>Sector</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    
    

@endsection
@section('scripts')
    <script src="{{ asset('src/js/reports/index.js') }}"></script>
@endsection
