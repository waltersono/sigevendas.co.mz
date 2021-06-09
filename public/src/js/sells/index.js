$('document').ready(function () {

    $('#productName').on('keyup', searchProduct);

    $('#productsTable tbody').on('click', '.btn-success', addToCart);

    $('#cartTable tbody').on('click', '.btn-danger', removeItem);

    $('#paid').on('keyup', calculateChange);

});

function calculateTotal() {

    var sum = 0;

    $('#cartTable tbody tr .subTotal').each(function () {

        sum = Number(sum) + Number($(this).val());

    });

    $('#total').html(sum.toFixed(2));

}

function calculateChange() {

    const total = Number($('#total').html());

    const paid = Number($('#paid').val());

    var change = paid - total;

    if (total > 0 && change > -1) {

        $('#change').html(change.toFixed(2));

        $('#checkout').prop('disabled', false);

        $('#hiddenTotal').val(total);
        $('#hiddenChange').val(change);

    } else {

        $('#change').html(0);

        $('#checkout').prop('disabled', true);

    }
}

function addToCart() {

    const productId = $(this).attr('data-id');

    const productName = $(this).attr('data-product');

    const quantity = $(this).parent().prev().children().val();

    const productQuantity = Number($(this).parent().prev().prev().prev().html());

    const price = $(this).attr('data-price');

    const subTotal = quantity * price;

    const tableBody = $('#cartTable tbody');

    if (quantity == '' || quantity == 0 || quantity > productQuantity) {

        $('#errorModal').modal('show');

        $('#errorModalTitle').html('Quantidade invalida!');

    } else {

        tableBody.append("<tr>" +
            "<td><input type='text' disabled class='form-control form-control-plaintext form-control-sm' value='" + productName + "' />" +
            "<input type='hidden' name='productsId[]' class='form-control form-control-sm productIds' value='" + productId + "' /></td>" +
            "<td><input type='number' name='quantities[]' class='form-control form-control-plaintext form-control-sm quantities' value='" + quantity + "' /></td>" +
            "<td><input type='number' disabled class='form-control form-control-plaintext form-control-sm' value='" + price + "' /></td>" +
            "<td><input type='number' disabled class='subTotal form-control form-control-plaintext form-control-sm' value='" + subTotal.toFixed(2) + "' /></td>" +
            "<td>" +
            "<button type='button' class='btn btn-danger btn-sm'>Remover</button> " +
            "</td>" +
            "</tr>");

        calculateTotal();

    }

}

function removeItem() {

    $(this).parent().parent().remove();

    calculateTotal();

}

function searchProduct() {

    var productName = $('#productName').val();

    const storeId = $('#storeId').val();

    const tableBody = $('#productsTable tbody');

    if (productName != '') {

        $('#spinner').css('display', 'block');

        var url = '../api/sells/searchProduct/' + productName + '/' + storeId;

        $.ajax({
            method: 'GET',
            url: url,
            success: function (data) {

                tableBody.html("");

                $('#spinner').css('display', 'none');


                if (data.length == 0) {

                    tableBody.append("<tr>" +
                        "<td colspan='100' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>" +
                        "</t");

                } else if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].quantity !== 0) {

                            tableBody.append("<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + data[i].designation + "</td>" +
                                "<td>" + data[i].quantity + "</td>" +
                                "<td>" + numberWithCommas(data[i].price) + "</td>" +
                                "<td><input type='number' min='1' class='form-control form-control-sm' /></td>" +
                                "<td>" +
                                "<button type='button' data-id='" + data[i].id + "' data-product='" + data[i].designation + "' data-price='" + data[i].price + "' class='btn btn-success btn-sm'>Adicionar</button> " +
                                "</td>" +
                                "</tr>");

                        } else {

                            tableBody.append("<tr class='bg-secondary'>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + data[i].designation + "</td>" +
                                "<td>" + data[i].quantity + "</td>" +
                                "<td>" + numberWithCommas(data[i].price) + "</td>" +
                                "<td><input type='number' min='1' class='form-control form-control-sm' /></td>" +
                                "<td>" +
                                "<button disabled class='btn btn-dark btn-sm'>Adicionar</button> " +
                                "</td>" +
                                "</tr>");
                        }
                    }
                }
            }
        });
    } else {

        tableBody.html("");

    }
}