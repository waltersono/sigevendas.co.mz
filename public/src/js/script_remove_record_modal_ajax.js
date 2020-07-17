function handleDeleteAjax(tableId, route){
    $("#"+tableId+" tbody").on('click','#btn-remove', function(){
        handleDelete('Confirmar Remocao','Tem certeza que deseja remover este registo?',route,$(this).attr('data-id'));
    });
}