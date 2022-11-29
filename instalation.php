<?php
 
// Include config file
require_once "private/config.php";

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        matricula VARCHAR(45) UNIQUE NOT NULL,
        nombre VARCHAR(100) NOT NULL,
        correo VARCHAR(45) UNIQUE NOT NULL,
        clave VARCHAR(230) NOT NULL,
        tipo VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'usuarios' created successfully.\n");
} else{
    echo "Error creating table usuarios: " . mysqli_error($link);
}

$sql = "INSERT INTO usuarios (matricula, nombre, correo, clave, tipo) VALUES (?, ?, ?, ?, ?)";
               
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  mysqli_stmt_bind_param($stmt, "sssss", $param_matricula, $param_nombre, $param_correo, $param_clave, $param_tipo);
                  
                  // Set parameters
                  $param_matricula = "admin";
                  $param_nombre = "Administrador";
                  $param_correo = "admin";
                  $param_clave = password_hash("123456", PASSWORD_DEFAULT); // Creates a password hash
                  $param_tipo = "Administrador";
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){

                       // Close statement
                      mysqli_stmt_close($stmt);
                  } else{
                      echo "¡Uy! Algo salió mal, reporta esto con el desarrollador.";
                  }
            }

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS asignaturas (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        matricula VARCHAR(45) UNIQUE NOT NULL,
        nombre VARCHAR(100) UNIQUE NOT NULL,
        matriculaProfesorTitular VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'asignaturas' created successfully.\n");
} else{
    echo "Error creating table asignaturas: " . mysqli_error($link);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS asesores (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        matriculaUsuario VARCHAR(45) NOT NULL,
        matriculaAsignatura VARCHAR(100) NOT NULL,
        status VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'asesores' created successfully.\n");
} else{
    echo "Error creating table asesores: " . mysqli_error($link);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS asesores (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        matriculaUsuario VARCHAR(45) NOT NULL,
        matriculaAsignatura VARCHAR(100) NOT NULL,
        status VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'asesores' created successfully.\n");
} else{
    echo "Error creating table asesores: " . mysqli_error($link);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS sesiones (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        matriculaAsesor VARCHAR(45) NOT NULL,
        matriculaAsignatura VARCHAR(100) NOT NULL,
        fechaHoraComienzo TIMESTAMP NOT NULL,
        fechaHoraFinalizacion TIMESTAMP NOT NULL,
        medio VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'sesiones' created successfully.\n");
} else{
    echo "Error creating table sesiones: " . mysqli_error($link);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS asistencias (
        id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
        idSesion INT NOT NULL,
        matriculaAlumno VARCHAR(100) NOT NULL,
        asistio VARCHAR(45) NOT NULL,
        rendimientoAlumno VARCHAR(45) NOT NULL,
        rendimientoProfesor VARCHAR(45) NOT NULL
        )";

if (mysqli_query($link, $sql)){
    echo nl2br ("Table 'asistencias' created successfully.\n");
} else{
    echo "Error creating table asistencias: " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
