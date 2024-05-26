<!-- Login Popup -->
<section class="login" id="login">

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/login" class="login-form" method="POST">
    <h2 class="login-title">Ingresar a tu Cuenta</h2>
    <a href="/" class="boton">Volver al Inicio</a>

    <div class="login-group">
        <div>
            <label for="email" class="login-label">Email</label>
            <input type="email" 
                placeholder="Escribe tu E-mail" 
                id="email" 
                name="email" 
                value="<?php echo s($auth->email); ?>" 
                class="login-input"
                required
            >
        </div>

        <div>
            <label for="password" class="login-label">Contraseña</label>
            <input type="password" 
                name="password"
                placeholder="Escribe tu Contraseña" 
                id="password" 
                class="login-input"
                required
            >
        </div>
    </div>

    <div>
        <p class="login-signup">
            ¿No tienes una cuenta? <a href="/crear-cuenta">Registrate</a>
        </p>

        <a href="/olvide-password" class="login-forgot">¿Olvidaste tu Contraseña?</a>

        <button type="submit" class="login-button">Log In</button>
    </div>
</form>


</section>