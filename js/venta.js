"use strict";
var l=0;

$(document).on("ready",function(){
    
    $(document).on("keyup change",".precio,.cantidad",function(){
        var fila=$(this).attr("rel");
        var precio=$(".precio[rel="+fila+"]").val();
        var cantidad=$(".cantidad[rel="+fila+"]").val();
        var total=precio*cantidad;
        $(".total[rel="+fila+"]").val(total);
        sumartodo();
    });
    $("#cancelado").keyup(function(){
        var cancelado=$("#cancelado").val();
        var totalg= $("#totalgeneral").val();
        cancelado=parseFloat(cancelado);
        totalg=parseFloat(totalg);
         var cambio = cancelado-totalg;
        $("#cambio").val(cambio);
    });
    
    $("#aumentar").click(function(e){l++;
        e.preventDefault();
        $.post(base_url+"venta/fila",{"l":l},function(data){
            $("#marca").before(data);
        })
    }).click();;
    $(document).on("change",".producto",function(){
        var fila=$(this).attr("rel");
        var cod=$(this).val();
        $.post(base_url+"venta/precio",{"cod":cod},function(data){
           $(".precio[rel="+fila+"]").val(data); 
        });

    });

})
function sumartodo(){
    var total=0;
    var i;
    for(i=1;i<=l;i++){
        total=total+parseFloat($(".total[rel="+i+"]").val())
    }
    

    $("#totalgeneral").val(total);
}