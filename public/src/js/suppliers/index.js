$('document').ready(function () {

    $('#search').click(search);

    handleDeleteAjax('suppliersTable', 'suppliers');

});

function search() {

    const storeId = $('#store').val();

    const url = '../api/suppliers/search/' + storeId;

    const tableBody = $('#suppliersTable tbody');

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
                        "<td>" + data[i].contact + "</td>" +
                        "<td>" + data[i].email + "</td>" +
                        "<td>" +
                        "<a href='suppliers/" + data[i].id + "' class='btn btn-info btn-sm'>Ver</a> " +
                        "<a href='suppliers/" + data[i].id + "/edit' class='btn btn-warning btn-sm'>Editar</a> " +
                        "<a data-id=" + data[i].id + " id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>" +
                        "</td>" +
                        "</tr>");
                }
            }

        }
    });

}