<?php
class EntidadBase{
    private $table;
    private $db;
    private $conectar;

    public function __construct() {

        require_once 'Conectar.php';
        $this->conectar=new Conectar();
        $this->db=$this->conectar->conexion();
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll($val){
        $this->table = $val;
        $query = $this->db->prepare("SELECT * FROM $this->table");
        $query->execute();

        $resultSet = array();
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function getById($id,$val,$val1){
        $this->table = $val;
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE $val1=$id");
        $query->execute();

        if($row = $query->fetch(PDO::FETCH_ASSOC)) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }

    public function getAllById($id,$val,$val1){
        $this->table = $val;
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE $val1=$id");
        $query->execute();

        $resultSet = array();
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    public function deleteById($id,$val,$val1){
        $this->table = $val;
        $query=$this->db->query("DELETE FROM $this->table WHERE $val1=$id"); 
        return $query;
    }

    public function deleteByIdTB($id,$val,$val1){
        $this->table = $val;
        $query = $this->db->prepare("DELETE FROM $this->table WHERE $val1='$id'");
        return $query->execute();
    }
    
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'"); 
        return $query;
    }

    public function updateBy($table,$data,$colum,$value){
        $this->table = $table;
        $values = array();
        
        foreach($data as $key => $val)
        {
            $values[] =  $key."='".$val."'";
        }
        $values = implode(',',$values);
        
        $query=$this->db->query("UPDATE $this->table SET $values WHERE $colum='$value'"); 
        
        return $this->db->errorCode();
    }

    public function EliminarRegistro($id, $table)
    {
        $this->table = $table;
       
        $colum = 'id_solicitud';
        $query=$this->db->query("DELETE FROM $this->table WHERE $colum = ' $id '");
        
        return $this->db->errorCode();
    }

    public function getAllPerSol($table, $tipoSol)
    {
        $this->table = $table;
        $tipo = 'tipo_solicitud';
        $query=$this->db->query("SELECT * FROM $this->table WHERE $tipo = '$tipoSol'");
        $query->execute();
        
        /*print_r($query);
        exit();*/

        $resultSet = array();
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }
        
        
        return $resultSet;
    }

    public function selectPerDate($table, $desde, $hasta, $tipoSol)
    {
        $this->table = $table;
        $colum = 'fecha_ing_firma';
        $tipo = 'tipo_solicitud';
        $query=$this->db->query("SELECT * FROM $this->table WHERE ($colum BETWEEN '$desde' AND '$hasta') AND $tipo = '$tipoSol'");
        $query->execute();
        
        /*print_r($query);
        exit();*/

        $resultSet = array();
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
           $resultSet[]=$row;
        }
        
        
        return $resultSet;
    }

    public function updateByNew($table,$data,$colum,$value,$table2,$archivos){
        $this->table = $table;
        $values = array();
        
        foreach($data as $key => $val)
        {
            $values[] =  $key."='".$val."'";
        }
        $values = implode(',',$values);
        
        $query=$this->db->query("UPDATE $this->table SET $values WHERE $colum='$value'");
        /*print_r($query);
            exit();*/
        foreach ($archivos as $key => $item) {
            $valuex = "archivo = ' " . $item . " ' ";
            
            $query=$this->db->query("UPDATE $table2 SET $valuex WHERE $colum='$value' AND tipo = '$key'");
            
        }

        return $this->db->errorCode();
    }

    public function insertnew($table, $colums, $values){
        
        foreach ($values as $key => $value) {
            $values[$key] = "'".$value."'";
        }

        $sql= "INSERT INTO ".$table." (".implode(',',$colums).") VALUES (".implode(',',$values).")";
        
        
        $query=$this->db()->prepare($sql);
        
        $save=$query->execute();

        //print_r($sql);

        //print_r($query->errorInfo());
        //exit();
        if($save)
        {
            return $this->db()->lastInsertId();
        }
        else
        {
            return 0;
        }
    }

    public function insertsol($table, $colums, $values, $table2, $archivos){
        
        foreach ($values as $key => $value) {
            $values[$key] = "'".$value."'";
        }

        $sql= "INSERT INTO ".$table." (".implode(',',$colums).") VALUES (".implode(',',$values).")";
        
        
        $query=$this->db()->prepare($sql);
        
        $save=$query->execute();

        $id_sol = $this->db()->lastInsertId();


        //print_r($sql);

        //print_r($archivos);

        //print_r($query->errorInfo());
        //exit();

        if($save)
        {
            foreach ($archivos as $key => $value) 
            {
                $sql= "INSERT INTO ".$table2." (id_solicitud,tipo,archivo) VALUES ('".$id_sol."', '".$key."', '".$value."')";

                $query=$this->db()->prepare($sql);
                
                $save=$query->execute();
            }
            return $id_sol;
        }
        else
        {
            return 0;
        }
    }

    # $host includes host and path and filename 
        # ex: "myserver.com/this/is/path/to/file.php" 
    # $query is the POST query data 
        # ex: "a=thisstring&number=46&string=thatstring 
    # $others is any extra headers you want to send 
        # ex: "Accept-Encoding: compress, gzip\r\n" 
    public function post($host,$query){ 
        //Lo primerito, creamos una variable iniciando curl, pasándole la url
        $ch = curl_init($host);
         
        //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
        curl_setopt ($ch, CURLOPT_POST, 1);
         
        //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $query);
         
        //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
         
        //recogemos la respuesta
        //o el error, por si falla
        if(curl_exec($ch))
        {
            $result = curl_exec($ch);
        }else{
            $result = curl_error($ch);
        }
         
        //y finalmente cerramos curl
        curl_close ($ch);


        return $result; 
    } 
    

    /*
     * Aqui podemos montarnos un monton de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    
}
?>
