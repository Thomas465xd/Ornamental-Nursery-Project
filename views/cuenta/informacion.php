<h1 class="nombre-pagina">Información de la Cuenta 💁</h1>

<section class="informacion-seccion">
    <div class="informacion">
        <h2>Datos de la Cuenta</h2>

        <div class="contenedor-seccion">
            <div class="datos-cuenta">
                <p><strong>nombre:</strong> <?php echo s($nombre ?? ''); ?></p>
                <p><strong>Apellido:</strong> <?php echo s($usuario->apellido); ?></p>
                <p><strong>Teléfono:</strong> +56 9 <?php echo s($usuario->telefono); ?></p>
                <p><strong>Email:</strong> <?php echo s($usuario->email); ?></p>
            </div>

            <div class="image">
                <picture>
                    <source srcset="build/img/registro.webp" type="image/webp">
                    <source srcset="build/img/registro.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/registro.jpg" alt="Anuncio">
                </picture>
            </div>
        </div>

        <div class="formulario-direccion">
            <h2>Dirección de Envío</h2>

            <form class="formulario" method="POST">
                <fieldset>
                    <legend>Información de Envío</legend>

                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Tu Dirección" value="<?php echo s($usuario->direccion); ?>">

                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" placeholder="Tu Ciudad" value="<?php echo s($usuario->ciudad); ?>">

                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais" placeholder="Tu País" value="<?php echo s($usuario->pais); ?>">

                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" id="codigo_postal" name="codigo_postal" placeholder="Tu Código Postal" value="<?php echo s($usuario->codigo_postal); ?>">

                    <input type="submit" value="Guardar Cambios" class="boton-verde">
                </fieldset>
            </form>
        </div>
    </div>

    <div class="botones">
        <a href="#" class="boton-azul"></a>
        <a href="#" class="boton-editar"></a>
        <a href="/logout" class="boton-eliminar">Cerrar Sesión</a>
    </div>
</section>