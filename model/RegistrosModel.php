<?php 

class RegistrosModel extends EntidadBase{
    
public function __construct() {
    $table="";
    parent::__construct($table);
}

public function getEndId($sec){
        $conexion = $this->db();
        $sql = "select currval($sec)";
        $stmt = $conexion->prepare($sql);
        $results = $stmt->execute();
        $rows = $stmt->fetchAll();
        $error = $stmt->errorInfo();
        return $rows[0][0];
}

public function new_doc($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11){
        
    $sql="INSERT INTO documentos (id_doc, notas, boleta_p, p_nac, ced_repre, ced_estu, foto_estu, 
            fotos_repre, boleta_terc, boleta_rev, sobres, colaboracion)
     VALUES (nextval('id_doc'::regclass),:doc1,:doc2,:doc3,:doc4,:doc5,:doc6, 
           :doc7,:doc8,:doc9,:doc10,:doc_cola)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':doc1',$val1);
        $query->bindParam(':doc2',$val2);
        $query->bindParam(':doc3',$val3);
        $query->bindParam(':doc4',$val4);
        $query->bindParam(':doc5',$val5);
        $query->bindParam(':doc6',$val6);
        $query->bindParam(':doc7',$val7);
        $query->bindParam(':doc8',$val8);
        $query->bindParam(':doc9',$val9);
        $query->bindParam(':doc10',$val10);
        $query->bindParam(':doc_cola',$val11);


        $save=$query->execute();
        
        //print_r($query->errorInfo());

        $id = $this->getEndId("'id_doc'::regclass");
        
        return $id;
}
    
public function new_mate($val1){
        
    $sql="INSERT INTO materias (id_materia, descrip)
     VALUES ('',:descrip)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':descrip',$val1);
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

public function new_seccion($val1){
        
    $sql="INSERT INTO secciones (id_seccion, descrip)
     VALUES ('',:descrip)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':descrip',$val1);
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

public function up_mate($val1,$val2){
        
    $sql="UPDATE materias SET descrip = :descrip WHERE id_materia = :cod_materia";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':descrip',$val1);
        $query->bindParam(':cod_materia',$val2);
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

public function up_secc($val1,$val2){
        
    $sql="UPDATE secciones SET descrip = :descrip WHERE id_seccion = :cod_seccion";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':descrip',$val1);
        $query->bindParam(':cod_seccion',$val2);
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

public function up_horas_ac($val1,$val2,$val3){
        
    $sql="UPDATE horas_acade SET h_inicio = :h_ini, h_fin = :h_end WHERE id_hora_ac = :cod_h_ac";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':h_ini',$val1);
        $query->bindParam(':h_end',$val2);
        $query->bindParam(':cod_h_ac',$val3);
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

public function new_aula($val1,$val2){
        
    $sql="INSERT INTO aulas (id_aula, identificacion, descrip)
     VALUES ('',:ident,:descrip)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':ident',$val1);
        $query->bindParam(':descrip',$val2);
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

public function new_h_ac($val1,$val2){
        
    $sql="INSERT INTO horas_acade (id_hora_ac, h_inicio, h_fin)
     VALUES ('',:h_ini,:h_fin)";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':h_ini',$val1);
        $query->bindParam(':h_fin',$val2);
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

public function up_aula($val1,$val2,$val3){

    $sql="UPDATE aulas SET identificacion = :ident, descrip = :descrip WHERE id_aula = :cod_aula";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':cod_aula',$val1);
        $query->bindParam(':ident',$val2);
        $query->bindParam(':descrip',$val3);
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


    //insertando un nuevo docente   
    public function new_docente($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13,$val14,$val15,$val16,$val17){
        
    $sql = "INSERT INTO docente (identificacion_d, nombres, apellidos, edo_civil, edad, f_nac, lugar_nac, direccion, telefono_1, telefono_2, correo, f_ingreso, t_bachiller, t_universitario, codigo_cargo, total_horas, finmppe)
    VALUES(:doc_ced,:doc_name,:doc_ape,:doc_estci,:doc_edad,:doc_fnac,:doc_lnac,:doc_dirc,:doc_telfhab,:doc_telf,:doc_correo,:doc_finginst,:doc_tbac,:doc_tuni,:doc_codc,:doc_ho,:doc_finmppe)";
                        
        $query=$this->db()->prepare($sql);
        
                        $query->bindParam(':doc_ced',$val1);
                        $query->bindParam(':doc_name',$val2);
                        $query->bindParam(':doc_ape',$val3); 
                        $query->bindParam(':doc_estci',$val4);
                        $query->bindParam(':doc_edad',$val5);
                        $query->bindParam(':doc_fnac',$val6);
                        $query->bindParam(':doc_lnac',$val7);
                        $query->bindParam(':doc_dirc',$val8);
                        $query->bindParam(':doc_telfhab',$val9);
                        $query->bindParam(':doc_telf',$val10);
                        $query->bindParam(':doc_correo',$val11);
                        $query->bindParam(':doc_finginst',$val12);
                        $query->bindParam(':doc_tbac',$val13);
                        $query->bindParam(':doc_tuni',$val14);
                        $query->bindParam(':doc_codc',$val15);
                        $query->bindParam(':doc_ho',$val16);
                        $query->bindParam(':doc_finmppe',$val17);
                       

        $save=$query->execute();
        
        //print_r($query->errorInfo());

        if($save)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function up_docente($val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9,$val10,$val11,$val12,$val13,$val14,$val15,$val16,$val17){
        
    $sql="UPDATE docente SET descrip = :descrip WHERE identificacion_d = :doc_ced";
        
        $query=$this->db()->prepare($sql);
        $query->bindParam(':doc_ced',$val1);
        $query->bindParam(':doc_name',$val2);
        $query->bindParam(':doc_ape',$val3); 
        $query->bindParam(':doc_estci',$val4);
        $query->bindParam(':doc_edad',$val5);
        $query->bindParam(':doc_fnac',$val6);
        $query->bindParam(':doc_lnac',$val7);
        $query->bindParam(':doc_dirc',$val8);
        $query->bindParam(':doc_telfhab',$val9);
        $query->bindParam(':doc_telf',$val10);
        $query->bindParam(':doc_correo',$val11);
        $query->bindParam(':doc_finginst',$val12);
        $query->bindParam(':doc_tbac',$val13);
        $query->bindParam(':doc_tuni',$val14);
        $query->bindParam(':doc_codc',$val15);
        $query->bindParam(':doc_ho',$val16);
        $query->bindParam(':doc_finmppe',$val17);
                       

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
    
  public function new_matdoc_pivote($val1,$val2){
        
    $sql = "INSERT INTO materia_docente (identificacion_d, id_materia)
    VALUES(:doc_ced,:id_mat)";
                        
        $query=$this->db()->prepare($sql);
        
                        $query->bindParam(':doc_ced',$val1);
                        $query->bindParam(':id_mat',$val2);

        $save=$query->execute();
        
        //print_r($query->errorInfo());
        
        

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