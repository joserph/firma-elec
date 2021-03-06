<script type="text/javascript">
      $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
      });
      $(document).ready(function() {
          $('#example-multiple-selected2').multiselect();
      });
</script>

<div class="col-md-10">
   <div class="panel panel-info" id="paneles-system">
      <div class="panel-heading" id="title-panel-regform">
         <h2 class="panel-title"><i class="far fa-address-book"></i> Registro de Persona Natural</h2>
      </div>
      <div class="panel-body">
         <form action="Registros_regsol.html" method="POST" class="form-horizontal" role="form" id="persona_natutal" enctype="multipart/form-data">
            <?php date_default_timezone_set('America/Bogota'); ?>
            <input type="hidden" name="fecha_ing_firma" value="<?php echo date("Y-m-d H:i:s"); ?>">
            <input type="hidden" name="fecha_env_firma" value="<?php echo date("Y-m-d H:i:s"); ?>">
            <!--<div id="alumnos" class="row">-->
               <!--<div id="lo-que-vamos-a-copiar">-->
                  <div class="col-md-12">
                     <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                           <div class="stepwizard-step">
                              <!--<button class="btn btn-primary btn-circle" type="button" >1</button>-->
                              <a href="#step-1" type="button" class="btn btn-primary">Datos Personales</a>
                              <p></p>
                           </div>
                           <div class="stepwizard-step">
                              <!--<button class="btn btn-primary btn-circle" type="button" >2</button>-->
                              <a href="#step-2" type="button" class="btn btn-default" disabled="disabled">Adjuntos</a>
                              <p></p>
                           </div>
                           
                        </div>
                     </div>
                     <div class="text-warning"><p>(<i class="fab fa-diaspora text-warning"></i>) <em>Campo Requerido</em></p></div>
                     <div class="row setup-content" id="step-1">
                        <input type="hidden" name="tipo_solicitud" class="form-control" value="1">
                        <div class="form-group col-md-4" id="g_contenedor">
                           <div class="col-md-12">
                              <label for="">Tipo de Certificado <i class="fab fa-diaspora text-warning"></i></label>
                              <select class="form-control" name="contenedor" id="contenedor" required onchange="token();">
                                 <option value="">Seleccione Certificado</option>
                                 <option value="0">ARCHIVO .P12</option>
                                 <option value="1">TOKEN</option>
                                 <option value="2">NUBE</option>
                              </select>
                              <span id="error_contenedor" class="help-block ocultar"><small>Debe seleccionar un tipo de contenedor</small></span>
                           </div>
                           
                        </div>
                        <div class="form-group col-md-6" id="g_nombres">
                           <div class="col-md-12">
                              <label for="nombre">Nombres <i class="fab fa-diaspora text-warning"></i></label>
                              <input type="text" name="nombres" class="form-control" placeholder="Calos Andres" required>
                              <span id="error_nombres" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_apellido1">
                           <div class="col-md-12">
                              <label for="nombre">Primer Apellido <i class="fab fa-diaspora text-warning"></i></label>
                              <input type="text" name="apellido1" class="form-control" placeholder="Cardenas" required>
                              <span id="error_apellido1" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_apellido2">
                           <div class="col-md-12">
                           <label for="nombre">Segundo Apellido </label>
                           <input type="text" name="apellido2" class="form-control" placeholder="Pasquel">
                           <span id="error_apellido2" class="help-block ocultar"><small>No acepta n??meros ni caracteres especiales</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_tipodocumento">
                           <div class="col-md-12">
                           <label for="nombre">Documento de Identidad <i class="fab fa-diaspora text-warning"></i></label>
                           <select class="form-control" name="tipodocumento" required>
                              <option value="">Seleccione Identidad</option>
                              <option value="CEDULA">CEDULA</option>
                              <option value="PASAPORTE">PASAPORTE</option>
                           </select>
                           <span id="error_tipodocumento" class="help-block ocultar"><small>Debe seleccionar un Documento de Identidad</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_numerodocumento">
                           <div class="col-md-12">
                              <label for="nombre">N??mero de documento <i class="fab fa-diaspora text-warning"></i></label>
                              <input type="text" name="numerodocumento" id="numerodocumento" maxlength=13 onblur="validarDocumento('numerodocumento')" class="form-control" placeholder="0102698867" required>
                           </div>
                        </div>
                              <div class="form-group col-md-4" id="g_cm1">
                                 <div class="col-md-12">
                                 <label for="nombre">Con RUC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <label class="radio-inline">
                                    <input type="radio" name="cm1" class="con_ruc" id="no_ruc" onclick="ruc(0)" value="No"> No
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="cm1" class="con_ruc" id="si_ruc" onclick="ruc(1)" value="Si"> Si
                                    </label>
                                 </div>
                              </div>

                              <div class="form-group col-md-4 ocultar" id="g_ruc_personal">
                                 <div class="col-md-12">
                                 <label for="nombre">RUC Personal <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="ruc_personal" id="ruc_personal" class="form-control" maxlength=13 onblur="validarDocumento('ruc_personal')" placeholder="0102698867001">
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_sexo">
                                 <div class="col-md-12">
                                 <label for="nombre">Sexo <i class="fab fa-diaspora text-warning"></i></label>
                                 <select class="form-control" name="sexo" required>
                                    <option value="">Seleccione Sexo</option>
                                    <option value="HOMBRE">HOMBRE</option>
                                    <option value="MUJER">MUJER</option>
                                 </select>
                                 <span id="error_sexo" class="help-block ocultar"><small>El campo es requerido y debe seleccionar un tipo de Sexo</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_fecha_nacimiento">
                                 <div class="col-md-12">
                                 <label for="nombre">Fecha de Nacimiento <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="date" name="fecha_nacimiento" class="form-control" placeholder="" required>
                                 <span id="error_fecha_nacimiento" class="help-block ocultar"><small>El campo es requerido</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_nacionalidad">
                                 <div class="col-md-12">
                                 <label for="nombre">Nacionalidad <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="nacionalidad" class="form-control" placeholder="ECUATORIANA" required>
                                 <span id="error_nacionalidad" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_telfCelular">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono Celular <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="telfCelular" class="form-control" placeholder="0912345678" required>
                                 <span id="error_telfCelular" class="help-block ocultar"><small>El campo es requerido y no acepta letras ni caracteres especiales</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_telfCelular2">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono Celular 2 <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="telfCelular2" class="form-control" placeholder="0912345678" required>
                                 <span id="error_telfCelular2" class="help-block ocultar"><small>El campo es requerido y no acepta letras ni caracteres especiales</small></span>
                                 </div>
                              </div>
                              <!--<div class="form-group col-md-4" id="g_telfFijo" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono F??jo</label>-->
                                 <input type="hidden" name="telfFijo" class="form-control" placeholder="0912345678">
                                 <!--<span id="error_telfFijo" class="help-block ocultar"><small>No acepta letras ni caracteres especiales</s</small>pan>
                                 </div>
                              </div>-->
                              <div class="form-group col-md-4" id="g_eMail">
                                 <div class="col-md-12">
                                 <label for="nombre">Correo <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="email" name="eMail" class="form-control" placeholder="prueba@gmail.com" required>
                                 <span id="error_eMail" class="help-block ocultar"><small>El campo es requerido y debe ingresar un correo valido</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_cm3">
                                 <div class="col-md-12">
                                 <label for="nombre">Correo 2 <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="email" name="cm3" class="form-control" placeholder="prueba2@gmail.com" required>
                                 <span id="error_cm3" class="help-block ocultar"><small>El campo es requerido y debe ingresar un correo valido</small></span>
                                 </div>
                              </div>
                              <!-- 5 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Empresa</label>
                                 <input type="text" name="empresa" class="form-control" placeholder="0912345678">
                                 <span id="error_empresa" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">RUC Empresa</label>
                                 <input type="text" name="ruc_empresa" class="form-control" placeholder="0102698867001">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Cargo</label>
                                 <input type="text" name="cargo" class="form-control" placeholder="GERENTE GENERAL">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Motivo</label>
                                 <input type="text" name="motivo" class="form-control" placeholder="FIRMAR FACTURAS DIGITALES">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Unidad</label>
                                 <input type="text" name="unidad" class="form-control" placeholder="DEPARTAMENTO FINANCIERO">
                                 </div>
                              </div>
                              <!-- END -->
                              <div class="form-group col-md-4" id="g_provincia">
                                 <div class="col-md-12">
                                 <label for="nombre">Provincia <i class="fab fa-diaspora text-warning"></i></label>
                                 <select name="provincia" class="form-control" required>
                                    <option value="" selected="selected">Seleccione Provincia</option> 
                                    <option value="Azuay">Azuay</option>  
                                    <option value="Ca??ar">Ca??ar</option>  
                                    <option value="Loja">Loja</option>  
                                    <option value="Carchi">Carchi</option>  
                                    <option value="Imbabura">Imbabura</option>  
                                    <option value="Pichincha">Pichincha</option>  
                                    <option value="Cotopaxi">Cotopaxi</option>  
                                    <option value="Tungurahua">Tungurahua</option>  
                                    <option value="Bol??var">Bol??var</option>  
                                    <option value="Chimborazo">Chimborazo</option>  
                                    <option value="Sto. Domingo de los Tsachilas">Sto. Domingo de los Tsachilas</option>  
                                    <option value="Esmeraldas">Esmeraldas</option>  
                                    <option value="Manab??">Manab??</option>  
                                    <option value="Guayas">Guayas</option>  
                                    <option value="Los R??os">Los R??os</option>  
                                    <option value="El Oro">El Oro</option>  
                                    <option value="Santa Elena">Santa Elena</option>  
                                    <option value="Sucumb??os">Sucumb??os</option>  
                                    <option value="Napo">Napo</option>  
                                    <option value="Pastaza">Pastaza</option>  
                                    <option value="Orellana">Orellana</option>  
                                    <option value="Morona Santiago">Morona Santiago</option>  
                                    <option value="Zamora Chinchipe">Zamora Chinchipe</option>  
                                    <option value="Gal??pagos">Gal??pagos</option>  
                                    <option value="Ant??rtida Ecuatoriana">Ant??rtida Ecuatoriana</option>  
                                 </select>
                                 <span id="error_provincia" class="help-block ocultar"><small>El campo es requerido y debe seleccionar una Provincia</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_ciudad">
                                 <div class="col-md-12">
                                 <label for="nombre">Ciudad <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="ciudad" class="form-control" placeholder="QUITO" required>
                                 <span id="error_ciudad" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                                 </div>
                              </div>
                              <!-- 4 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Nombre RL</label>
                                 <input type="text" name="nombresRL" class="form-control" placeholder="FERNANDO">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Apellidos RL</label>
                                 <input type="text" name="apellidosRL" class="form-control" placeholder="SAENZ MI??O">
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
                                 <label for="nombre">N??mero de documento RL</label>
                                 <input type="text" name="numerodocumentoRL" class="form-control" placeholder="0102698867">
                                 </div>
                              </div>
                              <!-- END -->
                              <div class="form-group col-md-12" id="g_direccion">
                                 <div class="col-md-11">
                                 <label for="nombre">Direcci??n <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE" required>
                                 <span id="error_direccion" class="help-block ocultar"><small>El campo es requerido</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-5" id="g_vigenciafirma">
                                 <div class="col-md-12">
                                 <label for="nombre">Seleccione Vigencia o Duraci??n <i class="fab fa-diaspora text-warning"></i></label>
                                 <select class="form-control" name="vigenciafirma" required>
                                    <option value="">Seleccione Vigencia</option>
                                    <option value="1 a??o">1 A??o</option>
                                    <option value="2 a??os">2 A??os</option>
                                    <option value="3 a??os">3 A??os</option>
                                    <option value="4 a??os">4 A??os</option>
                                    <option value="5 a??os">5 A??os</option>
                                    <option value="7 d??as">7 d??as</option>
                                 </select>
                                 <span id="error_vigenciafirma" class="help-block ocultar"><small>El campo es requerido y debe seleccionar una Vigencia</small></span>
                                 </div>
                              </div>
                              <div class="form-group col-md-12 ocultar" id="g_cm4">
                                 <div class="col-md-11">
                                 <label for="nombre">Direcci??n de Entrega <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" name="cm4" id="cm4" class="form-control" placeholder="Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE">
                                 <span id="error_direccion" class="help-block ocultar"><small>El campo es requerido</small></span>
                                 </div>
                              </div>
                              
                              <!-- 5 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Acta de Nombramiento</label>
                                 <input type="file" name="f_nombramiento" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Acta de Nombramiento 2</label>
                                 <input type="file" name="f_nombramiento2" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Acta Constituci??n</label>
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
                                 <label for="nombre">Autorizaci??n RL</label>
                                 <input type="file" name="f_autreprelegal" class="form-control">
                                 </div>
                              </div>
                              <!-- END -->

                              <!-- 3 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Documento Adicional 2</label>
                                 <input type="file" name="f_adicional2" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Documento Adicional 3</label>
                                 <input type="file" name="f_adicional3" class="form-control">
                                 </div>
                              </div>
                              <div class="form-group col-md-11" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Documento Adicional 4</label>
                                 <input type="file" name="f_adicional4" class="form-control">
                                 </div>
                              </div>
                              <!-- END -->

                        <!--</div>-->
                        <div class="form-group col-md-11">
                           <button class="btn btn-default nextBtn pull-right" id="nestBtm" type="button" >Siguiente <i class="fas fa-arrow-circle-right"></i></button>
                        </div>   
                     </div>

                     <div class="row setup-content" id="step-2">
                     
                        <div class="table-responsive">
                           <table class="table table-bordered">
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_cedulaFront">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto C??dula Frontal (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_cedulaFront" id="f_cedulaFront"  class="form-control files" required onchange="validateInputFilePhoto('f_cedulaFront')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_cedulaFront"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_cedulaBack">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto C??dula Posterior (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_cedulaBack" id="f_cedulaBack" class="form-control" required onchange="validateInputFilePhoto('f_cedulaBack')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_cedulaBack"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_selfie">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto Tipo Selfie (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_selfie" id="f_selfie" class="form-control" required onchange="validateInputFilePhoto('f_selfie')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_selfie"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_adicional1">
                                       <div class="col-md-12">
                                       <label for="nombre">Documento Adicional 1 (Formato .pdf) </label>
                                       <input type="file" name="f_adicional1" id="f_adicional1" class="form-control" onchange="validateInputFileSome('f_adicional1')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_adicional1"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12 ocultar" id="g_f_copiaruc">
                                       <div class="col-md-12">
                                       <label for="nombre">Copia RUC (Formato .pdf) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_copiaruc" id="f_copiaruc" class="form-control" onchange="validateInputFilePdf('f_copiaruc')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_copiaruc"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12 ocultar" id="g_cm2">
                                       <div class="col-md-12">
                                       <label for="nombre">Adjuntar Video (Formato .mp4) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="cm2" id="cm2" class="form-control" onchange="validateInputFileMp4('cm2')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_copiaruc"></div>
                                 </td>
                              </tr>
                              
                           </table>
                        </div>
                        <hr>
                        <h2>Datos para la Factura Electr??nica</h2>
                        <hr>
                        <div class="alert alert-info alert-dismissible" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong>En caso de Pago Online!</strong> Comunicarse con <a href="https://wa.me/593939860303?text=Me%20interesa%20hacer%20Pago%20Online" target="_blank" style="color: black;">093 986 0303</a> (Haz clic en el n??mero para ir directo a Whatsapp).
                        </div>
                        <div class="form-group col-md-4" id="g_forma_pago">
                           <div class="col-md-12">
                              <label for="nombre">Forma de Pago <i class="fab fa-diaspora text-warning"></i></label>
                              <select class="form-control" name="forma_pago" id="forma_pago" required>
                                 <option value="">Seleccione Forma de pago</option>
                                 <option value="Transferencia">Transferencia/Dep??sito</option>
                                 <option value="Online">Pago ONLINE</option>
                              </select>
                              <span id="error_forma_pago" class="help-block ocultar"><small>El campo es requerido y debe seleccionar una Forma de Pago</small></span>
                           </div>
                           
                        </div>
                        <div class="form-group col-md-6" id="g_nombre_partner">
                           <div class="col-md-12">
                           <label for="nombre">C??digo Partner</label>
                           <input type="text" name="nombre_partner" id="nombre_partner" class="form-control" maxlength=13 placeholder="C??digo Partner">
                           </div>
                        </div>
                        <div class="form-group col-md-6" id="g_servicio_express">
                           <div class="col-md-12">
                           <label for="nombre">Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos) <i class="fab fa-diaspora text-warning"></i></label>
                           <select class="form-control" name="servicio_express" id="servicio_express" required>
                              <option value="">Seleccione Servicio</option>
                              <option value="Si">Si</option>
                              <option value="No">No</option>
                           </select>
                           <span id="error_servicio_express" class="help-block ocultar"><small>El campo es requerido</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-12" id="g_factu">
                           <div class="col-md-12">
                           <label for="nombre">??Desea su Factura Electr??nica con los mismo datos ingresados?</label>
                              <label class="radio-inline">
                              <input type="radio" name="factu" class="con_factu" id="no_factu" onclick="factElec(0)" value="No"> No
                              </label>
                              <label class="radio-inline">
                              <input type="radio" name="factu" class="con_factu" id="si_factu" onclick="factElec(1)" value="Si"> Si
                              </label>
                           </div>
                        </div>
                        
                        <div class="form-group col-md-4 ocultar" id="g_ruc_ced_fact">
                           <div class="col-md-12">
                           <label for="nombre">RUC / C??dula <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" name="ruc_ced_fact" id="ruc_ced_fact" class="form-control" maxlength=13 onblur="validarDocumento('ruc_ced_fact')" placeholder="Ruc / C??dula en Factura">
                           </div>
                        </div>
                        <div class="form-group col-md-5 ocultar" id="g_nombres_fact">
                           <div class="col-md-13">
                              <label for="nombre">Nombres Completos <i class="fab fa-diaspora text-warning"></i></label>
                              <input type="text" name="nombres_fact" id="nombres_fact" class="form-control" placeholder="Nombre en Factura">
                              <span id="error_nombres_fact" class="help-block ocultar"><small>El campo es requerido y no acepta n??meros ni caracteres especiales</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4 ocultar" id="g_correo_fact">
                           <div class="col-md-12">
                           <label for="nombre">Correo (si desea puede modificarse)<i class="fab fa-diaspora text-warning"></i></label>
                           <input type="email" name="correo_fact" id="correo_fact" class="form-control" placeholder="prueba@gmail.com">
                           <span id="error_correo_fact" class="help-block ocultar"><small>El campo es requerido y debe ingresar un correo valido</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-12 ocultar" id="g_direccion_fact">
                           <div class="col-md-11">
                           <label for="nombre">Direcci??n <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" name="direccion_fact" id="direccion_fact" class="form-control" placeholder="Direcci??n en factura">
                           <span id="error_direccion_fact" class="help-block ocultar"><small>El campo es requerido</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-4 ocultar" id="g_telef_fact">
                           <div class="col-md-12">
                           <label for="nombre">Tel??fono F??jo <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" name="telef_fact" id="telef_fact" class="form-control" placeholder="Tel??fono en factura">
                           <span id="error_telef_fact" class="help-block ocultar"><small>El campo es requerido y no acepta letras ni caracteres especiales</small></span>
                           </div>
                        </div>
                        <div class="table-responsive col-md-12" style="display: none;">
                           <table class="table table-bordered">
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12 ocultar" id="g_f_ced_pass_fact">
                                       <div class="col-md-12">
                                       <label for="nombre">C??dula ?? pasaporte del Representante Legal <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_ced_pass_fact" id="f_ced_pass_fact" class="form-control" onchange="validateInputFilePhoto('f_ced_pass_fact')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_ced_pass_fact"></div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12 ocultar" id="g_f_ruc_ced_fact">
                                       <div class="col-md-12">
                                       <label for="nombre">RUC de la empresa <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_ruc_ced_fact" id="f_ruc_ced_fact" class="form-control" onchange="validateInputFilePdf('f_ruc_ced_fact')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_ruc_ced_fact"></div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="form-group col-md-12 ocultar" id="g_comentarios_fact">
                           <div class="col-md-6">
                           <label for="nombre">Comentarios </label>
                           <textarea name="comentarios_fact" id="comentarios_fact" class="form-control" cols="30" rows="10"></textarea>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <p class="bg-success">??Quieres ser Partner? Comun??cate con nosotros al siguiente numero 0951234567</p>
                        </div>
                        

                        <div class="col-md-12">
                           
                           <div class="form-group col-md-6" style="display: none;">
                              <div class="col-md-12">
                                 <label class="control-label">Campo 5</label>
                                 <input maxlength="100" type="text" name="cm5" class="form-control" placeholder="" />
                              </div>
                           </div>
                           

                           <div class="form-group col-md-6" style="display: none;">
                              <div class="col-md-12">
                                 <label class="control-label">Campo 6</label>
                                 <input maxlength="100" type="text" name="cm6" class="form-control" placeholder="" />
                              </div>
                           </div>
                        </div>
                        <div class="form-group col-md-11">
                           <button class="btn btn-success pull-right" name="regalum" type="submit" >Guardar <i class="fas fa-save"></i></button>
                        </div>   
                     </div>
                  </div>
               <!--</div>-->
            <!--</div>-->
         </form>
      </div>
      <div class="panel-footer">
         <p>
            <i class="fa fa-info-circle fa-lg" id="footer-panel-reguser"></i>&nbsp;Asegurese de completar todos los campos para que su registro se lleve a cabo ??xitosamente.
         </p>
      </div>
   </div>   
</div>

  <!--FIN DE FORM DINAMICO!!-->
