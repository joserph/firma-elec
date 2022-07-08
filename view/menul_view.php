<div class="container-fluid">
<br>
    <div class="row" id="row-frame-principal">

    <div class="col-md-2" id="col-menu-vertical">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  <div class="panel panel-default" id="paneles-system">
    <?php if(isset($_SESSION["Login"])){ ?>
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fab fa-searchengin"></i> Consultas
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
       <ul class="list-group">
            <li class="list-group-item"><a href="Registros_Solictudes.html" title=""><i class="fas fa-briefcase"></i> Solicitudes</a></li>
        </ul>
    </div>
    <?php } ?>
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-book"></i> Registros
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
       <ul class="list-group">
            <li class="list-group-item"><a href="Registros_Solicitud1.html" title=""><i class="far fa-address-book"></i> Persona Natural</a></li>
            <li class="list-group-item"><a href="Registros_Solicitud2.html" title=""><i class="fas fa-chalkboard-teacher"></i> Representante Legal</a></li>
            <li class="list-group-item"><a href="Registros_Solicitud3.html" title=""><i class="far fa-address-card"></i> Miembro de Empresa</a></li>
        </ul>
    </div>
    <?php if(isset($_SESSION["Login"])){ ?>
    <div class="panel-heading" role="tab" id="headingTree">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i> Usuarios
        </a>
      </h4>
    </div>
    <div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
       <ul class="list-group">
            <li class="list-group-item"><a href="Usuarios_Panel.html" title=""><i class="fas fa-users-cog"></i> Lista de Usuarios</a></li>
        </ul>
    </div>
    <?php } ?>
</div>

</div>
    </div>