document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript cargado correctamente para navegación");

    // Definir las rutas de cada vista
    const routes = {
        "n-Inicio": "/admin/dashboard",        // Ruta para el Inicio
        "n-Entrenadores": "/admin/entrenador", // Ruta para la vista de Entrenadores
        "n-Trabajadores": "/admin/trabajadores", // Ruta para la vista de Trabajadores
        "n-Membresias": "/admin/membresias"   // Ruta para la vista de Membresías
    };

    // Añadir evento de clic a cada opción del navbar
    document.querySelectorAll(".navbar-opt a").forEach(navItem => {
        navItem.addEventListener("click", function (event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
            const classList = this.classList;

            // Encontrar el nombre de la clase correspondiente para determinar la ruta
            for (let className of classList) {
                if (routes[className]) {
                    // Redirigir a la ruta especificada
                    window.location.href = routes[className];
                    break;
                }
            }
        });
    });
});

async function obtenerEntrenadores() {
    try {
        // Hacer la solicitud a la API que devuelve los datos de los entrenadores
        const response = await fetch('/entrenadores/get/all'); // Ajusta la ruta según sea necesario
        const data = await response.json();

        if (data.status === 'ok') {
            const entrenadores = data.data;

            // Obtener referencia a la lista en el HTML
            const listaEntrenadores = document.getElementById('Lista_Entrenadores_Servicio');
            
            // Limpiar cualquier dato existente en la lista
            listaEntrenadores.innerHTML = '';

            // Iterar sobre los entrenadores y agregarlos a la lista
            entrenadores.forEach(entrenador => {
                const listItem = document.createElement('li');
                listItem.textContent = `${entrenador.nombre} ${entrenador.apellido_p} ${entrenador.apellido_m}`;
                listaEntrenadores.appendChild(listItem);
            });
        } else {
            console.error('Error en la respuesta de la API:', data.message);
        }
    } catch (error) {
        console.error('Error al obtener los entrenadores:', error);
    }
}

async function obtenerClasesPersonalizadas() {
    try {
        const response = await fetch('/entrenadores/get/clases-personalizadas'); // Hacer solicitud a la API
        const data = await response.json();

        if (data.status === 'ok') {
            actualizarVistaClasesPersonalizadas(data.data);
        }
    } catch (error) {
        console.error('Error al obtener las clases personalizadas:', error);
    }
}

function actualizarVistaClasesPersonalizadas(entrenadores) {
    // Obtener el contenedor de las clases personalizadas
    const contenedorClases = document.querySelector('.grid-container-personalizadas');

    // Limpiar el contenido previo del contenedor
    contenedorClases.innerHTML = `
        <!-- Encabezados -->
        <div class="header">Inicio / Finalización</div>
        <div class="header">Miembro</div>
        <div class="header">Entrenamiento</div>
        <div class="header">Entrenador</div>
    `;

    // Recorrer cada entrenador y sus clientes para agregar la información al HTML
    entrenadores.forEach(entrenador => {
        const nombreEntrenador = `${entrenador.nombre} ${entrenador.apellido_p}`;
        
        entrenador.clientes.forEach(cliente => {
            const miembro = cliente.nombre;
            const entrenamiento = cliente.entrenamiento;
            const hora = cliente.hora; // Suponiendo que la hora de la clase viene en este campo

            // Añadir los datos de cada clase personalizada al contenedor
            contenedorClases.innerHTML += `
                <div class="item">${hora}</div>
                <div class="item">${miembro}</div>
                <div class="item">${entrenamiento}</div>
                <div class="item">${nombreEntrenador}</div>
            `;
        });
    });
}


obtenerEntrenadores();
obtenerClasesPersonalizadas();