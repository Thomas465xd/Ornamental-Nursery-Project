<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las Tres Marías</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <header class="header">

        <a href="/" class="logo">Las Tres Marías<span>.</span></a>

        <ion-icon name="menu-outline" class="toggle" id="nav-toggle"></ion-icon>
        
        <nav class="nav" id="nav-menu">
            <div class="nav-content bd-grid">
                <ion-icon name="close-outline" class="nav-close" id="nav-close"></ion-icon>

                <div class="nav-perfil">
                    <div class="nav-img">
                        <img src="../build/img/perfil.jpg" alt="usuario">
                    </div>

                    <div>
                        <a href="#" class="nav-name">Perfil</a>
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
                            <?php if ($_SESSION) { ?>
                                <a href="/logout">Cerrar Sesión</a>
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

    <!-- This is where the content from index.php or other pages will be inserted -->
    <?php echo $contenido; ?>

    <footer>

        <section class="footer-section">

            <div class="box-container">
                
                <div class="box">
                    <h3>Links Rapidos</h3>
                    <a href="/">inicio</a>
                    <a href="/nosotros">nosotros</a>
                    <a href="/productos">productos</a>
                    <a href="/contacto">contacto</a>
                </div>

                <div class="box">
                    <h3>Links extra</h3>
                    <a href="/informacion">Mi Cuenta</a>
                    <a href="/orden">Mis Ordenes</a>
                    <a href="/favoritos">Mis Favoritos</a>
                    <a href="/carrito">Carrito</a>
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
                    <a href="#">Mis Favoritos</a>
                </div>

                
                <p class="copyright"></p>

            </div>

            <div class="credit"> Creado por <span> Iñigo Del Campo </span> | Todos los derechos Reservados Vívero Las Tres Marías  <?php echo date('Y'); ?> &copy;</div>

        </section>

    </footer>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Scripts -->
    <script src="../build/js/app.js"></script>
</body>
</html>