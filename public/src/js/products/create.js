var isUpdate;

$('document').ready(function () {

    isUpdate = window.location.href.endsWith('edit');

    if (isUpdate) {
        getCategoriesByStore();
        getSuppliersByStore();
    }


    $('#store').change(getCategoriesByStore);
    $('#store').change(getSuppliersByStore);

});

function getSuppliersByStore() {
    const storeId = $('#store').val();

    const url = '../../api/suppliers/search/' + storeId;

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

            if (isUpdate) supplierSelect.val($('#supplier_id').val());

        }

    });
}


function getCategoriesByStore() {

    const storeId = $('#store').val();

    const url = '../../api/categories/search/' + storeId;

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

            if (isUpdate) categoriesSelect.val($('#category_id').val());

        }

    });
}