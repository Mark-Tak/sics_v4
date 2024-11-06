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
    <title>Registro de checklist</title>
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
        <h1 align="center">Registro de Listas</h1>
        <br>
        <form id="salaForm" action="./php/registro_check.php" method="POST">
            <!-- Nombre de la sala -->
            <div class="mb-3">
                <label for="checkNombre" class="form-label fw-bold">Nombre :</label>
                <input type="text" class="form-control fw-lighter" name="nombre" id="nombre"
                    placeholder="Ingrese el nombre de la exposición" required>
            </div>
            <div class="mb-3">
                <label for="checkFecha" class="form-label fw-bold">Fecha Inicio :</label>
                <input type="date" style="width:25%" class="form-control fw-lighter mx-" name="fecha" id="fecha"
                    placeholder="Ingrese la fecha de inicio" required>
            </div>
            <div class="mb-3">
                <label for="checkFecha" class="form-label fw-bold">Fecha Término :</label>
                <input type="date" style="width:25%" class="form-control fw-lighter" name="fechaT" id="fechaT"
                    placeholder="Ingrese la fecha final" required>
            </div>
            <div class="mb-3">
                <label for="limpieza" class="form-label fw-bold">Limpieza :</label>
                <select class="form-select fw-lighter" name="limpieza" id="limpieza">
                    <option selected>Limpieza de estaciones :</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear nueva Lista</button>
        </form>
    </div>
    <div class="container mt-2">
        <div class="d-flex justify-content-end">
            <a href="listadoCheck.php"><button type="submit" class="btn btn-success">Listado de Checklist</button></a>
        </div>
    </div>

</body>

</html>