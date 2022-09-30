<script type="text/javascript">
   $(document).ready(function(){
      $('#tabla_lista_paises').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
         "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
      });

      $('#tabla_lista_paises2').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
         "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
      });

      $('#tabla_lista_paises3').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
         "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
      });
   });
</script>
<?php
   if(isset($_SESSION["lgn_clnt_smt_process"])){
      $varKey_encrpt_for_clnt_prcss_smt = $_SESSION["var_ssn_ecrpt_procs_clnt_smt"];
         if($_SESSION["lgn_clnt_smt_process"]==$varKey_encrpt_for_clnt_prcss_smt){
?>
<div class="col-md-10">
   <div class="panel panel-default" id="div-panel-gestion">
      <div class="panel-heading" id="title-panel-regform">
         <h2 class="panel-title"><i class="fas fa-briefcase"></i> Solicitudes</h2>
      </div>
      <div class="panel-body">
         <div class="panel panel-info" id="div-panel-gestion">
            <div class="panel-heading" id="title-panel-regform">
               <h3><i class="far fa-address-book"></i> Persona Natural
               <hr>
                  <form action="Registros_ReportGen1.xml" method="POST" class="form-inline" role="form" id="persona_natutal">
                     <div class="form-group form-group-sm">
                        <label class="control-label"> <small>Desde</small></label>
                        <input type="date" name="desde" id="" class="form-control input-sm">
                     </div>

                     <div class="form-group form-group-sm">
                        <label class="control-label"> <small>Hasta</small></label>
                        <input type="date" name="hasta" id="" class="form-control input-sm">
                     </div>                     
                     <button class="btn btn-sm btn-default pull-right" name="regalum" type="submit" ><i class="far fa-file-excel"></i> Descargar </button>
                  </form>
                  <!--<a href="Registros_ReportGen1.xml" class="btn btn-default pull-right"><i class="far fa-file-excel"></i> Descargar</a>-->
               </h3>
               
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-condensed" id="list_persona_natural">
                     <thead> 
                        <tr>
                           <th class="text-center">Fecha ingreso</th>
                           <th class="text-center">Documento</th><!--Estado-->
                           <th class="text-center">Nombres</th>
                           <th class="text-center">Apellidos</th>
                           <th class="text-center">Estatus Firma</th>
                           <th class="text-center">Partner</th>
                           <th class="text-center">Estatus Pago</th>
                           <th class="text-center">Número Deposito</th>
                           <th class="text-center">Ver</th>
                           <th class="text-center">Editar</th>
                           <th class="text-center">Procesar</th>
                           <th class="text-center">Consultar</th>
                           <th class="text-center">Eliminar</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           for($i=0;$i<sizeof($datos);$i++)
                           {
                              if($datos[$i]['tipo_solicitud'] != 1)
                              {
                                 continue;
                              }
                              echo '<tr>';
                              echo '<td >'. date('Y/m/d h:i:s', strtotime($datos[$i]['fecha_ing_firma'])).'</td>';
                              echo '<td >'. $datos[$i]['numerodocumento'].'</td>';
                              echo '<td>'. strtoupper($datos[$i]['nombres']) .'</td>';
                              echo '<td>'. strtoupper($datos[$i]['apellido1'].' '.$datos[$i]['apellido2']) .'</td>';
                              if($datos[$i]['statusp'] == 0){
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else{
                                 echo '<td><span class="label label-success">Procesado</span></td>';
                              }
                              echo '<td>'.$datos[$i]['nombre_partner'].'</td>';
                              if($datos[$i]['cm6'] == 'Pagado')
                              {
                                 echo '<td><span class="label label-success">Pagado</span></td>';
                              }elseif($datos[$i]['cm6'] == 'Pendiente')
                              {  
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else
                              {
                                 echo '<td><span class="label label-default">Sin Estatus</span></td>';
                              }
                              echo '<td>'.$datos[$i]['cm5'].'</td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-info btn-xs" href="Registros-VerSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-eye"></i></a></td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-warning btn-xs" href="Registros-EditSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-edit"></i></a></td>';
                              if($datos[$i]['statusp'] == 0){
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-search"></i></a></td>';
                              }else{
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-search"></i></a></td>';
                              }
                              echo '<td class="text-center"><form action="Registros-deleteSol-'.$datos[$i]['id_solicitud'].'.html" method="POST" role="form"><button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" class="btn btn-danger btn-xs" onclick="return confirm(&quot;¿Seguro de eliminar el Registro de ' . strtoupper($datos[$i]['nombres']) . ' ' . strtoupper($datos[$i]['apellido1'].' '.$datos[$i]['apellido2']) . '?&quot;)"><i class="fas fa-trash-alt"></i></button></form></td>';
                              echo '</tr>';
                           }
                        ?>
                     <tbody>
                  </table>
               </div>
            </div>
         </div>

         <div class="panel panel-success" id="div-panel-gestion">
            <div class="panel-heading" id="title-panel-regform">
               <h3><i class="fas fa-chalkboard-teacher"></i> Representante Legal
                  <hr>
                  <form action="Registros_ReportGen2.xml" method="POST" class="form-inline" role="form" id="persona_natutal">
                     <div class="form-group form-group-sm">
                        <label class="control-label"> <small>Desde</small></label>
                        <input type="date" name="desde" id="" class="form-control input-sm">
                     </div>

                     <div class="form-group form-group-sm">
                        <label class="control-label"> <small>Hasta</small></label>
                        <input type="date" name="hasta" id="" class="form-control input-sm">
                     </div>                     
                     <button class="btn btn-sm btn-default pull-right" name="regalum" type="submit" ><i class="far fa-file-excel"></i> Descargar </button>
                  </form>
                  <!--<a href="Registros_ReportGen2.xml" class="btn btn-default pull-right" ><i class="far fa-file-excel"></i> Descargar</a>-->
               </h3>
               
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="list-representante-legal">
                     <thead> 
                        <tr>
                           <th class="text-center">Fecha ingreso</th>
                           <th class="text-center">Documento</th><!--Estado-->
                           <th class="text-center">Nombres</th>
                           <th class="text-center">Apellidos</th>
                           <th class="text-center">Estatus Firma</th>
                           <th class="text-center">Partner</th>
                           <th class="text-center">Estatus Pago</th>
                           <th class="text-center">Número Deposito</th>
                           <th class="text-center">Ver</th>
                           <th class="text-center">Editar</th>
                           <th class="text-center">Procesar</th>
                           <th class="text-center">Consultar</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           for($i=0;$i<sizeof($datos);$i++)
                           {
                              if($datos[$i]['tipo_solicitud'] != 2)
                              {
                                 continue;
                              }
                              echo '<tr>';
                              echo '<td >'. date('Y/m/d h:i:s', strtotime($datos[$i]['fecha_ing_firma'])).'</td>';
                              echo '<td >'. $datos[$i]['numerodocumento'].'</td>';
                              echo '<td>'. strtoupper($datos[$i]['nombres']) .'</td>';
                              echo '<td>'. strtoupper($datos[$i]['apellido1'].' '.$datos[$i]['apellido2']) .'</td>';
                              if($datos[$i]['statusp'] == 0)
                              {
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else{
                                 echo '<td><span class="label label-success">Procesado</span></td>';
                              }
                              echo '<td>'.$datos[$i]['nombre_partner'].'</td>';
                              if($datos[$i]['cm6'] == 'Pagado')
                              {
                                 echo '<td><span class="label label-success">Pagado</span></td>';
                              }elseif($datos[$i]['cm6'] == 'Pendiente')
                              {  
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else
                              {
                                 echo '<td><span class="label label-default">Sin Estatus</span></td>';
                              }
                              echo '<td>'.$datos[$i]['cm5'].'</td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-info btn-xs" href="Registros-VerSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-eye"></i></a></td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-warning btn-xs" href="Registros-EditSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-edit"></i></a></td>';
                              if($datos[$i]['statusp'] == 0)
                              {
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-search"></i></a></td>';
                              }else{
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-search"></i></a></td>';
                              }
                              echo '</tr>';
                           }
                        ?>
                     <tbody>
                  </table>
               </div>
            </div>
         </div>

         <div class="panel panel-primary" id="div-panel-gestion">
            <div class="panel-heading" id="title-panel-regform">
               <h3><i class="far fa-address-card"></i> Miembro de Empresa
                  <hr>
                     <form action="Registros_ReportGen3.xml" method="POST" class="form-inline" role="form" id="persona_natutal">
                        <div class="form-group form-group-sm">
                           <label class="control-label"> <small>Desde</small></label>
                           <input type="date" name="desde" id="" class="form-control input-sm">
                        </div>

                        <div class="form-group form-group-sm">
                           <label class="control-label"> <small>Hasta</small></label>
                           <input type="date" name="hasta" id="" class="form-control input-sm">
                        </div>                     
                        <button class="btn btn-sm btn-default pull-right" name="regalum" type="submit" ><i class="far fa-file-excel"></i> Descargar </button>
                     </form>
                  <!--<a href="Registros_ReportGen3.xml" class="btn btn-default pull-right"><i class="far fa-file-excel"></i> Descargar</a>-->
               </h3>
               
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-bordered" id="list-miembro-empresa">
                     <thead> 
                        <tr>
                           <th class="text-center">Fecha ingreso</th>
                           <th class="text-center">Documento</th><!--Estado-->
                           <th class="text-center">Nombres</th>
                           <th class="text-center">Apellidos</th>
                           <th class="text-center">Estatus Firma</th>
                           <th class="text-center">Partner</th>
                           <th class="text-center">Estatus Pago</th>
                           <th class="text-center">Número Deposito</th>
                           <th class="text-center">Ver</th>
                           <th class="text-center">Editar</th>
                           <th class="text-center">Procesar</th>
                           <th class="text-center">Consultar</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           for($i=0;$i<sizeof($datos);$i++)
                           {
                              if($datos[$i]['tipo_solicitud'] != 3)
                              {
                                 continue;
                              }
                              echo '<tr>';
                              echo '<td >'. date('Y/m/d h:i:s', strtotime($datos[$i]['fecha_ing_firma'])).'</td>';
                              echo '<td >' . $datos[$i]['numerodocumento'].'</td>';
                              echo '<td>' . strtoupper($datos[$i]['nombres']) .'</td>';
                              echo '<td>' . strtoupper($datos[$i]['apellido1'].' '.$datos[$i]['apellido2']) .'</td>';
                              if($datos[$i]['statusp'] == 0)
                              {
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else{
                                 echo '<td><span class="label label-success">Procesado</span></td>';
                              }
                              echo '<td>'.$datos[$i]['nombre_partner'].'</td>';
                              if($datos[$i]['cm6'] == 'Pagado')
                              {
                                 echo '<td><span class="label label-success">Pagado</span></td>';
                              }elseif($datos[$i]['cm6'] == 'Pendiente')
                              {  
                                 echo '<td><span class="label label-warning">Pendiente</span></td>';
                              }else
                              {
                                 echo '<td><span class="label label-default">Sin Estatus</span></td>';
                              }
                              echo '<td>'.$datos[$i]['cm5'].'</td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-info btn-xs" href="Registros-VerSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-eye"></i></a></td>';
                              echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-warning btn-xs" href="Registros-EditSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-edit"></i></a></td>';
                              if($datos[$i]['statusp'] == 0)
                              {
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-search"></i></a></td>';
                              }else{
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-success btn-xs" href="Registros-ProcPago-'.$datos[$i]['id_solicitud'].'.html" disabled><i class="fas fa-file-import"></i></a></td>';
                                 echo '<td class="text-center"><a id="btn-listado-equipos" type="button" class="btn btn-primary btn-xs" href="Registros-ListSoli-'.$datos[$i]['id_solicitud'].'.html"><i class="fas fa-search"></i></a></td>';
                              }
                              echo '</tr>';
                           }
                        ?>
                     <tbody>
                  </table>
               </div>         
            </div>
         </div>
      </div>
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