
document.addEventListener('DOMContentLoaded', () => {
    console.log('JavaScript cargado correctamente');
    const form = document.querySelector('form');
    const clientIdInput = document.getElementById('usuario');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('contraseña');
    const errorMsg = document.getElementById('ErrorCredenciales');
    const loginButton = document.getElementById('boton');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const data = {
            client_id: clientIdInput.value,
            email: emailInput.value,
            password: passwordInput.value,
        };

        try {
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(data),
            });

            const result = await response.json();

            if (result.status === 'success') {
                // Lógica para redirigir o manejar el inicio de sesión exitoso
                //window.location.href = '/home-login'; // Ejemplo de redirección
                window.location.href = '/home-dashboard'; // Ejemplo de redirección
            } else {
                errorMsg.style.display = 'block';
                errorMsg.textContent = result.message;
            }
        } catch (error) {
            console.error('Error:', error);
            errorMsg.style.display = 'block';
            errorMsg.textContent = 'Hubo un problema con el inicio de sesión';
        }
    });
});
