<section class="contact" id="contact">

    <h1 class="heading">Contacta <span>Con Nosotros</span></h1>

    <div class="row">
        <form action="#" method="post">
            <div class="inputBox">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" placeholder="Correo" required>
            </div>
            <div class="inputBox">
                <label for="telefono">Número de Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Número de Teléfono" required>
                
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" placeholder="Asunto" required>
            </div>
            <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required></textarea>
            
            <input type="submit" value="Enviar Mensaje" class="boton">
        </form>
        <div class="image">
            <img src="../../build/img/contact.jpg" alt="contact">
        </div>
    </div>
    
</section>