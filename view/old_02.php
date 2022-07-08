<script type="text/javascript">
      $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
      });
      $(document).ready(function() {
          $('#example-multiple-selected2').multiselect();
      });
</script>


<script type="text/javascript">
window.onload=function(){
/*
//Validacion Cedula 
var pattern = /\d/,
    caja = document.getElementById("doc_ced");

caja.addEventListener("keypress", function(e){
    this.value = this.value.toUpperCase();
    if (this.value.length === 0 && (!(/(E|V|P|e|v|p)/).test(String.fromCharCode(e.charCode))))
        e.preventDefault();
    if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode)) || this.value.length == 10))
        e.preventDefault();
    if (this.value.length === 1)
        this.value += "-";
}, false);

//Validacion Telefono 1
caja2 = document.getElementById("telf");

caja2.addEventListener("keypress", function(e){
        if(e.charCode != 0)
        {
            if (this.value.length === 0 && (!(/(1|2|3|4|5|6|7|8|9|0)/).test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length === 4)
                this.value += "-";
            if (this.value.length === 8)
                this.value += "-";
            if (this.value.length == 13)
            {
                alert("Maximo 13 Caracteres");
                e.preventDefault();
            }
        }
    
}, false);

//Validacion Telefono 2
caja2 = document.getElementById("telf2");

caja2.addEventListener("keypress", function(e){
        if(e.charCode != 0)
        {
            if (this.value.length === 0 && (!(/(1|2|3|4|5|6|7|8|9|0)/).test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length === 4)
                this.value += "-";
            if (this.value.length === 8)
                this.value += "-";
            if (this.value.length == 13)
            {
                alert("Maximo 13 Caracteres");
                e.preventDefault();
            }
        }
    
}, false);

//Validacion Fecha 1
caja2 = document.getElementById("fecha1");

caja2.addEventListener("keypress", function(e){
        if(e.charCode != 0)
        {
            if (this.value.length === 0 && (!(/(1|2|3|4|5|6|7|8|9|0)/).test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length === 2)
                this.value += "/";
            if (this.value.length === 5)
                this.value += "/";
            if (this.value.length == 10)
            {
                alert("Maximo 11 Caracteres");
                e.preventDefault();
            }
        }
    
}, false);

//Validacion Fecha 2
caja2 = document.getElementById("fecha2");

caja2.addEventListener("keypress", function(e){
        if(e.charCode != 0)
        {
            if (this.value.length === 0 && (!(/(1|2|3|4|5|6|7|8|9|0)/).test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length === 2)
                this.value += "/";
            if (this.value.length === 5)
                this.value += "/";
            if (this.value.length == 10)
            {
                alert("Maximo 11 Caracteres");
                e.preventDefault();
            }
        }
    
}, false);

//Validacion Fecha 3
caja2 = document.getElementById("fecha3");

caja2.addEventListener("keypress", function(e){
        if(e.charCode != 0)
        {
            if (this.value.length === 0 && (!(/(1|2|3|4|5|6|7|8|9|0)/).test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length > 0 && (!pattern.test(String.fromCharCode(e.charCode))))
            {
                alert("Solo Numeros");
                e.preventDefault();
            }
            if (this.value.length === 2)
                this.value += "/";
            if (this.value.length === 5)
                this.value += "/";
            if (this.value.length == 10)
            {
                alert("Maximo 11 Caracteres");
                e.preventDefault();
            }
        }
    
}, false);
*/
}//]]> 
</script>


<body>
<div class="container" id="container-form-reguser">
<div class="col-md-10">
 <div class="panel panel-default" id="paneles-system">
              <div class="panel-heading" id="title-panel-regform">
                    <h3 class="panel-title"><h3><span class="glyphicon glyphicon-briefcase"></span>&nbsp;Registro de Representante Legal</h3>
<hr/></h3>
              </div>
             
  
       <div class="panel-body">


<form action="Registros_regsol.html" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

    <div id="alumnos" class="row">
<div id="lo-que-vamos-a-copiar">
    <div class="col-xs-12 col-md-12">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel" style="display:none">
        <div class="stepwizard-step">
            <button class="btn btn-primary btn-circle" type="button" >1</button>
            <a href="#step-1" type="button" class="btn btn-primary btn-circle" style="display:none"></a>
            <p></p>
        </div>
        <div class="stepwizard-step">
            <button class="btn btn-primary btn-circle" type="button" >2</button>
            <a href="#step-2" type="button" class="btn btn-default btn-circle" style="display:none">2</a>
            <p></p>
        </div>
    </div>
