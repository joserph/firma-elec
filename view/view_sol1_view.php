<script type="text/javascript">
      $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
      });
      $(document).ready(function() {
          $('#example-multiple-selected2').multiselect();
      });
</script>

<div class="col-md-10">
   <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">
         <h3>
            <i class="far fa-address-book" aria-hidden="true"></i> Ver Solicitud de Persona Natural
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
               <th>Provincia</th>
               <td><?php echo $datos['provincia']; ?></td>
            </tr>
            <tr>
               <th>Ciudad</th>
               <td><?php echo $datos['ciudad']; ?></td>
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
                  <img src="data:image/jpg;base64,<?php echo $datos['f_cedulaFront']; ?>" id="cedulaFrontal" width="350"  alt="">
                  <hr>
                  <?php
                     $base64Img = $datos['f_cedulaFront'];
                     // list(, $base64Img) = explode(';', $base64Img);
                     // list(, $base64Img) = explode(',', $base64Img);
                     $base64Img = base64_decode($base64Img);
                     file_put_contents('test.jpg', $base64Img);
                     echo "<a href='test.jpg' download>Descargar 1</a>"
                  ?>
                  <button onclick="descargarImgBase64(data = 'cedulaFrontal')">Descargar</button>
               </td>
            </tr>
            <tr>
               <th>Foto Cédula Posterior</th>
               <td><img src="data:image/jpg;base64,<?php echo $datos['f_cedulaBack']; ?>" width="350"  alt=""></td>
            </tr>
            <tr>
               <th>Foto Tipo Selfie</th>
               <td><img src="data:image/jpg;base64,<?php echo $datos['f_selfie']; ?>" width="350"  alt=""></td>
            </tr>
            <tr>
               <th>Documento Adicional 1</th>
               <td>
                  <?php if($datos['f_adicional1']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_adicional1']; ?>' width='80%' height="300" type='application/pdf'>
                  <?php }else{ ?>
                     <p class="lead">No hay PDF guardado</p>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <th>Copia RUC</th>
               <td>
                  <?php if($datos['f_copiaruc']){ ?>
                     <embed src='data:application/pdf;base64,<?php echo $datos['f_copiaruc']; ?>' width='80%' height="300" type='application/pdf'>
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
<script>
function descargarImgBase64(name){
   let img_base_64 = document.getElementById(name).getAttribute('src');

   urlToFile(img_base_64, name);
   //console.log(img_base_64);
    
}
let urlToFile = (url, name) => {
   let arr = url.split(",")
   //console.log(arr)
   let mime = arr[0].replace('data:', '').replace(';base64', '')
   let data = arr[1]
   // let arrBuffer = base64ToArrayBuffer(data)
   // let newBlob = new Blob([arrBuffer], {type: mime})

   // let data_url = window.URL.createObjectURL(newBlob)

   // var link = document.createElement('a');
   // document.body.appendChildl(link);
   // link.href = data_url;
   // link.download = name;
   // link.click();
   // window.URL.revokeObjectURL(data_url);
   // link.remove();

   let dataStr = atob(data)
   let n = dataStr.length
   let dataArr = new Uint8Array(n)

   while(n--)
   {
      dataArr[n] = dataStr.charCodeAt(n)
   }
   
   let file = new File([dataArr], name + '.jpg', {type: mime})

   let payload = new FormData()
   let test = payload.append('file', file)
   // let d = window.URL.createObjectURL(file)
   // console.log(d)
   console.log(test)
}

function base64ToArrayBuffer(base64) {
    var binaryString = window.atob(base64);
    var binaryLen = binaryString.length;
    var bytes = new Uint8Array(binaryLen);
    for (var i = 0; i < binaryLen; i++) {
       var ascii = binaryString.charCodeAt(i);
       bytes[i] = ascii;
    }
    return bytes;
 }
</script>
