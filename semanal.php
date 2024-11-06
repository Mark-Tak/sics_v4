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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Incidencias</title>
    <!-- Bootstrap CSS 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <!-- <link rel="stylesheet" href="css/calendario.css"> -->
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
                    <button id="logoutButton" onclick="cerrarSesion()" type="button"
                        class="btn btn-outline-light me-2">Cerrar
                        Sesión</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <br>
                <h1 class="display-4 fw-bold text-center">Calendario de Incidencias</h1>
                <br>
                <div id="calendar"></div>
                <button id="printIncidencias" class="btn btn-primary mt-3">Imprimir Incidencias de la Semana</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek'
                },
                defaultView: 'month',
                allDaySlot: false,
                events: [{
                        title: 'Incidencia 1',
                        start: '2024-08-01',
                        description: 'Detalles de la incidencia 1'
                    },
                    {
                        title: 'Incidencia 2',
                        start: '2024-08-03',
                        description: 'Detalles de la incidencia 2'
                    },
                    {
                        title: 'Incidencia 3',
                        start: '2024-08-05',
                        description: 'Detalles de la incidencia 3'
                    }
                ],
                eventClick: function(event) {
                    alert(event.title + "\n" + event.description);
                }
            });

            $('#printIncidencias').click(function() {
                var start = $('#calendar').fullCalendar('getView').start;
                var end = $('#calendar').fullCalendar('getView').end;
                var events = $('#calendar').fullCalendar('clientEvents', function(event) {
                    return (event.start >= start && event.start < end);
                });

                var incidenciaText = '<h1>Incidencias de la Semana</h1><ul>';
                events.forEach(function(event) {
                    incidenciaText += '<li>' + event.title + ' - ' + moment(event.start).format('YYYY-MM-DD') + '<br>' + event.description + '</li>';
                });
                incidenciaText += '</ul>';

                var newWindow = window.open("", "Imprimir Incidencias", "width=600,height=400");
                newWindow.document.write('<html><head><title>Incidencias de la Semana</title></head><body>');
                newWindow.document.write(incidenciaText);
                newWindow.document.write('</body></html>');
                newWindow.document.close();
                newWindow.print();
            });
        });
    </script>
</body>

</html>