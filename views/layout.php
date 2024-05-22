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
    <header class="header">

        <input type="checkbox" name="" id="toggler" checked>
        <label for="toggler" class="bars"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></label>

        <a href="#" class="logo">Las Tres Marías<span>.</span></a>

        <nav class="navbar">
            <a href="/inicio">inicio</a>
            <a href="/nosotros">nosotros</a>
            <a href="/productos">productos</a>
            <a href="/contacto">contacto</a>
        </nav>
        
        <div class="icons">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>

            
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </a>
            
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
            </a>

    <!-- Add more icons here -->
        </div>
        
    </header>

    <!-- This is where the content from index.php or other pages will be inserted -->
    <?php echo $contenido; ?>

    <footer>

        <section class="footer-section">

            <div class="box-container">
                
                <div class="box">
                    <h3>Links Rapidos</h3>
                    <a href="#">inicio</a>
                    <a href="#">nosotros</a>
                    <a href="#">productos</a>
                    <a href="#">contacto</a>
                </div>

                <div class="box">
                    <h3>Links extra</h3>
                    <a href="#">Mi Cuenta</a>
                    <a href="#">Mi Orden</a>
                    <a href="#">Mis Favoritos</a>
                </div>

                <div class="box">
                    <h3>Informacion de Contacto</h3>
                    <a href="#">+56 9 1234 5678</a>
                    <a href="#">ejemplo@gmail.com</a>
                    <a href="#">Santiago de Chile</a>
                    <img src="../../build/img/pago.jpg" alt="pago">
                </div>

                <div class="box">
                    <h3>Redes Sociales</h3>
                    <a href="#">Instagram</a>
                    <a href="#">WhatsApp</a>
                    <a href="#">Mis Favoritos</a>
                </div>

                
                <p class="copyright"></p>

            </div>

            <div class="credit"> Creado por <span> Iñigo Del Campo </span> | Todos los derechos Reservados Vívero Las Tres Marías  <?php echo date('Y'); ?> &copy;</div>

        </section>

    </footer>
</body>
</html>