<?php
//Archivo de menu principal para el usuario auxiliar, debe tener acceso al listado de las evaluaciones que tiene por hacer


session_start();

require_once "./php/conexion.php"; // Archivo de conexion a la base de datos
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no hay sesión, redirigir al login
    header('Location: index.php');
    exit();
}

if (!($_SESSION['tipo']==3)) {
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
    <title>Menu principal para el usuario auxiliar</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/principal.css">
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a   class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94"
                        role="img">
                        <title>Bootstrap</title>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                            fill="currentColor"></path>
                    </svg>
                </a>
            </div>

            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                             <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    </ul>


                    <div class="text-end">
                        <script src="./js/obtenerNombre.js"></script>
                        <button id="logoutButton" onclick="cerrarSesion()" type="button"
                            class="btn btn-outline-light me-2">Cerrar
                            Sesión</button>

                    </div>
                </div>
            </div>

            <script src="./js/obtenerNombre.js"></script>
        <h1 class="display-4 fw-normal">!Bienvenido</h1>
        <h1 class="NombreUsuarioPrincipal" id="DisplayUsuario"><span id="DisplayUsuario"></span></h1>
                <p class="fs-5 text-muted">Selecciona la opción a la que desees ingresar.</p>
            </div>
        </header>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
        <div class="row row-cols-1 row-cols-md-1 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm bg-transparent border-transparent">
                    <div class="card mx-auto bg-transparent" style="width: 18rem;">
                        <img src="img/doc.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="evaluacion.php" class="btn btn-primary">Ir a consultas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>