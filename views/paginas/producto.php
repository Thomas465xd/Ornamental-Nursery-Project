<main class="detalles-producto">

    <h1><?php echo $producto->nombre; ?></h1>

    <div class="contenedor">
    
        <div class="info-producto">
            <img loading="lazy" src="/imagenes/<?php echo $producto->imagen_url; ?>" alt="imagen de la producto">
        
            <div class="resumen-producto">
                <p class="precio">$<?php echo $producto->precio; ?></p>
        
                <p><?php echo $producto->descripcion; ?></p>

                <!-- Acciones del producto -->
                <div class="acciones-producto">
                    <a href="/carrito/agregar?id=<?php echo $producto->id; ?>" class="boton-aprobar">Comprar</a>
                    <!-- Aquí puedes agregar más acciones, como agregar al carrito -->
                    <!-- formulario invisible -->
                    <form action="/carrito" method="post" id="formulario-carrito" name="formulario">
                        <a class="category">
        
                        </a>
                            <div class="text-content">
                                <input name="ref" type="hidden" id="ref" value="<?php echo $producto->id; ?>">
                                <input name="imagen_url" type="hidden" id="imagen_url" value="<?php echo $producto->imagen_url; ?>">
                                <input name="precio" type="hidden" id="precio" value="<?php echo $producto->precio; ?>">
                                <input name="nombre" type="hidden" id="nombre" value="<?php echo $producto->nombre; ?>">
                                <input name="cantidad" type="hidden" id="cantidad" value="1">

                                <!-- Botón para agregar al carrito -->
                                <div>
                                    <input type="submit" value="Agregar al Carrito" class="boton">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>