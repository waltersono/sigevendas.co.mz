$("document").ready(function(){
    
    $("#central").on("change", function(){
        listDivisions();
    });

    $("#search").on("click",function(){
        var url = "";

        if($("#division_id").val() == ""){
            url = "api/repartitions/central/" + $("#central").val();
        }else{
            url = "api/repartitions/central/" + $("#central").val() + "/division/" + $("#division_id").val();
        }
        
        ajaxRequestRepartitions(url);
    });

    handleDeleteAjax('repartitionsTable','repartitions');
});

function listDivisions(){
    var url = "";
    var central = $("#central").val();
    if(central == 1){
        url = "../../api/departments";
    }else if(central == 0){
        url = "../../api/delegations";
    }
    var divId = "division_id";
    ajaxRequestDivisions(url, divId);
}


function ajaxRequestDivisions(url,divId){
    $.ajax({
        url: url,
        type: "GET",
        success:function(data){
            var select = $("#" + divId);
            select.html("<option value=''>--"+data.length+" resultados encontrados --</option>");
            for(var i = 0; i < data.length; i++){
                select.append("<option value="+data[i].id+">"+data[i].designation+"</option>")
            }
        }
    });
}

function ajaxRequestRepartitions(url){
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            var tableBody = $("#repartitionsTable tbody");
            tableBody.html("");
            if(data.length == 0){
                tableBody.append("<tr>"+
                "<td colspan='5' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>"+
                "</t");
            }else if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    tableBody.append("<tr>"+
                    "<td>"+(i+1)+"</td>"+
                    "<td>"+data[i].designation+"</td>"+
                    "<td>"+data[i].division+"</td>"+
                    "<td>"+handleEmployeeName(data[i].name)+" "+ handleEmployeeName(data[i].surname)+"</td>"+
                    "<td>"+
                        "<a href='repartitions/"+data[i].id+"' class='btn btn-info btn-sm'>Ver</a> "+
                        "<a href='repartitions/"+data[i].id+"/edit' class='btn btn-warning btn-sm'>Editar</a> "+
                        "<a data-id="+data[i].id+" id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>"+
                    "</td>"+
                    "</t");
                }
            }
        }
    });
}

function handleEmployeeName(data){
    return (data == null) ? "" : data;
}

