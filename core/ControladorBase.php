<?php
class ControladorBase{

    public function __construct() {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
   //Plugins y funcionalidades
    //le pasa el nombre de la vista y el array con los datos 
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor; 
        }
        
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'_view.php';
    }

    public function viewU($vista){
        
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'_view.php';
    }

//redireccion de exito del registro dos 
    public function viewEx2($vista){
        
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'_view.php';
    }
    public function viewDataDos($vista,$data){
        
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'_view.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:".$controlador."_".$accion.".html");
    }
    
    //Métodos para los controladores

}
?>
