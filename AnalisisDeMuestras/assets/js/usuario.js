$(document).ready(function (){
    var arrUsuarios = [];
    var idDesactivar = 0;
    var idActivar = 0;
    
    $("#btnGuardarUsuario").on("click", function () {
       
        txtrut = $("#txtRut").val();
        txtnombre = $("#txtNombre").val();
        txtdireccion = $("#txtDireccion").val();
        txtclave = $("#txtClave1").val();
        seltipo = $("#selTipo").val(); 
       
        $.ajax({
            url: "php/controladores/UsuarioRegistrar.php",
            method: "POST",
            dataType: 'json',
            data: {
                rut: txtrut,
                nombre: txtnombre,
                direccion: txtdireccion,
                password: txtclave,
                tipo: seltipo
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data); 
            }
        })
    });
    
    $("#btnModificarUsuario").on("click", function () {
        txtrut = $("#txtRutM").val();
        txtnombre = $("#txtNombreM").val();
        txtdireccion = $("#txtDireccionM").val();
        seltipo = $("#selTipoM").val(); 
        txtcodigo = $("#txtCodigoM").val(); 
        
        $.ajax({
            url: "php/controladores/UsuarioModificar.php",
            method: "PUT", 
            dataType: 'json',
            data: {
                rut: txtrut,
                nombre: txtnombre,
                direccion: txtdireccion,
                codigo: txtcodigo,
                tipo: seltipo
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data); 
            }
        })
    })
    $("#btnBloquearUsuario").on("click", function () {
        $.ajax({
            url: "php/controladores/UsuarioBloquear.php",
            method: "PUT", 
            dataType: 'json',
            data: { 
                codigo: idDesactivar
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data); 
                arr = data;
                if(arr.resultado > 0){
                    $("#modalDesactivarUsuario").modal("hide");
                    cargarLista();
                }else{
                    
                }
            }
        })
    })
    
    $("#btnActivarUsuario").on("click", function () {
        $.ajax({
            url: "php/controladores/UsuarioActivar.php",
            method: "PUT",  
            dataType: 'json',
            data: { 
                codigo: idActivar
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data); 
                arr = data;
                if(arr.resultado > 0){
                    $("#modalActivarUsuario").modal("hide"); 
                    cargarLista();
                }else{
                    
                }
            }
        })
    })
    
    function cargarLista() {
        $("#tabla-usuario .grilla").html("");
        $.ajax({
           url: "php/controladores/UsuarioObtener.php",
           method: "GET",
            dataType: 'json',
            data: {},
            success: function (data, textStatus, jqXHR) {
                arr = data;
                if(arr.resultado.length > 0){
                    arrUsuarios = arr.resultado;
                    $.each(arrUsuarios, function (index, value) {
                        console.log(value);
                        b = '<tr>';
                        b += '<td>'+value.codigoUsuario +'</td>';
                        b += '<td>'+value.rutUsuario +'</td>';
                        b += '<td>'+value.nombreUsuario +'</td>';
                        b += '<td>'+value.tipoUsuario.nombresTipo +'</td>';
                        b += '<td>'+(value.estado == 1? 'Activado': 'Bloqueado') +'</td>';
                        b += '<td>';
                        b += '<button class="modificar btn btn-info" attr-index="'+index+'"><i class="material-icons">create</i></button>'; 
                        if(index > 0){ 
                            if(value.estado == 1){
                                b += '<button class="desactivar btn btn-danger" attr-index="'+index+'" ><i class="material-icons">block</i></button>'; 
                            }else{
                                b += '<button class="activar btn btn-success" attr-index="'+index+'" ><i class="material-icons">done</i></button>'; 
                            }
                        }
                        b += '</td>';
                        b += '</tr>';

                        $("#tabla-usuario .grilla").append(b);
                    });
                    
                    $(".desactivar").on("click", function () {
                        index = $(this).attr("attr-index");
                        idDesactivar = arrUsuarios[index].codigoUsuario;
                        $("#modalDesactivarUsuario").modal("show");
                    });
                    
                    $(".activar").on("click", function () {  
                        index = $(this).attr("attr-index");
                        idActivar = arrUsuarios[index].codigoUsuario;
                        $("#modalActivarUsuario").modal("show"); 
                    });
                    
                    $(".modificar").on("click", function () {
                        index = $(this).attr("attr-index");
                        $("#modalModificarUsuario").modal("show");
                        $("#txtCodigoM").val(arrUsuarios[index].codigoUsuario); 
                        $("#txtRutM").val(arrUsuarios[index].rutUsuario);
                        $("#txtNombreM").val(arrUsuarios[index].nombreUsuario);
                        $("#txtDireccionM").val(arrUsuarios[index].direccionUsuario);
                        $("#selTipoM option[value='"+arrUsuarios[index].tipoUsuario.codigoTipo+"']").attr("selected", true);  
                    });
                }
            }
        });
    }
    
    function inicio(){
        $("ul.nav > li").removeClass("active");
        $("#menu-usuario").addClass("active");
        cargarLista();
    }
    inicio();
    
});
