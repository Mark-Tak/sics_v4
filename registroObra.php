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

$id_check = $_GET['id_check'];
$sql = "SELECT * FROM checklist WHERE :idck = id_check";
$stmt = $conexion->prepare($sql);

$stmt->bindParam(':idck', $id_check);

$stmt->execute();

$resultCheck = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de sala y obras - Tema Oscuro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Estilos personalizados para el tema oscuro -->
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

    <!--Archivo de scripts para este formulario-->
    <script src="js/funcionesObra.js"></script>


    <!--Formulario con los datos que se enviaran para procesar en php-->
    <form method="POST" name="RegistroDeObras">

        <div class="container mt-5">

            <div class="mb-3">
                <?php
                echo "<label name=pertenenciaCheck id=pertenenciaCheck value ="  . $resultCheck['id_check'] . ">Registre las obras para la Checklist: " . $resultCheck['nombre'] . "</label>";
                ?>
                <select class="form-select" name="pertenenciaCheck" id="pertenenciaCheck">
                    <?php
                    echo "<option value=" . $resultCheck['id_check'] . ">Checklist seleccionada: " . $resultCheck['nombre'] . "</option>";
                    ?>
                </select>

            </div>


            <div class="mb-3">
                <label for="id_pertenenciaSala" class="form-label">Seleccione una sala :</label>
                <select class="form-select" name="pertenenciaSala" id="pertenenciaSala">
                    <?php
                    // Obtener todos las salas registradas
                    $resul = $conexion->query("SELECT * FROM sala");

                    // Generar las opciones del desplegable
                    while ($row = $resul->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=" . $row['id_sala'] . ">" . $row['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <br>
            <h2 align="center">Registro de Obras</h2>
            <br>



                <!--Casillas de registro-->
                <div id="formContainer">
                    <label for="nombreInput">
                        Nombre:
                    </label>
                    <input type="text" id="nombreInput"
                        placeholder="Nombre">
                    <label for="artistaInput">
                        Artista:
                    </label>
                    <input type="text" id="artistaInput"
                        placeholder="Artista">
                    <label for="cantidadInput">
                        Cantidad:
                    </label>
                    <input type="number" id="cantidadInput"
                        placeholder="Cantidad">
                    <br><br>


                    <button type="button" class="btn btn-success" onclick="agregarObra()">Añadir al listado</button>
                </div>
                <br>
                <table id="outputTable" class="table table-striped">
                    <tr>
                        <th>Nombre</th>
                        <th>Artista</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </table>

                <br>

                <button type="submit" class="btn btn-primary" value="Guardar registros" name="guardar_obras" formaction="./php/registro_obra.php">Guardar registros</button>
            </div>
    </form>
    </div>


</body>

</html>