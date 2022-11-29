<?php
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: login.php");
    //exit;

?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">SISTEMA ASESORÍAS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">MENÚ</div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
          <i class="fas fa-fw fa-table"></i>
          <span>Asesorías</span>
        </a>
        <div id="collapseNetwork" class="collapse" aria-labelledby="headingNetwork" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">ASESORÍAS:</h6>
            <a class="collapse-item" href="net-staff-miembros.php">Ver Tabla de Asignaturas</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleplay" aria-expanded="true" aria-controls="collapseRoleplay">
          <i class="fas fa-fw fa-table"></i>
          <span>Roleplay</span>
        </a>
        <div id="collapseRoleplay" class="collapse" aria-labelledby="headingRoleplay" data-parent="#accordionSidebar"> <!-- class="collapse show" muestra-->
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="rp-baneos.php">Baneos</a>
            <a class="collapse-item" href="rp-advertencias.php">Advertencias</a>
            <a class="collapse-item" href="rp-banco.php">Banco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Policía:</h6>
            <a class="collapse-item" href="rp-multas.php">Multas</a>
            <a class="collapse-item" href="rp-arrestos.php">Arrestos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>

<?php
} 
else{

  if (($_SESSION['usuario_tipo'] == "Administrador"))
      {
        $sesion_iniciada = 1;
      }
  else if (($_SESSION['usuario_tipo'] == "Profesor"))
      {
        $sesion_iniciada = 2;
      }
  else if (($_SESSION['usuario_tipo'] == "Alumno"))
      {
        $sesion_iniciada = 3;
      }

  if (($sesion_iniciada == 8) || ($sesion_iniciada == 7))
      {
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bold"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Balu Network <sup>PANEL 2.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Tablas</div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
          <i class="fas fa-fw fa-table"></i>
          <span>Network</span>
        </a>
        <div id="collapseNetwork" class="collapse" aria-labelledby="headingNetwork" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="net-usuarios.php">Usuarios</a>
            <a class="collapse-item" href="net-staff-miembros.php">Miembros STAFF</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleplay" aria-expanded="true" aria-controls="collapseRoleplay">
          <i class="fas fa-fw fa-table"></i>
          <span>Roleplay</span>
        </a>
        <div id="collapseRoleplay" class="collapse" aria-labelledby="headingRoleplay" data-parent="#accordionSidebar"> <!-- class="collapse show" muestra-->
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="rp-baneos.php">Baneos</a>
            <a class="collapse-item" href="rp-advertencias.php">Advertencias</a>
            <a class="collapse-item" href="rp-banco.php">Banco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Policía:</h6>
            <a class="collapse-item" href="rp-multas.php">Multas</a>
            <a class="collapse-item" href="rp-arrestos.php">Arrestos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Herramientas</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBaneos" aria-expanded="true" aria-controls="collapseBaneos">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Baneos</span>
        </a>
        <div id="collapseBaneos" class="collapse" aria-labelledby="headingBaneos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Baneos:</h6>
            <a class="collapse-item" href="banear.php">Aplicar Baneo</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Advertencias:</h6>
            <a class="collapse-item" href="warn.php">Aplicar Advertencia</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>

<?php 
    }
if (($sesion_iniciada == 6) || ($sesion_iniciada == 5))
    {
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bold"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Balu Network <sup>PANEL 2.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Tablas</div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
          <i class="fas fa-fw fa-table"></i>
          <span>Network</span>
        </a>
        <div id="collapseNetwork" class="collapse" aria-labelledby="headingNetwork" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="net-usuarios.php">Usuarios</a>
            <a class="collapse-item" href="net-staff-miembros.php">Miembros STAFF</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tienda:</h6>
            <a class="collapse-item" href="net-ventas.php">Ventas</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleplay" aria-expanded="true" aria-controls="collapseRoleplay">
          <i class="fas fa-fw fa-table"></i>
          <span>Roleplay</span>
        </a>
        <div id="collapseRoleplay" class="collapse" aria-labelledby="headingRoleplay" data-parent="#accordionSidebar"> <!-- class="collapse show" muestra-->
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="rp-baneos.php">Baneos</a>
            <a class="collapse-item" href="rp-advertencias.php">Advertencias</a>
            <a class="collapse-item" href="rp-banco.php">Banco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Policía:</h6>
            <a class="collapse-item" href="rp-multas.php">Multas</a>
            <a class="collapse-item" href="rp-arrestos.php">Arrestos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Herramientas</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBaneos" aria-expanded="true" aria-controls="collapseBaneos">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Baneos</span>
        </a>
        <div id="collapseBaneos" class="collapse" aria-labelledby="headingBaneos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Baneos:</h6>
            <a class="collapse-item" href="banear.php">Aplicar Baneo</a>
            <a class="collapse-item" href="desbanear.php">Remover Baneo</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Advertencias:</h6>
            <a class="collapse-item" href="warn.php">Aplicar Advertencia</a>
            <a class="collapse-item" href="unwarn.php">Remover Advertencia</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOtros" aria-expanded="true" aria-controls="collapseOtros">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Otros</span>
        </a>
        <div id="collapseOtros" class="collapse" aria-labelledby="headingOtros" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actividad:</h6>
            <a class="collapse-item" href="actividad_general.php">Actividad General</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>

<?php 
    }
if (($sesion_iniciada == 4) || ($sesion_iniciada == 3) || ($sesion_iniciada == 2))
    {
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bold"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Balu Network <sup>PANEL 2.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Tablas</div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
          <i class="fas fa-fw fa-table"></i>
          <span>Network</span>
        </a>
        <div id="collapseNetwork" class="collapse" aria-labelledby="headingNetwork" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="net-usuarios.php">Usuarios</a>
            <a class="collapse-item" href="net-staff-miembros.php">Miembros STAFF</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tienda:</h6>
            <a class="collapse-item" href="net-ventas.php">Ventas</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleplay" aria-expanded="true" aria-controls="collapseRoleplay">
          <i class="fas fa-fw fa-table"></i>
          <span>Roleplay</span>
        </a>
        <div id="collapseRoleplay" class="collapse" aria-labelledby="headingRoleplay" data-parent="#accordionSidebar"> <!-- class="collapse show" muestra-->
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="rp-baneos.php">Baneos</a>
            <a class="collapse-item" href="rp-advertencias.php">Advertencias</a>
            <a class="collapse-item" href="rp-banco.php">Banco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Policía:</h6>
            <a class="collapse-item" href="rp-multas.php">Multas</a>
            <a class="collapse-item" href="rp-arrestos.php">Arrestos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Herramientas</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBaneos" aria-expanded="true" aria-controls="collapseBaneos">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Baneos</span>
        </a>
        <div id="collapseBaneos" class="collapse" aria-labelledby="headingBaneos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Baneos:</h6>
            <a class="collapse-item" href="banear.php">Aplicar Baneo</a>
            <a class="collapse-item" href="desbanear.php">Remover Baneo</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Advertencias:</h6>
            <a class="collapse-item" href="warn.php">Aplicar Advertencia</a>
            <a class="collapse-item" href="unwarn.php">Remover Advertencia</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrarSTAFF" aria-expanded="true" aria-controls="collapseAdministrarSTAFF">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Administrar STAFF</span>
        </a>
        <div id="collapseAdministrarSTAFF" class="collapse" aria-labelledby="headingAdministrarSTAFF" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="staff-registrar.php">Registrar STAFF</a>
            <a class="collapse-item" href="net-staff-miembros.php">Remover STAFF</a>
            <a class="collapse-item" href="net-staff-miembros.php">Editar STAFF</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOtros" aria-expanded="true" aria-controls="collapseOtros">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Otros</span>
        </a>
        <div id="collapseOtros" class="collapse" aria-labelledby="headingOtros" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actividad:</h6>
            <a class="collapse-item" href="actividad_general.php">Actividad General</a>
            <?php 
            if (($sesion_iniciada == 3) || ($sesion_iniciada == 2)) {
            ?>
            <h6 class="collapse-header">NPCs:</h6>
            <a class="collapse-item" href="tabla-tienda-npc.php?accion=menu">Administrador de Tiendas</a>
            <?php } ?>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>

<?php 
    }
if (($sesion_iniciada == 1))
    {
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bold"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Balu Network <sup>PANEL 2.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Tablas</div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
          <i class="fas fa-fw fa-table"></i>
          <span>Network</span>
        </a>
        <div id="collapseNetwork" class="collapse" aria-labelledby="headingNetwork" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="net-usuarios.php">Usuarios</a>
            <a class="collapse-item" href="net-staff-miembros.php">Miembros STAFF</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tienda:</h6>
            <a class="collapse-item" href="net-ventas.php">Ventas</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoleplay" aria-expanded="true" aria-controls="collapseRoleplay">
          <i class="fas fa-fw fa-table"></i>
          <span>Roleplay</span>
        </a>
        <div id="collapseRoleplay" class="collapse" aria-labelledby="headingRoleplay" data-parent="#accordionSidebar"> <!-- class="collapse show" muestra-->
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General:</h6>
            <a class="collapse-item" href="rp-baneos.php">Baneos</a>
            <a class="collapse-item" href="rp-advertencias.php">Advertencias</a>
            <a class="collapse-item" href="rp-banco.php">Banco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Policía:</h6>
            <a class="collapse-item" href="rp-multas.php">Multas</a>
            <a class="collapse-item" href="rp-arrestos.php">Arrestos</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">Herramientas</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBaneos" aria-expanded="true" aria-controls="collapseBaneos">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Castigos</span>
        </a>
        <div id="collapseBaneos" class="collapse" aria-labelledby="headingBaneos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Baneos:</h6>
            <a class="collapse-item" href="banear.php">Aplicar Baneo</a>
            <a class="collapse-item" href="desbanear.php">Remover Baneo</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Advertencias:</h6>
            <a class="collapse-item" href="warn.php">Aplicar Advertencia</a>
            <a class="collapse-item" href="unwarn.php">Remover Advertencia</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrarSTAFF" aria-expanded="true" aria-controls="collapseAdministrarSTAFF">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Administrar STAFF</span>
        </a>
        <div id="collapseAdministrarSTAFF" class="collapse" aria-labelledby="headingAdministrarSTAFF" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="staff-registrar.php">Registrar STAFF</a>
            <a class="collapse-item" href="net-staff-miembros.php">Remover STAFF</a>
            <a class="collapse-item" href="net-staff-miembros.php">Editar STAFF</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOtros" aria-expanded="true" aria-controls="collapseOtros">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Otros</span>
        </a>
        <div id="collapseOtros" class="collapse" aria-labelledby="headingOtros" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tienda:</h6>
            <a class="collapse-item" href="registrar-ventas.php">Registrar Ventas</a>
            <h6 class="collapse-header">Actividad:</h6>
            <a class="collapse-item" href="actividad_general.php">Actividad General</a>
            <h6 class="collapse-header">NPCs:</h6>
            <a class="collapse-item" href="tabla-tienda-npc.php?accion=menu">Administrador de Tiendas</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>

<?php 
    }
}
?>