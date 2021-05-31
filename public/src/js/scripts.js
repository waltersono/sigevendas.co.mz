function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function checkNull(data) {
    if (data == '') {
        return '*';
    }
    return data;
}