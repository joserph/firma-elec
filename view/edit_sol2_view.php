<script type="text/javascript">
      $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
      });
      $(document).ready(function() {
          $('#example-multiple-selected2').multiselect();
      });
</script>


<div class="col-md-10">
   <div class="panel panel-success" id="paneles-system">
      <div class="panel-heading" id="title-panel-regform">
         <h2 class="panel-title"><i class="fas fa-chalkboard-teacher"></i> Editar Solicitud de Representante Legal</h2>
         <hr>
         <h3><em><?php echo $datos['nombres']; ?> <?php echo $datos['apellido1']; ?> <?php echo $datos['apellido2']; ?></em></h3>
      </div>
      <div class="panel-body">
         <form action="Registros-updsol-<?php echo $_GET['id']; ?>.html" method="POST" class="form-horizontal" role="form" id="persona_natutal" enctype="multipart/form-data">
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
                        <!--<div class="col-md-12">-->
                           <input type="hidden" name="tipo_solicitud" class="form-control" value="2">
                              <div class="form-group col-md-4" id="g_contenedor">
                                 <div class="col-md-12">
                                    <label for="">Tipo de Certificado <i class="fab fa-diaspora text-warning"></i></label>
                                   <select class="form-control" name="contenedor" id="contenedor"  required onchange="token();">
                                       <option value="">Seleccione Certificado</option>
                                       <option value="0" <?php if($datos['contenedor'] == 0) echo 'selected="selected"'; ?>>ARCHIVO .P12</option>
                                       <option value="1" <?php if($datos['contenedor'] == 1) echo 'selected="selected"'; ?>>TOKEN</option>
                                       <option value="2" <?php if($datos['contenedor'] == 2) echo 'selected="selected"'; ?>>NUBE</option>
                                    </select>
                                 </div>
                              </div>
                           
                              <div class="form-group col-md-4" id="g_nombres">
                                 <div class="col-md-12">
                                    <label for="nombre">Nombres <i class="fab fa-diaspora text-warning"></i></label>
                                    <input type="text" name="nombres" value="<?php echo $datos['nombres']; ?>" class="form-control" placeholder="Calos Andres" required>
                                 </div>
                              </div>

                              <div class="form-group col-md-4" id="g_apellido1">
                                 <div class="col-md-12">
                                    <label for="nombre">Primer Apellido <i class="fab fa-diaspora text-warning"></i></label>
                                    <input type="text" name="apellido1" value="<?php echo $datos['apellido1']; ?>" class="form-control" placeholder="Cardenas" required>
                                 </div>
                              </div>

                              <div class="form-group col-md-4" id="g_apellido2">
                                 <div class="col-md-12">
                                 <label for="nombre">Segundo Apellido </label>
                                 <input type="text" name="apellido2" value="<?php echo $datos['apellido2']; ?>" class="form-control" placeholder="Pasquel">
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_tipodocumento">
                                 <div class="col-md-12">
                                 <label for="nombre">Documento de Identidad <i class="fab fa-diaspora text-warning"></i></label>
                                 <select class="form-control" name="tipodocumento" required>
                                    <option value="">Seleccione Identidad</option>
                                    <option value="CEDULA" <?php if($datos['tipodocumento'] == "CEDULA") echo 'selected="selected"'; ?>>CEDULA</option>
                                    <option value="PASAPORTE" <?php if($datos['tipodocumento'] == "PASAPORTE") echo 'selected="selected"'; ?>>PASAPORTE</option>
                                 </select>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_numerodocumento">
                                 <div class="col-md-12">
                                    <label for="nombre">N??mero de documento <i class="fab fa-diaspora text-warning"></i></label>
                                    <input type="text" value="<?php echo $datos['numerodocumento']; ?>" name="numerodocumento" id="numerodocumento" maxlength=13 onblur="validarDocumento('numerodocumento')" class="form-control" placeholder="0102698867" required>
                                 </div>
                              </div>

                              <div class="form-group col-md-4 ocultar" id="g_ruc_personal">
                                     <div class="col-md-12">
                                     <label for="nombre">RUC Personal <i class="fab fa-diaspora text-warning"></i></label>
                                     <input type="text" value="<?php echo $datos['ruc_personal']; ?>" name="ruc_personal" id="ruc_personal" class="form-control" maxlength=13 onblur="validarDocumento('ruc_personal')" placeholder="0102698867001">
                                     </div>
                              </div>
                              <div class="form-group col-md-4" id="g_sexo">
                                 <div class="col-md-12">
                                 <label for="nombre">Sexo <i class="fab fa-diaspora text-warning"></i></label>
                                 <select class="form-control" name="sexo" required>
                                    <option value="">Seleccione Sexo</option>
                                    <option value="HOMBRE" <?php if($datos['sexo'] == "HOMBRE") echo 'selected="selected"'; ?>>HOMBRE</option>
                                    <option value="MUJER" <?php if($datos['sexo'] == "MUJER") echo 'selected="selected"'; ?>>MUJER</option>
                                 </select>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_fecha_nacimiento">
                                 <div class="col-md-12">
                                 <label for="nombre">Fecha de Nacimiento <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['fecha_nacimiento']; ?>" name="fecha_nacimiento" class="form-control" placeholder="" required>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_nacionalidad">
                                 <div class="col-md-12">
                                 <label for="nombre">Nacionalidad <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['nacionalidad']; ?>" name="nacionalidad" class="form-control" placeholder="ECUATORIANA" required>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_telfCelular">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono Celular <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['telfCelular']; ?>" name="telfCelular" class="form-control" placeholder="0912345678" required>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_telfCelular2">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono Celular 2 <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['telfCelular2']; ?>" name="telfCelular2" class="form-control" placeholder="0912345678" required>
                                 </div>
                              </div>
                              <!--<div class="form-group col-md-4" id="g_telfFijo">
                                 <div class="col-md-12">
                                 <label for="nombre">Tel??fono F??jo</label>-->
                                 <input type="hidden" value="<?php echo $datos['telfFijo']; ?>" name="telfFijo" class="form-control" placeholder="0912345678">
                                 <!--</div>
                              </div>-->
                              <div class="form-group col-md-4" id="g_eMail">
                                 <div class="col-md-12">
                                 <label for="nombre">Correo <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="email" value="<?php echo $datos['eMail']; ?>" name="eMail" class="form-control" placeholder="prueba@gmail.com" required>
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_cm3">
                                 <div class="col-md-12">
                                 <label for="nombre">Correo 2 <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="email" name="cm3" value="<?php echo $datos['cm3']; ?>" class="form-control" placeholder="prueba2@gmail.com" required>
                                 </div>
                              </div>
                              <!-- 5 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-6">
                                 <div class="col-md-12">
                                 <label for="nombre">Empresa</label>
                                 <input type="text" value="<?php echo $datos['empresa']; ?>" name="empresa" class="form-control" placeholder="0912345678">
                                 </div>
                              </div>
                              <div class="form-group col-md-6">
                                 <div class="col-md-12">
                                 <label for="nombre">RUC Empresa</label>
                                 <input type="text" value="<?php echo $datos['ruc_empresa']; ?>" name="ruc_empresa" class="form-control" placeholder="0102698867001">
                                 </div>
                              </div>
                              <div class="form-group col-md-6">
                                 <div class="col-md-12">
                                 <label for="nombre">Cargo</label>
                                 <input type="text" value="<?php echo $datos['cargo']; ?>" name="cargo" class="form-control" placeholder="GERENTE GENERAL">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Motivo</label>
                                 <input type="text" value="<?php echo $datos['motivo']; ?>" name="motivo" class="form-control" placeholder="FIRMAR FACTURAS DIGITALES">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Unidad</label>
                                 <input type="text" value="<?php echo $datos['unidad']; ?>" name="unidad" class="form-control" placeholder="DEPARTAMENTO FINANCIERO">
                                 </div>
                              </div>
                              <!-- END -->
                              <div class="form-group col-md-4" id="g_provincia">
                                 <div class="col-md-12">
                                 <label for="nombre">Provincia <i class="fab fa-diaspora text-warning"></i></label>
                                 <select name="provincia" class="form-control" required>
                                    <option value="">Seleccione Provincia</option> 
                                    <option value="Azuay" <?php if($datos['provincia'] == "Azuay") echo 'selected="selected"'; ?>>Azuay</option>  
                                    <option value="Ca??ar" <?php if($datos['provincia'] == "Ca??ar") echo 'selected="selected"'; ?>>Ca??ar</option>  
                                    <option value="Loja" <?php if($datos['provincia'] == "Loja") echo 'selected="selected"'; ?>>Loja</option>  
                                    <option value="Carchi" <?php if($datos['provincia'] == "Carchi") echo 'selected="selected"'; ?>>Carchi</option>  
                                    <option value="Imbabura" <?php if($datos['provincia'] == "Imbabura") echo 'selected="selected"'; ?>>Imbabura</option>  
                                    <option value="Pichincha" <?php if($datos['provincia'] == "Pichincha") echo 'selected="selected"'; ?>>Pichincha</option>  
                                    <option value="Cotopaxi" <?php if($datos['provincia'] == "Cotopaxi") echo 'selected="selected"'; ?>>Cotopaxi</option>  
                                    <option value="Tungurahua" <?php if($datos['provincia'] == "Tungurahua") echo 'selected="selected"'; ?>>Tungurahua</option>  
                                    <option value="Bol??var" <?php if($datos['provincia'] == "Bol??var") echo 'selected="selected"'; ?>>Bol??var</option>  
                                    <option value="Chimborazo" <?php if($datos['provincia'] == "Chimborazo") echo 'selected="selected"'; ?>>Chimborazo</option>  
                                    <option value="Sto. Domingo de los Tsachilas" <?php if($datos['provincia'] == "Sto. Domingo de los Tsachilas") echo 'selected="selected"'; ?>>Sto. Domingo de los Tsachilas</option>  
                                    <option value="Esmeraldas" <?php if($datos['provincia'] == "Esmeraldas") echo 'selected="selected"'; ?>>Esmeraldas</option>  
                                    <option value="Manab??" <?php if($datos['provincia'] == "Manab??") echo 'selected="selected"'; ?>>Manab??</option>  
                                    <option value="Guayas" <?php if($datos['provincia'] == "Guayas") echo 'selected="selected"'; ?>>Guayas</option>  
                                    <option value="Los R??os" <?php if($datos['provincia'] == "Los R??os") echo 'selected="selected"'; ?>>Los R??os</option>  
                                    <option value="El Oro" <?php if($datos['provincia'] == "El Oro") echo 'selected="selected"'; ?>>El Oro</option>  
                                    <option value="Santa Elena" <?php if($datos['provincia'] == "Santa Elena") echo 'selected="selected"'; ?>>Santa Elena</option>  
                                    <option value="Sucumb??os" <?php if($datos['provincia'] == "Sucumb??os") echo 'selected="selected"'; ?>>Sucumb??os</option>  
                                    <option value="Napo" <?php if($datos['provincia'] == "Napo") echo 'selected="selected"'; ?>>Napo</option>  
                                    <option value="Pastaza" <?php if($datos['provincia'] == "Pastaza") echo 'selected="selected"'; ?>>Pastaza</option>  
                                    <option value="Orellana" <?php if($datos['provincia'] == "Orellana") echo 'selected="selected"'; ?>>Orellana</option>  
                                    <option value="Morona Santiago" <?php if($datos['provincia'] == "Morona Santiago") echo 'selected="selected"'; ?>>Morona Santiago</option>  
                                    <option value="Zamora Chinchipe" <?php if($datos['provincia'] == "Zamora Chinchipe") echo 'selected="selected"'; ?>>Zamora Chinchipe</option>  
                                    <option value="Gal??pagos" <?php if($datos['provincia'] == "Gal??pagos") echo 'selected="selected"'; ?>>Gal??pagos</option>  
                                    <option value="Ant??rtida Ecuatoriana" <?php if($datos['provincia'] == "Ant??rtida Ecuatoriana") echo 'selected="selected"'; ?>>Ant??rtida Ecuatoriana</option>  
                                 </select>  
                                 </div>
                              </div>
                              <div class="form-group col-md-4" id="g_ciudad">
                                 <div class="col-md-12">
                                 <label for="nombre">Ciudad <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['ciudad']; ?>" name="ciudad" class="form-control" placeholder="QUITO" required>
                                 </div>
                              </div>
                              <!-- 4 Campos adicionales no van para PERSONA NATURAL -->
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Nombre RL</label>
                                 <input type="text" value="<?php echo $datos['nombresRL']; ?>" name="nombresRL" class="form-control" placeholder="FERNANDO">
                                 </div>
                              </div>
                              <div class="form-group col-md-6" style="display:none">
                                 <div class="col-md-12">
                                 <label for="nombre">Apellidos RL</label>
                                 <input type="text" value="<?php echo $datos['apellidosRL']; ?>" name="apellidosRL" class="form-control" placeholder="SAENZ MI??O">
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
                                 <input type="text" value="<?php echo $datos['numerodocumentoRL']; ?>" name="numerodocumentoRL" class="form-control" placeholder="0102698867">
                                 </div>
                              </div>
                              <!-- END -->
                              <div class="form-group col-md-12" id="g_direccion">
                                 <div class="col-md-11">
                                 <label for="nombre">Direcci??n <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['direccion']; ?>" name="direccion" id="direccion" class="form-control" placeholder="Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE" required>
                                 </div>
                              </div>
                              <div class="form-group col-md-5" id="g_vigenciafirma">
                                 <div class="col-md-12">
                                 <label for="nombre">Seleccione Vigencia o Duraci??n <i class="fab fa-diaspora text-warning"></i></label>
                                 <select class="form-control" name="vigenciafirma" required>
                                    <option value="">Seleccione Vigencia</option>
                                    <option value="1 a??o" <?php if($datos['vigenciafirma'] == "1 a??o") echo 'selected="selected"'; ?>>1 A??o</option>
                                    <option value="2 a??os" <?php if($datos['vigenciafirma'] == "2 a??os") echo 'selected="selected"'; ?>>2 A??os</option>
                                    <option value="3 a??os" <?php if($datos['vigenciafirma'] == "3 a??os") echo 'selected="selected"'; ?>>3 A??os</option>
                                    <option value="4 a??os" <?php if($datos['vigenciafirma'] == "4 a??os") echo 'selected="selected"'; ?>>4 A??os</option>
                                    <option value="5 a??os" <?php if($datos['vigenciafirma'] == "5 a??os") echo 'selected="selected"'; ?>>5 A??os</option>
                                    <option value="7 d??as" <?php if($datos['vigenciafirma'] == "7 d??as") echo 'selected="selected"'; ?>>7 d??as</option>
                                 </select>
                                 </div>
                              </div>
                              <div class="form-group col-md-12 <?php if($datos['contenedor'] != 1) echo 'ocultar' ?>" id="g_cm4">
                                 <div class="col-md-11">
                                 <label for="nombre">Direcci??n de Entrega <i class="fab fa-diaspora text-warning"></i></label>
                                 <input type="text" value="<?php echo $datos['cm4']; ?>" name="cm4" id="cm4" class="form-control" placeholder="Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE">
                                 </div>
                              </div>
                              
                              <!-- 5 Campos adicionales no van para PERSONA NATURAL -->
                              
                              
                              
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
                                    <div class="form-group col-md-11" id="g_f_cedulaFront">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto C??dula Frontal (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_cedulaFront" id="f_cedulaFront"  class="form-control files" <?php if(!$datos['f_cedulaFront']) echo 'required' ?> onchange="validateInputFilePhoto('f_cedulaFront')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_cedulaFront"></div>
                                    <img src="data:image/jpg;base64,<?php echo $datos['f_cedulaFront']; ?>" width="350"  alt="">
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_cedulaBack">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto C??dula Posterior (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_cedulaBack" id="f_cedulaBack" class="form-control" <?php if(!$datos['f_cedulaBack']) echo 'required' ?> onchange="validateInputFilePhoto('f_cedulaBack')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_cedulaBack"></div>
                                    <img src="data:image/jpg;base64,<?php echo $datos['f_cedulaBack']; ?>" width="350"  alt="">
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_selfie">
                                       <div class="col-md-12">
                                       <label for="nombre">Foto Tipo Selfie (Formato .jpg) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_selfie" id="f_selfie" class="form-control" <?php if(!$datos['f_selfie']) echo 'required' ?> onchange="validateInputFilePhoto('f_selfie')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_selfie"></div>
                                    <img src="data:image/jpg;base64,<?php echo $datos['f_selfie']; ?>" width="350"  alt="">
                                 </td>
                              </tr>
                              <tr class="">
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_copiaruc">
                                       <div class="col-md-12">
                                       <label for="nombre">Copia RUC (Formato .pdf) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_copiaruc" id="f_copiaruc" class="form-control" <?php if(!$datos['f_copiaruc']) echo 'required' ?> onchange="validateInputFilePdf('f_copiaruc')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_copiaruc"></div>
                                    <?php if($datos['f_copiaruc']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_copiaruc']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>

                              <tr>
                                 <td>
                                 <div class="form-group col-md-11" id="g_f_nombramiento">
                                    <div class="col-md-12">
                                       <label for="nombre">Acta de Nombramiento (Carta aceptaci??n) (Formato .pdf) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_nombramiento" id="f_nombramiento" class="form-control" <?php if(!$datos['f_nombramiento']) echo 'required' ?> onchange="validateInputFilePdf('f_nombramiento')">
                                    </div>
                                 </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_nombramiento"></div>
                                    <?php if($datos['f_nombramiento']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_nombramiento']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_nombramiento2">
                                       <div class="col-md-12">
                                          <label for="nombre">Acta de Nombramiento (Registro Mercantil o ente regulador) ??? (No obligatorio si est?? en un solo archivo en el campo anterior) (Formato .pdf) </label>
                                          <input type="file" name="f_nombramiento2" id="f_nombramiento2" class="form-control" onchange="validateInputFilePdf('f_nombramiento2')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_nombramiento2"></div>
                                    <?php if($datos['f_nombramiento2']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_nombramiento2']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_constitucion">
                                       <div class="col-md-12">
                                       <label for="nombre">Acta Constituci??n (Formato .pdf) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_constitucion" id="f_constitucion" class="form-control" <?php if(!$datos['f_constitucion']) echo 'required' ?> onchange="validateInputFilePdf('f_constitucion')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_constitucion"></div>
                                    <?php if($datos['f_constitucion']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_constitucion']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-11" id="g_f_adicional1">
                                       <div class="col-md-12">
                                       <label for="nombre">Documento Adicional 1 (Formato .pdf) </label>
                                       <input type="file" name="f_adicional1" id="f_adicional1" class="form-control" onchange="validateInputFileSome('f_adicional1')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_adicional1"></div>
                                    <?php if($datos['f_adicional1']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_adicional1']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr class="ocultar">
                                 <td>
                                    <div class="form-group col-md-11 ocultar" id="g_f_adicional2">
                                       <div class="col-md-12">
                                       <label for="nombre">Documento Adicional 2 (Formato .pdf) </label>
                                       <input type="file" name="f_adicional2" id="f_adicional2" class="form-control" onchange="validateInputFileSome('f_adicional2')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_adicional2"></div>
                                 </td>
                              </tr>
                              <tr class="ocultar">
                                 <td>
                                    <div class="form-group col-md-11 ocultar" id="g_f_adicional3">
                                       <div class="col-md-12">
                                          <label for="nombre">Documento Adicional 3 (Formato .pdf) </label>
                                          <input type="file" name="f_adicional3" id="f_adicional3" class="form-control" onchange="validateInputFileSome('f_adicional3')">
                                       </div>
                                    </div>
                                 </td>
                                 <td><div id="visor_f_adicional3"></div></td>
                              </tr>
                              <tr class="ocultar">
                                 <td>
                                    <div class="form-group col-md-11 ocultar" id="g_f_adicional4">
                                       <div class="col-md-12">
                                       <label for="nombre">Documento Adicional 4 (Formato .pdf) </label>
                                       <input type="file" name="f_adicional4" id="f_adicional4" class="form-control" onchange="validateInputFileSome('f_adicional4')">
                                       </div>
                                    </div>
                                 </td>
                                 <td><div id="visor_f_adicional4"></div></td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12 <?php if($datos['contenedor'] != 1) echo 'ocultar' ?>" id="g_cm2">
                                       <div class="col-md-12">
                                       <label for="nombre">Adjuntar Video (Formato .mp4) <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="cm2" id="cm2" class="form-control" onchange="validateInputFileMp4('cm2')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_cm2"></div>
                                    <?php if($datos['cm2']){ ?>
                                       <video width="400" controls>
                                          <source src='data:video/mp4;base64,<?php echo $datos['cm2']; ?>' width='100%' type='video/mp4'>
                                       </video>
                                    <?php }else{ ?>
                                       <p class="lead">No hay Video guardado</p>
                                    <?php } ?>
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
                           <select class="form-control" name="forma_pago" id="forma_pago">
                              <option value="">Seleccione Forma de pago</option>
                              <option value="Transferencia" <?php if($datos['forma_pago'] == "Transferencia") echo 'selected="selected"'; ?>>Transferencia/Dep??sito</option>
                              <option value="Online" <?php if($datos['forma_pago'] == "Online") echo 'selected="selected"'; ?>>Pago ONLINE</option>
                           </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6" id="g_nombre_partner">
                           <div class="col-md-12">
                           <label for="nombre">C??digo Partner</label>
                           <input type="text" name="nombre_partner" value="<?php echo $datos['nombre_partner']; ?>" id="nombre_partner" class="form-control" maxlength=13 placeholder="C??digo Partner">
                           </div>
                        </div>

                        <hr>
                        <div class="form-group col-md-6" id="g_cm5">
                           <div class="col-md-12">
                           <label for="nombre">N??mero de Dep??sito</label>
                           <input type="text" name="cm5" value="<?php echo $datos['cm5']; ?>" id="cm5" class="form-control" maxlength=13 placeholder="N??mero de Dep??sito">
                           </div>
                        </div>
                        <div class="form-group col-md-6" id="g_cm6">
                           <div class="col-md-12">
                           <label for="nombre">Estatus del Pago</label>
                           <select class="form-control" name="cm6" id="cm6" required>
                              <option value="">Seleccione Estatus</option>
                              <option value="Pendiente" <?php if($datos['cm6'] == "Pendiente") echo 'selected="selected"'; ?>>Pendiente</option>
                              <option value="Pagado" <?php if($datos['cm6'] == "Pagado") echo 'selected="selected"'; ?>>Pagado</option>
                           </select>
                           </div>
                        </div>

                        <div class="form-group col-md-6" id="g_servicio_express">
                           <div class="col-md-12">
                           <label for="nombre">Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos) <i class="fab fa-diaspora text-warning"></i></label>
                           <select class="form-control" name="servicio_express" id="servicio_express" required>
                              <option value="">Seleccione Servicio</option>
                              <option value="Si" <?php if($datos['servicio_express'] == "Si") echo 'selected="selected"'; ?>>Si</option>
                              <option value="No" <?php if($datos['servicio_express'] == "No") echo 'selected="selected"'; ?>>No</option>
                           </select>
                           <span id="error_servicio_express" class="help-block ocultar"><small>El campo es requerido</small></span>
                           </div>
                        </div>
                        <div class="form-group col-md-12" id="g_factu">
                           <div class="col-md-12">
                           <label for="nombre">??Desea su Factura Electr??nica con los mismo datos ingresados?</label>
                              <label class="radio-inline">
                              <input type="radio" name="factu" class="con_factu" id="no_factu" onclick="factElec(0)" value="No" <?php if($datos['factu'] == "No") echo 'checked'; ?>> No
                              </label>
                              <label class="radio-inline">
                              <input type="radio" name="factu" class="con_factu" id="si_factu" onclick="factElec(1)" value="Si" <?php if($datos['factu'] == "Si") echo 'checked'; ?>> Si
                              </label>
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_ruc_ced_fact">
                           <div class="col-md-12">
                           <label for="nombre">RUC / C??dula <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" value="<?php echo $datos['ruc_ced_fact']; ?>" name="ruc_ced_fact" id="ruc_ced_fact" class="form-control" maxlength=13 onblur="validarDocumento('ruc_ced_fact')" placeholder="Ruc / C??dula en Factura">
                           </div>
                        </div>
                        <div class="form-group col-md-6" id="g_nombres_fact">
                           <div class="col-md-13">
                              <label for="nombre">Nombres Completos <i class="fab fa-diaspora text-warning"></i></label>
                              <input type="text" value="<?php echo $datos['nombres_fact']; ?>" name="nombres_fact" id="nombres_fact" class="form-control" placeholder="Nombre en Factura">
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_correo_fact">
                           <div class="col-md-12">
                           <label for="nombre">Correo (si desea puede modificarse)<i class="fab fa-diaspora text-warning"></i></label>
                           <input type="email" value="<?php echo $datos['correo_fact']; ?>" name="correo_fact" id="correo_fact" class="form-control" placeholder="prueba@gmail.com">
                           </div>
                        </div>
                        <div class="form-group col-md-12" id="g_direccion_fact">
                           <div class="col-md-11">
                           <label for="nombre">Direcci??n <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" value="<?php echo $datos['direccion_fact']; ?>" name="direccion_fact" id="direccion_fact" class="form-control" placeholder="Direcci??n en factura">
                           </div>
                        </div>
                        <div class="form-group col-md-4" id="g_telef_fact">
                           <div class="col-md-12">
                           <label for="nombre">Tel??fono F??jo <i class="fab fa-diaspora text-warning"></i></label>
                           <input type="text" value="<?php echo $datos['telef_fact']; ?>" name="telef_fact" id="telef_fact" class="form-control" placeholder="Tel??fono en factura">
                           </div>
                        </div>
                        <div class="table-responsive col-md-12" style="display: none;">
                           <table class="table table-bordered">
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_ced_pass_fact">
                                       <div class="col-md-12">
                                       <label for="nombre">C??dula ?? pasaporte del Representante Legal <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_ced_pass_fact" id="f_ced_pass_fact" class="form-control" onchange="validateInputFilePhoto('f_ced_pass_fact')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_ced_pass_fact"></div>
                                    <?php if($datos['f_ced_pass_fact']){ ?>
                                       <img src="data:image/jpg;base64,<?php echo $datos['f_ced_pass_fact']; ?>" width="350"  alt="">
                                    <?php }else{ ?>
                                       <p class="lead">No hay Archivo guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-group col-md-12" id="g_f_ruc_ced_fact">
                                       <div class="col-md-12">
                                       <label for="nombre">RUC de la empresa <i class="fab fa-diaspora text-warning"></i></label>
                                       <input type="file" name="f_ruc_ced_fact" id="f_ruc_ced_fact" class="form-control" onchange="validateInputFilePdf('f_ruc_ced_fact')">
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div id="visor_f_ruc_ced_fact"></div>
                                    <?php if($datos['f_ruc_ced_fact']){ ?>
                                       <embed src='data:application/pdf;base64,<?php echo $datos['f_ruc_ced_fact']; ?>' width='100%' type='application/pdf'>
                                    <?php }else{ ?>
                                       <p class="lead">No hay PDF guardado</p>
                                    <?php } ?>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="form-group col-md-12" id="g_comentarios_fact">
                           <div class="col-md-6">
                           <label for="nombre">Comentarios </label>
                           <textarea name="comentarios_fact" id="comentarios_fact" class="form-control" cols="30" rows="10"><?php echo $datos['comentarios_fact']; ?></textarea>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <p class="bg-success">??Quieres ser Partner? Comun??cate con nosotros al siguiente numero 0951234567</p>
                        </div>

                        <div class="form-group col-md-11">
                           <button class="btn btn-warning pull-right" name="regalum"  type="submit" >Actualizar <i class="fas fa-sync-alt"></i></button>
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
