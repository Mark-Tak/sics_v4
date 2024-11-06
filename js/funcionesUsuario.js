// Función para elminar al usuario
function EliminarUsuario(button) {
    // Obtiene el identificador del usuario de la tabla
    let row = button.parentNode.parentNode; // Obtiene la fila completa
    let userId = row.querySelector('.idUsuario').textContent; // Obtiene el ID del usuario
    
    // Confirmar antes de eliminar
    if (confirm(`¿Estás seguro de eliminar al usuario ${userId}?`)) {
      
      // Llamada al archivo php usando fetch
      fetch(`./php/eliminar_usuario.php`, {
        method: 'POST',
        headers: { //Se transforma en json
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: userId }),
      })
      .then(response => {
        if (response.ok) {
          // Eliminar la fila de la tabla
          row.remove();
          alert('Usuario eliminado con éxito');
        } else {
          alert('Error al eliminar el usuario');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  }
  

//Aquí va la función para mostrar los reportes del usuario