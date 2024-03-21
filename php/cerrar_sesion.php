<?php

    session_start();
    session_destroy();
    header("location: ../Registro/inicio_sesion.html");

?>