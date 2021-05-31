$('document').ready(function () {
    
    $('#search').click(search);

    handleDeleteAjax('categoriesTable', 'categories');

});

function search() {
    
    const storeId = $('#store').val();

    const url = '../api/categories/search/' + storeId;

    const tableBody = $('#categoriesTable tbody');

    $.ajax({
        method: 'GET',
        url: url,
        success: function (data) {
            
            tableBody.html("");

            if (data.length == 0) {

                tableBody.append("<tr>" +
                    "<td colspan='100' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>" +
                    "</t");

            } else if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    tableBody.append("<tr>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + data[i].store + "</td>" +
                        "<td>" + data[i].designation + "</td>" +
                        "<td>" +
                        "<a href='categories/" + data[i].id + "' class='btn btn-info btn-sm'>Ver</a> " +
                        "<a href='categories/" + data[i].id + "/edit' class='btn btn-warning btn-sm'>Editar</a> " +
                        "<a data-id=" + data[i].id + " id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>" +
                        "</td>" +
                        "</tr>");
                }
            }

        }
    });

}