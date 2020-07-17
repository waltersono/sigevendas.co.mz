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

    $("#search").on('click',function(){
        $(".loader").css("display","block");
        $("#rowTable").css("display","none");
        var central = checkNull($("#central").val());
        var divsionId = checkNull($("#division_id").val());
        var repartitionId = checkNull($("#repartition_id").val());
        var reportId = checkNull($("#report_id").val());
        var url = "../api/reports/" + central + "/" + divsionId + "/" + repartitionId + "/" + reportId;
        ajaxRequestReport(url, reportId);
    });

    $("#download").on('click',function(){
        $(".loader").css("display","block");
        var central = checkNull($("#central").val());
        var divsionId = checkNull($("#division_id").val());
        var repartitionId = checkNull($("#repartition_id").val());
        var reportId = checkNull($("#report_id").val());
        var url = "../api/download/reports/" + central + "/" + divsionId + "/" + repartitionId + "/" + reportId;
        ajaxRequestDownloadReport(url, reportId);
    });


});

function ajaxRequestDownloadReport(url, reportId){
    $.ajax({
        url: url,
        type: 'GET',
        success:function(data){
        $(".loader").css("display","block");

        }
    });
}

function ajaxRequestReport(url, reportId){
    $.ajax({
        url: url,
        type: 'GET',
        success:function(data){
            $("#rowTable").css("display","block");
            $(".loader").css("display","none");
            printReport1(data);
        }
    });
}

function printReport1(data){
    var table = $("#reportsTable1 tbody");
    table.html("");
    if(data.length > 0){
        for(var i = 0; i < data.length; i++){
            table.append("<tr>" + 
                "<td>"+(i+1)+"</td>"+
                "<td>"+data[i].name+" "+data[i].surname+"</td>"+
                "<td>"+data[i].academicLevel+"</td>"+
                "<td>"+handleCourse(data[i].course)+"</td>"+
                "<td>"+handleSector(data[i])+"</td>"+
            "</tr>");
        }
    }else{
        table.append("<tr><td colspan='5' class='text-center'><strong>Nenhum resultado encontrado!</strong></td></tr>")
    }
}

function handleCourse(course){
    return (course == null) ? "N/A" : course;
}

function handleSector(data){
    if(data.repartition == null){
        if(data.id == data.deputy_id){
            return "Delegado(a)";
        }else{
            return "N/A";
        }
    }else{
        return data.repartition;
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


function checkNull(value){
    if(value == ""){
        return "%%";
    }
    return value;
}
