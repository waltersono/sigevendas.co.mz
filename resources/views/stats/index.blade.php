@extends('layouts.app')
@section('title') Estatisticas @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Estatisticas</h1>
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
        <label for="month">Mes</label>
        <select id="month" class="form-control form-control-sm">
            <option value="">-- Selecione o mes --</option>
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Marco</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
            <option value="07">Julho</option>
            <option value="08">Agosto</option>
            <option value="09">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
    </div>
</div>
<br>

<div class="row mt-2 mb-4">
    <div class="col-md-3">
        <button type="button" name="search" id="search" class="btn btn-secondary btn-sm">
            <span data-feather="search"></span> Pesquisar
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="statsTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Total</th>
                <th>MT</th>
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
<script src="{{ asset('src/js/stats/index.js') }}"></script>
@endsection