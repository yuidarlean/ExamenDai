<?php 
session_start(); 
include_once 'php/modelo/Usuario.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <title>Solicitudes y An&aacute;lisis de Muestras - ISP</title>
        <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-face.css" />  
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
        
        <link rel="stylesheet" type="text/css" href="assets/css/css.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/chartist.css">  
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJDDhqMzDyo87pj5la5TRcA4TetuO2BEE"></script>
        
        <!-- Chartist JS -->
        <script src="assets/js/plugins/chartist.min.js"></script> 

        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>        
         
        <script src="assets/js/jquery.rut.js" type="text/javascript"></script>  
        <script src="assets/js/jquery.validate.js" type="text/javascript"></script>
        <script src="assets/js/validacion.js" type="text/javascript"></script>
        
        <script src="assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
