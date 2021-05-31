<div class="modal fade bd-example-modal-sm" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Confirmar Factura&ccedil;&atilde;o</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold">Tem certeza que deseja facturar?</p>
                <input type="text" name="customer_name" id="customer_name" class="form-control form-control-sm" placeholder="Nome do cliente" value="Sem nome" />
                <!-- <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="printReceipt" name="printReceipt">
                    <label class="form-check-label" for="printReceipt">Imprimir Recibo</label>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-sm">Sim</button>
            </div>
        </div>
    </div>
</div>