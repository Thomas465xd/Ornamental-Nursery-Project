<h1 class="nombre-pagina">Información de la Cuenta 💁</h1>

<section class="informacion-seccion">
    <div class="informacion">
        <h2>Datos de la Cuenta</h2>

        <div class="contenedor">
            <div class="contenedor-seccion">
                <form class="formulario" method="POST" action="/actualizar-datos">
                    <div class="datos-cuenta">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo s($nombre ?? ''); ?>" placeholder="Tu Nombre">

                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>" placeholder="Tu Apellido">

                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>" placeholder="Tu Teléfono">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo s($usuario->email); ?>" placeholder="Tu Email" readonly>
                    </div>
                    
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
    </div>

    <div class="botones">
        <a href="#" class="boton-azul"></a>
        <a href="#" class="boton-editar">Reestablecer Contraseña</a>
        <a href="/logout" class="boton-eliminar">Cerrar Sesión</a>
    </div>
</section>