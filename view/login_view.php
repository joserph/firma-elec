<div class="container" id="form-login-admin">
    
    <div class="row">
        
        <div class="col-xs-12 well" id="col-form-login">

            
            <form action="Usuarios_login.html" method="POST">

                    <div class="form-group">
                        
                        <legend>Iniciar Sesión</legend>

                    </div>
                
                    <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="user" class="form-control" id="inputs-login" placeholder="Usuario" required>
                    </div>          
                    </div>

                    <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="clave" class="form-control" id="inputs-login" placeholder="Contraseña" required>
                    </div>
                    </div>

                    <!--<div class="form-group">
                    <div class="input-group">
                        <center><div class="g-recaptcha" data-sitekey="6LdYcRcTAAAAAFAGW-yLNkc_nZscrodlcQUIQKll"></div></center>
                    </div>
                    </div>-->

                    <div class="form-group">
                
                        <button type="submit" class="btn btn-default btn-block" id="btn-login-submit" name="loginbtn">Ingresar</button>
           
                    </div>

                    <br>
                    
                
            </form>

        </div>

    </div>

</div>