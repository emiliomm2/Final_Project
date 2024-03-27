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

    function mostrarSeccion(id) {
        const secciones = document.getElementsByClassName('seccion');
        for (var i = 0; i < secciones.length; i++){
            secciones[i].style.display='none';
        }
        document.getElementById(id).style.display = 'block';
    }
    
    document.getElementById('inicio-link').addEventListener('click', function() {
        mostrarSeccion('inicio');
    });
    
    document.getElementById('aprender-link').addEventListener('click', function() {
        mostrarSeccion('aprender');
    });
    
    document.getElementById('actividades-link').addEventListener('click', function() {
        mostrarSeccion('actividades');
    });
    
    document.getElementById('notas-link').addEventListener('click', function() {
        mostrarSeccion('notas');
    });
    
    document.getElementById('perfil-link').addEventListener('click', function() {
        mostrarSeccion('perfil');
    });
    
    const userImg = document.getElementById('user-img');
    const perfilLink = document.getElementById('perfil-link');
    const cerrarSesionBtn = document.getElementById('cerrar-sesion-btn');
    const header = document.getElementById('site-header');
    
    
    userImg.addEventListener('click', () => {
        
        perfilLink.classList.remove('hidden');
        cerrarSesionBtn.classList.remove('hidden');
    });
    
    
    header.addEventListener('mouseleave', () => {
        
        perfilLink.classList.add('hidden');
        cerrarSesionBtn.classList.add('hidden');
    });

    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        var fileInput = document.getElementById('fileToUpload');
        if (fileInput.files.length === 0) {
            alert('Por favor seleccione un archivo.');
            event.preventDefault();
        }
    });

    document.getElementById('descargar-notas').addEventListener('click', function() {
        var contenido = document.getElementById('texto-notas').value;
        descargarNotas(contenido);
    });

    function descargarNotas(contenido) {
        var blob = new Blob([contenido], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'notas.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    };

    document.getElementById('opcion-foto-perfil').addEventListener('change', function(event) {
        var seleccion = event.target.value;
        
        
        if (seleccion === 'personalizada') {
            document.getElementById('nueva-foto-perfil').style.display = 'block';
        } else {
            
            document.getElementById('nueva-foto-perfil').style.display = 'none';
            
            document.getElementById('cambio-foto-perfil').src = '../imagenes/' + seleccion;
            document.getElementById('user-img').src = '../imagenes/' + seleccion;
        }
    });

    
    document.getElementById('nueva-foto-perfil').addEventListener('change', function(event) {
        
        var archivo = event.target.files[0];
        
        
        var url = URL.createObjectURL(archivo);
        
        
        document.getElementById('cambio-foto-perfil').src = url;
        document.getElementById('user-img').src = url;
    });
    
});
function mostrarVideo(id) {
        
    var videos = document.getElementsByClassName('video-contenedor');
    
    
    for (var i = 0; i < videos.length; i++) {
        videos[i].style.display = 'none';
    }

    
    document.getElementById(id).style.display = 'block';
}





