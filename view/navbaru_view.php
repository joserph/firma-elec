<?php
if(isset($_SESSION["lgn_clnt_smt_process"])){
    $varKey_encrpt_for_clnt_prcss_smt = $_SESSION["var_ssn_ecrpt_procs_clnt_smt"];
    if($_SESSION["lgn_clnt_smt_process"]==$varKey_encrpt_for_clnt_prcss_smt){

?>

<nav class="navbar navbar-default" id="navbar" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Usuarios_index.html">
                <img alt="Brand" src="web/public/img/logo-firma-electronica-lb.png" width="80">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="Usuarios_index.html"><i class="fas fa-home"></i> Inicio</a></li>
                
            </ul>
            <ul class="nav navbar-nav">
                <li class=""><a href="Registros_Solictudes.html" title=""><i class="fas fa-briefcase"></i> Solicitudes</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"></i> Registros <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class=""><a href="Registros_Solicitud1.html" title=""><i class="far fa-address-book"></i> Persona Natural</a></li>
                        <li class=""><a href="Registros_Solicitud2.html" title=""><i class="fas fa-chalkboard-teacher"></i> Representante Legal</a></li>
                        <li class=""><a href="Registros_Solicitud3.html" title=""><i class="far fa-address-card"></i> Miembro de Empresa</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class=""><a href="Usuarios_Panel.html" title=""><i class="fas fa-users-cog"></i> Lista de Usuarios</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i> Perfil [<?php echo $_SESSION["Nombre"]; ?>] <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="?ctrl=Usuarios&act=cerrar"><i class="fas fa-power-off"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<?php
}else{
    echo "<script type='text/javascript'>window.location='index.php?ctrl=Usuarios&act=index';</script>";
}
}else{
  echo "<script type='text/javascript'>window.location='index.php?ctrl=Usuarios&act=index';</script>";
}
?>