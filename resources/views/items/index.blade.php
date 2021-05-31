@extends('layouts.app')
@section('title') Itens @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Itens</h1>
</div>

<h3 class="h5">Recibo Ref.{{ $receipt->ID }}</h3>

<div class="table-responsive mb-2">
    <table class="table table-striped table-sm" id="tableProducts">
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
                <td>{{ ++$index }}</td>
                <td>{{ $receipt->ID }}</td>
                <td>{{ $receipt->created_at }}</td>
                <td>{{ $receipt->store }}</td>
                <td>{{ $receipt->operator }}</td>
                <td>{{ $receipt->total }}</td>
                <td>{{ $receipt->paid }}</td>
                <td>{{ $receipt->change }}</td>
                <td>{{ $receipt->customer_name }}</td>
            </tr>
        </tbody>
    </table>
</div>


<h3 class="h5">Lista de Itens</h3>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="tableProducts">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Preco</th>
                <th>Quantidade</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0; ?>
            @foreach($items as $i)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $i->product_name }}</td>
                <td>{{ $i->product_price }}</td>
                <td>{{ $i->quantity }}</td>
                <td>{{ $i->sub_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
@endsection