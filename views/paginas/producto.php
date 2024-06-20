<main class="detalles-producto">

    <h1><?php echo $producto->nombre; ?></h1>

    <!-- Mostrar categoría del producto -->
    <p class="categoria">Categoría: <?php echo $producto->categoria; ?></p>

    <div class="contenedor">
    
        <div class="info-producto">
            <img loading="lazy" src="/imagenes/<?php echo $producto->imagen_url; ?>" alt="imagen de la producto">
        
            <div class="resumen-producto">
                <p class="precio">Precio: $<?php echo $producto->precio; ?> C/U</p>
                <!-- Acciones del producto -->
                <div class="producto-acciones">
                    <a href="/carrito/agregar?id=<?php echo $producto->id; ?>" class="boton-aprobar">Comprar</a>
                    <!-- Aquí puedes agregar más acciones, como agregar al carrito -->
                    <a href="/productos" class="boton-editar">Volver</a>

                </div>

                <div class="carrito-agregar">
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
        
                <h3>Descripción</h3>

                <div class="descripcion-producto">
                    <p><?php echo $producto->descripcion; ?></p>
                </div>

                <!-- Icono para compartir URL -->
                <div class="compartir-url">

                    <button href="#" class="icono-compartir">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                    </button>

                    <div class="share-options">
                        <p class="titulo">Compartir: </p>
                        <div class="redes-sociales">
                            <button class="social-media-btn"><i class="fa-brands fa-whatsapp"></i></button>
                            <button class="social-media-btn"><i class="fa-brands fa-instagram"></i></button>
                            <button class="social-media-btn"><i class="fa-brands fa-facebook"></i></button>
                            <button class="social-media-btn"><i class="fa-regular fa-file"></i></button>
                            <button class="social-media-btn"><i class="fa-brands fa-linkedin"></i></button>
                            <button class="social-media-btn"><i class="fa-brands fa-github"></i></button>
                            <button class="social-media-btn"><i class="fa-brands fa-x-twitter"></i></button>
                        </div>
                        <div class="link-container">
                            <p class="link" id="link-url"><?php echo $url; ?></p>
                            <button class="copy-btn" id="copy-btn">Copiar</button>
                        </div>
                    </div>

                </div>
            </div> 
        </div>
    </div>
</main>