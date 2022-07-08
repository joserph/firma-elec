<?php
if(isset($_SESSION["lgn_clnt_smt_process"])){
  $varKey_encrpt_for_clnt_prcss_smt = $_SESSION["var_ssn_ecrpt_procs_clnt_smt"];
  if($_SESSION["lgn_clnt_smt_process"]==$varKey_encrpt_for_clnt_prcss_smt){

?>
<div class="col-md-10">
<div class="panel panel-default" id="paneles-system">
              <div class="panel-heading" id="title-panel-regform">
                    <h3 class="panel-title"><i class="fas fa-user-edit"></i>Editar Usuario</h3>
              </div>
             
     
       <div class="panel-body">
  
            <form action="Usuarios_UpUsuario.html" method="POST" class="form-horizontal">
                    
                    <input type="hidden" name="id" value="<?php echo $datos['id_usuario']; ?>">
                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label"></label>
                        <div class="input-group col-xs-5">
                            <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                            <input type="text" name="name" value="<?php echo $datos['nombre']; ?>" class="form-control" id="inputs-login" placeholder="Nombre" onblur="validaName(this)" required>
                        </div>
                        <div id="ape-error"></div> 
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label"></label>
                        <div class="input-group col-xs-5">
                            <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                            <input type="text" name="apel" value="<?php echo $datos['apellido']; ?>" class="form-control" id="inputs-login" placeholder="Apellido" onblur="validaApe(this)" required>
                        </div>
                        <div id="ape-error"></div>          
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label"></label>
                        <div class="input-group col-xs-5">
                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                            <input type="text" name="user" value="<?php echo $datos['usuario']; ?>" class="form-control" id="inputs-login" placeholder="Usuario" onblur="validaUsuario(this)" required>
                        </div>
                        <div id="usu-error"></div>          
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label"></label>
                        <div class="input-group col-xs-5">
                            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                            <input type="password" id="clave" name="clave" class="form-control" id="inputs-login" placeholder="Contraseña">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label"></label>
                        <div class="input-group col-xs-5">
                            <button type="submit" class="btn btn-warning btn-block" id="btn-login-submit" name="loginbtn"><i class="fas fa-sync"></i> Actualizar</button>
                        </div>
                    </div>

                    <br>
                    
                
            </form>

</div>
  <div class="panel-footer">Actualización de Usuarios</div>
</div>
</div>
<?php
}else{
  echo "<script type='text/javascript'>window.location='index.php?ctrl=Usuarios&act=index';</script>";
}
}else{
  echo "<script type='text/javascript'>window.location='index.php?ctrl=Usuarios&act=index';</script>";
}
?>