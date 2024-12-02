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

// URL de la API (sin exponer la URL completa)
const API_URL = '/clientes/nuevos/tres-meses';

// Función asíncrona para obtener los datos de los nuevos clientes
async function obtenerNuevosClientes() {
    try {
        const response = await fetch(API_URL);

        // Verifica si la respuesta es exitosa (código HTTP 200)
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

        // Intenta parsear la respuesta a JSON
        const data = await response.json();
        console.log("Respuesta de la API: ", data); // Depuración: imprime la respuesta

        if (data.status === 'ok') {
            const clientesMes = data.data;
            // Llamar a la función para graficar los datos obtenidos
            graficarClientes(clientesMes);
        } else {
            console.error('Error en los datos recibidos: ', data.message);
        }
    } catch (error) {
        console.error('Error al hacer la petición: ', error);
    }
}

// Función para graficar los nuevos clientes
function graficarClientes(clientesMes) {
    // Obtener referencias a las etiquetas y al contenedor del gráfico
    const graficaContenedor = document.querySelector('.G_nuevos_3_meses');
    const datoElemento = document.querySelector('.D_nuevos_3_meses');

    // Limpiar el contenedor para el gráfico por si existe alguno previo
    graficaContenedor.innerHTML = '';

    // Crear un canvas para Chart.js dentro del contenedor gráfico
    const canvas = document.createElement('canvas');
    graficaContenedor.appendChild(canvas);

    // Crear los arrays para las etiquetas y los datos de la gráfica
    const labels = [];
    const valores = [];

    clientesMes.reverse().forEach(cliente => {
        labels.push(`${cliente.month}/${cliente.year}`);
        valores.push(cliente.total);
    });

    // Mostrar el total de nuevos clientes del mes actual
    if (clientesMes.length > 0) {
        datoElemento.innerText = clientesMes[clientesMes.length - 1].total;
    } else {
        datoElemento.innerText = '0';
    }

    // Crear la gráfica con Chart.js
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nuevos Clientes por Mes',
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function obtenerClientesActivosUltimosMeses() {
    // Hacemos la solicitud a la API para obtener la información de los clientes activos
    fetch('/clientes/activos/tres-meses')
        .then(response => {
            // Verificar que la respuesta sea válida
            if (!response.ok) {
                throw new Error('Error al obtener los datos de la API');
            }
            // Convertimos la respuesta a JSON sin usar JSON.parse
            return response.json();
        })
        .then(data => {
            if (data.status === 'ok') {
                // Si la respuesta es exitosa, llamamos a la función para graficar
                graficarClientesActivos(data.data);
            } else {
                console.error('Error en la respuesta de la API:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al hacer la petición:', error);
        });
}

function graficarClientesActivos(clientesMes) {
    // Obtener referencias al contenedor del gráfico y al elemento que muestra el dato de clientes activos
    const graficaContenedor = document.querySelector('.G_activos');
    const datoElemento = document.querySelector('.D_activos');

    // Verificamos que el contenedor del gráfico exista en el DOM
    if (!graficaContenedor) {
        console.error('Error: El contenedor del gráfico no fue encontrado.');
        return;
    }

    // Limpiar el contenedor para el gráfico por si existe alguno previo
    graficaContenedor.innerHTML = '';

    // Crear un canvas para Chart.js dentro del contenedor gráfico
    const canvas = document.createElement('canvas');
    graficaContenedor.appendChild(canvas);

    // Crear los arrays para las etiquetas y los datos de la gráfica
    const labels = Object.keys(clientesMes);
    const valores = Object.values(clientesMes);

    // Mostrar el total de clientes activos del mes actual en el elemento correspondiente
    if (clientesMes && valores.length > 0) {
        // Muestra el valor del mes más reciente (último en la lista)
        datoElemento.innerText = valores[valores.length - 1];
    } else {
        datoElemento.innerText = '0';
    }

    // Crear la gráfica con Chart.js
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Clientes Activos por Mes',
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function obtenerCancelacionesMes() {
    try {
        const response = await fetch('/clientes/cancelaciones/mes');
        
        if (!response.ok) {
            throw new Error('Error al obtener los datos de cancelaciones');
        }

        const data = await response.json();

        if (data.status === 'ok') {
            graficarCancelaciones(data.data);
        } else {
            console.error('Error en la respuesta de la API:', data.message);
        }
    } catch (error) {
        console.error('Error al hacer la petición:', error);
    }
}

function graficarCancelaciones(cancelacionesData) {
    // Obtener referencias al contenedor del gráfico y al elemento que muestra el dato de cancelaciones
    const graficaContenedor = document.querySelector('.G_cancelaciones_mes');
    const datoElemento = document.querySelector('.D_cancelaciones_mes');

    // Verificar que el contenedor del gráfico exista en el DOM
    if (!graficaContenedor) {
        console.error('Error: El contenedor del gráfico no fue encontrado.');
        return;
    }

    // Limpiar el contenedor para el gráfico por si existe alguno previo
    graficaContenedor.innerHTML = '';

    // Crear un canvas para Chart.js dentro del contenedor gráfico
    const canvas = document.createElement('canvas');
    graficaContenedor.appendChild(canvas);

    // Mostrar el total de cancelaciones del mes actual
    datoElemento.innerText = cancelacionesData.cancelaciones;

    // Crear la gráfica con Chart.js
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: [`${cancelacionesData.year}-${cancelacionesData.month}`],
            datasets: [{
                label: 'Cancelaciones en el Mes',
                data: [cancelacionesData.cancelaciones],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function obtenerRenovacionesMes() {
    try {
        const response = await fetch('/clientes/renovaciones/mes');

        if (!response.ok) {
            throw new Error('Error al obtener los datos de renovaciones');
        }

        const data = await response.json();

        if (data.status === 'ok') {
            graficarRenovaciones(data.data);
        } else {
            console.error('Error en la respuesta de la API:', data.message);
        }
    } catch (error) {
        console.error('Error al hacer la petición:', error);
    }
}

function graficarRenovaciones(renovacionesData) {
    // Obtener referencias al contenedor del gráfico y al elemento que muestra el dato de renovaciones
    const graficaContenedor = document.querySelector('.G_renovaciones_mes');
    const datoElemento = document.querySelector('.D_renovaciones_mes');

    // Verificar que el contenedor del gráfico exista en el DOM
    if (!graficaContenedor) {
        console.error('Error: El contenedor del gráfico no fue encontrado.');
        return;
    }

    // Limpiar el contenedor para el gráfico por si existe alguno previo
    graficaContenedor.innerHTML = '';

    // Crear un canvas para Chart.js dentro del contenedor gráfico
    const canvas = document.createElement('canvas');
    graficaContenedor.appendChild(canvas);

    // Crear los arrays para las etiquetas y los datos de la gráfica
    const labels = [];
    const valores = [];

    renovacionesData.forEach(renovacion => {
        labels.push(`${renovacion.month}/${renovacion.year}`);
        valores.push(renovacion.total);
    });

    // Mostrar el total de renovaciones del mes actual
    if (renovacionesData.length > 0) {
        datoElemento.innerText = renovacionesData[renovacionesData.length - 1].total;
    } else {
        datoElemento.innerText = '0';
    }

    // Crear la gráfica con Chart.js
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Renovaciones por Mes',
                data: valores,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function obtenerGananciasMensuales() {
    try {
        const response = await fetch('/pagos/ganancias/mes'); // Ruta que apunta a la API creada
        const data = await response.json();

        if (data.status === 'ok') {
            // Llamar a la función que genera la gráfica, pasando los datos recibidos directamente
            graficarGanancias(data.data);
        } else {
            console.warn('Respuesta de la API no es "ok".');
        }
    } catch (error) {
        console.error('Error al obtener las ganancias mensuales:', error);
    }
}



function graficarGanancias(gananciasData) {
    console.log('Datos de ganancias recibidos:', gananciasData);

    // Obtener referencias al contenedor del gráfico y al elemento que muestra el dato de ganancias
    const graficaContenedor = document.querySelector('.G_ganancias_mes');
    const datoElemento = document.querySelector('.D_ganancias_mes');

    // Verificar que el contenedor del gráfico exista en el DOM
    if (!graficaContenedor) {
        console.error('Error: El contenedor del gráfico no fue encontrado.');
        return;
    }

    // Limpiar el contenedor para el gráfico por si existe alguno previo
    graficaContenedor.innerHTML = '';

    // Crear un canvas para Chart.js dentro del contenedor gráfico
    const canvas = document.createElement('canvas');
    graficaContenedor.appendChild(canvas);

    // Crear los arrays para las etiquetas y los datos de la gráfica
    const labels = [];
    const valores = [];

    // Recorrer los datos para llenar las etiquetas y valores
    if (gananciasData && Array.isArray(gananciasData)) {
        gananciasData.forEach(ganancia => {
            labels.push(`${ganancia.month}/${ganancia.year}`);
            valores.push(parseFloat(ganancia.total_ganancia));
        });
    }

    // Mostrar el total de ganancias del mes actual
    if (gananciasData.length > 0) {
        const totalGananciaActual = gananciasData[gananciasData.length - 1]?.total_ganancia;
        datoElemento.innerText = totalGananciaActual ? parseFloat(totalGananciaActual).toFixed(2) : '0';
    } else {
        datoElemento.innerText = '0';
    }

    // Crear la gráfica con Chart.js
    if (labels.length > 0 && valores.length > 0) {
        new Chart(canvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ganancias por Mes',
                    data: valores,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        console.warn('No hay datos suficientes para graficar las ganancias.');
    }
}


// Ejecutar la función cuando la página esté completamente cargada
obtenerNuevosClientes();
obtenerClientesActivosUltimosMeses();
obtenerCancelacionesMes();
obtenerRenovacionesMes();
obtenerGananciasMensuales();
