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
  <title>Inicio</title>
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bienvenida.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="menu_admin.php" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="registroUsuario.php" class="nav-link px-2 text-white">Usuarios</a> </li>
          <li><a href="registroChecklist.php" class="nav-link px-2 text-white">Checklists</a></li>
          <li><a href="registroSala.php" class="nav-link px-2 text-white">Salas</a></li>
          <li><a href="semanal.php" class="nav-link px-2 text-white">Calendario</a></li>
        </ul>

        <div class="text-end">
          <script src="./js/obtenerNombre.js"></script>
          <button id="logoutButton" onclick="cerrarSesion()" type="button" class="btn btn-outline-light me-2">Cerrar
            Sesión</button>

        </div>
      </div>
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom"></div>
    </div>
  </header>

  <div class="container mt-5">
    <h1 align="center">Registro de Usuarios</h1>
    <br>
    <form id="salaForm" action="./php/registro_usuario.php" method="POST">
      <!-- Nombre del usuario-->
      <div class="mb-3">
        <label for="id_usuario" class="form-label fw-bold">Identificador del Usuario :</label>
        <input type="text" class="form-control fw-lighter" name="idUsuario" id="idUsuario"
          placeholder="Ingrese el ID del usuario" required>
      </div>
      <div class="mb-3">
        <label for="nombre_usuario" class="form-label fw-bold">Nombre(s) :</label>
        <input type="text" class="form-control fw-lighter" name="nomUsuario" id="nomUsuario"
          placeholder="Ingrese el(los) nombre(s) del usuario" required>
      </div>
      <div class="mb-3">
        <label for="contra_usuario" class="form-label fw-bold">Contraseña :</label>
        <input type="text" class="form-control fw-lighter" name="nomContra" id="nomContra"
          placeholder="Ingrese la contraseña del usuario" required>
      </div>
      <div class="mb-3">
        <label for="tipo_usuario" class="form-label fw-bold">Tipo :</label>
        <select class="form-select fw-lighter" name="nomTipo" id="nomTipo">
          <option selected>Selecciona el tipo de usuario :</option>
          <option value="3">Auxiliar</option>
          <option value="2">Encargado de turno</option>
          <option value="1">Administrador</opttion>
        </select>
      </div>
      <!-- Botón para agregar sala -->
      <div class="col mx-auto">
        <button type="submit" class="btn btn-primary ">Crear Usuario</button>
      </div>
    </form>
  </div>
  <div class="container mt-2">
    <div class="d-flex justify-content-end">
      <a href="listadoUsuarios.php"><button type="submit" class="btn btn-success">Listado de Usuarios</button></a>
    </div>
  </div>
</body>

</html>