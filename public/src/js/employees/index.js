$("document").ready(function(){

    $("#central").on("change", function(){
        listDivisions();
    });

    $("#division_id").on("change", function(){
        var central = $("#central").val();
        var division = $("#division_id").val();
        var url = "../api/repartitions/central/" + central + "/division/" + division;
        var divId = "repartition_id";
        ajaxRequestRepartitions(url, divId);
    });

    $("#pesquisar").on("click",function(){
        var urlRepartition = "api/employees/" + $("#repartition_id").val();
        var urlCentral = "api/employees/central/" + $("#central").val();
        var urlDepartment = "api/employees/department/" + $("#division_id").val();
        var urlDelegation = "api/employees/delegation/" + $("#division_id").val();

        if($("#central").val() != "" && $("#division_id").val() == ""){
            ajaxRequestEmployee(urlCentral);
        }else if($("#central").val() != "" && $("#division_id").val() != "" && $("#repartition_id").val() == ""){
            if($("#central").val() == "1"){
                ajaxRequestEmployee(urlDepartment);
            }else if($("#central").val() == "0"){
                ajaxRequestEmployee(urlDelegation);
            }
        }else if($("#central").val() != "" && $("#division_id").val() != "" && $("#repartition_id").val() !=""){
            ajaxRequestEmployee(urlRepartition);
        }
    });

    handleDeleteAjax('employeesTable','employees');

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

function ajaxRequestRepartitions(url,divId){
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

function ajaxRequestEmployee(url){
    $.ajax({
        url: url,
        type: "GET",
        success: function(data){
            var tableBody = $("#employeesTable tbody");
            tableBody.html("");
            if(data.length == 0){
                tableBody.append("<tr>"+
                "<td colspan='4' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>"+
                "</t");
            }else if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    tableBody.append("<tr>"+
                    "<td>"+(i+1)+"</td>"+
                    "<td>"+data[i].name+"</td>"+
                    "<td>"+data[i].surname+"</td>"+
                    "<td>"+
                        "<a href='employees/"+data[i].id+"' class='btn btn-info btn-sm'>Ver</a> "+
                        "<a href='employees/"+data[i].id+"/edit' class='btn btn-warning btn-sm'>Editar</a> "+
                        "<a data-id="+data[i].id+" id='btn-remove' class='btn btn-danger btn-sm'>Remover</a>"+
                    "</td>"+
                    "</t");
                }
            }
        }
    });
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

