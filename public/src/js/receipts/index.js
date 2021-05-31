$('document').ready(function () {
    
    $('#search').click(search);

});

function search() {
    
    var total = 0;

    var totalPaid = 0;

    var totalChange = 0;

    const storeId = checkNull($('#store').val());

    const operatorId = checkNull($('#operator').val());

    const day = checkNull($('#day').val());

    const month = checkNull($('#month').val());

    const year = checkNull($('#year').val());

    const tableBody = $('#receiptsTable tbody');

    const url = 'api/receipts/search/' + storeId + '/' + operatorId + '/' + day + '/' + month + '/' + year;

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

                    total = Number(total) + Number(data[i].total);
                    totalPaid = Number(totalPaid) + Number(data[i].paid);
                    totalChange = Number(totalChange) + Number(data[i].change);

                    tableBody.append("<tr>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td><a target='_blank' href='items/receipt/" + data[i].ID + "' >" + data[i].ID + "</a></td>" +
                        "<td>" + data[i].created_at + "</td>" +
                        "<td>" + data[i].store + "</td>" +
                        "<td>" + data[i].operator + "</td>" +
                        "<td>" + numberWithCommas(data[i].total) + "</td>" +
                        "<td>" + numberWithCommas(data[i].paid) + "</td>" +
                        "<td>" + numberWithCommas(data[i].change) + "</td>" +
                        "<td>" + data[i].customer_name + "</td>"+
                        "</tr>");

                    
                }

                tableBody.append("<tr>" +
                    "<td colspan='5' class='font-weight-bold text-center'>Total</td>" +
                    "<td class='font-weight-bold'>" + numberWithCommas(total.toFixed(2)) + "</td>" +
                    "<td class='font-weight-bold'>" + numberWithCommas(totalPaid.toFixed(2)) + "</td>" +
                    "<td class='font-weight-bold'>" + numberWithCommas(totalChange.toFixed(2)) + "</td>" +
                    "<td class='font-weight-bold'></td>" +
                    "</tr>");

            }

        }
    });
}

