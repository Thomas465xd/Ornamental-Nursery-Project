<?php 

$totalcantidad = 0;

if (isset($_SESSION["carrito"])) {
    $carrito = $_SESSION["carrito"];

    // Loop through our cart
    foreach ($carrito as $item) {
        if ($item != NULL) {
            $totalcantidad += $item["cantidad"];
        }
    }
}

?>

<a href="#" class="carrito" id="cart-icon">
    <ion-icon name="cart-outline" class="carrito-icon"></ion-icon> <?php echo $totalcantidad; ?>
</a>

<!-- Carrito Modal -->
<div id="cartModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Tu Carrito</h2>
        <div class="modal-body">
            <?php if (isset($carrito) && count($carrito) > 0): ?>
                <ul>
                    <?php 
                        $totalAmount = 0;
                        foreach ($carrito as $item): 
                            $itemTotal = $item['precio'] * $item['cantidad'];
                            $totalAmount += $itemTotal;
                    ?>
                        <li>
                            <p>Item: <?php echo htmlspecialchars($item['nombre'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p>Precio: $<?php echo number_format($item['precio'], 2); ?></p>
                            <p>Cantidad: <?php echo (int)$item['cantidad']; ?></p>
                            <p>Total: $<?php echo number_format($itemTotal, 2); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <h3>Total a Pagar (CLP)💸: $ <?php echo number_format($totalAmount, 2); ?></h3>
                <!-- Form to empty the cart -->
                <div class="acciones-carrito">
                    <a href="/compra" class="ver-carrito" id="ver-carrito">Ver Carrito</a>
                    <form method="POST" action="/carrito/vaciar">
                        <input type="hidden" name="vaciar_carrito" value="1">
                        <button type="submit" class="boton-eliminar">Vaciar Carrito</button>
                    </form>
                </div>

                <div class="redireccionar">
                    <a href="/confirmar" class="boton-azul">Confirmar Compra 💴🏦</a>
                    <a href="/productos" class="boton-aprobar">Seguir Comprando</a>
                </div>

            <?php else: ?>
                <p>Tu Carrito está Vacío.</p>
                <div class="acciones-carrito">
                    <a href="/productos" class="boton-aprobar">Ir a Productos</a>
                    <a href="/" class="boton">Volver al Inicio</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>