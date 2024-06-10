<section class="confirmar-pedido">
    <h1>Confirmar pedido</h1>

    <?php 
        include_once __DIR__ . "/../templates/alertas.php";
    ?>

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
                <h3 style="text-align: left;">Total a pagar: <span>$ <?php echo round($precioTotal) . " CLP"; ?></span> </h3>
                <p style="text-align: left;">IVA incluido</p>
            </div>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>

        <!-- Formulario de envío y medios de pago -->
        <div class="formulario-envio">
            <!-- Aquí puedes agregar tu formulario de envío -->
            <h2>Formulario de Envío 📦🏠</h2>

            <form action="/confirmar" class="formulario" method="POST">
                    <fieldset>
                        <legend>Información de Envío</legend>
    
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion_envio" placeholder="Tu Dirección" value="<?php echo s($envio->direccion_envio); ?>">
    
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" placeholder="Tu Ciudad" value="<?php echo s($envio->ciudad); ?>">
    
                        <label for="region">Región:</label>
                        <select id="region" name="region">
                            <option value="" disabled >Selecciona tu región</option>
                            <?php foreach ($regiones_permitidas as $region_opcion) : ?>
                                <option value="<?php echo $region_opcion; ?>" <?php echo ($envio && $envio->region === $region_opcion) ? 'selected' : ''; ?>>
                                    <?php echo $region_opcion; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
    
                        <label for="codigo_postal">Código Postal:</label>
                        <input type="number" id="codigo_postal" name="codigo_postal" placeholder="Tu Código Postal" value="<?php echo s($envio->codigo_postal); ?>">
    
                    </fieldset>

                    <input type="hidden" name="formulario" value="datos_envio">
                    <input type="submit" value="Confirmar Direccion" class="boton-azul">

                </form>
        </div>

        <!-- Medios de pago (por ejemplo, PayPal) -->
        <div class="medios-pago">
            <!-- Set up a container element for the button -->
            <h2>Medios de Pago</h2>
        </div>
    </div>
</section>