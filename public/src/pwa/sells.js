'use strict'


const storeId = document.querySelector('#storeId').value;

const userId = document.querySelector('#userId').value;

let productsArr = [];

let productsFiltered = [];

let productIds = [];

let quantities = [];

let cart = [];

const date = new Date();

$('document').ready(function () {

    $('#productName').on('keyup', function () {
        searchProduct();
    });
    $('#productsTable tbody').on('click', '.btn-success', addToCart);

    $('#cartTable tbody').on('click', '.btn-danger', removeItem);

    $('#paid').on('keyup', calculateChange);

    $('#btnInvoice').on('click', toInvoice);

    getAllProductsByStore();

    getUserInfo();

    fillProductsArray();

});



function getUserInfo() {

    fetch('api/users/getUserInfo/' + userId)
        .then(function (response) {
            return response.json();
        }).then(function (data) {
            if (data) {
                removeAllData('users');
                writeData('users', data);
            }
        }).catch(function (err) {
            console.log(err, 'Error getting user info');

        })
}

function getAllProductsByStore() {
    fetch('api/sells/getAllProductsByStore/' + storeId)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            if (data.length > 0) {
                removeAllData('products');
                for (let i = 0; i < data.length; i++) {
                    writeData('products', data[i]).catch(err => console.log());
                }
            }
        }).catch(function (err) {
            console.log(err, 'Error getting all products by store');
        })
}


function fillProductsArray() {

    readAllData('products')
        .then(function (data) {
            productsArr = data;
            //console.log(productsArr);

        }).catch(function (err) {
            console.log(err, 'Error reading database products');
        });

}

function searchProduct() {

    var productName = $('#productName').val();

    const tableBody = $('#productsTable tbody');

    if (productName != '') {

        $('#spinner').css('display', 'block');

        tableBody.html("");

        productsFiltered = [];

        for (let i = 0; i < productsArr.length; i++) {

            if (productsArr[i].designation.toUpperCase().includes(productName.toUpperCase())) {

                productsFiltered.push(productsArr[i]);

            }

        }

        $('#spinner').css('display', 'none');


        if (productsFiltered.length == 0) {


            tableBody.append("<tr>" +
                "<td colspan='100' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>" +
                "</t");



        } else if (productsFiltered.length > 0) {
            for (var i = 0; i < productsFiltered.length; i++) {
                if (productsFiltered[i].quantity !== 0) {

                    tableBody.append("<tr>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + productsFiltered[i].designation + "</td>" +
                        "<td>" + productsFiltered[i].quantity + "</td>" +
                        "<td>" + numberWithCommas(productsFiltered[i].price) + "</td>" +
                        "<td><input type='number' min='1' class='form-control form-control-sm' /></td>" +
                        "<td>" +
                        "<button type='button' data-id='" + productsFiltered[i].id + "' data-product='" + productsFiltered[i].designation + "' data-price='" + productsFiltered[i].price + "' class='btn btn-success btn-sm'>Adicionar</button> " +
                        "</td>" +
                        "</tr>");

                } else {

                    tableBody.append("<tr class='bg-secondary'>" +
                        "<td>" + (i + 1) + "</td>" +
                        "<td>" + productsFiltered[i].designation + "</td>" +
                        "<td>" + productsFiltered[i].quantity + "</td>" +
                        "<td>" + numberWithCommas(productsFiltered[i].price) + "</td>" +
                        "<td><input type='number' min='1' class='form-control form-control-sm' /></td>" +
                        "<td>" +
                        "<button disabled class='btn btn-dark btn-sm'>Adicionar</button> " +
                        "</td>" +
                        "</tr>");
                }
            }
        }

    } else {

        tableBody.html("");

    }
}

function addToCart() {

    const productId = $(this).attr('data-id');

    const productName = $(this).attr('data-product');

    const quantity = $(this).parent().prev().children().val();

    const productQuantity = Number($(this).parent().prev().prev().prev().html());

    const price = $(this).attr('data-price');

    const subTotal = quantity * price;

    const tableBody = $('#cartTable tbody');

    if (quantity == '' || quantity == 0 || quantity > productQuantity) {

        $('#errorModal').modal('show');

        $('#errorModalTitle').html('Quantidade invalida!');

    } else {

        tableBody.append("<tr>" +
            "<td><input type='text' disabled class='form-control form-control-plaintext form-control-sm' value='" + productName + "' />" +
            "<input type='hidden' name='productsId[]' class='form-control form-control-sm productIds' value='" + productId + "' /></td>" +
            "<td><input type='number' name='quantities[]' class='form-control form-control-plaintext form-control-sm quantities' value='" + quantity + "' /></td>" +
            "<td><input type='number' disabled class='form-control form-control-plaintext form-control-sm' value='" + price + "' /></td>" +
            "<td><input type='number' disabled class='subTotal form-control form-control-plaintext form-control-sm' value='" + subTotal.toFixed(2) + "' /></td>" +
            "<td>" +
            "<button type='button' class='btn btn-danger btn-sm'>Remover</button> " +
            "</td>" +
            "</tr>");

        let item = {
            productId: productId,
            productName: productName,
            quantity: quantity,
            price: price,
            subTotal: subTotal.toFixed(2)
        }

        cart.push(item);

        console.log(cart);

        calculateTotal();

    }

}

function removeItem() {

    $(this).parent().parent().remove();

    calculateTotal();

}

function calculateTotal() {

    var sum = 0;

    $('#cartTable tbody tr .subTotal').each(function () {

        sum = Number(sum) + Number($(this).val());

    });

    $('#total').html(sum.toFixed(2));

}


function calculateChange() {

    const total = Number($('#total').html());

    const paid = Number($('#paid').val());

    var change = paid - total;

    if (total > 0 && change > -1) {

        $('#change').html(change.toFixed(2));

        $('#checkout').prop('disabled', false);

        $('#hiddenTotal').val(total);
        $('#hiddenChange').val(change);

    } else {

        $('#change').html(0);

        $('#checkout').prop('disabled', true);

    }
}




function toInvoice() {

    saveReceipt();



    saveItems();

}

function saveItems() {
    $('#cartTable tbody .productIds').each(function () {
        productIds.push($(this).val());
    });

    $('#cartTable tbody .quantities').each(function () {
        quantities.push($(this).val());
    });


    for (let i = 0; i < productIds.length; i++) {


        writeData('items', item)
            .then(function () {
                console.log('Items saved to the database successfully');
            })
            .catch(function (err) {
                console.log(err, 'Error saving items to the database');
            });
    }
}

function saveReceipt() {
    const total = Number($('#hiddenTotal').val());

    const paid = Number($('#paid').val());

    const change = Number($('#hiddenChange').val());

    const customerName = $('#customer_name').val();

    let day = date.getDay();

    let month = date.getMonth();

    let year = date.getFullYear();

    let data = {
        paid: paid,
        total: total,
        change: change,
        day: day,
        month: month,
        year: year,
        customerName: customerName,
        userId: userId,
        storeId: storeId
    }

    writeData('receipts', data)
        .then(function (data) {
            console.log('Receipt saved successfully');
        }).catch(function (err) {
            console.log(err, 'Error saving receipt on database');
        });
}