</div>

    <div class="row setup-content" id="step-1">
            <div class="col-md-12">
                <input type="hidden" name="tipo_solicitud" class="form-control" value="2">
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="">Tipo de Contenedor</label>
                  <select class="form-control" name="contenedor" required>
                     <option value="">Seleccione Contenedor</option>
                     <option value="0">ARCHIVO .P12</option>
                     <option value="1">TOKEN</option>
                     <option value="2">NUBE</option>
                  </select>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Nombres</label>
                  <input type="text" name="nombres" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="Calos Andres" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Primer Apellido</label>
                  <input type="text" name="apellido1" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="Cardenas" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Segundo Apellido</label>
                  <input type="text" name="apellido2" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="Pasquel" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Documento de Identidad</label>
                  <select class="form-control" name="tipodocumento" required>
                     <option value="">Seleccione Identidad</option>
                     <option value="CEDULA">CEDULA</option>
                     <option value="PASAPORTE">PASAPORTE</option>
                  </select>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                      <label for="nombre">Número de documento</label>
                      <input type="text" name="numerodocumento" class="form-control" placeholder="0102698867" required>
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">RUC Personal</label>
                  <input type="text" name="ruc_personal" class="form-control" placeholder="0102698867001">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Sexo</label>
                  <select class="form-control" name="sexo" required>
                     <option value="">Seleccione Sexo</option>
                     <option value="HOMBRE">HOMBRE</option>
                     <option value="MUJER">MUJER</option>
                  </select>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Fecha de Nacimiento</label>
                  <input type="date" name="fecha_nacimiento" class="form-control" placeholder="" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Nacionalidad</label>
                  <input type="text" name="nacionalidad" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="ECUATORIANA" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Teléfono Celular</label>
                  <input type="text" name="telfCelular" class="form-control" placeholder="0912345678" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Teléfono Celular 2</label>
                  <input type="text" name="telfCelular2" class="form-control" placeholder="0912345678" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Teléfono Fíjo</label>
                  <input type="text" name="telfFijo" class="form-control" placeholder="0912345678">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Correo</label>
                  <input type="email" name="eMail" class="form-control" placeholder="prueba@gmail.com" required>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Empresa</label>
                  <input type="text" name="empresa" class="form-control" placeholder="0912345678">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">RUC Empresa</label>
                  <input type="text" name="ruc_empresa" class="form-control" placeholder="0102698867001">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Cargo</label>
                  <input type="text" name="cargo" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="GERENTE GENERAL">
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Motivo</label>
                  <input type="text" name="motivo" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="FIRMAR FACTURAS DIGITALES">
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Unidad</label>
                  <input type="text" name="unidad" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="DEPARTAMENTO FINANCIERO">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Provincia</label>
                  <select name="provincia" class="form-control" required>
                     <option value="Azuay" selected="selected">Seleccione Provincia</option> 
                     <option value="Azuay">Azuay</option>  
                     <option value="Cañar">Cañar</option>  
                     <option value="Loja">Loja</option>  
                     <option value="Carchi">Carchi</option>  
                     <option value="Imbabura">Imbabura</option>  
                     <option value="Pichincha">Pichincha</option>  
                     <option value="Cotopaxi">Cotopaxi</option>  
                     <option value="Tungurahua">Tungurahua</option>  
                     <option value="Bolívar">Bolívar</option>  
                     <option value="Chimborazo">Chimborazo</option>  
                     <option value="Sto. Domingo de los Tsachilas">Sto. Domingo de los Tsachilas</option>  
                     <option value="Esmeraldas">Esmeraldas</option>  
                     <option value="Manabí">Manabí</option>  
                     <option value="Guayas">Guayas</option>  
                     <option value="Los Ríos">Los Ríos</option>  
                     <option value="El Oro">El Oro</option>  
                     <option value="Santa Elena">Santa Elena</option>  
                     <option value="Sucumbíos">Sucumbíos</option>  
                     <option value="Napo">Napo</option>  
                     <option value="Pastaza">Pastaza</option>  
                     <option value="Orellana">Orellana</option>  
                     <option value="Morona Santiago">Morona Santiago</option>  
                     <option value="Zamora Chinchipe">Zamora Chinchipe</option>  
                     <option value="Galápagos">Galápagos</option>  
                     <option value="Antártida Ecuatoriana">Antártida Ecuatoriana</option>  
                  </select>  
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Ciudad</label>
                  <input type="text" name="ciudad" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="QUITO" required>
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Nombre RL</label>
                  <input type="text" name="nombresRL" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="FERNANDO">
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Apellidos RL</label>
                  <input type="text" name="apellidosRL" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="SAENZ MIÑO">
                  </div>
               </div>
               <div class="form-group col-md-12" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Documento de Identidad RL</label>
                  <select class="form-control" name="tipodocumentoRL">
                     <option value="">Seleccione Identidad RL</option>
                     <option value="CEDULA">CEDULA</option>
                     <option value="PASAPORTE">PASAPORTE</option>
                  </select>
                  </div>
               </div>
               <div class="form-group col-md-6" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Número de documento RL</label>
                  <input type="text" name="numerodocumentoRL" class="form-control" placeholder="0102698867">
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <div class="col-md-12">
                  <label for="nombre">Vigencia de la Firma</label>
                  <select class="form-control" name="vigenciafirma" required>
                     <option value="">Seleccione Vigencia</option>
                     <option value="3 días">3 días</option>
                     <option value="7 días">7 días</option>
                     <option value="1 año">1 Año</option>
                     <option value="2 años">2 Años</option>
                     <option value="3 años">3 Años</option>
                     <option value="4 años">4 Años</option>
                     <option value="5 años">5 Años</option>
                  </select>
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Dirección</label>
                  <input type="text" name="direccion" class="form-control" onblur="revisar(this); revisarletras(this)" placeholder="Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE" required>
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Foto Cédula Frontal</label>
                  <input type="file" name="f_cedulaFront" class="form-control" required>
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Foto Cédula Posterior</label>
                  <input type="file" name="f_cedulaBack" class="form-control" required>
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Foto Tipo Selfie</label>
                  <input type="file" name="f_selfie" class="form-control" required>
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Copia RUC</label>
                  <input type="file" name="f_copiaruc" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Acta de Nombramiento</label>
                  <input type="file" name="f_nombramiento" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Acta de Nombramiento 2</label>
                  <input type="file" name="f_nombramiento2" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Acta Constitución</label>
                  <input type="file" name="f_constitucion" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Documento RL</label>
                  <input type="file" name="f_documentoRL" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11" style="display:none">
                  <div class="col-md-12">
                  <label for="nombre">Autorización RL</label>
                  <input type="file" name="f_autreprelegal" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Documento Adicional 1</label>
                  <input type="file" name="f_adicional1" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Documento Adicional 2</label>
                  <input type="file" name="f_adicional2" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Documento Adicional 3</label>
                  <input type="file" name="f_adicional3" class="form-control">
                  </div>
               </div>
               <div class="form-group col-md-11">
                  <div class="col-md-12">
                  <label for="nombre">Documento Adicional 4</label>
                  <input type="file" name="f_adicional4" class="form-control">
                  </div>
               </div>
                
            </div>
        <div class="form-group col-md-11">
          <button class="btn btn-default nextBtn pull-right" type="button" >Siguiente</button>
        </div>   
    </div>

    <div class="row setup-content" id="step-2">
            <div class="col-md-12">
             <div class="form-group col-md-6">
                 <div class="col-md-12">
                      <label class="control-label">Campo 1</label>
                      <input maxlength="100" type="text" name="cm1" id="fecha2" class="form-control" placeholder="" />
                    </div>
                </div>

                 <div class="form-group col-md-6">
                    <div class="col-md-12">
                      <label class="control-label">Campo 2</label>
                      <input maxlength="100" type="text" name="cm2" id="fecha3" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="col-md-12">
                      <label class="control-label">Campo 3</label>
                      <input maxlength="100" type="text" name="cm3" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="col-md-12">
                      <label class="control-label">Campo 4</label>
                      <input maxlength="100" type="text" name="cm4" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="col-md-12">
                      <label class="control-label">Campo 5</label>
                      <input maxlength="100" type="text" name="cm5" class="form-control" placeholder="" />
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="col-md-12">
                      <label class="control-label">Campo 6</label>
                      <input maxlength="100" type="text" name="cm6" class="form-control" placeholder="" />
                    </div>
                </div>
            </div>
    
        <div class="form-group col-md-11">
          <button class="btn btn-success pull-right" name="regalum"  type="submit" >Guardar</button>
        </div>   
    </div>
</form>
</div>


  <!--FIN DE FORM DINAMICO!!-->

    </div>            
</div>

    </div>



 </form>
 <div class="panel-footer">
             <p>
                 <i class="fa fa-info-circle fa-lg" id="footer-panel-reguser"></i>&nbsp;Asegurese de completar todos los campos para que su registro se lleve a cabo éxitosamente.
             </p>
  </div>

 </div>

</div>
  
</div>

</div>

</body>