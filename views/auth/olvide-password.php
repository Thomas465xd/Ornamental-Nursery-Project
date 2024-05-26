<section class="olvide-seccion">

    <h1 class="nombre-pagina">Olvide la Contraseña</h1>
    <p class="descripcion-pagina">Reestablece tu Contraseña escribiendo tu email a continuación 👇👇👇</p>
    
    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>
    
    <form action="/olvide-password" class="formulario" method="POST">
        <div class="campo">
            <label for="email">Email</label>
            <input 
                type="email"
                id="email"
                name="email"
                placeholder="Tu Email"
            >
        </div>
    
        <input type="submit" class="boton" value="Enviar Instrucciones">
        
    </form>
    
    <div class="acciones">
        <a href="/login">¿Ya tienes una Cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear Una</a>
    </div>
</section>
