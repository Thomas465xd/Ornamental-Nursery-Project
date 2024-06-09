<main class="formulario-producto">
        <h1>Registrar <span>Nuevo Producto</span></h1>

        <a href="/producto/admin" class="boton">Volver</a>

        <div class="contenedor">
                <?php foreach($errores as $error): ?>
                        <div class="alerta error">
                                <?php echo $error; ?>
                        </div>
                <?php endforeach; ?>
        
        
                <form class="formulario" method="POST" enctype="multipart/form-data">
                        <?php include __DIR__ . "/formulario.php" ?>
        
                        <input type="submit" value="Crear Producto" class="boton-aprobar">
                </form>
        </div>
</main>