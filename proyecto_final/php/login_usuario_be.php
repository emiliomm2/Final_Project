<?php

    session_start();

    include 'conexion_be.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and password='$password' ");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['email'] = $email;
        echo '
            <script>
                window.location = "../plataforma/plataforma.php";
            </script>
        ';
        exit();
    }else{
        echo '
            <script>
                alert("Usuario o contraseña incorrectos");
                window.location = "../Registro/inicio_sesion.html";
            </script>
        ';
    }
?>
