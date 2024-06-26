// Menu Show and Hidden
const navMenu = document.getElementById('nav-menu'), 
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');

// Preloader
window.addEventListener('load', function() {
    document.getElementById('preloader').style.display = 'none';
});

// Show
navToggle.addEventListener('click', ()=>{
    navMenu.classList.toggle('show');
});

// Hidden
navClose.addEventListener('click', ()=>{
    navMenu.classList.remove('show');
});

// Active and Remove Menu
const navLink = document.querySelectorAll('.nav-link');

// Function to set active link
function setActiveLink(link) {
    // Active link
    navLink.forEach(n => n.classList.remove('active'));
    link.classList.add('active');
    // Save the active link to localStorage
    localStorage.setItem('activeLink', link.getAttribute('href'));
}



// Alerta en pantalla
function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {

    // Si hay una alerta previa, entonces no crear otra
    const alertaPrevia = document.querySelector(".alerta");
    if(alertaPrevia) {
        alertaPrevia.remove();
    }   

    // Crear la alerta
    const alerta = document.createElement("DIV");
    alerta.textContent = mensaje;
    alerta.classList.add("alerta");

    if(tipo === "error") {
        alerta.classList.add("error");
    }

    // Insertar en el HTML
    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if(desaparece) {
        // Eliminar la alerta después de 3 segundos
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

// Carrito 

// Get the modal
document.addEventListener('DOMContentLoaded', (event) => {
    // Get the modal
    const modal = document.getElementById("cartModal");
    //console.log("Modal:", modal); // Debugging

    // Get the button that opens the modal
    const btn = document.getElementById("cart-icon");
    //console.log("Button:", btn); // Debugging

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];
    //console.log("Close Button:", span); // Debugging

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        //console.log("Opening modal..."); // Debugging
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        //console.log("Closing modal..."); // Debugging
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            //console.log("Clicked outside modal..."); // Debugging
            modal.style.display = "none";
        }
    }
});

// Icono Compartir
document.addEventListener('DOMContentLoaded', function () {
    const shareBtn = document.querySelector('.icono-compartir');
    const shareOptions = document.querySelector('.share-options');
    const copyBtn = document.getElementById('copy-btn');
    const linkUrl = document.getElementById('link-url');

    shareBtn.addEventListener('click', () => {
        shareOptions.classList.toggle('show');
    });

    document.addEventListener('click', function (event) {
        if (!shareBtn.contains(event.target) && !shareOptions.contains(event.target)) {
            shareOptions.classList.remove('show');
        }
    });

    copyBtn.addEventListener('click', () => {
        const url = linkUrl.textContent;
        navigator.clipboard.writeText(url).then(() => {
            alert('URL copiada al portapapeles');
        }).catch(err => {
            console.error('Error al copiar la URL: ', err);
        });
    });
});


