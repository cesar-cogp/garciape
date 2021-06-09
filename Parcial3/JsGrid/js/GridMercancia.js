$('document').ready(function(){
    $.post('./php/GetMercancia.php', function(ret){
        $("#jsGrid").jsGrid({
            width: "100%",
            height: "400px",
            paging: true,         
            data: ret,         
            fields: [
                { name: "codigo", type: "number", title: "Codigo", width: 50, validate:"required"},
                { name: "tipo", type: "text", title: "Tipo",width: 50 },
                { name: "marca", type: "text", title: "Marca",width: 50 },
                { name: "modelo", type: "text", title: "Modelo", width: 50 },
                { name: "descripcion", type: "text", title: "Descripcion", width: 200 },
                { name: "cantidad", type: "number", title: "Cantidad", width: 50 },
                { name: "costo_unitario", type: "number", title: "Costo Unitario", width: 50 },
                { name: "precio_unitario", type: "number", title: "Precio unitario", width: 50 },
                { name: "estatus", type: "text", title: "Estatus", width: 50 }],
       });
    },'json'); 
});