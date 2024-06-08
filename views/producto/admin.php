<section class="admin-tab">
    <h1>Administrador de Productos y Ordenes</h1>

    <?php 
            
            $mensaje = mostrarNotificacion( intval($resultado) );
            if($mensaje) : ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
        <?php endif;  ?>


        <a href="/producto/crear" class="boton boton-verde">Nuevo Producto</a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Accioness</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados-->
                <?php foreach( $productos as $producto ) : ?>
                <tr>
                    <td> <?php echo $producto->id;?> </td>
                    <td> <?php echo $producto->titulo;?> </td>
                    <td> <img src="/imagenes/<?php echo $producto->imagen_url; ?>" class="imagen-tabla"> </td>
                    <td> $ <?php echo $producto->precio;?> </td>
                    <td>
                        <form method="POST" class="w-100" action="/producto/eliminar">

                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                            <input type="hidden" name="tipo" value="producto">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                            
                        <a href="/producto/actualizar?id=<?php echo $producto->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</section>