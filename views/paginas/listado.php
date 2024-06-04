<div class="box-container">
        <?php foreach ($productos as $producto): ?>
            <div class="box">
                <!-- Imagen del producto -->
                <div class="image">
                    <img loading="lazy" src="/imagenes/<?php echo $producto->imagen_url; ?>" alt="producto">
                    <!-- Iconos de acción -->
                    <div class="icons">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </a>
                        
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </a>
                        
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Contenido del producto -->
                <div class="content">

                    <!-- Nombre del producto -->
                    <h3><?php echo $producto->nombre; ?></h3>
                    
                    <!-- Precio del producto -->
                    <div class="price">Precio: <?php echo $producto->precio; ?></div>

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

                    <!-- Enlace para ver más detalles del producto -->
                    <a href="producto?id=<?php echo $producto->id; ?>" class="boton-editar">Ver producto</a>
                </div>
            </div>


        <?php endforeach; ?>
</div> <!--.contenedor-anuncios-->