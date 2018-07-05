$(document).ready(function(){
    //Cargar tipos de análisis registrados en base de datos para la selección en recepcion.php
    $.ajax({
        url: "php/controladores/ObtenerTiposDeAnalisis.php",
        method: 'GET',
        dataType: 'json',
        success: function(data, textStatus, jqXHR){
            console.log(data);
            resultado = data;
            $.each(resultado, function(index, value){
                $("#tiposanalisis").append('<div class="form-check">' +
                        '<label class="form-check-label">' +
                        '<input class="form-check-input" type="checkbox" id="chkAnalisis"'+value["id"]+'" value="'+value["id"]+'">' + value["nombre"] +
                        '<span class="form-check-sign">'+
                        '<span class="check"></span></span></label></div>')
            });
        }
    })
    
    $("#btnBuscarCliente").click(function(){
        console.log("Buscando clientes...");
        if ($("#txtBusqueda").val() !== ""){
            $.ajax({
                url: "php/controladores/RecepcionBuscarCliente.php",
                method: 'GET',
                dataType: 'json',
                data: {'q' : $("#txtBusqueda").val()},
                success: function(data, textStatus, jqXHR){
                    console.log("Llenando tabla con resultados...");
                    $resultado = data;
                    $.each($resultado, function(index, value){
                        $("#tabladatos").append('<tr>'+
                                '<td>'+value["codigoid"]+'</td>'+
                                '<td>'+value["rut"]+'</td>'+
                                '<td>'+value["nombre"]+'</td>'+
                                '<td><button type="button" id="btnSeleccionar" class="btn btn-success btn-sm">Seleccionar</button></tr>'  
                                )
                    })
                }
                
            }).fail(function(data, textStatus, jqXHR){
                    console.log(textStatus);
                    console.log(jqXHR);
                })

        }
    })    
});

