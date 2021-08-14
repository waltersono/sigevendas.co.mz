@extends('layouts.app')
@section('title') Vendas - {{ isset($store->designation) ? $store->designation : '' }} @endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas - {{ isset($store->designation) ? $store->designation : '' }}</h1>
    <input type="hidden" id="storeId" value="{{ Auth::user()->store_id }}">
    <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
</div>
<form action="{{ route('sells.checkout') }}" method="POST">

    <div class="row border mx-auto p-2 mb-3">

        <div class="col-md-4">
            <div class="form-group row mb-2">
                <label for="product" class="col-sm-3 col-form-label font-weight-bold">Pago:</label>
                <div class="col-sm-8">
                    <input type="number" name="paid" id="paid" class="form-control form-control-sm h4 font-weight-bold" />
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row mb-2">
                <label for="product" class="col-sm-3 col-form-label font-weight-bold">A Pagar:</label>
                <div class="col-sm-8">
                    <label id="total" class="h4 font-weight-bold">0</label><span class="h4 font-weight-bold">MT</span>
                    <input type="hidden" name="hiddenTotal" id="hiddenTotal">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row mb-2">
                <label for="product" class="col-sm-3 col-form-label font-weight-bold">Troco:</label>
                <div class="col-sm-8">
                    <label id="change" class="h4 font-weight-bold">0</label><span class="h4 font-weight-bold">MT</span>
                    <input type="hidden" name="hiddenChange" id="hiddenChange">
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <button type="button" class="btn btn-info btn-block" disabled id="checkout" data-toggle="modal" data-target="#receiptModal">Facturar</button>
        </div>
    </div>

    <div class="row border p-2">
        <div class="col-md-6">
            <div class="form-group row mb-2">
                <label for="product" class="col-sm-2 col-form-label font-weight-bold">Produto:</label>
                <div class="col-sm-8">
                    <input type="text" id="productName" class="form-control form-control-sm" placeholder="Digite o produto...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="productsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Pre&ccedil;o <strong>(MT)</strong></th>
                                    <th>Desconto (%)</th>
                                    <th>Qtd a adicionar</th>
                                    <th>Ac&ccedil;&atilde;o</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
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
        </div>

        <div class="col-md-6">
            <div class="row mb-2">
                <div class="col-md-12">
                    <label for="product" class="col-sm-2 col-form-label font-weight-bold">Carrinho:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="cartTable">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Pre&ccedil;o <strong>(MT)</strong></th>
                                    <th>Desconto (%)</th>
                                    <th>Sub Total <strong>(MT)</strong></th>
                                    <th>Ac&ccedil;&atilde;o</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        @csrf
                        @include('partials.receipt')
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('partials.error')
@endsection
@section('scripts')
<script src="{{ asset('src/js/sells/index.js') }}"></script>
<!-- <script src="{{ asset('src/pwa/sells.js') }}"></script> -->
@endsection