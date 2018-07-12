$(document).ready(function () {
    var arrMP = [];
    
    $("#btnGuardarAnalisis").on("click", function () {
        lista = {};
        lista.idAnalisis = $("#lblMuestra").attr("attr-id");
        lista.resultados = [];
        $.each($("#tabla-real-analisis .grilla tr"), function (index, value) {
            d = {};
            inpt = $(this).find("input");  
            d["ppm"] = inpt.val();
            d["idtipoanalisis"] = inpt.attr("attr-id-ta");
            lista.resultados.push(d);  
        });
        
        console.log(lista); 
        $.ajax({
            url : "php/controladores/ResultadoAnalisisActualizar.php",
            method : "PUT",
            dataType: 'json',
            data:  {"data" : lista} ,    
            success: function (data, textStatus, jqXHR) {
                arr = data;
                if(arr.resultado.cantAM > 0){
                    $("#modalMensaje .mensaje").html("se ha guardado el analisis realizado.");
                    $("#modalMensaje").modal('show');
                    
                    $("#modalRealizarAnalisis").modal("hide");
                    limpiarModalAnalisis();
                    obtenerLista();
                }else{
                    
                }
            }
        });
        
    });
    
    
    function obtenerLista() {
        $("#tabla-muestras .grilla").html("");
        $.ajax({
            url: "php/controladores/AnalisisMuestrasObtener.php", 
            method: "GET", 
            dataType: 'json',
            data: {estado : 1},
            success: function (data, textStatus, jqXHR) {
                arr = data;
                if(arr.resultado.length > 0){
                    arrMP = arr.resultado;
                    
                    $.each(arrMP, function(index, value){
                            
                            h = '<tr>';
                            h += '<td>' + value.codigomuestra + '</td>';
                            h += '<td>' + value.fecharecepcion +'</td>';
                            h += '<td>' + value.receptor.nombreUsuario +'</td>';
                            h += '<td>' + value.temperaturamuestra + '</td>';
                            h += '<td>' + value.cantidadmuestra + '</td>'; 
                            h += '<td>';
                            h += '<button type="button" class="btn btn-info analizar" attr-index="'+index+'"><i class="material-icons"> colorize</i> </button>';
                            h += '</td>';
                            h += '</tr>';
                            
                            $("#tabla-muestras .grilla").append(h);
                    }); 
                    
                    $(".analizar").on("click", function () {
                        var index = $(this).attr("attr-index");
                        $("#lblMuestra").html(arrMP[index]["codigomuestra"]); 
                        $("#lblMuestra").attr("attr-id", arrMP[index]["idanalisismuestras"]); 
                        $("#txtFechaRecepcionM").val(arrMP[index]["fecharecepcion"]);
                        $("#txtTemperaturaM").val(arrMP[index]["temperaturamuestra"]);
                        $("#txtCantidadM").val(arrMP[index]["cantidadmuestra"]); 
                        
                        $("#tabla-real-analisis .grilla").html("");
                        $.each(arrMP[index]["listaResultado"], function (index, value) {
                            h = '<tr>';
                            h += '<td><label for="muesta-'+index+'" class="bmd-label-static">' + value.tipoAnalisis.nombre + ':</label></td>';  
                            h += '<td>';
                            h += '<div class="form-group bmd-form-group">';
                            h += '<input id="muesta-'+index+'" name="muesta-'+index+'" attr-id-ta="'+value.tipoAnalisis.idtipoanalisis+'" type="number" class="form-control" />'; 
                            h += '</div>'; 
                            h += '</td>'; 
                            h += '</tr>';
                            $("#tabla-real-analisis .grilla").append(h); 
                        });
                        
                        $("#modalRealizarAnalisis").modal("show");
                        
                    });
                    
                }else{
                    
                }
            }
        });
    }
    function limpiarModalAnalisis(){
        $("#txtFechaRecepcionM").val("");
        $("#txtTemperaturaM").val("");
        $("#txtCantidadM").val("");
        $("#tabla-real-analisis .grilla").html("");
    }
    
    function inicio(){
        $("ul.nav > li").removeClass("active");
        $("#menu-analizar").addClass("active");
        obtenerLista();
    } 
    inicio();
})

