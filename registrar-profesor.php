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
$matricula = $nombre = $correo = $clave = $tipo = "";
$matricula_err = $clave_err = $clave_confirm_err = $nombre_err = $correo_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if matricula is empty
    if(empty(trim($_POST["matricula"]))){
        $matricula_err = "ERROR: Inserta la matricula institucional del profesor.";
    } else{
        $matricula = trim($_POST["matricula"]);
    }

    // Check if fullname is empty
    if(empty(trim($_POST["nombre"]))){
        $nombre_err = "ERROR: Inserta el nombre completo del profesor.";
    } else{
        $nombre = trim($_POST["nombre"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["clave"]))){
        $clave_err = "ERROR: Inserta la contraseña.";
    } else{
        if(strlen(trim($_POST["clave"])) >= 6){
            // Check if password confirm is empty
            if(empty(trim($_POST["clave_confirmar"]))){
                $clave_confirm_err = "ERROR: Inserta la confirmacion de contraseña.";
            } else{
                // Check if passwords are equal
                if(trim($_POST["clave_confirmar"]) != trim($_POST["clave"])){
                  $clave_confirm_err = "ERROR: Las contraseñas no coinciden.";
                } else{
                  $clave = trim($_POST["clave"]);
                }    
            }
        } else{
            $clave_err = "ERROR: La contraseña es muy corta.";
        }
    }

    // Check if correo is empty
    if(empty(trim($_POST["correo"]))){
        $correo_err = "ERROR: Inserta el correo electrónico.";     
    } elseif(true){
        $correo_err = "";
        $correo = trim($_POST["correo"]);    
    } else{
        $correo_err = "ERROR: No es un correo valido.";
    }
    
    // Validate credentials
    if(empty($matricula_err) && empty($clave_err) && empty($clave_confirm_err) && empty($nombre_err) && empty($correo_err)){
        // Prepare a select statement to compare with other accounts
        $sql_user_exist = "SELECT matricula FROM usuarios WHERE matricula='".$matricula."'";
        if($user_exist = mysqli_query($link,$sql_user_exist)){
          if(mysqli_num_rows($user_exist) > 0){
            $username_err = "ERROR: Este usuario ya existe.";
          } else{
              // Prepare an insert statement
              $sql = "INSERT INTO usuarios (matricula, nombre, correo, clave, tipo) VALUES (?, ?, ?, ?, ?)";
               
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "sssss", $param_matricula, $param_nombre, $param_correo, $param_clave, $param_tipo);
                  
                  // Set parameters
                  $param_matricula = $matricula;
                  $param_nombre = $nombre;
                  $param_correo = $correo;
                  $param_clave = password_hash($clave, PASSWORD_DEFAULT); // Creates a password hash
                  $param_tipo = "Profesor";
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){

                      // Redirect to login page
                      header("location: login.php");

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
                    <h1 class="h3 text-gray-800 mb-5">Registrar Profesor</h1>
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
                    <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                      <input type="text" name="correo" class="form-control form-control-option" value="<?php echo $correo; ?>"  aria-describedby="userHelp" placeholder="Correo Electrónico...">
                      <span class="help-block"><?php echo $correo_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($clave_err)) ? 'has-error' : ''; ?>">
                      <input type="password" name="clave" class="form-control fform-control-option" placeholder="Contraseña...">
                      <span class="help-block"><?php echo $clave_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($clave_confirm_err)) ? 'has-error' : ''; ?>">
                      <input type="password" name="clave_confirmar" class="form-control fform-control-option" placeholder="Repetir contraseña...">
                      <span class="help-block"><?php echo $clave_confirm_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control-option btn-block" value="Registrar">
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
