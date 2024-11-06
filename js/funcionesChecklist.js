//Script de funciones relacionadas con el listado de checklist

document.addEventListener('DOMContentLoaded', function () {
    const tabla = document.getElementById('tabla-listacheck');
    const tablaArch = document.getElementById('tabla-listacheck-arch');
    const tbody = tabla.querySelector('tbody');
    const tbodyArch = tablaArch.querySelector('tbody');
    const inputBusqueda = document.getElementById('searchInput');
    const inputBusquedaArch = document.getElementById('searchInput-arch');
    //Dar funcionalidad a estos botones
    const stickyButton = document.getElementById('stickyBtn');
    const stickyButtonArch = document.getElementById('stickyBtn-arch');
    //
    const tableContainer = document.querySelector('.table-container');
    const tableContainerArch = document.querySelector('.table-container-arch');

    let filaDetallesAbierta = null;
    let filaDetallesAbiertaArch = null;

//Funcion para buscar checklists 'activas'
function buscarCheck() {
    const searchString = inputBusqueda.value.toLowerCase();

    fetch('./PHP/consulta_checklist.php')
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

    }//buscarCheck
    
//Funcion para buscar checklists archivadas
function buscarArchCheck() {
        const searchString = inputBusquedaArch.value.toLowerCase();
    
        fetch('./PHP/consulta_checklistArch.php')
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
                tbodyArch.innerHTML = '';
    
                // Agrega los resultados de la búsqueda a la tabla
                resultados.forEach(rowData => {
                    const row = document.createElement('tr');
    
                    //Crear y ocultar la fila de detalles en cada registro
                    const detalleRow = document.createElement('tr');
                    detalleRow.style.display = 'none';
    
                    // Agregar un evento click a cada fila
                    row.addEventListener('click', () => {
                        if (filaDetallesAbiertaArch === detalleRow) {
                            // Si la fila de detalles ya está abierta, la cerramos
                            detalleRow.style.display = 'none';
                            filaDetallesAbiertaArch = null;
                        } else {
                            // Si no, la abrimos
                            detalleRow.style.display = 'table-row';
                            filaDetallesAbiertaArch = detalleRow;
    
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
                        if (filaDetallesAbiertaArch !== row) {
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
    
                    tbodyArch.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error al cargar los datos:', error);
            });
    
    }//buscarArchCheck
    
                // Actualiza la tabla cuando el usuario busca una checklist
                inputBusqueda.addEventListener('input', buscarCheck);
                inputBusquedaArch.addEventListener('input', buscarArchCheck);

                // Llama a buscarCheck por primera vez para cargar todos los datos al inicio
                buscarCheck();
                buscarArchCheck();
            
                // Agrega un evento de desplazamiento al contenedor de la tabla
                tableContainer.addEventListener('scroll', () => {
                    // Obtén la distancia desde la parte superior del contenedor
                    const scrollTop = tableContainer.scrollTop;
                    // Actualiza la posición vertical del botón
                    stickyButton.style.top = `${10 + scrollTop}px`;
                });
                tableContainerArch.addEventListener('scroll', () => {
                    // Obtén la distancia desde la parte superior del contenedor
                    const scrollTop = tableContainerArch.scrollTop;
                    // Actualiza la posición vertical del botón
                    stickyButtonArch.style.top = `${10 + scrollTop}px`;
                });
})


    // Cambia el atributo de 'archivado' a 1 del registro en el servidor
function archivarRegistro(id_check) {
    if (confirm('¿Está seguro de que desea archivar este registro? Esta acción hará que no se puedan realizar más evaluaciones sobre esta Checklist')) {
        fetch(`./php/archivar_check.php?id_check=${id_check}`, {
            method: 'UPDATE',
        })
        .then(response => response.json())
        .then(data => {
            // Verifica la respuesta del servidor y actualiza la tabla si es necesario
            if (data.success) {
                alert('Registro archivado correctamente, eliminando accesos...');
                eliminarAccesos(id_check);
                
                location.reload();
            } else {
                alert('Error al archivar el registro: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error al enviar la solicitud: ', error);
        });
    }
}


//Elimina los registors asociados a la checklist en la tabla usuario_Check
function eliminarAccesos(id_check){
    fetch(`./php/eliminar_accesoChecklist.php?id_check=${id_check}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(data => {
                // Verifica la respuesta del servidor y actualiza la tabla si es necesario
            if (data.success) {
                alert('Accesos eliminados correctamente');
                
                location.reload();
            } else {
                alert('Error al eliminar los accesos: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error al enviar la solicitud:', error);
        });
};

//Maneja las pestañas de activo y archivado
function abreTab(evt, tabNombre){

    // Variables
  let i, tabcontent, tablinks;

  // Esconder elementos no usados
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Quitando el estando activo de los elementos ocultos
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Mostrar la pestaña actual y darle la clase activa al botón.
  document.getElementById(tabNombre).style.display = "block";
  evt.currentTarget.className += " active";
}

window.onload = function() {
    // Abrir la pestaña de checklist archivadas en 0 por default
document.getElementById("abiertaDefault").click();
};