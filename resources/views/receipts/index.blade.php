@extends('layouts.app')
@section('title') Recibos @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Recibos</h1>
</div>

<h3 class="h4">Filtro</h3>
<div class="row">
    <div class="col-md-6">
        <label for="store">Estabelecimento</label>
        <select name="store" id="store" class="form-control form-control-sm">
            <option value="">-- Selecione o estabelecimento --</option>
            @foreach($stores as $i)
            <option value="{{ $i->id }}">{{ $i->designation }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="operator">Operador</label>
        <select name="operator" id="operator" class="form-control form-control-sm">
            <option value="">-- Selecione o operador --</option>
            @foreach($operators as $i)
            <option value="{{ $i->id }}">{{ $i->name }}</option>
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
    <table class="table table-striped table-sm" id="receiptsTable">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Data/Hora</th>
                <th>Estabelecimento</th>
                <th>Operador</th>
                <th>Total <strong>(MT)</strong></th>
                <th>Pago <strong>(MT)</strong></th>
                <th>Troco <strong>(MT)</strong></th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; ?>
            <tr>
                <td colspan="10" class="text-center font-weight-bold">Pesquisa com os filtros acima</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script src="{{ asset('src/js/receipts/index.js') }}"></script>
@endsection