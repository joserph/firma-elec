<?php
class RegistrosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    /*Metodos que llaman a las vistas*/

    public function Solictudes(){
       $obj=new EntidadBase();
       $data=$obj->getAll("solicitudes2");
       $this->view("list_soli",array(
           "datos"=>$data
           ));
    }

    public function Solicitud1(){
       $this->viewU("reg_sol1");
    }

    public function Solicitud2(){
       $this->viewU("reg_sol2");
    }

    public function Solicitud3(){
        $this->viewU("reg_sol3");
    }

    public function deleteSol()
    {
        //print_r($_GET['id']);
        $id = $_GET['id'];
        $tabla = 'solicitudes2';

        $obj = new EntidadBase();

        $exito = $obj->EliminarRegistro($id, $tabla);

        //Condicional Registro Valido
        if($exito == 0)
        {
            echo "<script>
            Swal.fire({
                title: 'Registro Eliminado con Exito.',
                icon: 'success',
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location='Registros_Solictudes.html';
                }
            });
            </script>";
        }
        else
        {
            echo "<script>
            Swal.fire({
                title: 'No se ha podido Eliminar su Registro.',
                icon: 'error',
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location='Registros_Solictudes.html';
                }
            });
            </script>";
        }
        //exit();
    }

    public function ProcPago(){
       $obj=new EntidadBase();
       $datasol=$obj->getById($_GET['id'],"solicitudes2","id_solicitud");

        $datasol['f_cedulaFront'] = "";
        $datasol['f_cedulaBack'] = "";
        $datasol['f_selfie'] = "";
        $datasol['f_copiaruc'] = "";
        $datasol['f_nombramiento'] = "";
        $datasol['f_nombramiento2'] = "";
        $datasol['f_constitucion'] = "";
        $datasol['f_documentoRL'] = "";
        $datasol['f_autreprelegal'] = "";
        $datasol['f_adicional1'] = "";
        $datasol['f_adicional2'] = "";
        $datasol['f_adicional3'] = "";
        $datasol['f_adicional4'] = "";
        $datasol['cm2'] = "";
        $datasol['f_ced_pass_fact'] = "";
        $datasol['f_ruc_ced_fact'] = "";

        $datasol2=$obj->getAllById($_GET['id'],"arc_sol","id_solicitud");

        foreach ($datasol2 as $key => $value) {
            $datasol[$value['tipo']] =  $value['archivo'];
        }

        $data1 = array(
        'apikey'=>APIKEY,
        'uid'=>UID,
        'tipo_solicitud'=>$datasol['tipo_solicitud'],
        'contenedor'=>$datasol['contenedor'],                             // 0:archivo .p12, 1:token, 2:nube
        'nombres'=>$datasol['nombres'],
        'apellido1'=>$datasol['apellido1'],
        'apellido2'=>$datasol['apellido2'],
        'tipodocumento'=>$datasol['tipodocumento'],                       // CEDULA, PASAPORTE
        'numerodocumento'=>$datasol['numerodocumento'],
        'ruc_personal'=>$datasol['ruc_personal'],                         // opcional no obligatorio
        'sexo'=>$datasol['sexo'],
        'fecha_nacimiento'=>$datasol['fecha_nacimiento'],
        'nacionalidad'=>$datasol['nacionalidad'],
        'telfCelular'=>$datasol['telfCelular'],
        'telfCelular2'=>$datasol['telfCelular2'],
        'telfFijo'=>$datasol['telfFijo'],                                 // opcional no obligatorio 
        'eMail'=>$datasol['eMail'],
        'eMail2'=>$datasol['cm3'],
        'provincia'=>$datasol['provincia'],
        'ciudad'=>$datasol['ciudad'],
        'direccion'=>$datasol['direccion'],
        'vigenciafirma'=>$datasol['vigenciafirma'],
        'f_cedulaFront'=>$datasol['f_cedulaFront'],                       // JPG codificado en BASE64
        'f_cedulaBack'=>$datasol['f_cedulaBack'],                         // JPG codificado en BASE64
        'f_selfie'=>$datasol['f_selfie'],                                 // JPG codificado en BASE64
        'f_copiaruc'=>$datasol['f_copiaruc'],                             // PDF codificado en BASE64
        'f_adicional1'=>$datasol['f_adicional1'],                         // PDF,JPG o MP4 codificado en BASE64
        'f_adicional2'=>$datasol['f_adicional2'],                         // PDF o JPG codificado en BASE64
        'f_adicional3'=>$datasol['f_adicional3'],                         // PDF o JPG codificado en BASE64
        'f_adicional4'=>$datasol['f_adicional4'],                         // PDF o JPG codificado en BASE64
        'coddactilar' =>$datasol['codigodactilar'],
        );

        $data2 = array(
        'apikey'=>APIKEY,
        'uid'=>UID,
        'tipo_solicitud'=>$datasol['tipo_solicitud'],
        'contenedor'=>$datasol['contenedor'],                             // 0:archivo .p12, 1:token, 2:nube
        'nombres'=>$datasol['nombres'],
        'apellido1'=>$datasol['apellido1'],
        'apellido2'=>$datasol['apellido2'],
        'tipodocumento'=>$datasol['tipodocumento'],                       // CEDULA, PASAPORTE
        'numerodocumento'=>$datasol['numerodocumento'],
        'sexo'=>$datasol['sexo'],
        'fecha_nacimiento'=>$datasol['fecha_nacimiento'],
        'nacionalidad'=>$datasol['nacionalidad'],
        'telfCelular'=>$datasol['telfCelular'],  
        'telfCelular2'=>$datasol['telfCelular2'],                         // celular personal
        'telfFijo'=>$datasol['telfFijo'],                                 // opcional no obligatorio 
        'eMail'=>$datasol['eMail'],
        'eMail2'=>$datasol['cm3'],                                      // correo personal
        'empresa'=>$datasol['empresa'],
        'ruc_empresa'=>$datasol['ruc_empresa'],
        'cargo'=>$datasol['cargo'],
        'provincia'=>$datasol['provincia'],                               // provincia de empresa
        'ciudad'=>$datasol['ciudad'],                                     // ciudad de empresa
        'direccion'=>$datasol['direccion'],                               // dirección de empresa
        'vigenciafirma'=>$datasol['vigenciafirma'],
        'f_cedulaFront'=>$datasol['f_cedulaFront'],                       // JPG codificado en BASE64
        'f_cedulaBack'=>$datasol['f_cedulaBack'],                         // JPG codificado en BASE64
        'f_selfie'=>$datasol['f_selfie'],                                 // JPG codificado en BASE64
        'f_copiaruc'=>$datasol['f_copiaruc'],                             // PDF codificado en BASE64
        'f_nombramiento'=>$datasol['f_nombramiento'],                     // PDF codificado en BASE64
        'f_nombramiento2'=>$datasol['f_nombramiento2'],                   // PDF codificado en BASE64
        'f_constitucion'=>$datasol['f_constitucion'],                     // PDF codificado en BASE64
        'f_adicional1'=>$datasol['f_adicional1'],                         // PDF,JPG o MP4 codificado en BASE64
        'f_adicional2'=>$datasol['f_adicional2'],                         // PDF o JPG codificado en BASE64
        'f_adicional3'=>$datasol['f_adicional3'],                         // PDF o JPG codificado en BASE64
        'f_adicional4'=>$datasol['f_adicional4'],                         // PDF o JPG codificado en BASE64
        'coddactilar' =>$datasol['codigodactilar'],
        );

        $data3 = array(
        'apikey'=>APIKEY,
        'uid'=>UID,
        'tipo_solicitud'=>$datasol['tipo_solicitud'],
        'contenedor'=>$datasol['contenedor'],                             // 0:archivo .p12, 1:token, 2:nube
        'nombres'=>$datasol['nombres'],
        'apellido1'=>$datasol['apellido1'],
        'apellido2'=>$datasol['apellido2'],
        'tipodocumento'=>$datasol['tipodocumento'],                       // CEDULA, PASAPORTE
        'numerodocumento'=>$datasol['numerodocumento'],
        'sexo'=>$datasol['sexo'],
        'fecha_nacimiento'=>$datasol['fecha_nacimiento'],
        'nacionalidad'=>$datasol['nacionalidad'],
        'telfCelular'=>$datasol['telfCelular'],  
        'telfCelular2'=>$datasol['telfCelular2'],                         // celular personal
        'telfFijo'=>$datasol['telfFijo'],                                 // opcional no obligatorio 
        'eMail'=>$datasol['eMail'],
        'eMail2'=>$datasol['cm3'],                                       // correo personal
        'empresa'=>$datasol['empresa'],
        'ruc_empresa'=>$datasol['ruc_empresa'],
        'cargo'=>$datasol['cargo'],
        'motivo'=>$datasol['motivo'],                                     // opcional no obligatorio 
        'unidad'=>$datasol['unidad'],                                     // opcional no obligatorio 
        'provincia'=>$datasol['provincia'],                               // provincia de empresa
        'ciudad'=>$datasol['ciudad'],                                     // ciudad de empresa
        'direccion'=>$datasol['direccion'],                               // dirección de empresa
        'nombresRL'=>$datasol['nombresRL'],
        'apellidosRL'=>$datasol['apellidosRL'],
        'tipodocumentoRL'=>$datasol['tipodocumentoRL'],
        'numerodocumentoRL'=>$datasol['numerodocumentoRL'],
        'vigenciafirma'=>$datasol['vigenciafirma'],
        'f_cedulaFront'=>$datasol['f_cedulaFront'],                       // JPG codificado en BASE64
        'f_cedulaBack'=>$datasol['f_cedulaBack'],                         // JPG codificado en BASE64
        'f_selfie'=>$datasol['f_selfie'],                                 // JPG codificado en BASE64
        'f_copiaruc'=>$datasol['f_copiaruc'],                             // PDF codificado en BASE64
        'f_nombramiento'=>$datasol['f_nombramiento'],                     // PDF codificado en BASE64
        'f_nombramiento2'=>$datasol['f_nombramiento2'],                   // PDF codificado en BASE64
        'f_constitucion'=>$datasol['f_constitucion'],                     // PDF codificado en BASE64
        'f_documentoRL'=>$datasol['f_documentoRL'],                       // PDF codificado en BASE64
        'f_autreprelegal'=>$datasol['f_autreprelegal'],                   // PDF codificado en BASE64
        'f_adicional1'=>$datasol['f_adicional1'],                         // PDF,JPG o MP4 codificado en BASE64
        'f_adicional2'=>$datasol['f_adicional2'],                         // PDF o JPG codificado en BASE64
        'f_adicional3'=>$datasol['f_adicional3'],                         // PDF o JPG codificado en BASE64
        'f_adicional4'=>$datasol['f_adicional4'],                         // PDF o JPG codificado en BASE64
        'coddactilar' => $datasol['codigodactilar'],
        );

        $url = 'https://api.uanataca.ec/v4/solicitud';
        $ch = curl_init( $url );
        # Setup request to send json via POST.
        if($datasol['tipo_solicitud'] == 1)
        {
            $payload = json_encode($data1);
        }
        if($datasol['tipo_solicitud'] == 2)
        {
            $payload = json_encode($data2);
        }
        if($datasol['tipo_solicitud'] == 3)
        {
            $payload = json_encode($data3);
        }
        if($datasol['tipo_solicitud'] == 4)
        {
            $payload = json_encode($data4);
        }
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        # Print response.
        $valid = json_decode($result,true);

        // fecha envio de firma a uanataca
        date_default_timezone_set('America/Bogota');
        $fecha_env_firma = date("Y-m-d H:i:s");
        /*print_r($valid);
        exit();*/
        if($valid['result'] == true)
        {
            $obj->updateBy("solicitudes2",array("statusp"=>1, "fecha_env_firma" => $fecha_env_firma),"id_solicitud",$_GET['id']);
            echo "<script type='text/javascript'>alert('".$valid['message']."');window.location='Registros_Solictudes.html';</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('".$valid['message']."');window.location='Registros_Solictudes.html';</script>";
        }
    }

    public function ListSoli(){
       $obj=new EntidadBase();
       $datasol=$obj->getById($_GET['id'],"solicitudes2","id_solicitud");

       $status = "";

        if($datasol['tipo_solicitud'] == 1)
        {
            $status = array(
            'apikey'=>APIKEY,
            'uid'=>UID,                                        
            'documento'=>$datasol['numerodocumento'], // CEDULA, PERSONA JURIDICA = RUC
            'tipo_solicitud'=>'PERSONA NATURAL', // PERSONA NATURAL, REPRESENTANTE LEGAL, MIEMBRO DE EMPRESA
            );
        }

        if($datasol['tipo_solicitud'] == 2)
        {
            $status = array(
            'apikey'=>APIKEY,
            'uid'=>UID,                                        
            'documento'=>$datasol['numerodocumento'], // CEDULA, PERSONA JURIDICA = RUC
            'tipo_solicitud'=>'REPRESENTANTE LEGAL', // PERSONA NATURAL, REPRESENTANTE LEGAL, MIEMBRO DE EMPRESA
            );
        }

        if($datasol['tipo_solicitud'] == 3)
        {
            $status = array(
            'apikey'=>APIKEY,
            'uid'=>UID,                                        
            'documento'=>$datasol['numerodocumento'], // CEDULA, PERSONA JURIDICA = RUC
            'tipo_solicitud'=>'MIEMBRO DE EMPRESA', // PERSONA NATURAL, REPRESENTANTE LEGAL, MIEMBRO DE EMPRESA
            );
        }

        $url = 'https://api.uanataca.ec/v4/consultarEstado';
        $ch = curl_init( $url );
        
        # Setup request to send json via POST.
        $payload = json_encode($status);
        //print_r($payload);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = curl_exec($ch);
        
        curl_close($ch);
        # Print response.
        $valid = json_decode($result,true);
        
        //print_r($result);
        //exit();
        

        if($datasol['tipo_solicitud'] == 1)
        {
            $this->view("list_soli2",array(
           "datos"=>$valid['data']['solicitudes']
           ));
        }

        if($datasol['tipo_solicitud'] == 2)
        {
            $this->view("list_soli3",array(
           "datos"=>$valid['data']['solicitudes']
           ));
        }

        if($datasol['tipo_solicitud'] == 3)
        {
            $this->view("list_soli4",array(
           "datos"=>$valid['data']['solicitudes']
           ));
        }

        
    }

    public function EditSoli(){
        $obj=new EntidadBase();
        $data=$obj->getById($_GET['id'],"solicitudes2","id_solicitud");

        $data['f_cedulaFront'] = "";
        $data['f_cedulaBack'] = "";
        $data['f_selfie'] = "";
        $data['f_copiaruc'] = "";
        $data['f_nombramiento'] = "";
        $data['f_nombramiento2'] = "";
        $data['f_constitucion'] = "";
        $data['f_documentoRL'] = "";
        $data['f_autreprelegal'] = "";
        $data['f_adicional1'] = "";
        $data['f_adicional2'] = "";
        $data['f_adicional3'] = "";
        $data['f_adicional4'] = "";
        $data['cm2'] = "";
        $data['f_ced_pass_fact'] = "";
        $data['f_ruc_ced_fact'] = "";

        $datasol2=$obj->getAllById($_GET['id'],"arc_sol","id_solicitud");

        foreach ($datasol2 as $key => $value) {
            $data[$value['tipo']] =  $value['archivo'];
        }

        if($data['tipo_solicitud'] == 1)
        {
            $this->view("edit_sol1",array(
           "datos"=>$data
           ));
        }

        if($data['tipo_solicitud'] == 2)
        {
            $this->view("edit_sol2",array(
           "datos"=>$data
           ));
        }

        if($data['tipo_solicitud'] == 3)
        {
            $this->view("edit_sol3",array(
           "datos"=>$data
           ));
        }
    }

    public function VerSoli(){
        print_r('hola mundo');
        $obj=new EntidadBase();
        $data=$obj->getById($_GET['id'],"solicitudes2","id_solicitud");

        $data['f_cedulaFront'] = "";
        $data['f_cedulaBack'] = "";
        $data['f_selfie'] = "";
        $data['f_copiaruc'] = "";
        $data['f_nombramiento'] = "";
        $data['f_nombramiento2'] = "";
        $data['f_constitucion'] = "";
        $data['f_documentoRL'] = "";
        $data['f_autreprelegal'] = "";
        $data['f_adicional1'] = "";
        $data['f_adicional2'] = "";
        $data['f_adicional3'] = "";
        $data['f_adicional4'] = "";
        $data['cm2'] = "";
        $data['f_ced_pass_fact'] = "";
        $data['f_ruc_ced_fact'] = "";

        $datasol2=$obj->getAllById($_GET['id'],"arc_sol","id_solicitud");

        foreach ($datasol2 as $key => $value) {
            $data[$value['tipo']] =  $value['archivo'];
        }

        if($data['tipo_solicitud'] == 1)
        {
            $this->view("view_sol1",array(
           "datos"=>$data
           ));
        }

        if($data['tipo_solicitud'] == 2)
        {
            $this->view("view_sol2",array(
           "datos"=>$data
           ));
        }

        if($data['tipo_solicitud'] == 3)
        {
            $this->view("view_sol3",array(
           "datos"=>$data
           ));
        }
    }
        
    public function regsol(){

        date_default_timezone_set('America/Bogota');
        $archivos = array();
        if(isset($_FILES['f_cedulaFront']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_cedulaFront']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_cedulaFront']['size'];
            $file_tmp= $_FILES['f_cedulaFront']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_cedulaFront'] = $base64;
                    $archivos['f_cedulaFront'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_cedulaFront'] = "";
            }*/
        }

        if(isset($_FILES['f_cedulaBack']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_cedulaBack']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_cedulaBack']['size'];
            $file_tmp= $_FILES['f_cedulaBack']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_cedulaBack'] = $base64;
                    $archivos['f_cedulaBack'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_cedulaBack'] = "";
            }*/
        }

        if(isset($_FILES['f_selfie']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_selfie']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_selfie']['size'];
            $file_tmp= $_FILES['f_selfie']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_selfie'] = $base64;
                    $archivos['f_selfie'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_selfie'] = "";
            }*/
        }

        if(isset($_FILES['f_copiaruc']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_copiaruc']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_copiaruc']['size'];
            $file_tmp= $_FILES['f_copiaruc']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_copiaruc'] = $base64;
                    $archivos['f_copiaruc'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_copiaruc'] = "";
            }*/
        }

        if(isset($_FILES['f_nombramiento']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_nombramiento']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_nombramiento']['size'];
            $file_tmp= $_FILES['f_nombramiento']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_nombramiento'] = $base64;
                    $archivos['f_nombramiento'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_nombramiento'] = "";
            }*/
        }

        if(isset($_FILES['f_nombramiento2']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_nombramiento2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_nombramiento2']['size'];
            $file_tmp= $_FILES['f_nombramiento2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_nombramiento2'] = $base64;
                    $archivos['f_nombramiento2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_nombramiento2'] = "";
            }*/
        }

        if(isset($_FILES['f_constitucion']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_constitucion']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_constitucion']['size'];
            $file_tmp= $_FILES['f_constitucion']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_constitucion'] = $base64;
                    $archivos['f_constitucion'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_constitucion'] = "";
            }*/
        }

        if(isset($_FILES['f_documentoRL']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_documentoRL']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_documentoRL']['size'];
            $file_tmp= $_FILES['f_documentoRL']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_documentoRL'] = $base64;
                    $archivos['f_documentoRL'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_documentoRL'] = "";
            }*/
        }

        if(isset($_FILES['f_autreprelegal']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_autreprelegal']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_autreprelegal']['size'];
            $file_tmp= $_FILES['f_autreprelegal']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_autreprelegal'] = $base64;
                    $archivos['f_autreprelegal'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_autreprelegal'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional1']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf','mp4');
            $file_name =$_FILES['f_adicional1']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional1']['size'];
            $file_tmp= $_FILES['f_adicional1']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional1'] = $base64;
                    $archivos['f_adicional1'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional1'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional2']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional2']['size'];
            $file_tmp= $_FILES['f_adicional2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional2'] = $base64;
                    $archivos['f_adicional2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional2'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional3']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional3']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional3']['size'];
            $file_tmp= $_FILES['f_adicional3']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional3'] = $base64;
                    $archivos['f_adicional3'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional3'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional4']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional4']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional4']['size'];
            $file_tmp= $_FILES['f_adicional4']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional4'] = $base64;
                    $archivos['f_adicional4'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional4'] = "";
            }*/
        }

        if(isset($_FILES['cm2']))
        {
            $errors=array();
            $allowed_ext= array('mp4');
            $file_name =$_FILES['cm2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['cm2']['size'];
            $file_tmp= $_FILES['cm2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 7340032)
                {
                    $errors[]= 'File size must be under 7mb';

                }
                if(empty($errors))
                {
                    //$_POST['cm2'] = $base64;
                    $archivos['cm2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['cm2'] = "";
            }*/
        }

        if(isset($_FILES['f_ced_pass_fact']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_ced_pass_fact']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_ced_pass_fact']['size'];
            $file_tmp= $_FILES['f_ced_pass_fact']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_ced_pass_fact'] = $base64;
                    $archivos['f_ced_pass_fact'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_ced_pass_fact'] = "";
            }*/
        }

        if(isset($_FILES['f_ruc_ced_fact']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_ruc_ced_fact']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_ruc_ced_fact']['size'];
            $file_tmp= $_FILES['f_ruc_ced_fact']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_ruc_ced_fact'] = $base64;
                    $archivos['f_ruc_ced_fact'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_ruc_ced_fact'] = "";
            }*/
        }

        

        $_POST['fecha_nacimiento'] = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));

        $colums = array('tipo_solicitud',
        'contenedor',
        'nombres',
        'apellido1',
        'apellido2',
        'tipodocumento',
        'numerodocumento',
        'ruc_personal',
        'sexo',
        'fecha_nacimiento',
        'nacionalidad',
        'telfCelular',
        'telfCelular2',
        'telfFijo',
        'eMail',
        'empresa',
        'ruc_empresa',
        'cargo',
        'motivo',
        'unidad',
        'provincia',
        'ciudad',
        'nombresRL',
        'apellidosRL',
        'tipodocumentoRL',
        'numerodocumentoRL',
        'vigenciafirma',
        'direccion',
        /*'f_cedulaFront',
        'f_cedulaBack',
        'f_selfie',
        'f_copiaruc',
        'f_nombramiento',
        'f_nombramiento2',
        'f_constitucion',
        'f_documentoRL',
        'f_autreprelegal',
        'f_adicional1',
        'f_adicional2',
        'f_adicional3',
        'f_adicional4',*/
        'cm1',
        //'cm2',
        'cm3',
        'cm4',
        'cm5',
        'cm6',
        'factu',
        // 'forma_pago',
        'ruc_ced_fact',
        'nombres_fact',
        'correo_fact',
        'direccion_fact',
        'telef_fact',
        //'f_ced_pass_fact',
        //'f_ruc_ced_fact',
        'comentarios_fact',
        'nombre_partner',
        'servicio_express',
        'fecha_ing_firma',
        'fecha_env_firma',
        'codigodactilar');


        $values = array($_POST['tipo_solicitud'],
        $_POST['contenedor'],
        $_POST['nombres'],
        $_POST['apellido1'],
        $_POST['apellido2'],
        $_POST['tipodocumento'],
        $_POST['numerodocumento'],
        $_POST['ruc_personal'],
        $_POST['sexo'],
        $_POST['fecha_nacimiento'],
        $_POST['nacionalidad'],
        $_POST['telfCelular'],
        $_POST['telfCelular2'],
        $_POST['telfFijo'],
        $_POST['eMail'],
        $_POST['empresa'],
        $_POST['ruc_empresa'],
        $_POST['cargo'],
        $_POST['motivo'],
        $_POST['unidad'],
        $_POST['provincia'],
        $_POST['ciudad'],
        $_POST['nombresRL'],
        $_POST['apellidosRL'],
        $_POST['tipodocumentoRL'],
        $_POST['numerodocumentoRL'],
        $_POST['vigenciafirma'],
        $_POST['direccion'],
        /*$_POST['f_cedulaFront'],
        $_POST['f_cedulaBack'],
        $_POST['f_selfie'],
        $_POST['f_copiaruc'],
        $_POST['f_nombramiento'],
        $_POST['f_nombramiento2'],
        $_POST['f_constitucion'],
        $_POST['f_documentoRL'],
        $_POST['f_autreprelegal'],
        $_POST['f_adicional1'],
        $_POST['f_adicional2'],
        $_POST['f_adicional3'],
        $_POST['f_adicional4'],*/
        $_POST['cm1'],
        //$_POST['cm2'],
        $_POST['cm3'],
        $_POST['cm4'],
        $_POST['cm5'],
        $_POST['cm6'],
        $_POST['factu'],
        // $_POST['forma_pago'],
        $_POST['ruc_ced_fact'],
        $_POST['nombres_fact'],
        $_POST['correo_fact'],
        $_POST['direccion_fact'],
        $_POST['telef_fact'],
        //$_POST['f_ced_pass_fact'],
        //$_POST['f_ruc_ced_fact'],
        $_POST['comentarios_fact'],
        $_POST['nombre_partner'],
        $_POST['servicio_express'],
        $_POST['fecha_ing_firma'],
        $_POST['fecha_env_firma'],
        $_POST['codigodactilar']);

        $obj=new EntidadBase();
        /*print_r($_POST);
        exit();
        
        echo '<Br>';
        print_r($archivos);*/
  

        
        $exito = $obj->insertsol('solicitudes2',$colums,$values,'arc_sol',$archivos);
        //exit();
        //Condicional Registro Valido
        if($exito != 0)
        {
            echo "<script>
                    Swal.fire({
                        title: '¡Tu tramite fue subido con éxito!',
                        html: 'Si necesitas saber el estado de tu tramite o enviar el pago da click <a href=\"https://wa.me/message/X6UL7Y5D6MS4F1\" target=\"_blank\">AQUÍ</a> ',
                        icon: 'success',
                        allowOutsideClick: false,
                        imageUrl: 'web/public/img/working.png',
                        imageWidth: '100px',
                        imageAlt: 'Estamos trabajando',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='Registros_Solictudes.html';
                        }
                    });
                </script>";
        }
        else
        {
            echo "<script>
                    Swal.fire({
                        title: 'No se ha podido registrar su solicitud!',
                        icon: 'error',
                        allowOutsideClick: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='Registros_Solictudes.html';
                        }
                    });
                </script>";
        }
    }

    public function updsol(){

        $archivos = array();
        if(isset($_FILES['f_cedulaFront']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_cedulaFront']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_cedulaFront']['size'];
            $file_tmp= $_FILES['f_cedulaFront']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_cedulaFront'] = $base64;
                    $archivos['f_cedulaFront'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_cedulaFront'] = "";
            }*/
        }

        if(isset($_FILES['f_cedulaBack']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_cedulaBack']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_cedulaBack']['size'];
            $file_tmp= $_FILES['f_cedulaBack']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_cedulaBack'] = $base64;
                    $archivos['f_cedulaBack'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_cedulaBack'] = "";
            }*/
        }

        if(isset($_FILES['f_selfie']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png');
            $file_name =$_FILES['f_selfie']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_selfie']['size'];
            $file_tmp= $_FILES['f_selfie']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_selfie'] = $base64;
                    $archivos['f_selfie'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_selfie'] = "";
            }*/
        }

        if(isset($_FILES['f_copiaruc']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_copiaruc']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_copiaruc']['size'];
            $file_tmp= $_FILES['f_copiaruc']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_copiaruc'] = $base64;
                    $archivos['f_copiaruc'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_copiaruc'] = "";
            }*/
        }

        if(isset($_FILES['f_nombramiento']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_nombramiento']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_nombramiento']['size'];
            $file_tmp= $_FILES['f_nombramiento']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_nombramiento'] = $base64;
                    $archivos['f_nombramiento'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_nombramiento'] = "";
            }*/
        }

        if(isset($_FILES['f_nombramiento2']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_nombramiento2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_nombramiento2']['size'];
            $file_tmp= $_FILES['f_nombramiento2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_nombramiento2'] = $base64;
                    $archivos['f_nombramiento2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_nombramiento2'] = "";
            }*/
        }

        if(isset($_FILES['f_constitucion']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_constitucion']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_constitucion']['size'];
            $file_tmp= $_FILES['f_constitucion']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_constitucion'] = $base64;
                    $archivos['f_constitucion'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_constitucion'] = "";
            }*/
        }

        if(isset($_FILES['f_documentoRL']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_documentoRL']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_documentoRL']['size'];
            $file_tmp= $_FILES['f_documentoRL']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_documentoRL'] = $base64;
                    $archivos['f_documentoRL'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_documentoRL'] = "";
            }*/
        }

        if(isset($_FILES['f_autreprelegal']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_autreprelegal']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_autreprelegal']['size'];
            $file_tmp= $_FILES['f_autreprelegal']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_autreprelegal'] = $base64;
                    $archivos['f_autreprelegal'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_autreprelegal'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional1']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf','mp4');
            $file_name =$_FILES['f_adicional1']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional1']['size'];
            $file_tmp= $_FILES['f_adicional1']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional1'] = $base64;
                    $archivos['f_adicional1'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional1'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional2']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional2']['size'];
            $file_tmp= $_FILES['f_adicional2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional2'] = $base64;
                    $archivos['f_adicional2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional2'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional3']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional3']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional3']['size'];
            $file_tmp= $_FILES['f_adicional3']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional3'] = $base64;
                    $archivos['f_adicional3'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional3'] = "";
            }*/
        }

        if(isset($_FILES['f_adicional4']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_adicional4']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_adicional4']['size'];
            $file_tmp= $_FILES['f_adicional4']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_adicional4'] = $base64;
                    $archivos['f_adicional4'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_adicional4'] = "";
            }*/
        }

        if(isset($_FILES['cm2']))
        {
            $errors=array();
            $allowed_ext= array('mp4');
            $file_name =$_FILES['cm2']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['cm2']['size'];
            $file_tmp= $_FILES['cm2']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 7340032)
                {
                    $errors[]= 'File size must be under 7mb';

                }
                if(empty($errors))
                {
                    //$_POST['cm2'] = $base64;
                    $archivos['cm2'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['cm2'] = "";
            }*/
        }

        if(isset($_FILES['f_ced_pass_fact']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_ced_pass_fact']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_ced_pass_fact']['size'];
            $file_tmp= $_FILES['f_ced_pass_fact']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_ced_pass_fact'] = $base64;
                    $archivos['f_ced_pass_fact'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_ced_pass_fact'] = "";
            }*/
        }

        if(isset($_FILES['f_ruc_ced_fact']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','pdf');
            $file_name =$_FILES['f_ruc_ced_fact']['name'];
            @$file_ext = strtolower( end(explode('.',$file_name)));
            $file_size=$_FILES['f_ruc_ced_fact']['size'];
            $file_tmp= $_FILES['f_ruc_ced_fact']['tmp_name'];
            if(!empty($file_tmp))
            {
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $base64 = base64_encode($data);

                if(in_array($file_ext,$allowed_ext) === false)
                {
                    $errors[]='Extension not allowed';
                }

                if($file_size > 2097152)
                {
                    $errors[]= 'File size must be under 2mb';

                }
                if(empty($errors))
                {
                    //$_POST['f_ruc_ced_fact'] = $base64;
                    $archivos['f_ruc_ced_fact'] = $base64;
                }
                else
                {
                    $result = '{"message":"Formato de Archivo Invalido","result":false}';
                    echo $result;
                    exit();
                }
            }
            /*else
            {
                $_POST['f_ruc_ced_fact'] = "";
            }*/
        }

        

        $_POST['fecha_nacimiento'] = date("Y/m/d", strtotime($_POST['fecha_nacimiento']));

        $dataUp = array();

        foreach($_POST as $key => $value)
        {
            if(!empty($value))
            {
                $dataUp[$key] = $value;
            }
        }

        $obj=new EntidadBase();

        $exito = $obj->updateByNew("solicitudes2",$dataUp,"id_solicitud",$_GET['id'],'arc_sol',$archivos);

        //Condicional Registro Valido
        if($exito == 0)
        {
            echo "<script>
                Swal.fire({
                    title: 'Actualizado con exito!',
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='Registros_Solictudes.html';
                    }
                });
            </script>";
        }
        else
        {
            echo "<script>
            Swal.fire({
                title: 'No se ha podido Actualizar su solicitud!',
                icon: 'error',
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location='Registros_Solictudes.html';
                }
            });
            </script>";
        }
    }

    public function ReportGen1()
    {

        $obj=new EntidadBase();

        $tipoSol = 1;
        if($_POST['desde'] && $_POST['hasta'])
        {
            $data = $obj->selectPerDate("solicitudes2", $_POST['desde'], $_POST['hasta'], $tipoSol);
            $nameReport = 'Desde_' . $_POST['desde'] . '_Hasta_' . $_POST['hasta'];
        }else{
            $data = $obj->getAllPerSol("solicitudes2", $tipoSol);
            $nameReport = 'Todos';
        }

        /*print_r($data);
        exit();*/

        if(empty($data))
        {
            echo "<script type='text/javascript'>alert('No hay registros para Persona Natural');window.location='Registros_Solictudes.html';</script>";
        }else{
            $titles=array();
            $fila = 2;
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Reporte Data")->setDescription("Reporte Data");

            foreach($data as $key => $value)
            {
                $value['f_cedulaFront'] = "";
                $value['f_cedulaBack'] = "";
                $value['f_selfie'] = "";
                $value['f_copiaruc'] = "";
                $value['f_nombramiento'] = "";
                $value['f_nombramiento2'] = "";
                $value['f_constitucion'] = "";
                $value['f_documentoRL'] = "";
                $value['f_autreprelegal'] = "";
                $value['f_adicional1'] = "";
                $value['f_adicional2'] = "";
                $value['f_adicional3'] = "";
                $value['f_adicional4'] = "";
                $value['cm2'] = "";
                $value['f_ced_pass_fact'] = "";
                $value['f_ruc_ced_fact'] = "";
                $value['fecha_ing_firma'] = "";
                $value['fecha_env_firma'] = "";

                $datasol2=$obj->getAllById($value['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol2 as $key2 => $value5) {
                    $value[$value6['tipo']] =  $value5['archivo'];
                }

                if($value['tipo_solicitud'] != 1)
                {
                    continue;
                }
                
                foreach($value as $key2 => $val)
                {
                    $titles[]=$key2;
                }
                break;
            }
            
            if(count($titles) <= 0)
            {
                exit();
            }
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setTitle("Report");
            
            for($i = 0; $i <= count($titles); $i++)
            {
                $column = PHPExcel_Cell::stringFromColumnIndex($i);
                $row = 1;
                $cell = $column.$row;
                $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$titles[$i]);
                colsize($objPHPExcel,$i, '13.14');
                cellfont($objPHPExcel,$cell, 'FFFFFF');
                cellColor($objPHPExcel,$cell, '666666');
            }
            
            $fila = 2;
            
            foreach ($data as $key => $dat) 
            {
                $dat['f_cedulaFront'] = "";
                $dat['f_cedulaBack'] = "";
                $dat['f_selfie'] = "";
                $dat['f_copiaruc'] = "";
                $dat['f_nombramiento'] = "";
                $dat['f_nombramiento2'] = "";
                $dat['f_constitucion'] = "";
                $dat['f_documentoRL'] = "";
                $dat['f_autreprelegal'] = "";
                $dat['f_adicional1'] = "";
                $dat['f_adicional2'] = "";
                $dat['f_adicional3'] = "";
                $dat['f_adicional4'] = "";
                $dat['cm2'] = "";
                $dat['f_ced_pass_fact'] = "";
                $dat['f_ruc_ced_fact'] = "";

                $datasol3=$obj->getAllById($dat['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol3 as $key4 => $value6) {
                    $dat[$value6['tipo']] =  $value6['archivo'];
                }

                

                if($dat['tipo_solicitud'] != 1)
                {
                    continue;
                }

                $i = 0;

                foreach($dat as $key2 => $val)
                {
                    
                    $column = PHPExcel_Cell::stringFromColumnIndex($i);
                    $cell = $column.$fila;
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$val, PHPExcel_Cell_DataType::TYPE_STRING);
                    $i++;
                }
                $fila++;
            }
            
            $filename = 'Reporte_Persona_Natutal_' . $nameReport . '.xlsx';
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);;
            $objWriter->save($filename); 
            
            DownloadFile($filename);
                    
            exit();
        }
        
        
        
        
    }
    
    public function ReportGen2()
    {
        $obj=new EntidadBase();

        $tipoSol = 2;
        if($_POST['desde'] && $_POST['hasta'])
        {
            $data = $obj->selectPerDate("solicitudes2", $_POST['desde'], $_POST['hasta'], $tipoSol);
            $nameReport = 'Desde_' . $_POST['desde'] . '_Hasta_' . $_POST['hasta'];
        }else{
            $data = $obj->getAllPerSol("solicitudes2", $tipoSol);
            $nameReport = 'Todos';
        }

        /*print_r($data);
        exit();*/
        if(empty($data))
        {
            echo "<script type='text/javascript'>alert('No hay registros para Representante Legal');window.location='Registros_Solictudes.html';</script>";
        }else{
            $titles=array();
        
            $fila = 2;
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Reporte Data")->setDescription("Reporte Data");

            foreach($data as $key => $value)
            {
                $value['f_cedulaFront'] = "";
                $value['f_cedulaBack'] = "";
                $value['f_selfie'] = "";
                $value['f_copiaruc'] = "";
                $value['f_nombramiento'] = "";
                $value['f_nombramiento2'] = "";
                $value['f_constitucion'] = "";
                $value['f_documentoRL'] = "";
                $value['f_autreprelegal'] = "";
                $value['f_adicional1'] = "";
                $value['f_adicional2'] = "";
                $value['f_adicional3'] = "";
                $value['f_adicional4'] = "";
                $value['cm2'] = "";
                $value['f_ced_pass_fact'] = "";
                $value['f_ruc_ced_fact'] = "";

                $datasol2=$obj->getAllById($value['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol2 as $key2 => $value5) {
                    $value[$value6['tipo']] =  $value5['archivo'];
                }

                if($value['tipo_solicitud'] != 2)
                {
                    continue;
                }
                
                foreach($value as $key2 => $val)
                {
                    $titles[]=$key2;
                }
                break;
            }
            
            if(count($titles) <= 0)
            {
                exit();
            }
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setTitle("Report");
            
            for($i = 0; $i <= count($titles); $i++)
            {
                $column = PHPExcel_Cell::stringFromColumnIndex($i);
                $row = 1;
                $cell = $column.$row;
                $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$titles[$i]);
                colsize($objPHPExcel,$i, '13.14');
                cellfont($objPHPExcel,$cell, 'FFFFFF');
                cellColor($objPHPExcel,$cell, '666666');
            }
            
            $fila = 2;
            
            foreach ($data as $key => $dat) 
            {
                $dat['f_cedulaFront'] = "";
                $dat['f_cedulaBack'] = "";
                $dat['f_selfie'] = "";
                $dat['f_copiaruc'] = "";
                $dat['f_nombramiento'] = "";
                $dat['f_nombramiento2'] = "";
                $dat['f_constitucion'] = "";
                $dat['f_documentoRL'] = "";
                $dat['f_autreprelegal'] = "";
                $dat['f_adicional1'] = "";
                $dat['f_adicional2'] = "";
                $dat['f_adicional3'] = "";
                $dat['f_adicional4'] = "";
                $dat['cm2'] = "";
                $dat['f_ced_pass_fact'] = "";
                $dat['f_ruc_ced_fact'] = "";

                $datasol3=$obj->getAllById($dat['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol3 as $key4 => $value6) {
                    $dat[$value6['tipo']] =  $value6['archivo'];
                }

                if($dat['tipo_solicitud'] != 2)
                {
                    continue;
                }
                $i = 0;
                foreach($dat as $key2 => $val)
                {
                    
                    $column = PHPExcel_Cell::stringFromColumnIndex($i);
                    $cell = $column.$fila;
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$val, PHPExcel_Cell_DataType::TYPE_STRING);
                    $i++;
                }
                $fila++;
            }
            
            $filename = 'Reporte_Representante_Legal_' . $nameReport . '.xlsx';
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);;
            $objWriter->save($filename); 
            
            DownloadFile($filename);
                    
            exit();
        }
       
        
    }
    
    public function ReportGen3()
    {
        $obj=new EntidadBase();

        $tipoSol = 3;
        if($_POST['desde'] && $_POST['hasta'])
        {
            $data = $obj->selectPerDate("solicitudes2", $_POST['desde'], $_POST['hasta'], $tipoSol);
            $nameReport = 'Desde_' . $_POST['desde'] . '_Hasta_' . $_POST['hasta'];
        }else{
            $data = $obj->getAllPerSol("solicitudes2", $tipoSol);
            $nameReport = 'Todos';
        }

        if(empty($data))
        {
            echo "<script type='text/javascript'>alert('No hay registros para Miembro de Empresa');window.location='Registros_Solictudes.html';</script>";
        }else{
            $titles=array();
        
            $fila = 2;
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Reporte Data")->setDescription("Reporte Data");

            foreach($data as $key => $value)
            {
                $value['f_cedulaFront'] = "";
                $value['f_cedulaBack'] = "";
                $value['f_selfie'] = "";
                $value['f_copiaruc'] = "";
                $value['f_nombramiento'] = "";
                $value['f_nombramiento2'] = "";
                $value['f_constitucion'] = "";
                $value['f_documentoRL'] = "";
                $value['f_autreprelegal'] = "";
                $value['f_adicional1'] = "";
                $value['f_adicional2'] = "";
                $value['f_adicional3'] = "";
                $value['f_adicional4'] = "";
                $value['cm2'] = "";
                $value['f_ced_pass_fact'] = "";
                $value['f_ruc_ced_fact'] = "";

                $datasol2=$obj->getAllById($value['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol2 as $key2 => $value5) {
                    $value[$value6['tipo']] =  $value5['archivo'];
                }

                if($value['tipo_solicitud'] != 3)
                {
                    continue;
                }
                
                foreach($value as $key2 => $val)
                {
                    $titles[]=$key2;
                }
                break;
            }
            
            if(count($titles) <= 0)
            {
                exit();
            }
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setTitle("Report");
            
            for($i = 0; $i <= count($titles); $i++)
            {
                $column = PHPExcel_Cell::stringFromColumnIndex($i);
                $row = 1;
                $cell = $column.$row;
                $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$titles[$i]);
                colsize($objPHPExcel,$i, '13.14');
                cellfont($objPHPExcel,$cell, 'FFFFFF');
                cellColor($objPHPExcel,$cell, '666666');
            }
            
            $fila = 2;
            
            foreach ($data as $key => $dat) 
            {
                $dat['f_cedulaFront'] = "";
                $dat['f_cedulaBack'] = "";
                $dat['f_selfie'] = "";
                $dat['f_copiaruc'] = "";
                $dat['f_nombramiento'] = "";
                $dat['f_nombramiento2'] = "";
                $dat['f_constitucion'] = "";
                $dat['f_documentoRL'] = "";
                $dat['f_autreprelegal'] = "";
                $dat['f_adicional1'] = "";
                $dat['f_adicional2'] = "";
                $dat['f_adicional3'] = "";
                $dat['f_adicional4'] = "";
                $dat['cm2'] = "";
                $dat['f_ced_pass_fact'] = "";
                $dat['f_ruc_ced_fact'] = "";

                $datasol3=$obj->getAllById($dat['id_solicitud'],"arc_sol","id_solicitud");

                foreach ($datasol3 as $key4 => $value6) {
                    $dat[$value6['tipo']] =  $value6['archivo'];
                }

                if($dat['tipo_solicitud'] != 3)
                {
                    continue;
                }
                $i = 0;
                foreach($dat as $key2 => $val)
                {
                    
                    $column = PHPExcel_Cell::stringFromColumnIndex($i);
                    $cell = $column.$fila;
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($cell,$val, PHPExcel_Cell_DataType::TYPE_STRING);
                    $i++;
                }
                $fila++;
            }
            
            $filename = 'Reporte_Miembro_de_Empresa_' . $nameReport . '.xlsx';
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);;
            $objWriter->save($filename); 
            
            DownloadFile($filename);
                    
            exit();
        }
       
        
    }

}
?>