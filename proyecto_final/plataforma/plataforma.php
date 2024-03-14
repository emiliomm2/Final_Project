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
                        <br><br><br>
                        <li>
                            <button id="cambio-modo">Modo oscuro</button>
                        </li>
                    </ul>
            </nav>
            <br><br><br>
            <div class="central_contenedor">
                <img class="background" id="background" src="../imagenes/light.png"/>
                <header class="site-header">
                    <form class="form-search" method="get">
                        <label>
                        <img class="icon" src="../imagenes/lupa.png"/>
                                <input type="text" id="header-search-input" class="autoComplete" dir="ltr" spellcheck="false" autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="1000" tabindex="1" placeholder="Buscar" aria-controls="autoComplete_list_1" aria-autocomplete="both" aria-activedescendant>
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=""><img src="../imagenes/mensajes.png" class="icon"/></a>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href=""><img src="../imagenes/alertas.png" class="icon"/></a>
                    </form>     
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="user-img-container">
                        <img src="../imagenes/planta.png" class="user-img" id="user-img" onclick="mostrarEnlaces()"/>
                        <a href="" class="enlaces" id="mi-perfil">Mi perfil</a></option>
                        <a href="../php/cerrar_sesion.php" class="enlaces" id="cerrar-sesion">Cerrar sesión</a>
                    </div>
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
        <script src="plataforma.js"></script>
    </body>
</html>