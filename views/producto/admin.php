<section class="admin-tab">
    <h1>Administrador de <span>Productos y Ordenes</span></h1>

    <div class="contenedor">
        <?php 
            $mensaje = mostrarNotificacion(intval($resultado));
            if ($mensaje) : ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
        <?php endif; ?>

        <a href="/producto/crear" class="boton-aprobar">Nuevo Producto</a>

        <h2>Productos 🌱</h2>
        <table class="productos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto->id; ?></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><img src="/imagenes/<?php echo $producto->imagen_url; ?>" class="imagen-tabla" alt="imagen producto"></td>
                    <td>$<?php echo $producto->precio; ?></td>
                    <td>
                        <a href="/producto/actualizar?id=<?php echo $producto->id; ?>" class="boton-editar">Actualizar</a>
                        <form method="POST" class="form-eliminar" action="/producto/eliminar">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                            <input type="hidden" name="tipo" value="producto">
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 style="margin-top: 5rem">Ordenes 📦</h2>
        <!-- Agrega aquí el código para mostrar y gestionar las órdenes -->

        
    </div>
</section>
