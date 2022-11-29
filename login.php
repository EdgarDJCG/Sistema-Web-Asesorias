<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "private/config.php";
 
// Define variables and initialize with empty values
$matricula = $clave = "";
$matricula_err = $clave_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if matricula is empty
    if(empty(trim($_POST["matricula"]))){
        $matricula_err = "ERROR: Inserta tu matricula.";
    } else{
        $matricula = trim($_POST["matricula"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["clave"]))){
        $clave_err = "ERROR: Inserta tu contraseña.";
    } else{
        $clave = trim($_POST["clave"]);
    }
    
    // Validate credentials
    if(empty($matricula_err) && empty($clave_err)){
        // Prepare a select statement
        $sql = "SELECT id, matricula, nombre, correo, clave, tipo FROM usuarios WHERE matricula = ? LIMIT 1";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_matricula);
            
            // Set parameters
            $param_matricula = $matricula;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $matricula, $nombre, $correo, $hashed_password, $tipo);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($clave, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["usuario_id"] = $id;
                            $_SESSION["usuario_matricula"] = $matricula;
                            $_SESSION["usuario_nombre_completo"] = $nombre;
                            $_SESSION["usuario_correo"] = $correo;
                            $_SESSION["usuario_tipo"] = $tipo;       
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $clave_err = "ERROR: Contraseña incorrecta.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $matricula_err = "ERROR: Este usuario no existe.";
                }
            } else{
                echo "¡Uy! Algo salió mal, reporta esto con el desarrollador.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
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

  <title>Sistema Asesorías - Iniciar Sesión</title>

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
                    <h1 class="h3 text-gray-800 mb-5">Iniciar Sesión</h1>
                  </div>
                  <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($matricula_err)) ? 'has-error' : ''; ?>">
                      <input type="text" name="matricula" class="form-control form-control-option" value="<?php echo $matricula; ?>"  aria-describedby="userHelp" placeholder="Matricula...">
                      <span class="help-block"><?php echo $matricula_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($clave_err)) ? 'has-error' : ''; ?>">
                      <input type="password" name="clave" class="form-control fform-control-option" placeholder="Contraseña...">
                      <span class="help-block"><?php echo $clave_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control-option btn-block" value="Iniciar Sesión">
                    </div>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small color-gray">¿no tienes cuenta?</a>
                    <br>
                    <a class="small" href="registrar-alumno.php">registrarse como alumno</a>
                    <br>
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
