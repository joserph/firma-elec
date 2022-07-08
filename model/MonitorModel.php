<?php 

class MonitorModel extends EntidadBase{
    
public function __construct() {
    $table="";
    parent::__construct($table);
}

public function up_aulas($val1,$val2,$val3){
        
    $sql="UPDATE status_aula SET $val2 = :id_status WHERE id_aula = :id_aula";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':id_aula',$val1);
        $query->bindParam(':id_status',$val3);
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
    
}

?>