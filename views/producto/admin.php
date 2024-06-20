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
        <table class="ordenes">
            <thead>
                <tr>
                    <th>ID Orden</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Productos</th>
                    <th>Cantidades</th>
                    <th>Estado Envío</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordenes as $orden) : ?>
                <tr>
                    <td><?php echo $orden->id; ?></td>
                    <td><?php echo $orden->fecha_orden; ?></td>
                    <td>$<?php echo $orden->total; ?></td>
                    <td>
                        <ul>
                            <?php foreach ($orden->productos as $producto) : ?>
                            <li style="text-align: left;"><?php echo $producto->nombre; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <?php foreach ($orden->productos as $producto) : ?>
                            <li style="text-align: left;"> x<?php echo $producto->cantidad; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td>
                        Estado Actual: <span><?php echo $orden->estado; ?></span>
                        <form method="POST" action="/orden/cambiar-estado">
                            <input type="hidden" name="id_orden" value="<?php echo $orden->id; ?>">
                            <button type="submit" name="estado" value="Procesado" class="boton-editar">Procesado</button>
                            <button type="submit" name="estado" value="Completado" class="boton-aprobar">Completado</button>
                            <button type="submit" name="estado" value="Cancelado" class="boton-eliminar" style="border-radius: 1rem">Cancelado</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</section>
