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
                $precioTotal += $producto['precio'];
                ?>
                <div class="producto">
                    <div class="image">
                        <img loading="lazy" src="/imagenes/<?php echo $producto['imagen_url']; ?>" alt="producto">
                    </div>
                    <div class="detalles">
                        <h2>Nombre: <?php echo $producto['nombre']; ?></h2>
                        <p>Precio: $<?php echo $producto['precio']; ?></p>
                        <p>Cantidad: <?php echo $producto['cantidad']; ?></p>
                        <p>Subtotal: $<?php echo $subtotalProducto; ?></p>
                    </div>
                    <div class="acciones-orden">
                        <a href="#" class="boton-eliminar">Eliminar Producto</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>
        <!-- Mostrar el total de la cantidad -->
        <h3>Precio Total: $ <?php echo $precioTotal; ?></h3>

        <div class="opciones">
            <a href="#" class="boton-editar">Seguir Comprando</a>
            <a href="/compra" class="boton-aprobar">Confirmar Compra 💴🏦</a>
        </div>
    </div>
</section>