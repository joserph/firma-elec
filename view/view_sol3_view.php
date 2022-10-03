<script type="text/javascript">
      $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
      });
      $(document).ready(function() {
          $('#example-multiple-selected2').multiselect();
      });
</script>

<div class="col-md-10">
   <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">
         <h3>
            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i> Ver Solicitud de Mienbro de Empresa
            <div class="text-right">
               <a id="btn-listado-equipos" type="button" class="btn btn-warning text-right" href="Registros-EditSoli-<?php echo $datos['id_solicitud'] ?>.html"><i class="fas fa-edit"></i> Editar</a>
            </div>
         </h3>
      </div>

      <!-- Table -->
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
               <th>Tipo de Certificado</th>
               <td>
                  <?php 
                     if($datos['contenedor'] == 0){
                        echo 'ARCHIVO .P12';
                     }elseif($datos['contenedor'] == 1){
                        echo 'TOKEN';
                     }elseif($datos['contenedor'] == 2){
                        echo 'NUBE';
                     }
                  ?>
               </td>
            </tr>
            <tr>
               <th>Nombres</th>
               <td><?php echo $datos['nombres']; ?></td>
            </tr>
            <tr>
               <th>Primer Apellido</th>
               <td><?php echo $datos['apellido1']; ?></td>
            </tr>
            <tr>
               <th>Segundo Apellido</th>
               <td><?php echo $datos['apellido2']; ?></td>
            </tr>
            <tr>
               <th>Documento de Identidad</th>
               <td>
                  <?php 
                     if($datos['tipodocumento'] == 'CEDULA'){
                        echo 'CÉDULA';
                     }elseif($datos['tipodocumento'] == 'PASAPORTE'){
                        echo 'PASAPORTE';
                     }
                  ?>
               </td>
            </tr>
            <tr>
               <th>Número de documento</th>
               <td><?php echo $datos['numerodocumento']; ?></td>
            </tr>
            <tr>
               <th>Código Dactilar</th>
               <td><?php echo $datos['codigodactilar']; ?></td>
            </tr>
            <tr>
               <th>RUC Personal</th>
               <td><?php echo $datos['ruc_personal']; ?></td>
            </tr>
            <tr>
               <th>Sexo</th>
               <td><?php echo $datos['sexo']; ?></td>
            </tr>
            <tr>
               <th>Fecha de Nacimiento</th>
               <td><?php echo date('d/m/Y', strtotime($datos['fecha_nacimiento'])); ?></td>
            </tr>
            <tr>
               <th>Nacionalidad</th>
               <td><?php echo $datos['nacionalidad']; ?></td>
            </tr>
            <tr>
               <th>Teléfono Celular</th>
               <td><?php echo $datos['telfCelular']; ?></td>
            </tr>
            <tr>
               <th>Teléfono Celular 2</th>
               <td><?php echo $datos['telfCelular2']; ?></td>
            </tr>
            <!--<tr>
               <th>Teléfono Fíjo</th>
               <td><?php echo $datos['telfFijo']; ?></td>
            </tr>-->
            <tr>
               <th>Correo</th>
               <td><?php echo $datos['eMail']; ?></td>
            </tr>
            <tr>
               <th>Correo 2</th>
               <td><?php echo $datos['cm3']; ?></td>
            </tr>
            <tr>
               <th>Empresa</th>
               <td><?php echo $datos['empresa']; ?></td>
            </tr>
            <tr>
               <th>RUC Empresa</th>
               <td><?php echo $datos['ruc_empresa']; ?></td>
            </tr>
            <tr>
               <th>Cargo</th>
               <td><?php echo $datos['cargo']; ?></td>
            </tr>
            <tr>
               <th>Motivo</th>
               <td><?php echo $datos['motivo']; ?></td>
            </tr>
            <tr>
               <th>Unidad</th>
               <td><?php echo $datos['unidad']; ?></td>
            </tr>
            <tr>
               <th>Provincia</th>
               <td><?php echo $datos['provincia']; ?></td>
            </tr>
            <tr>
               <th>Ciudad</th>
               <td><?php echo $datos['ciudad']; ?></td>
            </tr>
            <tr>
               <th>Nombre RL</th>
               <td><?php echo $datos['nombresRL']; ?></td>
            </tr>
            <tr>
               <th>Apellidos RL</th>
               <td><?php echo $datos['apellidosRL']; ?></td>
            </tr>
            <tr>
               <th>Documento de Identidad RL</th>
               <td>
                  <?php 
                     if($datos['tipodocumentoRL'] == 'CEDULA'){
                        echo 'CÉDULA';
                     }elseif($datos['tipodocumentoRL'] == 'PASAPORTE'){
                        echo 'PASAPORTE';
                     }
                  ?>
               </td>
            </tr>
            <tr>
               <th>Número de documento RL</th>
               <td><?php echo $datos['numerodocumentoRL']; ?></td>
            </tr>
            <tr>
               <th>Dirección</th>
               <td><?php echo $datos['direccion']; ?></td>
            </tr>
            <tr>
               <th>Seleccione Vigencia o Duración</th>
               <td><?php echo $datos['vigenciafirma']; ?></td>
            </tr>
            <tr>
               <th>Dirección de Entrega</th>
               <td><?php echo $datos['cm4']; ?></td>
            </tr>
            <tr>
               <th colspan="2" class="text-center lead">Archivos adjuntos</th>
            </tr>
            <tr>
               <th>Foto Cédula Frontal</th>
               <td>
                  <img src="data:image/jpg;base64,<?php echo $datos['f_cedulaFront']; ?>" width="350"  alt="">
                  <hr>
                  <a download="<?php echo $datos['numerodocumento']; ?>_f_cedulaFront.jpg" class="btn btn-primary" href="data:image/jpg;base64,<?php echo $datos['f_cedulaFront']; ?>">Descargar</a>
               </td>
            </tr>
            <tr>
               <th>Foto Cédula Posterior</th>
               <td>
                  <img src="data:image/jpg;base64,<?php echo $datos['f_cedulaBack']; ?>" width="350"  alt="">
                  <hr>
                  <a download="<?php echo $datos['numerodocumento']; ?>_f_cedulaBack.jpg" class="btn btn-primary" href="data:image/jpg;base64,<?php echo $datos['f_cedulaBack']; ?>">Descargar</a>
               </td>
            </tr>
            <tr>
               <th>Foto Tipo Selfie</th>
               <td>
                  <img src="data:image/jpg;base64,<?php echo $datos['f_selfie']; ?>" width="350"  alt="">
                  <hr>
                  <a download="<?php echo $datos['numerodocumento']; ?>_f_selfie.jpg" class="btn btn-primary" href="data:image/jpg;base64,<?php echo $datos['f_selfie']; ?>">Descargar</a>
               </td>
            </tr>
            <tr>
               <th>Copia RUC</th>
               <td>
                  <?php if($datos['f_copiaruc']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_copiaruc']; ?>' width='80%' height="300" type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_copiaruc.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_copiaruc']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Documento Opcional Autorización Partner</th>
               <td>
                  <?php if($datos['f_adicional1']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_adicional1']; ?>' width='80%' height="300" type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_adicional1.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_adicional1']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
           
            <tr>
               <th>Acta de Nombramiento (Carta aceptación)</th>
               <td>
                  <?php if($datos['f_nombramiento']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_nombramiento']; ?>' width='100%' type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_nombramiento.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_nombramiento']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Acta de Nombramiento (Registro Mercantil o ente regulador) – (No obligatorio si está en un solo archivo en el campo anterior)</th>
               <td>
                  <?php if($datos['f_nombramiento2']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_nombramiento2']; ?>' width='100%' type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_nombramiento2.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_nombramiento2']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Acta Constitución</th>
               <td>
                  <?php if($datos['f_constitucion']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_constitucion']; ?>' width='100%' type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_constitucion.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_constitucion']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Documento RL</th>
               <td>
                  <?php if($datos['f_documentoRL']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_documentoRL']; ?>' width='100%' type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_documentoRL.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_documentoRL']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Autorización RL</th>
               <td>
                  <?php if($datos['f_autreprelegal']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_autreprelegal']; ?>' width='100%' type='application/pdf'>
                     <hr>
                     <a download="<?php echo $datos['numerodocumento']; ?>_f_autreprelegal.pdf" class="btn btn-primary" href="data:image/pdf;base64,<?php echo $datos['f_autreprelegal']; ?>">Descargar</a>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>

            <tr>
               <th>Adjuntar Video</th>
               <td>
                  <?php if($datos['cm2']){ ?>
                     <video width="80%" height="300" controls>
                        <source src='data:video/mp4;base64,<?php echo $datos['cm2']; ?>' type='video/mp4'>
                        <hr>
                        <a download="<?php echo $datos['numerodocumento']; ?>_cm2.pdf" class="btn btn-primary" href="data:image/mp4;base64,<?php echo $datos['cm2']; ?>">Descargar</a>
                     </video>
                  <?php }else{ ?>
                     <p class="lead">No hay Video guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th colspan="2" class="text-center lead">Datos para la Factura Electrónica</th>
            </tr>
            <tr>
               <th>Forma de Pago</th>
               <td>
                  <?php 
                     if($datos['forma_pago'] == 'Transferencia'){
                        echo 'Transferencia/Depósito';
                     }elseif($datos['forma_pago'] == 'Online'){
                        echo 'Pago ONLINE';
                     }
                  ?>
               </td>
            </tr>
            <tr>
               <th>¿Desea su Factura Electrónica con los mismo datos ingresados?</th>
               <td>
               <?php 
                     if($datos['factu'] == 'No'){
                        echo 'No';
                     }elseif($datos['factu'] == 'Si'){
                        echo 'Si';
                     }
                  ?>
               </td>
            </tr>
            <tr>
               <th>RUC / Cédula</th>
               <td><?php echo $datos['ruc_ced_fact']; ?></td>
            </tr>
            <tr>
               <th>Nombres Completos</th>
               <td><?php echo $datos['nombres_fact']; ?></td>
            </tr>
            <tr>
               <th>Correo (si desea puede modificarse)</th>
               <td><?php echo $datos['correo_fact']; ?></td>
            </tr>
            <tr>
               <th>Dirección</th>
               <td><?php echo $datos['direccion_fact']; ?></td>
            </tr>
            <tr>
               <th>Teléfono Fíjo</th>
               <td><?php echo $datos['telef_fact']; ?></td>
            </tr>
            <!--<tr>
               <th>Cédula ó pasaporte del Representante Legal</th>
               <td>
                  <?php if($datos['f_ced_pass_fact']){ ?>
                     <img src="data:image/jpg;base64,<?php echo $datos['f_ced_pass_fact']; ?>" width="350"  alt="">
                  <?php }else{ ?>
                     <p class="lead">No hay Archivo guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>RUC de la empresa</th>
               <td>
                  <?php if($datos['f_ruc_ced_fact']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_ruc_ced_fact']; ?>' width='80%' type='application/pdf'>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>-->
            <tr>
               <th>Comentarios</th>
               <td><?php echo $datos['comentarios_fact']; ?></td>
            </tr>
            <tr>
               <th colspan="2" class="lead text-right">
                  <a id="btn-listado-equipos" type="button" class="btn btn-warning" href="Registros-EditSoli-<?php echo $datos['id_solicitud'] ?>.html"><i class="fas fa-edit"></i> Editar</a>
               </th>
            </tr>
         </table>
      </div>
   </div>
</div>
  <!--FIN DE FORM DINAMICO!!-->
