<header class="header">

    <a href="/" class="logo">Las Tres Marías<span>.</span></a>

    <ion-icon name="menu-outline" class="toggle" id="nav-toggle"></ion-icon>

    <nav class="nav" id="nav-menu">
        <div class="nav-content bd-grid">
            <ion-icon name="close-outline" class="nav-close" id="nav-close"></ion-icon>

            <div class="nav-perfil">
                <div class="nav-img">
                <picture class="item-1">
                    <source srcset="build/img/perfil.webp" type="image/webp">
                    <source srcset="build/img/perfil.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/perfil.jpg" alt="Anuncio">
                </picture>
                </div>

                <div>
                    <?php if ($_SESSION) { ?>
                        <a href="/informacion">Tu Cuenta 🧔</a>
                    <?php } else { ?>
                        <a href="/login">
                            Ingresar 📲
                        </a>
                    <?php } ?>

                    <span class="nav-rango"></span>
                </div>
            </div>

            <div class="nav-menu">
                <ul class="nav-list">
                    <li class="nav-item" id="home"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item" id="nosotros"><a href="/nosotros" class="nav-link">Nosotros</a></li>
                    <li class="nav-item" id="productos"><a href="/productos" class="nav-link">Productos</a></li>
                    <li class="nav-item" id="contacto"><a href="/contacto" class="nav-link">Contacto</a></li>
                    <li class="nav-item">
                        <?php if ($_SESSION) { ?>
                            <a href="/informacion">Tu Cuenta</a>
                        <?php } else { ?>
                            <a href="/login">
                                <ion-icon name="log-in-outline" id="login-toggle" class="nav-login"></ion-icon>
                            </a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php if ($_SESSION["admin"]) { ?>
                            <a href="/producto/admin">
                                <ion-icon name="cog-outline" id="admin" class="nav-login"></ion-icon>
                            </a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php if ($_SESSION) { ?>
                            <a href="/logout">
                                <ion-icon name="log-out-outline" class="nav-logout"></ion-icon>
                            </a>
                        <?php } ?>
                    </li>

                </ul>
            </div>

            <div class="nav-social">
                <a href="#" class="social-icon"><ion-icon name="logo-linkedin"></ion-icon></a>
                <a href="https://www.instagram.com/lastresmariasvivero/?hl=es-la" class="social-icon"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#" class="social-icon"><ion-icon name="logo-whatsapp"></ion-icon></a>
            </div>
        </div>

    </nav>

</header>