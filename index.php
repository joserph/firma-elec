<?php
session_start();
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
	//cabeceras html
	require_once 'view/header_view.php';

    $controllerObj=cargarControlador($_GET["ctrl"]);
    lanzarAccion($controllerObj);

    //footer html
    require_once 'view/footer_view.php';
}

//controladores y acciones
elseif(isset($_GET["ctrlw"])){
    $controllerObj=cargarControlador($_GET["ctrlw"]);
    lanzarAccion($controllerObj);
}

//controladores y acciones
else{
	//cabeceras html
	require_once 'view/header_view.php';

    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);

    //footer html
    require_once 'view/footer_view.php';
}

?>
