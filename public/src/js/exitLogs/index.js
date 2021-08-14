$('document').ready(function () {

    $('#search').click(search);

});

function search() {

    const storeId = checkNull($('#store').val());

    const day = checkNull($('#day').val());

    const month = checkNull($('#month').val());

    const year = checkNull($('#year').val());

    const tableBody = $('#entranceLogsTable tbody');

    const url = 'api/exitLogs/search/' + storeId + '/' + day + '/' + month + '/' + year;

    $.ajax({
        url: url,
        type: 'GET',
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
                        "<td>" + data[i].product_name + "</td>" +
                        "<td>" + data[i].supplier_name + "</td>" +
                        "<td>" + data[i].product_price + "</td>" +
                        "<td>" + data[i].quantity + "</td>" +
                        "<td>" + data[i].discount + "</td>" +
                        "<td>" + data[i].sub_total + "</td>" +
                        "</tr>");

                }
            }
        }
    });

}