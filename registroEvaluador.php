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

//Obteniendo la checklist correspondiente
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
    <title>Registro de evaluador - Tema Oscuro</title>
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
    <script src="js/funcionesEvaluador.js"></script>
    <script>
        //'Enviando' el id de la checklist correspondiente a JS
        var id_check = <?php echo $resultCheck['id_check'] ?>;
    </script>


    <!--Formulario con los datos que se enviaran para procesar en php-->
    <form method="POST" name="registroEvaluador">

        <div class="container mt-5">
            <?php
            echo "<label name=pertenenciaCheck id=pertenenciaCheck value="  . $resultCheck['id_check'] . ">Checklist seleccionada: " . $resultCheck['nombre'] . "</label>";
            ?>
            <select class="form-select" name="pertenenciaCheck" id="pertenenciaCheck">
                <?php
                echo "<option value=" . $resultCheck['id_check'] . ">Seleccione a los evaluadores para la checklist: " . $resultCheck['nombre'] . "</option>";
                ?>
            </select>
        </div>


        <div class="container mt-5">
            <h2 align="center">Registro de evaluadores</h2>

            <!--Obtener los usuarios registrados-->
            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-select" name="encargadoEvaluador" id="encargadoEvaluador">
                    <?php
                    // Obtener todos los usuarios registrados
                    $resul = $conexion->query("SELECT * FROM user WHERE tipo = 2 or 3");

                    // Generar las opciones del desplegable
                    while ($row = $resul->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=" . $row['usuario'] . " id=usuarioInput>" . $row['usuario'] . " - " . $row['nombreusuario'] . "</option>";
                    }
                    ?>
                </select>
                    <br>
                <select name="turnoOpcion" id="turno">
                    <option value="1">Matutino</option>
                    <option value="2">Vespertino</option>
                    <option value="3">Nocturno</option>
                </select>
            </div>
            <input type="submit" value="Guardar" name="guardar_evaluador" formaction="./php/registro_evaluador.php">
        </div>
    </form>


    <div class="container mt-5">
        <div>
            <table id="tablaEvaluador" class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Turno</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Llenado por JS-->
                </tbody>
            </table>

            <br>
        </div>
    </div>

</body>

</html>