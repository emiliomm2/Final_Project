<!--Conexión de la aplicación de Android Studio-->
<?php
    $conexion = mysqli_connect("localhost","root", "", "usuarios_db");

    if (!$conexion) {
        echo 'No se ha podido conectar a la Base de Datos';
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);//Algoritmo de seguridad

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' and password='$password' ");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['email'] = $email;
        echo "Ingreso correctamente";
        exit();
    }else{
        echo "Usuario o contraseña incorrectos";
    }

?>