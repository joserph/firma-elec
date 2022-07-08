    
<?php
if(isset($_SESSION["lgn_clnt_smt_process"])){
  $varKey_encrpt_for_clnt_prcss_smt = $_SESSION["var_ssn_ecrpt_procs_clnt_smt"];
  if($_SESSION["lgn_clnt_smt_process"]==$varKey_encrpt_for_clnt_prcss_smt){

?>

<!--<script type="text/javascript">
  $(document).ready(function(){
   $('#tabla_lista_clientes').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
</script>-->

<div class="col-md-10">
   <div class="panel panel-default" id="div-panel-gestion">
      <div class="panel-heading" id="title-panel-regform">
         <h3 class="panel-title"><i class="fas fa-users-cog"></i> Lista de Usuarios</h3>
      </div>
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered table-condensed" id="list-usuario">
               <thead> 
                  <tr>
                     <th class="text-center">#</th><!--Estado-->
                     <th class="text-center">Nombre</th>
                     <th class="text-center">Apellido</th>
                     <th class="text-center">Modificar</th>
                     <th class="text-center">Eliminar</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     for($i=0;$i<sizeof($datos);$i++)
                     {
                        echo '<tr>';
                        echo '<td align="center">'.($i+1).'</td>';
                        echo '<td align="center">'.$datos[$i]['nombre'].'</td>';
                        echo '<td align="center">'.$datos[$i]['apellido'].'</td>';        
                        echo '<td align="center"><a id="btn-listado-equipos" type="button" class="btn btn-warning btn-xs" href="Usuarios-EditUsuario-'.$datos[$i]['id_usuario'].'.html"><i class="fas fa-edit"></i></a></td>';
                        if(sizeof($datos) > 1)
                        {
                           if($_SESSION["ID"]===$datos[$i]['id_usuario']){
                              echo '<td align="center"><a id="btn-listado-equipos" type="button" class="btn btn-danger btn-xs" href="#"><i class="far fa-trash-alt"></i></a></td>';
                           }else{
                              echo '<td align="center"><a id="btn-listado-equipos" type="button" class="btn btn-danger btn-xs" href="Usuarios-DelUsuario-'.$datos[$i]['id_usuario'].'.html"><i class="far fa-trash-alt"></i></a></td>';
                           }
                        }else{
                           echo '<td align="center"><a id="btn-listado-equipos" type="button" class="btn btn-danger btn-xs disabled" href="#"><i class="far fa-trash-alt"></i></a></td>';
                        }
                        echo '</tr>';
                     }
                  ?>
               <tbody>
            </table>
         </div>
         <div><a href="Usuarios_AddUsuario.html" class="btn btn-info btn-sm" role="button"><i class="fas fa-user-plus"></i> Agregar</a></div>
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