<?php
session_start();
ob_start();
//Configuración global
require_once 'config/global.php';

//Base para los controladores que contiene las entidades y modeos de BD
require_once 'core/ControladorBase.php';

//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';

//Plugin Excel
require_once 'web/plugins/Classes/PHPExcel.php';
//controladores y acciones
if(isset($_GET["ctrl"])){
    $controllerObj=cargarControlador($_GET["ctrl"]);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
}
lanzarAccion($controllerObj);
?>
