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
    <title>Listado de checklists</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Añadir estilos personalizados-->
    <style>
        body {
            background-color: #212529;
            color: #f8f9fa;
        }

        .form-control,
        .form-check-input,
        .form-control-file {
            background-color: #343a40;
            border: 1px solid #495057;
            color: #f8f9fa;
        }

        .form-control::placeholder {
            color: #adb5bd;
        }

        .form-control:focus,
        .form-check-input:focus {
            border-color: #495057;
            box-shadow: none;
        }

        .form-label {
            color: #f8f9fa;
        }

        .bg-light {
            background-color: #343a40 !important;
            color: #f8f9fa;
        }

        .border {
            border-color: #495057 !important;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <script src="./js/funcionesChecklist.js"></script>
        <article>
            <h1 align="center">Listado de Checklist</h1>
            <div class="tab">
                <button class="btn btn-light tablinks fw-bold" onclick="abreTab(event, 'ckActiva')" id="abiertaDefault">Activas</button>
                <button class="btn btn-light tablinks fw-bold" onclick="abreTab(event, 'ckArchivada')">Archivadas</button>
            </div>


            <!--Tabla de checklists activas-->
            <div id="ckActiva" class="tabcontent">
                <div class="table-container">

                    <div class="input-group mt-3 div-filtro">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Buscar</span>
                        </div>
                        <input type="text" class="form-control fw-lighter" placeholder="Ingrese la lista que desee buscar" id="searchInput" aria-describedby="basic-addon1">
                    </div>
                    <br>

                    <table class="table table-dark table-striped" id="tabla-listacheck">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de termino</th>
                                <th>Observación</th>
                                <th>Limpieza</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Cuerpo de la tabla a llenar por JS-->
                        </tbody>
                    </table>
                </div>
        </article>
    </div>


    <!--Tabla de checklists archivdas-->
    <div class="container mt-5">
        <div id="ckArchivada" class="tabcontent">
            <div class="table-container-arch">

                <div class="input-group mt-3 div-filtro">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bold" id="basic-addon1">Buscar</span>
                    </div>
                    <input type="text" class="form-control fw-lighter" placeholder="Busca una checklist aquí" id="searchInput-arch" aria-describedby="basic-addon1">
                </div>
                <br>
                <table class="table table-dark table-striped" id="tabla-listacheck-arch">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de termino</th>
                            <th>Observacion</th>
                            <th>Limpieza</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Cuerpo de la tabla a llenar por JS-->
                    </tbody>
                </table>
            </div>
            </article>
        </div>
        <div class="container mt-3">
            <a href="registroChecklist.php"><button type="submit" class="btn btn-light">Regresar</button></a>
        </div>
    </div>
</body>

</html>