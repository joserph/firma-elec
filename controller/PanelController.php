<?php
class PanelController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function workspace(){
       
        //Cargamos la vista workspace
        $this->view("workspace", array(
		"user"=>"idsesion"
        	));
        

    }


}
    
?>