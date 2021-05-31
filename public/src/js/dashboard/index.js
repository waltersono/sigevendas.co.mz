$('document').ready(function () {
    
    $('#storeId').click(getData);


});

var data

function getData() {
    
    const storeId = $('#storeId').attr('data-id');

    const url = '../api/dashboard/' + storeId;

    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            
            mainGraph(data);

        }
    });
}


function mainGraph(data) {

    //'use strict'


    var ctx = document.getElementById('myChart')

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Segunda',
                'Terca',
                'Quarta',
                'Quinta',
                'Sexta',
                'Sabado',
                'Domingo'
            ],
            datasets: [{
                data: [
                    data.monday,
                    data.tuesday,
                    data.wednesday,
                    data.thursday,
                    data.saturday,
                    data.sunday,
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
}