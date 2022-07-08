<script type="text/javascript">
    $(document).ready(function(){
   $('#tabla_lista_paises').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );

   $('#tabla_lista_paises2').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );

   $('#tabla_lista_paises3').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
    })
</script>
<?php
if(isset($_SESSION["lgn_clnt_smt_process"])){
  $varKey_encrpt_for_clnt_prcss_smt = $_SESSION["var_ssn_ecrpt_procs_clnt_smt"];
  if($_SESSION["lgn_clnt_smt_process"]==$varKey_encrpt_for_clnt_prcss_smt){

?>
<div class="col-md-10">
<div class="panel panel-default" id="div-panel-gestion">
              <div class="panel-heading" id="title-panel-regform">
                    <h3 class="panel-title"><h3><span class="glyphicon glyphicon-briefcase"></span>&nbsp; Estado de Solicitudes Representante Legal</h3>
<hr/></h3>
              </div>
    <div class="panel-body">
      <div class="table-responsive">

  <table class="table table-bordered table-condensed" id="tabla_lista_paises">
    <thead> 
                    <tr>
                        <th>Tipo de Solicitud</th><!--Estado-->
                        <th>Documento</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                
    <tbody>
                    <?php

     
                   for($i=0;$i<sizeof($datos);$i++)
                   {
                               if($datos[$i]['tipo_solicitud'] != "REPRESENTANTE LEGAL")
                               {
                                 continue;
                               }
                               echo '<tr>';
                               echo '<td >'.$datos[$i]['tipo_solicitud'].'</td>';
                               echo '<td>'.$datos[$i]['documento'].'</td>';
                               echo '<td>'.$datos[$i]['fecha_registro'].'</td>';
                               echo '<td>'.$datos[$i]['estado'].'</td>';
                               echo '</tr>';
                        }

                    ?>
                <tbody>
  </table>

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