$("document").ready(function(){

    if(isUpdate) {
        listDivisions();
        listRepartitions();
    }
        
    $("document").ready(function(){
        listDivisions();
    });

    $("#central").on('change',listDivisions);

    $("#division_id").on('change',listRepartitions);
});

var isUpdate = window.location.href.endsWith('edit');

function listDivisions(){
    var central = $("#central").val();
    var url = window.location.host + "/";
    var divId = "division_id";
    if(central == 1){

        url = "../../api/departments";

        ajaxRequestDivisions(url,divId);

    }else if(central == 0){

        url = "../../api/delegations";

        ajaxRequestDivisions(url,divId);

    }else if(central == 2){
        $("#division_id").html("<option value=''>-- Selecione a divisao --</option>");
    }
}

function listRepartitions(){
    var central = $("#central").val();
    var division = $("#division_id").val();
    var url = "/api/repartitions/central/" + central + "/division/" + division;
    var divId = "repartition_id";
    if(division == ""){
        $("#repartition_id").html("<option value=''>-- Selecione uma reparticao --</option>");
    }else{
        ajaxRequestRepartitions(url, divId, central);
    }
}

function ajaxRequestRepartitions(url, divId, central){
    $.ajax({
       url: url,
       type: 'GET',
       success:function(data){
            var select = $("#" + divId);
            select.html("");
            select.append("<option value=''>-- "+data.length+" resultado(s) encontrado(s) --</option>");
            for(var i = 0; i < data.length; i++){
                select.append("<option value="+data[i].id+">"+ data[i].designation +"</option>");
            }
            if(isUpdate) $("#" + divId).val($("#hidden" + divId).val())
       } 
    });
}

function ajaxRequestDivisions(url,divId){
    $.ajax({
       url: url,
       type: 'GET',
       success:function(data){
            var select = $("#" + divId);
            select.html("");
            select.append("<option value=''>-- "+data.length+" resultado(s) encontrado(s) --</option>");
            for(var i = 0; i < data.length; i++){
                select.append("<option value="+data[i].id+">"+ data[i].designation +"</option>");
            }
            if(isUpdate) $("#" + divId).val($("#hidden" + divId).val())
       } 
    });
}