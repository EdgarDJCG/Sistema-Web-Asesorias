<?php
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    //header("location: login.php");
    //exit;

?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="sidebar-brand-text mx-3">SISTEMA DE ASESORÍAS</div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-fw fa-home text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Página Principal</span>
                </a>
              </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="login.php" id="userDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" href="">Iniciar Sesión</span>
                <img class="img-profile rounded-circle" src="img\default-user-square-300x300.png">
              </a>
            </li>

          </ul>

</nav>

<?php
}
else{
?>

<?php
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
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <div class="sidebar-brand-text mx-3">SISTEMA DE ASESORÍAS</div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <?php
              if (($sesion_iniciada == 1))
            {
            ?>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-fw fa-home text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Página Principal</span>
                </a>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="registrar-profesor.php">
                  <i class="fas fa-fw fa-pen text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Registrar Profesor</span>
                </a>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="asignaturas.php">
                  <i class="fas fa-fw fa-table text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Asignaturas</span>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
              if (($sesion_iniciada == 2))
            {
            ?>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-fw fa-home text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Página Principal</span>
                </a>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="asignaturas.php">
                  <i class="fas fa-fw fa-table text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Asignaturas</span>
                </a>
              </li>
            <?php
            }
            ?>
            <?php
              if (($sesion_iniciada == 3))
            {
            ?>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-fw fa-home text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Página Principal</span>
                </a>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="asignaturas.php">
                  <i class="fas fa-fw fa-table text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Asignaturas</span>
                </a>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <li class="nav-item">
                <a class="nav-link" href="mis-asesorias.php">
                  <i class="fas fa-fw fa-table text-gray-600"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Mis Asesorías</span>
                </a>
              </li>
            <?php
            }
            ?>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "["; echo htmlspecialchars($_SESSION["usuario_tipo"]); echo "] "; echo htmlspecialchars($_SESSION["usuario_nombre_completo"]); ?></span>
                <img class="img-profile rounded-circle" src="img\logo-balunetwork-cuadrado-600x600.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

</nav>

<?php
}
?>