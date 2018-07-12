$(document).ready(function(){
    $.ajaxSetup({ 
        beforeSend:function(){
            $("#loading").show();
        }, 
        complete:function () {
            $("#loading").hide();
       }
    });
    
    
    $('.modalEditar, .modalNuevo').on('hidden.bs.modal', function (e) {
        $(".modalEditar form, .modalNuevo form")[0].reset();
    })
    
    $("#btnaceptarmisdatos").click(function(){
        $("#modalModificarDatosMensaje").modal('hide');
        location.reload();
    })
    
    $("#btnConfirmarCambioMisDatos").click(function() {
        console.log("Actualizando información del usuario logeado.");
        $.ajax({
            url: "php/controladores/UsuarioModificar.php",
            method: 'PUT',
            dataType: 'json',
            data: {
                'codigo' : $("#hUsuario").attr("attr-codigo"),
                'rut' : $("#txtRutMD").val(),
                'nombres' : $("#txtNombreMD").val(),
                'direccion' : $("#txtDireccionMD").val(),
                'tipo' : $("#hUsuario").attr("attr-tipo"),
                'actualizarsesion' : "si"
            },
            success : function (data, textStatus, jqXHR){
                arr = data;
                if(arr.resultado.cant > 0){ 
                    $("#modalMensaje .mensaje").html("se ha modificado la información.");
                    $("#modalMensaje").modal('show');
                    location.reload();
                }else{
                    $("#modalMensaje .mensaje").html(arr.resultado);
                    $("#modalMensaje").modal('show'); 
                }
            }

        })  
    });
    
    $("#btnGuardarClaveMD").click(function () {
        console.log("Actualizando información del usuario logeado.");
        
        $.ajax({
            url: "php/controladores/UsuarioActualizarClave.php",
            method: "PUT",
            dataType: 'json',
            data: {
               id : $("#hUsuario").attr("attr-codigo"),
               clave: $("#txtNuevaClaveMD").val()
            },
            success: function (data, textStatus, jqXHR) {
                arr = data;
                console.log(arr.resultado); 
            }
        })
    });
    
   
});

    
