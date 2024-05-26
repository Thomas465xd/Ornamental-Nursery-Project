// Menu Show and Hidden
const navMenu = document.getElementById('nav-menu'), 
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');

// Preloader
window.addEventListener('load', function() {
    document.getElementById('preloader').style.display = 'none';
});

// Login
//const login = document.getElementById('login'),
//    loginToggle = document.getElementById('login-toggle'),
//    loginClose = document.getElementById('login-close');

// Login Show
//loginToggle.addEventListener('click', ()=>{
    //console.log('click');
//    login.classList.add('show-login');
//});

// Login Hidden
//loginClose.addEventListener('click', ()=>{
//    //console.log('click');
//    login.classList.remove('show-login');
//});

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