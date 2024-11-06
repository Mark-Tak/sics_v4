// Función para obtener el nombre del usuario
function mostrarNombre() {
    fetch('./php/obtener_nombre.php')
        .then(response => response.json()) // Convertir la respuesta en JSON
        .then(data => {
            const boton = document.getElementById('DisplayUsuario');
            if (data.nombre) {
                boton.textContent = data.nombre; // Mostrar el nombre en el botón
                console.log(data.nombre);
            } else {
                console.log(data.error);
                boton.textContent = "Usuario no encontrado";
                console.log('no encontrado');
                console.log(data.nombre);
            }
        })
        .catch(error => {
            console.log(data.error);
            console.error('Error:', error);
        });
}

// Función para cerrar sesión
function cerrarSesion() {
    // Capturar el evento del botón de cerrar sesión
    //document.getElementById('logoutButton').addEventListener('click', function() {
    // Usar fetch para enviar la solicitud de cierre de sesión a cerrar_sesion.php
    fetch('./php/cerrar_sesion.php', {
        method: 'POST'
    })
    .then(response => response.json())  // Convertir la respuesta en JSON
    
    .then(data => {
        if (data.mensaje == 1) {
            // Si el cierre de sesión es exitoso, redirigir a la página de login
            window.location.href = './index.php';
        } else {
            // Si ocurre un error, mostrar el mensaje de error en consola o en pantalla
            console.error('Error al cerrar sesión');
            alert('Error al cerrar sesión');
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Ocurrió un error al cerrar sesión. Por favor, intenta nuevamente.');
    //});
});
}

// Ejecutar las funciones cuando la página cargue
window.onload = function() {
    mostrarNombre();

    // Asociar el evento de click al botón de cerrar sesión
    //document.getElementById('logoutButton').addEventListener('click', cerrarSesion);
};