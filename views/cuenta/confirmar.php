<section class="confirmar-pedido">
    <h1>Confirmar pedido</h1>

    <div class="contenedor">
        <?php if (isset($carrito) && count($carrito) > 0): ?>
            <div class="boleta">
                <h2 style="text-align: left;">Tu Boleta:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // Inicializar el precio total
                            $precioTotal = 0;
                            foreach ($carrito as $producto): 
                                // Calcular el subtotal para cada producto
                                $subtotalProducto = $producto['precio'] * $producto['cantidad'];
                                // Incrementar el precio total
                                $precioTotal += $subtotalProducto;
                        ?>
                            <tr>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['cantidad']; ?></td>
                                <td>$<?php echo $producto['precio']; ?></td>
                                <td>$<?php echo $producto['precio'] * $producto['cantidad']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Mostrar el total -->
                <p>Total a pagar: $<?php echo round($precioTotal) . ",000 CLP"; ?></p>
            </div>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>

        <!-- Formulario de envío y medios de pago -->
        <div class="formulario-envio">
            <!-- Aquí puedes agregar tu formulario de envío -->
        </div>

        <!-- Medios de pago (por ejemplo, PayPal) -->
        <div class="medios-pago">
            <!-- Set up a container element for the button -->
            <form method="post" action="Inserta aquí la url entregada">
                <input type="hidden" name="token_ws" value="Inserte aquí el token entregado" />
                <input type="submit" value="Ir a pagar" />
            </form>
        </div>
    </div>
</section>