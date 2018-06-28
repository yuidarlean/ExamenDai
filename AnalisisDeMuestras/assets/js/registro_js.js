$(document).ready(function (){
    $("#opEmpresa").click(function(){
        $("#particular").css("display","none");
        $("#empresa").css("display","");
    })
    
    $("#opParticular").click(function (){
        $("#empresa").css("display","none");
        $("#particular").css("display",""); 
    })
    
    $("#btnRegistrar").click(function (){
        if ($("#opEmpresa").is(":checked")){
            console.log("Agregando nueva empresa con primer contacto");
            $.ajax({
                url: "php/controladores/EmpresaRegistrar.php",
                method: 'POST',
                dataType: 'json',
                data:{'rut' : $("#txtRut").val(),'nombre' : $("#txtNombre").val(),
                    'password' : $("#txtClave1").val(), 'direccion' : $("#txtDireccion").val(),
                    'rutcontacto' : $("#txtRutContacto").val(), 'nombrecontacto' : $("#txtNombreContacto").val(),
                    'emailcontacto' : $("#txtEmailContacto").val(), 'telefonocontacto' : $("#txtTelefonoContacto").val()},
                success: function(data, textStatus, jqXHR){
                    console.log(data);
                    resultadofinal = data;
                    if(resultadofinal["resultado"]==0){
                        $("#modalRegistroOK").modal("show");
                    }else{

                    }
                }
            })            
        }

        if ($("#opParticular").is(":checked")){
            console.log("Agregando nuevo cliente particular con primer teléfono");
            $.ajax({
                url: "php/controladores/ParticularRegistrar.php",
                method: 'POST',
                dataType: 'json',
                data:{'rut' : $("#txtRut").val(),'nombre' : $("#txtNombre").val(),
                    'password' : $("#txtClave1").val(), 'direccion' : $("#txtDireccion").val(),
                    'email' : $("#txtEmail").val(), 'telefono' : $("#txtTelefono").val()},
                success: function(data, textStatus, jqXHR){
                    console.log(data);
                    resultadofinal = data;
                    if(resultadofinal["resultado"]==0){
                        $("#modalRegistroOK").modal("show");
                    }else{

                    }
                }
            })            
        }
    })
})