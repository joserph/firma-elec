<?php
class UsuariosController extends ControladorBase{

    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->viewU("index");
    }

    public function Panel(){

       $obj=new EntidadBase();
       
       $data=$obj->getAll("usuarios");
       $this->view("listusuarios",array(
           "datos"=>$data
           ));
    }

    public function AddUsuario(){
        
       $obj=new EntidadBase();
       
       $this->viewU("addusuario");
    }
    
    public function EditUsuario(){
       $obj=new EntidadBase();
       
       $data=$obj->getById($_GET["id"],"usuarios","id_usuario");
       $this->view("edusuario",array(
           "datos"=>$data
           ));
           
    }

    public function loginu(){
        $this->viewU("login");
    }
    
    public function cerrar(){
        session_destroy();
        echo("<script>location.href = './';</script>");
    }

    public function login()
    {
        $usuarios=new UsuariosModel();
        $usu=$usuarios->autentication($_POST["user"],$_POST["clave"]);
        if($usu = true)
        {
            echo("<script>location.href = './';</script>");
        }
        else
        {
            $this->redirect();
        }
    }

    public function registrou()
    {
        $regist = new Usuario();
       
        $regist->setNombre($_POST['name']);
        $regist->setApellido($_POST['apel']);
        $regist->setCorreo($_POST['user']);
        $regist->setPassword(md5($_POST['clave']));
        
        $usu = $regist->save();
        
        if($usu=true){
            echo "<script type='text/javascript'>alert('Registrado con Exito.');window.location='Usuarios_panel.html';</script>";
        }else{
            echo "<script type='text/javascript'>alert('No se ha podido Procesar su solicitud.');window.location='Usuarios_panel.html';</script>";
        }
    }

    public function UpUsuario(){
        $regist = new Usuario();
       
        $regist->setId($_POST['id']);
        $regist->setNombre($_POST['name']);
        $regist->setApellido($_POST['apel']);
        $regist->setCorreo($_POST['user']);
        
        if(!empty($_POST['clave']))
        {
            $regist->setPassword(md5($_POST['clave']));
        }
        
        $result = $regist->update();
        
        if($result=true){
            echo "<script type='text/javascript'>alert('Se ha Actualizado con Exito.');window.location='Usuarios_panel.html';</script>";
        }else{
            echo "<script type='text/javascript'>alert('No se ha podido Procesar su solicitud.');window.location='Usuarios_panel.html';</script>";
        }
        
    }

    public function DelUsuario(){
       $obj=new EntidadBase();
       
       $data=$obj->deleteByIdTB($_GET["id"],"usuarios","id_usuario");
        if($data=true){
            echo "<script type='text/javascript'>alert('Eliminado con Exito.');window.location='Usuarios_panel.html';</script>";
        }else{
            echo "<script type='text/javascript'>alert('No se ha podido Procesar su solicitud.');window.location='Usuarios_panel.html';</script>";
        }
           
    }


}
?>
