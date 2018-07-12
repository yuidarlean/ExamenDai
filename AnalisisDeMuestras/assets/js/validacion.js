$(document).ready(function(){
    
    jQuery.validator.addMethod("rutvalidar", function(value, element) {
        console.log("validando rut");
        return $.validateRut(element.value) ; 
    }, "El rut ingresado no es correcto");
    
    $("#frmNuevaMuestra").validate({
       rules:{
           txtCodigoCliente:{
               required: true
           },
           txtFechaRecepcion:{
               required: true
           },
           txtTemperatura:{
               required: true,
               maxlength: 4,
               number: true
           },
           txtCantidad:{
               required: true,
               maxlength: 3,
               number: true
           }
       },
       messages:{
           txtCodigoCliente:{
               required: "C&oacute;digo es obligatorio."
           },
           txtFechaRecepcion:{
               required: "Fecha obligatoria."
           },
           txtTemperatura:{
               required: "Campo obligatorio.",
               maxlength: "3 d&iacute;gitos como m&aacute;ximo.",
               number: "Debe ingresar solo n&uacute;meros."
           },
           txtCantidad:{
               required: "Campo obligatorio.",
               maxlength: "3 d&iacute;gitos como m&aacute;ximo.",
               number: "Debe ingresar solo n&acute;meros."
           }
       }
   });
   
   $("#frmRegistro").validate({
       rules:{
            opRadio:{
                required: true
            },
            txtRut:{
                required: true,
                "rutvalidar": true  
            },
            txtNombre:{
                required: true
            },
            txtDireccion:{
                required: true
            },
            txtClave1:{
                required: true
            },
            txtClave2:{
                required: true,
                equalTo: "#txtClave1"
            },
            txtRutContacto:{
                required: true
            },
            txtNombreContacto:{
                required: true
            },
            txtEmailContacto:{
                required: true,
                email: true
            },
            txtEmail:{
                required: true,
                email: true
            }
       },
       messages:{
            opRadio:{
               required: "Es requerido"
            },
            txtRut:{
               required: "El rut es requerido",
               
            },
            txtNombre:{
               required: "El nombre es requerido"
            },
            txtDireccion:{
               required: "La dirección es requerida"
            },
            txtClave1:{
               required: "La calve es requerida"
            },
            txtClave2:{
               required: "Repetir la clave es requerida",
                equalTo: "La clave ingresada no coincide"
            },
            txtRutContacto:{
               required: "El rut del contacto es requerido"
            },
            txtNombreContacto:{
               required: "El nombre del contacto es requerido"
            },
            txtEmailContacto:{
               required: "El email del contacto es requerido",
               email: "El email no tiene un formato válido."
            }, 
            txtEmail:{
               required: "El email es requerido",
               email: "El email no tiene un formato válido."
            }
           
       }
   })
   
   $("#formIngresoUsuarios").validate({
        rules:{
            txtRut: {
                required: true,
                "rutvalidar": true
            },
            txtNombre:{
                required: true
            },
            txtDireccion:{
                required: true
            },
            selTipo:{
                required: true
            },
            txtClave1:{
                required: true
            }, 
            txtClave2:{
                required: true,
                equalTo: "#txtClave1" 
            }
        },
        messages:{
            txtRut: {
                required: "El rut es requerido."
            },
            txtNombre:{
                required: "El nombre es requerido."
            },
            txtDireccion:{
                required: "La dirección es requerida."
            },
            selTipo:{
                required: "El Tipo de usuario es requerido."
            },
            txtClave1:{
                required: "La clave es requerida."
            },
            txtClave2:{
                required: "Repetir la clave es requerida",
                equalTo: "La clave ingresada no coincide"
            }
            
        }
   })
   
   $("#formModificarUsuarios").validate({
        rules:{
            txtRutM: {
                required: true,
                "rutvalidar": true
            },
            txtNombreM:{
                required: true
            },
            txtDireccionM:{
                required: true
            },
            selTipoM:{
                required: true
            }
        },
        messages:{
            txtRutM: {
                required: "El rut es requerido."
            },
            txtNombreM:{
                required: "El nombre es requerido."
            },
            txtDireccionM:{
                required: "La dirección es requerida."
            },
            selTipoM:{
                required: "El Tipo de usuario es requerido."
            }
        }
   })
   
   $("#misDatosActualizar").validate({
        rules:{
            txtRutMD:{
                required: true,
                "rutvalidar": true
            },
            txtNombreMD:{
                required: true
            },
            txtDireccionMD:{
                required: true
            }
        },
        messages:{
            txtRutMD:{
                required: "El rut es requerido."
            },
            txtNombreMD:{
                required: "El nombre es requerido.", 
            },
            txtDireccionMD:{
                required: "La dirección es requerida.",
            }
       }
   })
   
   $("#misDatosClave").validate({
       rules:{
            txtNuevaClaveMD:{
                required: true,     
            },
            txtNuevaClaveRepetirMD:{
                required: true,     
                equalTo: "#txtNuevaClaveMD" 
            }
       },
       messages:{
            txtNuevaClaveMD:{
                required: "La clave es requerida.",
            },
            txtNuevaClaveRepetirMD:{
                required: "Repetir la clave es requerida",
                equalTo: "La clave ingresada no coincide"
            }
       }
   })
   
});

