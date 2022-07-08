<div class="col-md-10">
   <div class="panel panel-default" id="paneles-system">
      <div class="panel-heading" id="title-panel-regform">
         <h3 class="panel-title"><i class="fas fa-user-plus"></i> Agregar Usuario</h3>
      </div>
      <div class="panel-body">
         <form action="Usuarios_registrou.html" method="POST" onSubmit="return validarPasswd()" class="form-horizontal">
            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                  <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                  <input type="text" onkeypress="return check(event)"  name="name" class="form-control" id="inputs-login" placeholder="Nombre" onblur="validaName(this)" required>
               </div>
               <div id="ape-error"></div>
            </div>

            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                  <span class="input-group-addon"><i class="fas fa-user-edit"></i></span>
                  <input type="text" onkeypress="return check(event)" name="apel" class="form-control" id="inputs-login" placeholder="Apellido" onblur="validaApe(this)" required>
               </div>
               <div id="ape-error"></div>          
            </div>

            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                  <span class="input-group-addon"><i class="fas fa-user"></i></span>
                  <input type="text" onkeypress="return check(event)" name="user" class="form-control" id="inputs-login" placeholder="Usuario" onblur="validaUsuario(this)" required>
               </div>
               <div id="usu-error"></div>          
            </div>

            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                  <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                  <input type="password" id="clave" name="clave" class="form-control" id="inputs-login" placeholder="Contraseña" required>
               </div>
            </div>

            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                  <span class="input-group-addon"><i class="far fa-check-square"></i></span>
                  <input type="password" id="cclave" name="cclave" class="form-control" id="inputs-login" placeholder="Confirma Contraseña" required>
               </div>
            </div>

            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5"></div>
               <div id="pass-error"></div>  
            </div>
                    
            <div class="form-group">
               <label class="col-xs-3 control-label"></label>
               <div class="input-group col-xs-5">
                     <button type="submit" class="btn btn-info btn-block" id="btn-login-submit" name="loginbtn"><i class="fas fa-user-plus"></i> Registrar</button>
               </div>
            </div>

                    <br>
                    
                
            </form>

</div>
  <div class="panel-footer">Registro de Usuarios</div>
</div>
</div>

<script>
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    if (tecla == 32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function check2(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    if (tecla == 32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-@._]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>