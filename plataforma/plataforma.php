<!--Comprobación de la sesión para obtener nombre de usuario,
comprobar el tiempo en sesión (max 1h) y si se accede directo
a la página, no deja por no iniciar sesión-->
<?php

    session_start();

    if (!isset($_SESSION['email'])){
        echo '
            <script>
                alert("Debes iniciar sesión");
                window.location = "../Registro/inicio_sesion.html"
            </script>
        ';
        session_destroy();
        die();
    };

    $email = $_SESSION['email'];
    $username = strstr($email,'@', true);
    $username = ucfirst($username);

    define ('MAX_SESSION_TIEMPO', 3600 * 1);
    if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && (time() - $_SESSION['ULTIMA_ACTIVIDAD'] > MAX_SESSION_TIEMPO)) {
        session_destroy();
        die();
    };

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CodeStudy - Plataforma</title>
        <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../imagenes/favicon.ico" type="image/x-icon">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="contenedor">
            <nav class="main_navigation"><!--Menú principal-->
                <ul class="main_menu">
                    <li><a href="plataforma.php"><img src="../imagenes/Logo.png" class="logo"/></a></li>
                    <li>
                        <a href="#" class="enlace" id="inicio-link">
                            <img src="../imagenes/inicio.png" class="icon"/> Inicio
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="#" class="enlace" id="aprender-link">
                            <img src="../imagenes/aprender.png" class="icon"/> Aprender
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="#" class="enlace" id="actividades-link">
                            <img src="../imagenes/actividades.png" class="icon"/> Actividades
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="#" class="enlace" id="notas-link">
                            <img src="../imagenes/notas.png" class="icon"/> Mis notas
                        </a>
                    </li>
                    <br><br><br>
                    <li>
                        <p id="cambio-modo" class="cambio-modo">Modo oscuro</p>
                    </li>
                </ul>
            </nav>
            <br><br><br>
            <div class="central_contenedor"><!--Contenedor central con distintas secciones-->
                <img class="background" id="background" src="../imagenes/light.png"/><!--Imagen de perfil-->
                <header class="site-header" id="site-header">
                <img src="../imagenes/planta.png" class="user-img" id="user-img"/>
                            <br>
                            <a href="#" class="hidden" id="perfil-link">Mi perfil</a>
                            <br>
                            <a href="../php/cerrar_sesion.php" class="hidden" id="cerrar-sesion-btn">Cerrar sesión</a><!--Posibilidad de cerrar sesión-->
                    
                    
                </header>
                <div class="titulo">
                    <h1>Bienvenido <?php echo "$username";?></h1><!--Extracción de nombre de usuario-->
                </div>
                <div class="sigue_aprendiendo">
                    <div id="inicio" class="seccion">
                        <h3>Bienvenido a CodeStudy</h3>
                        <h3>Es el momento de aprender a programar</h3>
                        <br>
                        <a class="video">
                            <iframe src="../videos/video_introduccion.mp4" frameborder="0" allowfullscreen data-ready="true" sandbox></iframe>
                            <p class="titulo_video"></p>
                        </a>
                    </div>
                    <div id="aprender" class="seccion"><!--Sección aprender con diversas ventanas de videos-->
                        <div id="menu-videos">
                            <button class="videos" onclick="mostrarVideo('video1')">Video 1</button>
                            <button class="videos" onclick="mostrarVideo('video2')">Video 2</button>
                            <button class="videos" onclick="mostrarVideo('video3')">Video 3</button>
                        </div>
                        <div id="contenedor-videos">
                            <div id="video1" class="video-contenedor">
                                <video width="480" height="320" controls>
                                    <source src="../videos/Video1.mp4" type="video/mp4"/>
                                </video>
                                <br>
                                <h3>Clase de prueba 1</h3>
                                <p>Este es el primer vídeo de prueba,</p> <p>donde se podría poner texto si se quisiera</p>
                            </div>
                            <div id="video2" class="video-contenedor" style="display: none;">
                                <video width="480" height="320" controls>
                                    <source src="../videos/Video2.mp4" type="video/mp4"/>
                                </video>
                                <br>
                                <h3>Clase de prueba 2</h3>
                            </div>
                            <div id="video3" class="video-contenedor" style="display: none;">
                                <video width="480" height="320" controls>
                                    <source src="../videos/Video3.mp4" type="video/mp4"/>
                                </video>
                                <br>
                                <h3>Clase de prueba 3</h3>
                            </div>
                        </div>
                    </div>
                    <div id="actividades" class="seccion"><!--Sección de actividades para subirlas-->
                        <h3>Actividad número 1</h3>
                        <a href="../actividades/actividad1.pdf" download="Actividad1">
                            <img src="../imagenes/actividad1.png" width="50" height="50"/>
                        </a>
                        <form id="uploadForm" action="../php/uploads.php" method="post" enctype="multipart/form-data"><!--Subida de la actividad1-->
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Subir archivo" name="submit">
                        </form>
                        <br><br><br>
                        <h3>Actividad número 2</h3>
                        <a href="../actividades/actividad1.pdf" download="Actividad2">
                            <img src="../imagenes/actividad1.png" width="50" height="50"/>
                        </a>
                        <form id="uploadForm" action="../php/uploads.php" method="post" enctype="multipart/form-data"><!--Subida de la actividad2-->
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Subir archivo" name="submit">
                        </form>
                    </div>
                    <div id="notas" class="seccion"><!--Sección de notas-->
                        <p>Aquí puedes tomar tus notas</p>
                        <textarea id="texto-notas" rows="10" cols="50"></textarea><br>
                        <button id="descargar-notas">Guardar</button>
                    </div>
                    <div id="perfil" class="seccion">
                    <img src="../imagenes/planta.png" class="user-img" id="cambio-foto-perfil"/>
                    <select id="opcion-foto-perfil">
                        <option value="planta.png">Planta</option>
                        <option value="hombre.png">Hombre</option>
                        <option value="mujer.png">Mujer</option>
                        <option value="personalizada">Subir imagen personalizada</option>
                    </select>
                    <input type="file" id="nueva-foto-perfil" style="display: none;">
                    <button id="boton-guardar-foto">Guardar</button>
                    <p><?php echo "$username";?></p>
                    <p><?php echo "$email";?></p>
                    <p class="frase-celebre">Cuando las cosas se pongan difíciles, recuerda que el<br> crecimiento ocurre fuera de la zona de confort.</p>
                    <a href="../php/cerrar_sesion.php"><button>Cerrar sesión</button></a><!--Cierre de sesion en el perfil-->
                    </div>
                </div>
                
            </div>
        </div>
        <script src="./plataforma.js"></script>
    </body>
</html>