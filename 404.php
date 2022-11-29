<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template-->
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <title>Error 404 - Sistema Asesorías</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'private/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'private/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <?php
          // Check if the user is logged in, if not then redirect him to login page
          if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        ?>

        <!-- Inicio del contenedor de la pagina con sesion no iniciada -->
        <div class="container-fluid">
          <!-- Inicio Contenido -->
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">¡PÁGINA NO ENCONTRADA!</p>
            <p class="text-gray-500 mb-0">Parece que no hemos encontrado lo que buscas, ¿estás seguro que el link es correcto?</p>
            <a href="index.php">&larr; Regresar al Inicio</a>
          </div>
          <!-- Fin Contenido -->
        </div>
        <!-- Fin del contenedor de la pagina con sesion no iniciada -->

        <?php
          } 
          else{

            if ($_SESSION['usuario_tipo'] == "Administrador" || $_SESSION['usuario_tipo'] == "Profesor" || $_SESSION['usuario_tipo'] == "Alumno"){
        ?>

        <!-- Inicio del contenedor de la pagina con sesion iniciada -->
        <div class="container-fluid">
          <!-- Inicio Contenido -->
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">¡PÁGINA NO ENCONTRADA!</p>
            <p class="text-gray-500 mb-0">Parece que no hemos encontrado lo que buscas, ¿estás seguro que el link es correcto?</p>
            <a href="index.php">&larr; Regresar al Inicio</a>
          </div>
          <!-- Fin Contenido -->
        </div>
        <!-- Fin del contenedor de la pagina con sesion iniciada -->

        <?php 
            }
            else{
              header("location: 404.php");
              exit;
            }
          }
        ?>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'private/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Cookie use alert -->
  <?php include 'private/cookies-alert.php'; ?>


<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Quieres salir de tu cuenta?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Cerrar sesión" si deseas cerrar sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout.php">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>