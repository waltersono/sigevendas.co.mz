<div class="modal fade" id="addQuantityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Quantidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.add') }}" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="product" class="col-sm-4 col-form-label font-weight-bold">Produto:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="product" name="product">
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current_quantity" class="col-sm-4 col-form-label font-weight-bold">Qtd Actual:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="current_quantity" name="current_quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_quantity" class="col-sm-4 col-form-label font-weight-bold">Quantidade:</label>
                        <div class="col-sm-8">
                            <input type="number" name="add_quantity" id="add_quantity" class="form-control form-control-sm" placeholder="Introduza a quantidade">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">N&atilde;o</button>
                    <button type="submit" class="btn btn-warning  btn-sm">Adicionar</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>