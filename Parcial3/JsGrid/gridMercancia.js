$('document').ready(function(){
    $.post('obtenerMercancia.php', function(resultado){
        $("#jsGrid").jsGrid({
            height: "90%",
            width: "100%",
     
            //sorting: true,
            paging: true,
     
            data: resultado,
     
            fields: [
                { name: "codigo", type: "number", title: "Codigo", width: 50, validate:"required"},
                { name: "tipo", type: "text", title: "Tipo",width: 50 },
                { name: "marca", type: "text", title: "Marca",width: 50 },
                { name: "modelo", type: "text", title: "Modelo", width: 50 },
                { name: "descripcion", type: "text", title: "Descripcion", width: 200 },
                { name: "cantidad", type: "number", title: "Cantidad", width: 50 },
                { name: "costo_unitario", type: "number", title: "Costo Unitario", width: 50 },
                { name: "precio_unitario", type: "number", title: "Precio unitario", width: 50 },
                { name: "estatus", type: "text", title: "Estatus", width: 50 }
            ]
        });    
    }); 
});