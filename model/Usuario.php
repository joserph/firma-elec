<?php
class Usuario extends EntidadBase{
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;
    private $horadeingreso;
    private $horadesalida;
    
    public function __construct() {
        $table="usuarios";
        parent::__construct($table);
    }
    
    public function getId() {
        return $this->id_usuario;
    }

    public function setId($id) {
        $this->id_usuario = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function save(){
        $sql="INSERT INTO usuarios (nombre, apellido, usuario, password)
        VALUES (:name,:ape,:correo,:pass)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':name',$this->nombre);
        $query->bindParam(':ape',$this->apellido);
        $query->bindParam(':correo',$this->correo);
        $query->bindParam(':pass',$this->password);
        
        $save=$query->execute();

        if($save)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

   public function update(){
    
    $sql="UPDATE usuarios SET nombre=:name, apellido=:ape, usuario=:user";
    
    if(!empty($this->password))
    {
        $sql.=", password=:pass  WHERE id_usuario=:id";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':id',$this->id_usuario);
        $query->bindParam(':name',$this->nombre);
        $query->bindParam(':ape',$this->apellido);
        $query->bindParam(':user',$this->user);
        $query->bindParam(':pass',$this->password);
        
    }else{
        
        $sql.="  WHERE id_usuario=:id";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':id',$this->id_usuario);
        $query->bindParam(':name',$this->nombre);
        $query->bindParam(':ape',$this->apellido);
        $query->bindParam(':user',$this->user);
        
    }

        $save=$query->execute();

        //print_r($query->errorInfo());
        //exit();

        if($save)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

}
?>