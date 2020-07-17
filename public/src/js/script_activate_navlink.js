$("document").ready(function(){
    var uri = window.location.href.split('/');
    uri = uri[3];
    $("#sidebarMenu a[href*='"+uri+"']").each(function(){
        $(".active").removeClass('active');
        $(this).addClass('active');
    });
    
  });