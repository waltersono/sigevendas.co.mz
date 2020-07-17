$("document").ready(function(){
    $("#search").on("click", function(){
        var course = checkNull($("#course").val());
        var startDate = checkNull($("#start_date").val());
        var finished = checkNull($("#finished").val());
        var central = checkNull($("#central").val());
        var divisionId = checkNull($("#division_id").val());
        var employeeId = checkNull($("#employee_id").val());
        var url = "api/trainings/";
        url += course + "/";
        url += startDate + "/";
        url += finished + "/";
        url += central + "/";
        url += divisionId + "/";
        url += employeeId;

        ajaxRequestTrainings(url);
    });

    $("#central").on("change", listDivisions);
    $("#division_id").on("change", listEmployees);

});

function ajaxRequestTrainings(url){

    $.ajax({
        url: url,
        type: 'GET',
        success: function(data){
            var tableBody = $("#trainingsTable tbody");
            tableBody.html("");
            console.log(data);
            if(data.length == 0){
                tableBody.append("<tr>"+
                "<td colspan='7' class='text-center font-weight-bold'>Nenhum resultado encontrado</td>"+
                "</t");
            }else if(data.length > 0){
                for(var i = 0; i < data.length; i++){
                    tableBody.append("<tr>"+
                    "<td>"+(i+1)+"</td>"+
                    "<td>"+data[i].course+"</td>"+
                    "<td>"+data[i].start_date+"</td>"+
                    "<td>"+data[i].duration+"</td>"+
                    "<td>"+data[i].name+" "+data[i].surname+"</td>"+
                    "<td>"+handleFinished(data[i].finished)+"</td>"+
                    "<td>"+
                        "<a href='trainings/"+data[i].id+"/edit' class='btn btn-warning btn-sm'>Editar</a> "+
                    "</td>"+
                    "</t");
                }
            }
        }
    });
}

function handleFinished(finished){
    if(finished){
        return "<span class='badge badge-success badge-sm'>Terminou</span>";
    }else{
        return "<span class='badge badge-info badge-sm'>Em progresso</span>";
    }
}

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

function listEmployees(){
    var central = $("#central").val();
    var urlDepartment = "../../api/employees/department/" + $("#division_id").val();
    var urlDelegation = "../../api/employees/delegation/" + $("#division_id").val();
    var divId = "employee_id";
    if(central == 1){
        ajaxRequestEmployees(urlDepartment, divId);
    }else if(central == 0){
        ajaxRequestEmployees(urlDelegation, divId);
    }
}

function ajaxRequestEmployees(url, divId){
    $.ajax({
        url: url,
        type: "GET",
        success:function(data){
            var select = $("#" + divId);
            select.html("<option value=''>--"+data.length+" resultados encontrados --</option>");
            for(var i = 0; i < data.length; i++){
                select.append("<option value="+data[i].id+">"+data[i].name+" "+data[i].surname+"</option>")
            }
        }
    });
}


function checkNull(value){
    if(value == ""){
        return "%%";
    }
    return value;
}