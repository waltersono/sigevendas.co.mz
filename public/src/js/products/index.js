$('document').ready(function () {

    $('#search').click(search);

    handleDeleteAjax('tableProducts', 'products');

    $('#tableProducts tbody').on('click', '.btn-success', addProduct);

    $('#store').change(getCategoriesByStore);
    $('#store').change(getSuppliersByStore);

});

function getCategoriesByStore() {

    const storeId = $('#store').val();

    const url = '../api/categories/search/' + storeId;

    const categoriesSelect = $('#category');

    $.ajax({
        method: 'GET',
        url: url,
        success: function (data) {

            var category;

            categoriesSelect.html("<option value=''>--- (" + data.length + ") categorias encontradas ---</option>");

            for (var i = 0; i < data.length; i++) {

                category = data[i];

                categoriesSelect.append(
                    "<option value='" + category.id + "'>" + category.designation + "</option>"
                );

            }
        }

    });
}

function getSuppliersByStore() {

    const storeId = $('#store').val();

    const url = '../api/suppliers/search/' + storeId;

    const supplierSelect = $('#supplier');

    $.ajax({
        method: 'GET',
        url: url,
        success: function (data) {

            var supplier;

            supplierSelect.html("<option value=''>--- (" + data.length + ") fornecedores encontrados ---</option>");

            for (var i = 0; i < data.length; i++) {

                supplier = data[i];

                supplierSelect.append(
                    "<option value='" + supplier.id + "'>" + supplier.designation + "</option>"
                );

            }
        }

    });
}

function addProduct() {

    const quantity = $(this).attr('data-quantity');

    const product = $(this).attr('data-product');

    const productId = $(this).attr('data-id');

    $('#current_quantity').val(quantity);

    $('#product').val(product);

    $('#id').val(productId);

}

function search() {

    const store = $('#store').val() == '' ? '*' : $('#store').val();

    const category = $('#category').val() == '' ? '*' : $('#category').val();

    const supplier = $('#supplier').val() == '' ? '*' : $('#supplier').val();

    const url = '../api/products/search/' + store + '/' + category + '/' + supplier;

    const tableBody = $('#tableProducts tbody');

    $('#spinner').css('display', 'block');


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

                    if (data[i].quantity == 0) {

                        tableBody.append("<tr class='bg-secondary'>" +
                            "<td>" + (i + 1) + "</td>" +
                            "<td>" + data[i].store + "</td>" +
                            "<td>" + data[i].category + "</td>" +
                            "<td>" + data[i].supplier + "</td>" +
                            "<td>" + data[i].designation + "</td>" +
                            "<td>" + data[i].quantity + "</td>" +
                            "<td>" + data[i].price + "</td>" +
                            "<td>" +
                            "<button data-id='" + data[i].id + "' data-product='" + data[i].designation + "' data-quantity='" + data[i].quantity + "' class='btn btn-success btn-sm' data-toggle='modal' data-target='#addQuantityModal'>Add</button> " +
                            "<a href='products/" + data[i].id + "' class='btn btn-info btn-sm'>Ver</a> " +
                            "<a href='products/" + data[i].id + "/edit' class='btn btn-warning btn-sm'>Editar</a> " +
                            "<a data-id=" + data[i].id + " id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>" +
                            "</td>" +
                            "</tr>");

                    } else {

                        tableBody.append("<tr>" +
                            "<td>" + (i + 1) + "</td>" +
                            "<td>" + data[i].store + "</td>" +
                            "<td>" + data[i].category + "</td>" +
                            "<td>" + data[i].supplier + "</td>" +
                            "<td>" + data[i].designation + "</td>" +
                            "<td>" + data[i].quantity + "</td>" +
                            "<td>" + data[i].price + "</td>" +
                            "<td>" +
                            "<button data-id='" + data[i].id + "' data-product='" + data[i].designation + "' data-quantity='" + data[i].quantity + "' class='btn btn-success btn-sm' data-toggle='modal' data-target='#addQuantityModal'>Add</button> " +
                            "<a href='products/" + data[i].id + "' class='btn btn-info btn-sm'>Ver</a> " +
                            "<a href='products/" + data[i].id + "/edit' class='btn btn-warning btn-sm'>Editar</a> " +
                            "<a data-id=" + data[i].id + " id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>" +
                            "</td>" +
                            "</tr>");
                    }

                }
            }

        }
    });
}