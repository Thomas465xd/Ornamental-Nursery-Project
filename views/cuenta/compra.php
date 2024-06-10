<section class="carrito-view">
    <h1 class="nombre-pagina">Carrito 🛒</h1>

    <div class="contenedor">

        <?php //debug($carrito); ?>
        
        <?php 
        // Inicializar el precio total y el subtotal
        $precioTotal = 0;
        $subtotal = 0;

        if (isset($carrito) && count($carrito) > 0): ?>
            <?php foreach ($carrito as $producto): ?>
                <?php 
                // Calcular el subtotal para cada producto
                $subtotalProducto = $producto['precio'] * $producto['cantidad'];
                // Incrementar el subtotal total
                $subtotal += $subtotalProducto;
                // Incrementar el precio total
                $precioTotal += $subtotalProducto;
                ?>
                <div class="producto">
                    <div class="image">
                        <img loading="lazy" src="/imagenes/<?php echo $producto['imagen_url']; ?>" alt="producto">
                    </div>
                    <div class="detalles">
                        <h2>Nombre: <span><?php echo $producto['nombre']; ?></span></h2>
                        <p>Precio: <span>$<?php echo $producto['precio']; ?></span></p>
                        <p>Cantidad: <span><?php echo $producto['cantidad']; ?></span></p>
                        <p>Subtotal: <span>$<?php echo $subtotalProducto; ?></span></p>
                    </div>
                    <div class="acciones-orden">
                        <div class="opciones-cantidad">

                            <!-- Formulario para disminuir la cantidad -->
                            <form action="/compra/quitar" method="post">
                                <input type="hidden" name="ref" value="<?php echo $producto['ref']; ?>">
                                <button type="submit" class="boton-quitar">-</button>
                            </form>
                            
                            <!-- Formulario para aumentar la cantidad -->
                            <form action="/compra/agregar" method="post">
                                <input type="hidden" name="ref" value="<?php echo $producto['ref']; ?>">
                                <button type="submit" class="boton-agregar">+</button>
                            </form>

                        </div>
                            
                        <!-- Botón para eliminar el producto -->
                        <form action="/compra" method="post">
                            <input type="hidden" name="ref" value="<?php echo $producto['ref']; ?>">
                            <input type="hidden" name="eliminar" value="1">
                            <button type="submit" class="boton-eliminar">Eliminar Producto</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tu carrito está vacío 😿</p>
        <?php endif; ?>
        <!-- Mostrar el total de la cantidad -->
        <h3>Total a Pagar: $ <?php echo $precioTotal; ?></h3>
        <p class="iva">IVA incluido</p>

        <div class="opciones">
            
            <?php if($_SESSION["carrito"]) : ?>
            <a href="/productos" class="boton-editar">Seguir Comprando</a>
                <a href="/confirmar" class="boton-azul">Confirmar Compra 💴🏦</a>
            <?php else : ?>
                <a href="/productos" class="boton-aprobar">Ir a Productos</a>
            <?php endif; ?>
        </div>
    </div>
</section>