<?php 
    // Comienza el primer bucle 'foreach' que recorre el array $alertas.
    // $key será la clave actual del array asociativo (como 'error', 'success', etc.),
    // y $mensajes será el array de mensajes asociado a esa clave.
    foreach($alertas as $key => $mensajes):

        // Comienza el segundo bucle 'foreach' que recorre el array de mensajes actual.
        // $mensaje será el mensaje actual en el array de $mensajes.
        foreach($mensajes as $mensaje):
?>

    <!-- Esta línea genera un div HTML con la clase 'alerta' y una clase adicional basada en la clave actual ($key). -->
    <div class="alerta <?php echo $key; ?>" >
        <!-- Imprime el mensaje actual dentro del div. -->
        <?php echo $mensaje; ?>
    </div>

<?php 
        // Finaliza el segundo bucle 'foreach'.
        endforeach;

    // Finaliza el primer bucle 'foreach'.
    endforeach;
?>
