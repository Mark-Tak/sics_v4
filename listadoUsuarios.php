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
    <div id="listaSalas" class="mt-5">
      <h1 align="center">Listado de Usuarios</h1>
      <br>

      <?php
      $sql = 'SELECT usuario,nombreusuario,tipo FROM user';
      // Ejecuta la consulta
      $resul = $conexion->query($sql);

      ?>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $resul->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <tr>
              <td> <?php echo $row["usuario"] ?> </td>
              <td> <?php echo $row["nombreusuario"] ?></td>
              <td> <?php echo $row["tipo"] ?></td>
              <a href="./php/editar_usuario.php"></a>
              <td><button type="submit" class="btn btn-warning">Editar</a></button>
                <a href="./php/eliminar_usuario.php"></a><button type="submit"
                  class="btn btn-danger">Archivar</button>
              </td>
            </tr>

          <?php
          }

          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container mt-3">
    <a href="registroUsuario.php"><button type="submit" class="btn btn-light">Regresar</button></a>
  </div>

</body>

</html>