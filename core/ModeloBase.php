<?php
class ModeloBase extends EntidadBase{
    private $table;
    
    public function __construct() {
        parent::__construct();
    }

    public function LoginUsuario($query,$user,$pass){
        $query=$this->db()->prepare($query);
        $query->bindParam(1,$user);
        $query->bindParam(2,md5($pass));
        $results = $query->execute();
        $rows = $query->fetchAll();
        $error = $query->errorInfo();
        return $rows;
    }
    
    //Aqui podemos montarnos metodos para los modelos de consulta
    public static function Show_All($query){
        $query=$this->db()->prepare($query);
        $results = $query->execute();
        $rows = $query->fetchAll();
        $error = $query->errorInfo();
        if(empty($rows)) {
            return "No hay Coincidencia.";
        }
        else {
            return $rows;
        }
    }
    
    
}
?>


