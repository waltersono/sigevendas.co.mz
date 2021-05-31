$('document').ready(function () {
    
    $('#search').click(search);

});

function search() {
    
    const storeId = checkNull($('#store').val());

    const day = checkNull($('#day').val());

    const month = checkNull($('#month').val());

    const year = checkNull($('#year').val());

    const tableBody = $('#entranceLogsTable tbody');

    const url = 'api/entranceLogs/search/' + storeId + '/' + day + '/' + month + '/' + year;

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
                        "<td>" + data[i].created_at + "</td>" +
                        "<td>" + data[i].product_category + "</td>" +
                        "<td>" + data[i].product_name + "</td>" +
                        "<td>" + data[i].old_quantity + "</td>" +
                        "<td>" + data[i].add_quantity + "</td>" +
                        "<td>" + data[i].new_quantity + "</td>" +
                        "</tr>");

                }
            }
        }
    });

}