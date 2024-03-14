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
                            <a href="plataforma.php">
                                <label><img src="../imagenes/inicio.png" class="icon"/> Inicio</label>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="aprender.php">
                                <label><img src="../imagenes/aprender.png" class="icon"/> Aprender</label>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="actividades.php">
                                <label><img src="../imagenes/actividades.png" class="icon"/> Actividades</label>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="notas.php">
                                <label><img src="../imagenes/notas.png" class="icon"/> Mis notas</label>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu_foot">
                        <li class="mode">
                            <a href="#" onclick="document.body.classList.toggle('dark-mode');setCookie('color_theme', document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode'); return false;">
                                <div class="toggle-mode">
                                    ::before
                                </div>
                                <div class="label">Modo Oscuro</div>
                            </a>
                        </li>
                    </ul>
            </nav>
            <div class="central_contenedor">
                <img class="background" src="../imagenes/light.png"/>
                <header class="site-header">
                    <form class="form-search" method="get">
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
                        <img loading="lazy" src="" alt="Imagen de perfil" class="user-img"/>
                        <a href="">Mi perfil</a>
                        <button><a href="../php/cerrar_sesion.php">Cerrar sesión</a></button>
                    </form>
                    
                </header>
                <div class="titulo">
                    <h1>Bienvenido <?php echo "$username";?></h1>
                </div>
                <div class="sigue_aprendiendo">
                    <h3>Sigue aprendiendo</h3>
                    <br>
                    <a class="video">
                        <iframe src="../videos/video1.mp4" frameborder="0" allowfullscreen data-ready="true"></iframe>
                        <p class="titulo_video"></p>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>