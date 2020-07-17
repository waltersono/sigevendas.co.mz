$("document").ready(function(){
    $("#search").on("click", function(){
        var designation = checkNull($("#designation").val());
        var institution = checkNull($("#institution").val());
        var academicLevel = checkNull($("#academicLevel").val());
        var type = checkNull($("#type").val());
        var match = checkNull($("#match").val());
        var duration = checkNull($("#duration").val());
        var url = "api/courses/";
        url += designation + "/";
        url += type + "/";
        url += match + "/";
        url += duration + "/";
        url += institution + "/";
        url += academicLevel;

        ajaxRequest(url);
    });

    handleDeleteAjax('coursesTable','courses');
});

function checkNull(value){
    if(value == ""){
        return "%%";
    }
    return value;
}

function ajaxRequest(url){

    $.ajax({
        url: url,
        type: 'GET',
        success: function(data){
            var tableBody = $("#coursesTable tbody");
            tableBody.html("");
            if(data.length == 0){
                tableBody.append("<tr>"+
                "<td colspan='7' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>"+
                "</t");
            }else if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    tableBody.append("<tr>"+
                    "<td>"+(i+1)+"</td>"+
                    "<td>"+data[i].designation+"</td>"+
                    "<td>"+data[i].institution+"</td>"+
                    "<td>"+data[i].academicLevel+"</td>"+
                    "<td>"+handleType(data[i].type)+"</td>"+
                    "<td>"+data[i].duration+"</td>"+
                    "<td>"+
                        "<a href='courses/"+data[i].id+"' class='btn btn-info btn-sm'>Ver</a> "+
                        "<a href='courses/"+data[i].id+"/edit' class='btn btn-warning btn-sm'>Editar</a> "+
                        "<a data-id="+data[i].id+" id='btn-remove' data-toggle='modal' data-target='#exampleModal' class='btn btn-danger btn-sm'>Remover</a>"+
                    "</td>"+
                    "</t");
                }
            }
        }
    });
}

function handleType(type){
    return (type == "short") ? "Curto" : "Longo";
}