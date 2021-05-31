function handleDelete(title, message, route, id){
    $('#exampleModal').modal('show');
    $('.modal-title').html(title);
    $('.modal-body').html(message);
    $('#exampleModal .btn-primary').addClass('btn-danger');
    var form = document.querySelector('#deleteModalForm');
    form.action = '/' + route + '/' + id;
}