// Menu Show and Hidden
const navMenu = document.getElementById('nav-menu'), 
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');

// Login
const login = document.getElementById('login'),
    loginToggle = document.getElementById('login-toggle'),
    loginClose = document.getElementById('login-close');

// Login Show
loginToggle.addEventListener('click', ()=>{
    //console.log('click');
    login.classList.add('show-login');
});

// Login Hidden
loginClose.addEventListener('click', ()=>{
    //console.log('click');
    login.classList.remove('show-login');
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

// Function to restore active link on page load
function restoreActiveLink() {
    const activeLink = localStorage.getItem('activeLink');
    if (activeLink) {
        const link = document.querySelector(`.nav-link[href="${activeLink}"]`);
        if (link) {
            link.classList.add('active');
        }
    }
}

// Link action
function linkAction() {
    setActiveLink(this);
    // Remove menu mobile
    navMenu.classList.remove('show');
}

navLink.forEach(n => n.addEventListener('click', linkAction));

// Restore active link on page load
restoreActiveLink();