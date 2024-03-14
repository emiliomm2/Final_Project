function mostrarEnlaces() {
    document.getElementById("mi-perfil").style.display = "inline";
    document.getElementById("cerrar-sesion").style.display = "inline";
};

document.addEventListener("click", function(event) {
    const target = event.target;
    const userImg = document.getElementById("user-img");
    if (target !== userImg) {
        document.getElementById("mi-perfil").style.display = "none";
        document.getElementById("cerrar-sesion").style.display = "none";
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var modoOscuroBoton = document.getElementById("cambio-modo");
    var mainNavigation = document.querySelector(".main_navigation");
    var backgroundImg = document.getElementById("background");

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
