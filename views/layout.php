<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="¡Explora nuestro vivero en línea en Chile y descubre una amplia selección de plantas ornamentales de alta calidad! En nuestro vivero, ofrecemos una variedad única de plantas cuidadosamente seleccionadas, ideales para embellecer tu hogar o jardín. Desde exuberantes plantas de interior hasta hermosas especies de exterior, encontrarás todo lo que necesitas para crear un oasis verde en tu vida. ¡Compra ahora y lleva la naturaleza a tu espacio con nuestras plantas ornamentales de primera calidad!"> <!-- Add this line -->
    <meta name="keywords" content="palabra clave 1, palabra clave 2, palabra clave 3">
    <meta name="author" content="Iñigo Del Campo">
    <meta name="theme-color" content="#317EFB">
    <title>Las Tres Marías | <?php echo $titulo ?? ''; ?></title>
    <script src="https://kit.fontawesome.com/b0868ca0b9.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="icon" href="../build/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../build/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- This is where the content from carrito.php will be shown -->
    <?php include_once __DIR__ . '/templates/carrito.php'; ?>

    <a href="#" class="float">
        <ion-icon name="logo-whatsapp" class="whatsapp"></ion-icon>
    </a>

    <!-- This is where the content from header.php will be shown -->
    <?php include_once __DIR__ . '/templates/header.php'; ?>

    <!-- This is where the content from index.php or other pages will be inserted -->
    <?php echo $contenido; ?>

    <!-- This is where the content from footer.php will be shown -->
    <?php include_once __DIR__ . '/templates/footer.php'; ?>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Scripts -->
    <script src="../build/js/app.js"></script>
</body>
</html>