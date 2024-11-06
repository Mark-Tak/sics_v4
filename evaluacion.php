<?php
session_start();

require_once "./php/conexion.php"; // Archivo de conexion a la base de datos
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no hay sesión, redirigir al login
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist virreinal</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/body.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                     <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="menu_encargado.php" class="nav-link px-2 text-secondary">Inicio</a></li>
                    <li><a href="evaluacion.php" class="nav-link px-2 text-white">Consultas</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div class="text-end">
          <script src="./js/obtenerNombre.js"></script>
          <button id="logoutButton" onclick="cerrarSesion()" type="button" class="btn btn-outline-light me-2">Cerrar
            Sesión</button>

        </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <h2>Checklist virreinal</h2>
            </div>
            <!--Datos de supervisor-->
            <div class="col">
                <address>
                    Miercoles 31/07/2024
                    <br>
                    Revisado por: Gerardo Rivera
                    <br>
                    Hora de acceso: 15:55
                    <br>
                    Turno: CIERRE
                </address>
            </div>
        </div>
        <br>
        <!--Contenedor de formulario-->
        <form>

            <h3>Sala 1</h3>
            <br>
            <h5>UNOS CUANTOS METROS CUBICOS DE AIRE ENTRE MEXICO Y USA , 6 BOTELLAS GRABADAS,AROMAS Y DIFUSORES DE
                AROMAS :</h5>

            <!-- Casilla de verificación -->
            <div class="row">
                <div class="col-3">
                    <input type="checkbox" class="form-check-input" id="check1">
                    <label class="form-check-label" for="check1">Revision con novedad</label>
                </div>
                <!--Area de comentarios-->
                <div class="col-4">
                    <label for="comments" class="form-label">Observaciones de la incidencia</label>
                    <textarea class="form-control" id="comments" rows="3"
                        placeholder="Escribe tus comentarios aquí..."></textarea>
                </div>
                <!-- Botón para subir imagen -->
                <div class="col-4">
                    <label for="formFile" class="form-label">Subir imagen</label>
                    <input class="form-control-file" type="file" id="formFile">
                </div>
            </div>

            <br>
            <h5>LOS OTROS DIAS 2018 VIDEO 4K :</h5>

            <!-- Casilla de verificación -->
            <div class="row">
                <div class="col-3">
                    <input type="checkbox" class="form-check-input" id="check1">
                    <label class="form-check-label" for="check1">Revision con novedad</label>
                </div>
                <!--Area de comentarios-->
                <div class="col-4">
                    <label for="comments" class="form-label">Observaciones de la incidencia</label>
                    <textarea class="form-control" id="comments" rows="3"
                        placeholder="Escribe tus comentarios aquí..."></textarea>
                </div>
                <!-- Botón para subir imagen -->
                <div class="col-4">
                    <label for="formFile" class="form-label">Subir imagen</label>
                    <input class="form-control-file" type="file" id="formFile">
                </div>
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS y dependencias de Popper 
<script src="assets/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>