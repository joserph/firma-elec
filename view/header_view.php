<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel de Control</title>
	<!-- Bootstrap Core CSS -->
    <link href="web/public/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="web/public/css/bootstrap-theme.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="web/public/css/datatables.min.css">
    <link rel="stylesheet" href="web/public/css/flatly.min.css">
    <link href="web/public/estilos.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="web/public/css/bootstrap-multiselect.css" type="text/css">
    <!--<link type="text/css" href="web/public/css/demo_table.css" rel="stylesheet" />-->
    
    <!--<script type="text/javascript" language="javascript" src="web/public/js/jquery.dataTables.js"></script>-->
    <link rel="stylesheet" href="web/public/iconos/css/font-awesome.css">
    <link rel="stylesheet" href="web/public/octicons/octicons.css">
    <link href="assets/stylesheets/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="web/public/img/favicon.ico">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    <style>
        /* Switch button */
        .btn-default.btn-on.active{background-color: #5BB75B;color: white;}
        .btn-default.btn-off.active{background-color: #DA4F49;color: white;}

        .btn-default.btn-on-1.active{background-color: #006FFC;color: white;}
        .btn-default.btn-off-1.active{background-color: #DA4F49;color: white;}

        .btn-default.btn-on-2.active{background-color: #00D590;color: white;}
        .btn-default.btn-off-2.active{background-color: #A7A7A7;color: white;}

        .btn-default.btn-on-3.active{color: #5BB75B;font-weight:bolder;}
        .btn-default.btn-off-3.active{color: #DA4F49;font-weight:bolder;}

        .btn-default.btn-on-4.active{background-color: #006FFC;color: #5BB75B;}
        .btn-default.btn-off-4.active{background-color: #DA4F49;color: #DA4F49;}
    </style>
</head>
<script>
function revisar(elemento) {
    if (elemento.value==""){
        //elemento.className='error';
    } else {
        //elemento.className='form-input';
    }
}
</script>
<body data-spy="scroll" data-target="#affix">

<?php
 if(isset($_SESSION["Login"])){
     require_once("view/navbaru_view.php");
     require_once("view/menul_view.php");
     //require_once("view/new_menu.php");
 }else{
     require_once("view/navbar_view.php");
     require_once("view/menul_view.php");
 }
  
 ?>


