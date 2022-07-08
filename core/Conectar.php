<?php
class Conectar{
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }
    
    public function conexion(){
        
        if($this->driver=="mysql" || $this->driver==null){
            $con = new PDO($this->driver.':host='.$this->host.';dbname='.$this->database, $this->user, $this->pass);
            $con->exec("SET CHARACTER SET utf8");

        }
        
        if($this->driver=="pgsql"){
            $con = new PDO($this->driver.':host='.$this->host.';port=5432'.';dbname='.$this->database, $this->user, $this->pass);
        }

        return $con;
    }
}
?>
