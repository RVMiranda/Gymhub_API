// Matriculas válidas con su información
const miembrosVIP = {
    "IM1104": { nombre: "Ingrid", apellidoPaterno: "Mendoza", apellidoMaterno: "Campos", tipoMembresia: "Plan VIP", fechaPago: "9/12/24" },
    "BR0303": { nombre: "Beatriz", apellidoPaterno: "Rosado", apellidoMaterno: "Gómez", tipoMembresia: "Plan VIP", fechaPago: "10/11/24" },
    "EP1111": { nombre: "Eduardo", apellidoPaterno: "Perez", apellidoMaterno: "Córdova", tipoMembresia: "Plan VIP", fechaPago: "8/12/24" },
    "DH2808": { nombre: "Diego", apellidoPaterno: "Hernandez", apellidoMaterno: "Santos", tipoMembresia: "Plan VIP", fechaPago: "15/1/25" }
};

// Función para mostrar mensaje de agregado solo si la matrícula es válida
document.querySelector('.add-button').addEventListener('click', function() {
    const matriculaInput = document.getElementById('matricula').value;

    if (miembrosVIP[matriculaInput]) {
        alert("Matrícula agregada correctamente.");
    } else {
        alert("Matrícula inválida. Solo se pueden agregar las matrículas autorizadas.");
    }
});

// Función para buscar información del miembro
document.querySelector('.search-button').addEventListener('click', function() {
    const matriculaInput = document.getElementById('matricula').value;
    const miembro = miembrosVIP[matriculaInput];

    if (miembro) {
        // Mostrar información en el menú de "Ver miembro VIP"
        document.querySelector('.member-info input[placeholder="Ingrid"]').value = miembro.nombre;
        document.querySelector('.member-info input[placeholder="Mendoza"]').value = miembro.apellidoPaterno;
        document.querySelector('.member-info input[placeholder="Campos"]').value = miembro.apellidoMaterno;
        document.querySelector('.member-info input[placeholder="Plan normal"]').value = miembro.tipoMembresia;
        document.querySelector('.member-info input[placeholder="9/12/24"]').value = miembro.fechaPago;
        document.querySelector('.status').textContent = "Activo";
        document.querySelector('.status').style.color = "limegreen";
    } else {
        alert("Matrícula no encontrada. Por favor, verifica la matrícula ingresada.");
    }
});