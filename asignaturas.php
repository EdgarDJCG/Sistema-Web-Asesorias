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

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <title>Asignaturas - Sistema Asesorías</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'private/topbar.php'; ?>
        <!-- End of Topbar -->

        <?php 
        // Include config file
        require_once "private/config.php";

        /* consulta */
        $consulta="SELECT asignaturas.id as asignatura_id, asignaturas.matricula as asignatura_matricula, asignaturas.nombre as asignatura_nombre, usuarios.nombre as profesor_nombre, usuarios.matricula as profesor_matricula FROM asignaturas INNER JOIN usuarios ON usuarios.matricula=asignaturas.matriculaProfesorTitular";
        $respuesta=$link->query($consulta);
        ?>
        
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <?php
          // Check if the user is logged in, if not then redirect him to login page
          if (isset($_SESSION["loggedin"]) && ($_SESSION['usuario_tipo'] == "Alumno")){
        ?>

        <!-- Inicio del contenedor de la pagina con sesion no iniciada -->
        <div class="container-fluid">
          <!-- Inicio Contenido -->
          <h1 class="h3 mb-4 text-gray-800">Asignaturas</h1>
          <p><p><a>Asignaturas para asesorías.</a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><center>Tabla de asignaturas</center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Asignatura</th>
                      <th>Profesor Titular</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Asignatura</th>
                      <th>Profesor Titular</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      while ($registroUsuario = $respuesta->fetch_array(MYSQLI_BOTH))
                      {
                          echo'
                            <tr>
                                <td>'.$registroUsuario['asignatura_nombre'].'</td>
                                <td>'.$registroUsuario['profesor_nombre'].'</td>
                                <td><center><a href="horarios.php?asignatura_matricula='.$registroUsuario['asignatura_matricula'].'"> <button type="button" class="btn btn-primary btn btn-lg-4"><i>Ver Horarios</i></button> </a></center>
                                </td>
                            </tr>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Fin Contenido -->
        </div>
        <!-- Fin del contenedor de la pagina con sesion no iniciada -->

        <?php
          } 
          else{

            if (isset($_SESSION["loggedin"]) && ($_SESSION['usuario_tipo'] == "Administrador")){
        ?>

        <!-- Inicio del contenedor de la pagina con sesion iniciada -->
        <div class="container-fluid">
          <!-- Inicio Contenido -->
          <h1 class="h3 mb-4 text-gray-800">Asignaturas</h1>
          <p><p><a>Asignaturas para asesorías.</a>
            <center><a href="registrar-asignaturas.php"> <button type="button" class="btn btn-primary btn btn-lg-4"><i>Registrar Nueva Asignatura</i></button> </a></center>
            <br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><center>Tabla de asignaturas</center></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Asignatura</th>
                      <th>Profesor Titular</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Asignatura</th>
                      <th>Profesor Titular</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      while ($registroUsuario = $respuesta->fetch_array(MYSQLI_BOTH))
                      {
                          echo'
                            <tr>
                                <td>'.$registroUsuario['asignatura_nombre'].'</td>
                                <td>'.$registroUsuario['profesor_nombre'].'</td>
                                <td><center><a href="horarios.php?asignatura_matricula='.$registroUsuario['asignatura_matricula'].'"> <button type="button" class="btn btn-primary btn btn-lg-4"><i>Ver Horarios</i></button> </a></center>
                                </td>
                            </tr>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
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

    <!-- Cookie use alert -->
    <?php include 'private/cookies-alert.php'; ?>

  </div>
  <!-- End of Page Wrapper -->

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

    <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>