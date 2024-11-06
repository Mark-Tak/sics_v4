<?php
session_start();

require_once "conexion.php"; //Conexion a la bd

if(isset($_POST['guardar_evaluador']))
{
  $pertenenciaCheck = $_POST['pertenenciaCheck'];
  // Se separan y asignan a variables los contenidos de usuarioInput para recibir el id y nombre del evaluador
  //Podria servir para almacenar el username y el nombre del encargado pero habría que cambiar el limite de caracteres del método POST en PHP
    //list($id_evaluador, $nombre_evaluador) = explode("-", $_POST['encargadoEvaluador'], 2);
  //En promedio los username serían entre 7-10 caracteres. max 4 de id de empleado más 3+ de iniciales
  $id_evaluador = $_POST['encargadoEvaluador'];
  $turno = $_POST['turnoOpcion'];


    try{
            $sql = "INSERT INTO usuario_check(user_check, check_user, turno) VALUES(:evaluador,:pcheck,:turno)";
            $stmt = $conexion->prepare($sql);
    
            // Vincula los parámetros 
            $stmt->bindParam(':evaluador', $id_evaluador);
            $stmt->bindParam(':pcheck', $pertenenciaCheck);
            $stmt->bindParam(':turno', $turno);
            //$stmt->bindParam(':nombre', $nombre_evaluador);
    
    
            // Ejecuta la consulta
            $stmt->execute();
        echo "<script>
        window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=100'; // Redirige al usuario
      </script>";
    }   catch (PDOException $e) {

        echo "<script>
                    window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=101'; // Redirige al usuario
                  </script>";
    }

    


}
?>