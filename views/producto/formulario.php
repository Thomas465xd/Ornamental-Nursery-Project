<fieldset>
    <legend>Informacion del Producto</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="producto[nombre]" placeholder="nombre producto" value="<?php echo s( $producto->nombre ); ?>">

    <label for="precio">Precio(CLP):</label>
    <input type="number" id="precio" name="producto[precio]" placeholder="Precio producto" value="<?php echo s( $producto->precio ); ?>">
                
    <label for="imagen">Imagen del Producto:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="producto[imagen_url]">

    <?php if($producto->imagen_url) :?>
        <img src="/imagenes/<?php echo $producto->imagen_url ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="producto[descripcion]"><?php echo s($producto->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Informacion Especifica</legend>

    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="producto[stock]" placeholder="Ej. 30" min="1" max="100" value="<?php echo s( $producto->stock ); ?>">

    <label for="categoria">Categoria:</label>
    <input type="text" id="categoria" name="producto[categoria]" placeholder="Ej. Rosas" value="<?php echo s( $producto->categoria ); ?>">
    
</fieldset>