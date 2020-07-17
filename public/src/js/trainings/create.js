var isUpdate = window.location.href.endsWith('edit');
var employeesArray = [];

$("document").ready(function(){
    $("#central").on("change", listDivisions);
    $("#division_id").on("change", listEmployees);
    $("#add").on('click', addEmployee);

    $("#employeesTable tbody").on('click','#finished', function(){
        toggleFinished(this);
    });

    $("#employeesTable tbody").on('click','#remove', function(){
        removeFromTable(this);
    });

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
            if(isUpdate) $("#division_id").val($("#hiddenDivision").val())
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
            if(isUpdate) $("#division_id").val($("#hiddenDivision").val())
        }
    });
}

function addEmployee(){

    var employee = {
        'id': $("#employee_id").val(),
        'name': $("#employee_id").find(':selected').html()
    };

    if(!exists(employee.id)){
        
        employeesArray.push(employee);

        $("#employeesTable tbody").append("<tr>"+
            "<td data-id="+employee.id+"><input type='hidden' name='employees[]' value="+employee.id+" />"+employeesArray.length+"</td>"+
            "<td>"+employee.name+"</td>"+
            "<td>"+
                "<input type='hidden' id='hiddenFinished' name='hiddenFinished[]' value='0'/>"+
                "<a class='btn btn-info btn-sm' id='finished'>Em progresso</a> "+
                "<a id='remove' class='btn btn-danger btn-sm'>Remover</a>"+
            "</td>"+
        "</tr>");

    }else{
        alert("Funcionario duplicado!");
    }
}


function exists(id){
    var exist = false;
    $("#employeesTable tbody td").each(function(){
        var employeeId = $(this).attr('data-id');
        if(employeeId === id){
            exist = true;
        }
    });
    return exist;
}

function toggleFinished(tag){
    if($(tag).html() == 'Em progresso'){
        $(tag).removeClass('btn-info');
        $(tag).addClass('btn-success');
        $(tag).html('Terminou');
        $(tag).siblings('input').val(1);
    }else{
        $(tag).removeClass('btn-success');
        $(tag).addClass('btn-info');
        $(tag).html('Em progresso');
        $(tag).siblings('input').val(0);
    }
}

function removeFromTable(tag){
    $(tag).parent().parent().remove();
}
