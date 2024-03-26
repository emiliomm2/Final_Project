document.addEventListener("DOMContentLoaded", function() {
    var modoOscuroBoton = document.getElementById("cambio-modo");
    var mainNavigation = document.querySelector(".main_navigation");
    var backgroundImg = document.getElementById("background");
    const enlaces = document.querySelectorAll('.enlace');
    const secciones = document.querySelectorAll('.seccion');
    
    enlaces.forEach(function(enlace) {
        enlace.addEventListener('click', function(e) {
            e.preventDefault();
            const seccionId = this.getAttribute('href').substring(1);
            mostrarSeccion(seccionId);
        });
    });
    
    function mostrarSeccion(id) {
        secciones.forEach(function(seccion) {
            seccion.classList.remove('mostrar');
        });
        const seccionMostrar = document.getElementById(id);
        seccionMostrar.classList.add('mostrar');
    }

    modoOscuroBoton.addEventListener("click", function() {
        
        if (modoOscuroBoton.textContent === "Modo oscuro") {
            modoOscuroBoton.textContent = "Modo claro";
            mainNavigation.classList.add("modo-oscuro");
            backgroundImg.src = "../imagenes/dark.png"; 
        } else {
            modoOscuroBoton.textContent = "Modo oscuro";
            mainNavigation.classList.remove("modo-oscuro");
            backgroundImg.src = "../imagenes/light.png"; 
        }
    });
});

const userImg = document.getElementById('user-img');
const perfilLink = document.getElementById('perfil-link');
const cerrarSesionBtn = document.getElementById('cerrar-sesion-btn');
const formulario = document.getElementById('form-search');


userImg.addEventListener('click', () => {
    
    perfilLink.classList.remove('hidden');
    cerrarSesionBtn.classList.remove('hidden');
});


formulario.addEventListener('mouseleave', () => {
    
    perfilLink.classList.add('hidden');
    cerrarSesionBtn.classList.add('hidden');
});


