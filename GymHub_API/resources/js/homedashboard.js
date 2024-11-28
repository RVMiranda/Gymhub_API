document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript cargado correctamente");

    const loginButton = document.getElementById("loginButton");
    const loginPopup = document.getElementById("loginPopup");
    const closePopup = document.getElementById("closePopup");
    const loginSubmitButton = document.getElementById("boton");
    const registroSubmitButton = document.querySelector(".btnRegistro");

    // Mostrar el popup al hacer clic en el botón de inicio de sesión
    loginButton.addEventListener("click", () => {
        loginButton.classList.add("clicked"); // Cambia el color del botón
        loginPopup.style.display = "block"; // Muestra el popup
    });

    // Ocultar el popup al hacer clic en el botón de cierre
    closePopup.addEventListener("click", () => {
        loginPopup.style.display = "none"; // Oculta el popup
        loginButton.classList.remove("clicked"); // Restaura el color del botón
    });

    // Cerrar el popup al hacer clic fuera de él
    window.addEventListener("click", (event) => {
        if (event.target == loginPopup) {
            loginPopup.style.display = "none";
            loginButton.classList.remove("clicked"); // Restaura el color del botón
        }
    });

    // Lógica de inicio de sesión
    loginSubmitButton.addEventListener("click", async function (event) {
        event.preventDefault(); // Evita el comportamiento predeterminado del formulario

        const usuario = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        try {
            const response = await fetch("/login-trabajador", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({ usuario, password }),
            });

            const result = await response.json();

            if (response.ok && result.status === "success") {
                // Redirige según el tipo de acceso del usuario
                switch (result.data.id_tipo_acceso) {
                    case 1:
                        window.location.href = "/admin/dashboard";
                        break;
                    case 2:
                        window.location.href = "/entrenador/dashboard";
                        break;
                    case 3:
                        window.location.href = "/recepcionista/dashboard";
                        break;
                    default:
                        console.error("Tipo de acceso desconocido:", result.data.id_tipo_acceso);
                }
            } else {
                document.getElementById("ErrorCredenciales").style.display = "block";
            }
        } catch (error) {
            console.error("Error al intentar iniciar sesión:", error);
            const errorMsg = document.getElementById("ErrorCredenciales");
            errorMsg.textContent = "Error al conectar con el servidor. Intente más tarde.";
            errorMsg.style.display = "block";
        }
    });

    // Lógica para registrar la visita 
    if (registroSubmitButton) {
        registroSubmitButton.addEventListener("click", async function (event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del formulario

            const matricula = document.getElementById("matricula").value;

            if (!matricula) {
                document.getElementById("ErrorCredenciales").textContent = "Por favor ingrese su matrícula.";
                document.getElementById("ErrorCredenciales").style.display = "block";
                return;
            }

            try {
                // Realizar solicitud POST al controlador para registrar la asistencia
                const response = await fetch('/cliente/registrar-asistencia', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ matricula: matricula })
                });

                const result = await response.json();

                if (response.ok && result.status === "ok") {
                    alert('Asistencia registrada exitosamente.');
                    document.getElementById("ErrorCredenciales").style.display = "none";
                } else {
                    document.getElementById("ErrorCredenciales").textContent = result.message || "Las credenciales ingresadas son inválidas, favor de revisarlas.";
                    document.getElementById("ErrorCredenciales").style.display = "block";
                }
            } catch (error) {
                console.error("Error al intentar registrar asistencia:", error);
                const errorMsg = document.getElementById("ErrorCredenciales");
                errorMsg.textContent = "Error al conectar con el servidor. Intente más tarde.";
                errorMsg.style.display = "block";
            }
        });
    }


    const days = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    const dayButtons = document.querySelectorAll(".Dias-container > div");
    const classesContainer = document.getElementById("clases-container");

    function getCurrentDayIndex() {
        const currentDate = new Date();
        const currentDay = currentDate.getDay(); // Obtiene el día actual (0-6), donde 0 es Domingo
        return currentDay === 0 ? 6 : currentDay - 1; // Convertir 0 (Domingo) en 6, y ajustar el resto (1-6 para Lunes-Sabado)
    }

    // Función para obtener las clases según el día seleccionado
    async function getClassesForDay(selectedDay) {
        try {
            // Mostrar inmediatamente el día seleccionado con el color activo
            dayButtons.forEach(button => {
                button.classList.remove("Dia-container-active");
                button.classList.add("Dia-container-unactive");
            });
            const activeButton = document.querySelector(`#day-${selectedDay.toLowerCase().substring(0, 2)}`);
            activeButton.classList.remove("Dia-container-unactive");
            activeButton.classList.add("Dia-container-active");

            // Mostrar mensaje temporal mientras carga la respuesta
            classesContainer.innerHTML = `
                <div class="clase">
                    <p>Cargando clases...</p>
                </div>
            `;

            // Realizar la solicitud de clases para el día seleccionado
            const response = await fetch("/horarios/ver-clases");
            if (!response.ok) {
                throw new Error('Error al obtener las clases.');
            }
            const data = await response.json();

            if (data.status !== "ok") {
                throw new Error('Error en la respuesta de la API.');
            }

            // Filtrar las clases por el día seleccionado
            const filteredClasses = data.data.filter(clase => clase.dia.toLowerCase() === selectedDay.toLowerCase());

            // Mostrar las clases obtenidas para el día seleccionado
            if (filteredClasses.length > 0) {
                classesContainer.innerHTML = filteredClasses.map(clase => `
                    <div class="clase">
                        <p>${clase.nombre_clase}</p>
                        <p>${clase.hora}</p>
                        <p>${clase.entrenador}</p>
                    </div>
                `).join('');
            } else {
                classesContainer.innerHTML = `
                    <div class="clase">
                        <p>No hay clases disponibles para este día.</p>
                    </div>
                `;
            }
        } catch (error) {
            console.error(error);
            classesContainer.innerHTML = `
                <div class="clase">
                    <p>Error al obtener las clases: ${error.message}</p>
                </div>
            `;
        }
    }

    // Añadir eventos a los botones para obtener las clases según el día seleccionado
    dayButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            const selectedDay = days[index];
            getClassesForDay(selectedDay);
        });
    });

    // Cargar las clases del día lunes por defecto al iniciar
    //getClassesForDay('lu');
    const currentDayIndex = getCurrentDayIndex();
    const currentDay = days[currentDayIndex];
    getClassesForDay(currentDay);

});
