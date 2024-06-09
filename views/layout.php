<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="¡Explora nuestro vivero en línea en Chile y descubre una amplia selección de plantas ornamentales de alta calidad! En nuestro vivero, ofrecemos una variedad única de plantas cuidadosamente seleccionadas, ideales para embellecer tu hogar o jardín. Desde exuberantes plantas de interior hasta hermosas especies de exterior, encontrarás todo lo que necesitas para crear un oasis verde en tu vida. ¡Compra ahora y lleva la naturaleza a tu espacio con nuestras plantas ornamentales de primera calidad!"> <!-- Add this line -->
    <title>Las Tres Marías</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <?php 

    $totalcantidad = 0;
    
    if (isset($_SESSION["carrito"])) {
        $carrito = $_SESSION["carrito"];
    
        // Loop through our cart
        foreach ($carrito as $item) {
            if ($item != NULL) {
                $totalcantidad += $item["cantidad"];
            }
        }
    }

    ?>

    <a href="#" class="carrito" id="cart-icon">
        <ion-icon name="cart-outline" class="carrito-icon"></ion-icon> <?php echo $totalcantidad; ?>
    </a>

    <!-- Carrito Modal -->
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tu Carrito</h2>
            <div class="modal-body">
                <?php if (isset($carrito) && count($carrito) > 0): ?>
                    <ul>
                        <?php 
                            $totalAmount = 0;
                            foreach ($carrito as $item): 
                                $itemTotal = $item['precio'] * $item['cantidad'];
                                $totalAmount += $itemTotal;
                        ?>
                            <li>
                                <p>Item: <?php echo htmlspecialchars($item['nombre'], ENT_QUOTES, 'UTF-8'); ?></p>
                                <p>Precio: $<?php echo number_format($item['precio'], 2); ?></p>
                                <p>Cantidad: <?php echo (int)$item['cantidad']; ?></p>
                                <p>Total: $<?php echo number_format($itemTotal, 2); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <h3>Total a Pagar (CLP)💸: $ <?php echo number_format($totalAmount, 2); ?></h3>
                    <!-- Form to empty the cart -->
                    <div class="acciones-carrito">
                        <a href="/compra" class="ver-carrito" id="ver-carrito">Ver Carrito</a>
                        <form method="POST" action="/carrito/vaciar">
                            <input type="hidden" name="vaciar_carrito" value="1">
                            <button type="submit" class="boton-eliminar">Vaciar Carrito</button>
                        </form>
                    </div>

                    <div class="redireccionar">
                        <a href="/confirmar" class="boton-azul">Confirmar Compra 💴🏦</a>
                        <a href="/productos" class="boton-aprobar">Seguir Comprando</a>
                    </div>

                <?php else: ?>
                    <p>Tu Carrito está Vacío.</p>
                    <div class="acciones-carrito">
                        <a href="/productos" class="boton-aprobar">Ir a Productos</a>
                        <a href="/" class="boton">Volver al Inicio</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <a href="#" class="float">
        <ion-icon name="logo-whatsapp" class="whatsapp"></ion-icon>
    </a>


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
                    <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] === "1") : ?>
                        <a href="/producto/admin">Administrador</a>
                    <?php endif; ?>
                </div>

                <div class="box">
                    <h3>Links extra</h3>
                    <a href="<?php if($_SESSION) : ?> /informacion <?php else : ?> /login <?php endif;?>">Mi Cuenta</a>
                    <a href="<?php if($_SESSION) : ?> /ordenes <?php else : ?> /login <?php endif;?>">Mis Ordenes</a>
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

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Scripts -->
    <script src="../build/js/app.js"></script>
</body>
</html>