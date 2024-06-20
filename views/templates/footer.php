<footer>

    <section class="footer-section">

        <div class="box-container">
            
            <div class="box">
                <h3>Links Rapidos</h3>
                <a href="/">inicio</a>
                <a href="/nosotros">nosotros</a>
                <a href="/productos">productos</a>
                <a href="/contacto">contacto</a>
                <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] === "1") : ?>
                    <a href="/producto/admin">Administrador</a>
                <?php endif; ?>
            </div>

            <div class="box">
                <h3>Links extra</h3>
                <a href="<?php if($_SESSION) : ?> /informacion <?php else : ?> /login <?php endif;?>">Mi Cuenta</a>
                <a href="<?php if($_SESSION) : ?> /orden <?php else : ?> /login <?php endif;?>">Mis Ordenes</a>
                <a href="<?php if($_SESSION) : ?> /favoritos <?php else : ?> /login <?php endif;?>">Mis Favoritos</a>
                <a href="<?php if($_SESSION) : ?> /compra <?php else : ?> /login <?php endif;?>">Carrito de Compras</a>
            </div>

            <div class="box">
                <h3>Informacion de Contacto</h3>
                <a href="#">+56 9 1234 5678</a>
                <a href="#">ejemplo@gmail.com</a>
                <a href="#">Santiago de Chile</a>
                <picture class="item-1">
                    <source srcset="build/img/pago.webp" type="image/webp">
                    <source srcset="build/img/pago.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/pago.jpg" alt="Anuncio">
                </picture>
            </div>

            <div class="box">
                <h3>Redes Sociales</h3>
                <a href="https://www.instagram.com/lastresmariasvivero/?hl=es-la">Instagram</a>
                <a href="#">WhatsApp</a>
                <a href="#">LinkedIn</a>
            </div>

            
            <p class="copyright"></p>

        </div>

        <div class="credit"> Creado por <span> Iñigo Del Campo </span> | Todos los derechos Reservados Vívero Las Tres Marías  <?php echo date('Y'); ?> &copy;</div>

    </section>

</footer>