<h1 class="nombre-pagina">Información de la Cuenta 💁</h1>

<section class="informacion-seccion">
    <div class="informacion">

        <?php 
            include_once __DIR__ . "/../templates/alertas.php";
        ?>

        <div class="contenedor">
            <div class="contenedor-datos">
                <form class="formulario" method="POST" action="/informacion">
                    <div class="datos-cuenta">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo s($usuario->nombre ?? ''); ?>" placeholder="Tu Nombre">

                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>" placeholder="Tu Apellido">

                        <label for="telefono">Teléfono:</label>
                        <input type="number" id="telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>" placeholder="Tu Teléfono">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo s($usuario->email); ?>" placeholder="Tu Email" readonly>
                    </div>
                    
                    <input type="hidden" name="formulario" value="datos_cuenta">
                    <input type="submit" value="Guardar Cambios" class="boton-aprobar">
                </form>

                <div class="image">
                    <picture>
                        <source srcset="build/img/registro.webp" type="image/webp">
                        <source srcset="build/img/registro.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/registro.jpg" alt="Anuncio">
                    </picture>
                </div>
            </div>
    
            <div class="formulario-direccion">
                <h2>Formulario de Envío 📦🏠</h2>
    
                <form action="/informacion" class="formulario" method="POST">
                    <fieldset>
                        <legend>Información de Envío</legend>
    
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion_envio" placeholder="Tu Dirección" value="<?php echo s($envio->direccion_envio); ?>">
    
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" placeholder="Tu Ciudad" value="<?php echo s($envio->ciudad); ?>">
    
                        <label for="region">Región:</label>
                        <select id="region" name="region">
                            <option value="" disabled>Selecciona tu región</option>
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
                    <input type="submit" value="Guardar Cambios" class="boton-aprobar">

                </form>
            </div>
        </div>
    </div>

    <div class="botones">
        <a href="/olvide-password" class="boton-editar">Reestablecer Contraseña</a>
        <a href="/logout" class="boton-eliminar">Cerrar Sesión</a>
        <a href="/orden" class="boton-azul">Ver Ordenes</a>
    </div>
</section>