$(document).ready(function (){
    var arrlabels = [];
    var arrseries = [];  
    $("#btnBuscar").on("click", function() {
        cargarListaMuestras();
    });
    
    function cargarListaMuestras(){
        datos = {};
        strBuscar = $("#txtBuscar").val();
        tipoUsu = $("#hUsuario").attr("attr-tipo");
        idUsu = $("#hUsuario").attr("attr-codigo");
        
        if( strBuscar.trim().length > 0 ){ 
            datos.codigoMuestra = strBuscar;
            datos.clienteId = strBuscar;
            datos.clienteRut = strBuscar;
            datos.clienteNombre = strBuscar;
            datos.clienteNombre = strBuscar;
        }
        if(tipoUsu == 3){
            datos.tecLabo = idUsu
        }
        
        $("#tabla-muestras .grilla").html("");
        $.ajax({
            url: "php/controladores/AnalisisMuestrasObtener.php", 
            method: "GET", 
            dataType: 'json',
            data: datos,
            success: function (data, textStatus, jqXHR) {
                arr = data;
                if(arr.resultado.length > 0){
                    arrMP = arr.resultado;
                    
                    $.each(arrMP, function(index, value){
                            var fechaAnalisis = value.listaResultado[0].fecharegistro;
                            var lb = value.listaResultado[0].getEmpleadoanalista.nombreUsuario;
                            h = '<tr>';
                            h += '<td>' + value.cliente.rutUsuario + '</td>';
                            h += '<td>' + value.cliente.nombreUsuario + '</td>';
                            h += '<td>' + value.codigomuestra + '</td>';
                            h += '<td>' + value.fecharecepcion +'</td>';                            
                            h += '<td>' + value.receptor.nombreUsuario +'</td>';
                            if(fechaAnalisis!==null){
                                h += '<td>' + (fechaAnalisis == '0000-00-00' ?'': fechaAnalisis ) +'</td>';                            
                            }else{
                                h += '<td></td>';
                            }
                            h += '<td>' + (lb == null? '': lb)  +'</td>';
                            switch (value.estado) {
                                case "2":
                                    h += '<td>Terminado</td>';
                                    h += '<td>';
                                    h += '<button type="button" class="btn btn-success verResultado" attr-index="'+index+'"><i class="material-icons"> insert_chart_outlined</i> </button>';
                                    h += '</td>';
                                    break;
                                    
                                default:
                                    h += '<td>En proceso</td>';
                                    h += '<td></td>'; 
                                    break;
                            }
                            h += '</tr>';
                             
                            $("#tabla-muestras .grilla").append(h);
                    }); 
                    
                    $(".verResultado").on("click", function () {
                        var index = $(this).attr("attr-index");
                        arrlabels = [];
                        arrseries =[];
                        $.each(arrMP[index]["listaResultado"], function (index, value) {
                            arrlabels.push(value.tipoAnalisis.nombre + ' ('+value.ppm+')');
                            arrseries.push(value.ppm);
                        })
                        
                        $("#modalRevisarAnalisis").modal("show");
                        
                    });
                    
                }else{
                    
                }
            }
        })
    }
    
    $('#modalRevisarAnalisis').on('shown.bs.modal', function (e) {
        $('.ct-chart').fadeIn();
        new Chartist.Bar('.ct-chart', {
            labels: arrlabels,
            series: arrseries
        }, {
            distributeSeries: true
        }).on('draw',function(data){
            if(data.type === 'bar'){
                data.element.attr({
                    style: 'stroke-width: 60px'
                });
            }
        }); 
    })
    
    function inicio(){
        $("ul.nav > li").removeClass("active");
        $("#menu-bienvenido").addClass("active");
        
    }
    inicio();

});