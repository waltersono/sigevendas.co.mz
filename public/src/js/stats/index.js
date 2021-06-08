$('document').ready(function () {

    $('#search').click(search);

});

function search() {

    const storeId = checkNull($('#store').val());

    const month = checkNull($('#month').val());

    const tableBody = $('#statsTable tbody');

    const url = 'api/stats/search/' + storeId + '/' + month;

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
                        "<td>" + data[i].product_name + "</td>" +
                        "<td>" + data[i].quantity + "</td>" +
                        "<td>" + data[i].total_cash + "</td>" +
                        "</tr>");

                }

            }

        }
    });
}

