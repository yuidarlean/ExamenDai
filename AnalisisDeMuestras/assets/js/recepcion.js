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
                        '<input class="form-check-input" type="checkbox" id="chkAnalisis'+value["id"]+'" value="'+value["id"]+'">' + value["nombre"] +
                        '<span class="form-check-sign">'+
                        '<span class="check"></span></span></label></div>')
            });
        }
    })
    
    $("#btnRegistrar").click(function(){
        
        var v = $("#frmNuevaMuestra").valid();
        if(!v){
            return false;
        }
        var validarCheck = false;
        
        var checks = new Array();
        i = 0;
        $('input[type=checkbox]:checked').each(function(){
            console.log("Seleccionado " + $(this).prop("id") + " (" + $(this).val() +") Seleccionado");
            checks[i]=$(this).val();
            i++;
            validarCheck = true;
        })
        if (!validarCheck){
            $("#mensajechecked").html("Debe seleccionar a lo menos un an&aacute;lisis a realizar a las muestras.");
            return false;
        }
        $.ajax({
            url: "php/controladores/RecepcionIngresarMuestras.php",
            method: 'POST',
            dataType: 'json',
            data: {'fecharecepcion' : $("#txtFechaRecepcion").val(), 'temperaturamuestra' : $("#txtTemperatura").val(),
            'cantidadmuestra' : $("#txtCantidad").val(), 'codigocliente' : $("#txtCodigoCliente").val(),
            'codigomuestras' : checks},
        success: function(data, textStatus, jqXHR){
            $resultado = data;
            if($resultado["resultado"]!=0){
                $("#modalRegistroOK p").html("Se han registrado la muestras satisfactoriamente. El c&oacute;digo generado del registro es el siguiente: <strong>"+$resultado["resultado"]+"</strong>");
                $("#modalRegistroOK").modal("show");
            }
        }
        })
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
                    if ($resultado == ""){
                        $("#tabladatos").html('<tr colspan="1"><td class="text-center">No existen registros coincidentes.</td></tr>');
                    }
                    $.each($resultado, function(index, value){
                        $("#tabladatos").html('<tr>'+
                                '<td>'+value["codigoid"]+'</td>'+
                                '<td>'+value["rut"]+'</td>'+
                                '<td>'+value["nombre"]+'</td>'+
                                '<td><button type="button" class="btn btn-success btn-sm seleccionar" attr-index="'+index+'">Seleccionar</button></td></tr>'  
                                )
                    })
                    
                    $(".seleccionar").on('click',function(){
                        var i = $(this).attr("attr-index");
                        $("#txtCodigoCliente").val($resultado[i]["codigoid"]);
                        $("#txtNombreCliente").val($resultado[i]["nombre"]);
                        $("#txtRutCliente").val($resultado[i]["rut"]);
                        $("#txtBusqueda").val("");
                        $("#tabladatos").html("");
                        $("#modalBuscarCliente").modal("hide");
                    })
                }
                
            }).fail(function(data, textStatus, jqXHR){
                    console.log(textStatus);
                    console.log(jqXHR);
                })

        }
    })
    
    $("#btnRegistroOK").click(function (){
        $("#txtCodigoCliente").val("");
        $("#txtNombreCliente").val("");
        $("#txtRutCliente").val("");
        $("#txtFechaRecepcion").val("");
        $("#txtTemperatura").val("");
        $("#txtCantidad").val("");
        $('input[type=checkbox]').each(function(){
            $(this).prop('checked',false);
        })
        $("#mensajechecked").html("");
    })
    
    $("#btnCerrarBuscarClientes").click(function (){
        $("#txtBusqueda").val("");
        $("#tabladatos").html("");
    })
    
    function inicio(){
        $("ul.nav > li").removeClass("active");
        $("#menu-recepcion").addClass("active");
    } 
    inicio();
});

