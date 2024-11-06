//Script con funciones relacionadas con el registro y listado de evaluadores

//funcion(?) para crear una query que va a ser ingresada por URL, toma pares de valores key (k)- value(v)
const buildQuery = params => Object.entries(params)
  .map(([k, v]) => `${k}=${encodeURIComponent(v)}`)
  .join('&');

document.addEventListener('DOMContentLoaded', function () {
  const tabla = document.getElementById('tablaEvaluador');
  const tbody = tabla.querySelector('tbody');
  //const tableContainer = document.querySelector('.table-container');



  //Funcion para cargar el listado de evaluadores asociados con una checklist
  function fillTablaEvaluador() {

    fetch(`./php/consulta_usuarioCheck.php?id_check=${id_check}`, {
      method: 'GET',
      headers: { //Se transforma en json
        'Content-Type': 'application/json',
      }
    })
      .then(response => response.json())
      .then(data => {

        // Limpia la tabla antes de agregar los resultados de la búsqueda
        tbody.innerHTML = '';

        // Agrega los resultados de la búsqueda a la tabla
        data.forEach(rowData => {
          const row = document.createElement('tr');

          // Agregar celdas a la fila principal con las columnas deseadas

          //Celda de usuario
          const usuarioCell = document.createElement('td');
          usuarioCell.textContent = rowData.user_check;
          row.appendChild(usuarioCell);

          //celda para turno va aqui
          const turnoCell = document.createElement('td');
          switch (rowData.turno) {
            case 1:
              turnoCell.textContent = 'Matutino';
              break;
            case 2:
              turnoCell.textContent = 'Tarde';
              break;
            case 3:
              turnoCell.textContent = 'Noche';
              break;
          }
          row.appendChild(turnoCell);


          //Celda para btn eliminar
          const btnEliminar = document.createElement('td');

          btnEliminar.innerHTML =  `<button class='btn btn-danger' onclick='eliminarEvaluador("${rowData.user_check}",${rowData.turno})'>Eliminar</button>`;

          row.appendChild(btnEliminar);

          tbody.appendChild(row);

          console.log(btnEliminar);
        });
      })//data
      .catch(error => {
        console.error('Error al cargar los datos:', error);
      });

  };//fillTablaEvaluador

  fillTablaEvaluador()

})

// Función para elminar al evaluador de la tabla de accesos a la checklists
function eliminarEvaluador(user_check, user_turno) {
  const queryElimina = buildQuery({id: user_check, idck: id_check, tu: user_turno});
  // Llamada al archivo php usando fetch
  fetch(`./php/eliminar_evaluador.php?${queryElimina}`, {
    method: 'DELETE',
    headers: { //Se transforma en json
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({id: user_check, idck: id_check, tu: user_turno}),
  })
    .then(response => {
      if (response.ok) {
        console.log(response)
        alert('Usuario eliminado con éxito');
      } else {
        alert('Error al eliminar el usuario');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
}