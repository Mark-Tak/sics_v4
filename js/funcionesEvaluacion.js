/**Script que contiene las funciones para la pantalla de evaluación para el manejo 
 * de la presentación, inserción y actualización de los datos
 *  en la tabla de evaluaciones**/


//Ejecuta tan pronto carga la página
document.addEventListener('DOMContentLoaded', function () {
    const tabla = document.getElementById('tabla-listacheck');
    const tbody = tabla.querySelector('tbody');
    //const inputBusqueda = document.getElementById('searchInput');
    let filaDetallesAbierta = null;

//Funcion para llenar la tabla de evaluciones con la información de las obras y sus casillas de verificación.
function fillEvaluaciones() {
    const searchString = inputBusqueda.value.toLowerCase();

    fetch('./PHP/consulta_obras.php')
        .then(response => response.json())
        .then(data => {
            // Filtra los resultados que coincidan con la búsqueda
            const resultados = data.filter(item => {
                // Itera sobre las propiedades del objeto
                for (const prop in item) {
                    // Verifica si el valor de la propiedad incluye la cadena de búsqueda
                    if (item[prop] && item[prop].toString().toLowerCase().includes(searchString)) {
                        return true; // Retorna true si hay una coincidencia
                    }
                }
                return false; // Retorna false si no hay coincidencias en ninguna propiedad
            });

            // Limpia la tabla antes de agregar los resultados de la búsqueda
            tbody.innerHTML = '';

            // Agrega los resultados de la búsqueda a la tabla
            console.log(resultados);
            resultados.forEach(rowData => {
                const row = document.createElement('tr');

                //Crear y ocultar la fila de detalles en cada registro
                const detalleRow = document.createElement('tr');
                detalleRow.style.display = 'none';

                // Agregar un evento click a cada fila
                row.addEventListener('click', () => {
                    if (filaDetallesAbierta === detalleRow) {
                        // Si la fila de detalles ya está abierta, la cerramos
                        detalleRow.style.display = 'none';
                        filaDetallesAbierta = null;
                    } else {
                        // Si no, la abrimos
                        detalleRow.style.display = 'table-row';
                        filaDetallesAbierta = detalleRow;

                        // Rellenar los detalles
                        const detalleCell = document.createElement('td');
                        detalleCell.setAttribute('colspan', '6'); // Colspan para que cubra todas las columnas
                        const detalleHTML = `
                            <p>ID: ${rowData.id_check}</p>
                            <p>Nombre: ${rowData.nombre}</p>
                            <p>Fecha: ${rowData.fecha}</p>
                            <p>Fecha de termino: ${rowData.fecha_termino}</p>
                            <p>Observaciones: ${rowData.observaciones}</p>
                            <p>Limpieza: ${rowData.limpieza}</p> 
    
                                <div style='display:grid; grid-template-columns: 2fr 2fr 2fr 2fr'>
                                    <button onclick="agregarObservaciones(this)" class="btn btn-success">Añadir observaciones</button>
                                    <span></span>
                                        <button class='btn btn-danger' onclick="archivarRegistro(${rowData.id_check})">Archivar Registro</button>
                                    <span></span>
                                    <button onclick="location.href='registroObra.php?id_check=${rowData.id_check}'" class="btn btn-info">Registro de obras</button>
                                    <span></span>   
                                    <button onclick="location.href='registroEvaluador.php?id_check=${rowData.id_check}'" class="btn btn-info">Asignar personal</button>
                                    <span></span>                                                            
                                </div>                                                       
                        `;
                        detalleCell.innerHTML = detalleHTML;

                        // Agregar la celda de detalles a la fila de detalles
                        detalleRow.innerHTML = ''; // Limpiamos la fila antes de agregar el detalle
                        detalleRow.appendChild(detalleCell);

                        // Insertar la fila de detalles después de la fila seleccionada
                        row.insertAdjacentElement('afterend', detalleRow);
                    }
                });

                // Agregar eventos de mouseover y mouseout para cambiar el color de fondo
                row.addEventListener('mouseover', () => {
                    row.style.backgroundColor = '#ffff00'; 
                });

                row.addEventListener('mouseout', () => {
                    if (filaDetallesAbierta !== row) {
                        row.style.backgroundColor = '';
                    }
                });

                // Agregar celdas a la fila principal con las columnas deseadas
                const idCell = document.createElement('td');
                idCell.textContent = rowData.id_check;
                row.appendChild(idCell);                

                const nombreCell = document.createElement('td');
                nombreCell.textContent = rowData.nombre;
                row.appendChild(nombreCell);

                const fechaCell = document.createElement('td');
                fechaCell.textContent = rowData.fecha;
                row.appendChild(fechaCell);

                const fechaTCell = document.createElement('td');
                fechaTCell.textContent = rowData.fecha_termino;
                row.appendChild(fechaTCell);

                const observacionCell = document.createElement('td');
                observacionCell.textContent = rowData.observaciones;
                row.appendChild(observacionCell);
                
                const LimpiezaCell = document.createElement('td');
                LimpiezaCell.textContent = rowData.limpieza;
                row.appendChild(LimpiezaCell);

                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error al cargar los datos:', error);
        });

    }//fillEvaluaciones

    fillEvaluaciones();
});