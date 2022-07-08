<?php
class UsuariosModel extends ModeloBase{
    private $table;
    
    public function __construct(){
        $this->table="usuarios";
        parent::__construct($this->table);
    }

    //Metodos de Login
    public function autentication($user,$pass){
        //$pass = md5($pass);
        $query="SELECT * FROM usuarios WHERE usuario=? AND password=?";
        $usuario=$this->LoginUsuario($query,$user,$pass);
        if(empty($usuario))
        {
            return false;
        }
        else
        {

            $_SESSION["Login"]="SI";
            $_SESSION["Nombre"]=$usuario[0]["nombre"];
            $_SESSION["ID"]=$usuario[0]["id_usuario"];

            $varencriptsesion = $_SESSION["Nombre"].$_SESSION["ID"];
            $varencriptsesionR = md5($varencriptsesion);

            $_SESSION["var_ssn_ecrpt_procs_clnt_smt"] = $varencriptsesionR;
            $_SESSION["lgn_clnt_smt_process"]=$varencriptsesionR;
            $_SESSION["ATC"] = 1;

            //print_r($usuario);
            //exit();
            return true;
        }
    }
    
    public function saveNewPass($control,$pass){
        
    $sql="UPDATE usuario SET contraseña=:passw WHERE id_usuario=:id_user";
        
        $pass = md5($pass);
        $query=$this->db()->prepare($sql);
        $query->bindParam(':id_user',$control);
        $query->bindParam(':passw',$pass);
        
        $save=$query->execute();
    
         return true;
    }

}
?>