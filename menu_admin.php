<?php
session_start();

require_once "./php/conexion.php"; // Archivo de conexion a la base de datos
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
  // Si no hay sesión, redirigir al login
  header('Location: index.php');
  exit();
}

if (!($_SESSION['tipo'] == 1)) {
  // Si no es admin, redirigir al login
  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu de usuario administrador</title>
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/principal.css">
</head>

<body>
  <div class="container py-3">
    <header>
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom"></div>

      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          </ul>


          <div class="text-end">
            <script src="./js/obtenerNombre.js"></script>
            <button id="logoutButton" onclick="cerrarSesion()" type="button" class="btn btn-outline-light me-2">Cerrar
              Sesión</button>

          </div>
        </div>
      </div>

      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <script src="./js/obtenerNombre.js"></script>
        <h1 class="display-3 fw-bolder">Bienvenido(a)</h1>
        <h1 class="NombreUsuarioPrincipal" id="DisplayUsuario"><u><span id="DisplayUsuario"></span></u></h1>
        <br>
        <p class="fs-5 fw-lighter"><em>Selecciona la opción a la que desees ingresar.</em></p>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
    <div class="row row-cols-2 row-cols-md-2 mb-3 text-center ">
      <div class="col mx-auto">
        <div class="card mb-4 rounded-3 shadow-sm bg-transparent border-transparent">
          <div class="card mx-auto bg-transparent" style="width: 14rem;">
            <img src="img/usuario.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="registroUsuario.php" class="btn btn-success btn-lg">Usuarios</a>
              <br>
              <br>
              <a href="listadoUsuarios.php" class="btn btn-primary ">Listado de Usuarios</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mb-4 rounded-3 shadow-sm bg-transparent">
          <div class="card mx-auto bg-transparent" style="width: 14rem;">
            <img src="img/check.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href=" registroChecklist.php" class="btn btn-success btn-lg">Crear Checklist</a>
              <br>
              <br>
              <a href="listadoCheck.php" class="btn btn-primary ">Listado de Checklist</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mb-4 rounded-3 shadow-sm bg-transparent border-transparent">
          <div class="card mx-auto bg-transparent" style="width: 14rem;">
            <img src="img/registro.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="registroSala.php" class="btn btn-success btn-lg">Salas</a>
              <br>
              <br>
              <a href="listadoSalas.php" class="btn btn-primary">Listado de Salas</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mx-auto">
        <div class="card mb-4 rounded-3 shadow-sm bg-transparent">
          <div class="card mx-auto bg-transparent" style="width: 14rem;">
            <img src="img/calendario.png" class="card-img-top" alt="...">
            <div class="card-body">
              <a href="semanal.php" class="btn btn-success btn-lg">Calendario</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>