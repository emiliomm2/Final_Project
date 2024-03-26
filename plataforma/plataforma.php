<?php

    session_start();

    if (!isset($_SESSION['email'])){
        echo '
            <script>
                alert("Debes iniciar sesión");
                window.location = "../Registro/inicio_sesion.html"; 
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
            <nav class="main_navigation">
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
                        <a href="#" class="enlace" id="inicio-link">
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
            <div class="central_contenedor">
                <img class="background" id="background" src="../imagenes/light.png"/>
                <header class="site-header">
                    <form class="form-search" id="form-search" method="get">
                        <label>
                        <img class="icon" src="../imagenes/lupa.png"/>
                                <input type="text" id="header-search-input" class="autoComplete" dir="ltr" spellcheck="false" autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="1000" tabindex="1" placeholder="Buscar" aria-controls="autoComplete_list_1" aria-autocomplete="both" aria-activedescendant>
                                <ul id="autoComplete_list_1" role="listbox" class="autoComplete_list" hidden>
                                    <li></li>
                                </ul>
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=""><img src="../imagenes/mensajes.png" class="icon"/></a>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=""><img src="../imagenes/alertas.png" class="icon"/></a>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;
                            <img src="../imagenes/planta.png" class="user-img" id="user-img"/>
                            <br>
                            <a href="" class="hidden" id="perfil-link">Mi perfil</a>
                            <br>
                            <a href="../php/cerrar_sesion.php" class="hidden" id="cerrar-sesion-btn">Cerrar sesión</a>
                    </form>
                    
                </header>
                <div class="titulo">
                    <h1>Bienvenido <?php echo "$username";?></h1>
                </div>
                <div class="sigue_aprendiendo">
                    <div class="inicio" class="seccion">
                        <h3>Bienvenido a CodeStudy</h3>
                        <h3>Es el momento de aprender a programar</h3>
                        <br>
                        <a class="video">
                            <iframe src="../videos/video_introduccion.mp4" frameborder="0" allowfullscreen data-ready="true"></iframe>
                            <p class="titulo_video"></p>
                        </a>
                    </div>
                    <div id="aprender" class="seccion">
                        <iframe src="../videos/video_introduccion.mp4"frameborder="0"allowfullscreen data-ready="true"></iframe>
                    </div>
                    <div id="actividades" class="seccion">
                        <p>Actividad número 1</p>
                    </div>
                    <div id="notas" class="seccion">
                        <p>Aquí puedes tomar notas para un futuro</p>
                    </div>
                    <div id="perfil" class="seccion">
                    <img src="../imagenes/planta.png" class="user-img" id="cambio-foto-perfil"/>
                    <p><?php echo "$username";?></p>
                    </div>
                </div>
                
            </div>
        </div>
        <script src="./plataforma.js"></script>
    </body>
</html>