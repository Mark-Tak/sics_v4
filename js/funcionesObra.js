//Script de funciones relacionadas con el registro de obras en una checklist

function agregarObra() {
    // Se recuperan las entradas del usuario
    let nombre = document.getElementById("nombreInput").value;
    let artista = document.getElementById("artistaInput").value;
    let cantidad = document.getElementById("cantidadInput").value;


    // Insertar una nueva fila
    let table = document.getElementById("outputTable");
    let newRow = table.insertRow(table.rows.length);

    // Insertar datos en la fila
    //Se agregan unas lineas mas de HTML para poder enviar los datos correctamente a las base de datos
    newRow.insertCell(0).innerHTML = "<input type ='hidden' name='nombreObra[]' value='" + nombre + "'>" + nombre;
    newRow.insertCell(1).innerHTML = "<input type ='hidden' name='artistaObra[]' value='" + artista + "'>" + artista;
    newRow.insertCell(2).innerHTML = "<input type ='hidden' name='cantidadObra[]' value='" + cantidad + "'>" + cantidad;
    //Botones de editar y eliminar
    newRow.insertCell(3).innerHTML =
        '<button class="btn btn-warning" onclick="editarObra(this)">Editar</button>' +
        '<button class="btn btn-danger" onclick="eliminarObra(this)">Eliminar</button>';
    // Despejar campos de ingreso
    DespejaCampos();
};

function editarObra(button) {

    // Obtener la fila a la que pertenece el botón
    let row = button.parentNode.parentNode;

    let nombreCell = row.cells[0];
    let artistaCell = row.cells[1];
    let cantidadCell = row.cells[2];

    // Prompt para ingresar valores ------ temporal ------- 
    let nombreInput =
        prompt("Actualiza nombre:");
    let artistaInput =
        prompt("Actualiza artista:");
    let cantidadInput =
        prompt("Actualiza cantidad:");


    // Actualizar con los nuevos valores
    nombreCell.innerHTML = "<td><input type ='hidden' name='nombreObra[]' value='" + nombreInput + "'>" + nombreInput + "</td>";
    //nombreCell.innerHTML= nombreInput;
    artistaCell.innerHTML = "<td><input type ='hidden' name='artistaObra[]' value='" + artistaInput + "'>" + artistaInput + "</td>";
    //artistaCell.innerHTML= artistaInput;
    cantidadCell.innerHTML = "<td><input type ='hidden' name='cantidadObra[]' value='" + cantidadInput + "'>" + cantidadInput + "</td>";

};

function eliminarObra(button) {

    // Obtener la fila a la que pertenece
    let row = button.parentNode.parentNode;

    // Eliminar la fila de la tabla
    row.parentNode.removeChild(row);
};

function DespejaCampos() {

    document.getElementById("nombreInput").value = "";
    document.getElementById("artistaInput").value = "";
};

window.onload = function () {
    console.log("intentando ejecutar funciones");
};