<?php
session_start();

require_once "conexion.php"; //Conexion a la bd


if(isset($_POST['guardar_obras']))
{
    $pertenenciaCheck = $_POST['pertenenciaCheck'];
    $pertenenciaSala = $_POST['pertenenciaSala'];
    $nombreObra = $_POST['nombreObra'];
    $artistaObra = $_POST['artistaObra'];

    $porRegistrar = array_combine($nombreObra,$artistaObra);

    try{

        foreach($porRegistrar as $nombreObra => $artistaObra){
            $sql = "INSERT INTO obra(pertenencia_check, pertenencia_sala, nombre, artista) VALUES(:pcheck,:psala,:onombre,:oartista)";
            $stmt = $conexion->prepare($sql);
    
            // Vincula los parámetros
            $stmt->bindParam(':pcheck', $pertenenciaCheck);
            $stmt->bindParam(':psala', $pertenenciaSala);
            $stmt->bindParam(':onombre', $nombreObra);
            $stmt->bindParam(':oartista', $artistaObra);
    
    
            // Ejecuta la consulta
            $stmt->execute();
            
        }


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