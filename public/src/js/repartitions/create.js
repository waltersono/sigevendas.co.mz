$("document").ready(function(){
    
    if(isUpdate) listDivisions();

    $("#central").on("change", listDivisions);
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

var isUpdate = window.location.href.endsWith('edit');

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