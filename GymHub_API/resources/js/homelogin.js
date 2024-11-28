document.addEventListener("DOMContentLoaded", function () {
    
});

document.addEventListener("DOMContentLoaded", function () {
    console.log('JavaScript cargado correctamente');
    const loginButton = document.getElementById("boton");

    loginButton.addEventListener("click", async function (event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        const usuario = document.getElementById("usuario").value;
        const password = document.getElementById("contraseña").value;

        try {
            // Realiza la solicitud al endpoint de login en ApiProxyController
            const response = await fetch("/login-trabajador", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ usuario, password })
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
                // Muestra el mensaje de error en caso de credenciales incorrectas
                document.getElementById("ErrorCredenciales").style.display = "block";
            }
        } catch (error) {
            console.error("Error al intentar iniciar sesión:", error);
            document.getElementById("ErrorCredenciales").textContent = "Error al conectar con el servidor. Intente más tarde.";
            document.getElementById("ErrorCredenciales").style.display = "block";
        }
    });
});
