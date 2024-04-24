<!--Validación del login-->
<?php

    session_start();

    include 'conexion_be.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);//Algoritmo de seguridad

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and password='$password' ");

    if(mysqli_num_rows($validar_login) > 0){
        //Si la validación tiene alguna fila, entra en plataforma
        $_SESSION['email'] = $email;
        echo '
            <script>
                window.location = "../plataforma/plataforma.php";
            </script>
        ';
        exit();
    }else{
        //Si la validación no tiene alguna fila, mensaje de error y de vuelta a la pantalla actual
        echo '
            <script>
                alert("Usuario o contraseña incorrectos");
                window.location = "../Registro/inicio_sesion.html";
            </script>
        ';
    }
?>
