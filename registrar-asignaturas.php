<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true || $_SESSION['usuario_tipo'] == "Profesor" || $_SESSION['usuario_tipo'] == "Alumno"){
  header("location: index.php");
  exit;
}
else{
  if ($_SESSION['usuario_tipo'] == "Administrador"){


// Include config file
require_once "private/config.php";

// Define variables and initialize with empty values
$matricula = $nombre = $matriculaProf = "";
$matricula_err = $nombre_err = $matriculaProf_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if matricula is empty
    if(empty(trim($_POST["matricula"]))){
        $matricula_err = "ERROR: Inserta la matricula institucional de la asignatura.";
    } else{
        $matricula = trim($_POST["matricula"]);
    }

    // Check if fullname is empty
    if(empty(trim($_POST["nombre"]))){
        $nombre_err = "ERROR: Inserta el nombre completo de la asignatura.";
    } else{
        $nombre = trim($_POST["nombre"]);
    }
    
    // Check if matricula is empty
    if(empty(trim($_POST["matricula_profesor"]))){
        $matriculaProf_err = "ERROR: Inserta la matricula institucional del profesor titular.";
    } else{
        $sql_prof_exist = "SELECT matricula FROM usuarios WHERE matricula='".trim($_POST["matricula_profesor"])."' AND tipo='Profesor'";
        if($prof_exist = mysqli_query($link,$sql_prof_exist)){
          if(mysqli_num_rows($prof_exist) == 0){
            $matriculaProf_err = "ERROR: La matricula no corresponde a ningún profesor.";
          }
          else
          {
            $matriculaProf = trim($_POST["matricula_profesor"]);
          }  
      }
    }
    // Validate credentials
    if(empty($matricula_err) && empty($nombre_err) && empty($matriculaProf_err)){
        // Prepare a select statement to compare with other accounts
        $sql_user_exist = "SELECT matricula FROM usuarios WHERE matricula='".$matricula."'";
        if($user_exist = mysqli_query($link,$sql_user_exist)){
          if(mysqli_num_rows($user_exist) > 0){
            $matricula_err = "ERROR: Esta matricula ya existe.";
          } else{
              // Prepare an insert statement
              $sql = "INSERT INTO asignaturas (matricula, nombre, matriculaProfesorTitular) VALUES (?, ?, ?)";
               
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "sss", $param_matricula, $param_nombre, $param_matriculaProf);
                  
                  // Set parameters
                  $param_matricula = $matricula;
                  $param_nombre = $nombre;
                  $param_matriculaProf = $matriculaProf;
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){

                      // Redirect to login page
                      header("location: asignaturas.php");

                       // Close statement
                      mysqli_stmt_close($stmt);
                  } else{
                      echo "¡Uy! Algo salió mal, reporta esto con el desarrollador.";
                  }
              }
          }
          mysqli_free_result($user_exist);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema Asesorías - Registrar Profesor</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="p-2 text-center">
      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 30rem;" src="img/logo-balunetwork-completo-300px.png" alt="">
    </div>

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="" style="width: 20rem;">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                <div class="p-2">
                  <div class="text-center">
                    <h1 class="h3 text-gray-800 mb-5">Registrar Asignatura (Dar de alta)</h1>
                  </div>
                  <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($matricula_err)) ? 'has-error' : ''; ?>">
                      <input type="text" name="matricula" class="form-control form-control-option" value="<?php echo $matricula; ?>"  aria-describedby="userHelp" placeholder="Matricula...">
                      <span class="help-block"><?php echo $matricula_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                      <input type="text" name="nombre" class="form-control form-control-option" value="<?php echo $nombre; ?>"  aria-describedby="userHelp" placeholder="Nombre Completo...">
                      <span class="help-block"><?php echo $nombre_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($matriculaProf_err)) ? 'has-error' : ''; ?>">
                      <input type="text" name="matricula_profesor" class="form-control form-control-option" value="<?php echo $matriculaProf; ?>"  aria-describedby="userHelp" placeholder="Matricula del profesor titular...">
                      <span class="help-block"><?php echo $matriculaProf_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control-option btn-block" value="Dar de Alta">
                    </div>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="index.php">volver al inicio</a>
                  </div>
                </div>
            </div>
          </div>
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

<?php

  }
  else{
    header("location: index.php");
    exit;
  }
}

?>
