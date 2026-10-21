let users = [];
//let tipo de variable > es una variable global que almacena un array de usuarios

const form = document.getElementById("userForm");
const table = document.getElementById("userTable");
const inputArchivo = document.getElementById("importJSON");
const btnDescargar = document.getElementById("download");

function generarId() {
    // Esta función genera un ID único para cada usuario. Si hay usuarios en el array, devuelve el ID más alto + 1, de lo contrario devuelve 1.

    //=> funcion flecha, es una forma más corta de escribir funciones en JavaScript

    return users.length > 0 ? Math.max(...users.map(u => u.id)) + 1 : 1;
    //  ? if sintax, si la condición es verdadera, se ejecuta lo que está después del signo de interrogación

}


//funcion anonima que se ejecuta cuando se envía el formulario
form.addEventListener('submit', (e) => {
    e.preventDefault();
    // Evita que el formulario se envíe y recargue la página

    //.value obtiene el valor del input con el id "name" y "email"
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    //agregar nuevo usuario al array con ID generado y los valores del formulario
    const object = {
        id: generarId(),
        nombre: name,
        email: email
    };

    users.push(object);
    printUsers();
    form.reset();


});

// Esta función imprime la lista de usuarios en la tabla
function printUsers() {
    table.innerHTML = ""; // Limpia la tabla

    users.forEach((user, index) => {
        const row = document.createElement("tr");

        
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.nombre}</td>
            <td>${user.email}</td>
            <td><button onclick="deleteUser(${index})">Delete</button></td>
        `;
        table.appendChild(row);
    });

};