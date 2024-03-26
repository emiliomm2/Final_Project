<?php
    $conexion = mysqli_connect("localhost","root", "", "usuarios_db");

    if (!$conexion) {
        echo 'No se ha podido conectar a la Base de Datos';
    }

    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $query = "INSERT INTO usuarios(nombre_completo, email, password) VALUES ('$nombre_completo', '$email', '$password')";

    $verificar_email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' ");

    if(mysqli_num_rows($verificar_email) > 0) {
        echo 'Este correo ya está registrado';
        exit();
    }
        
    $resultado = mysqli_query($conexion, $query);

    if ($resultado){
        echo "registro completado correctamente";
    } else{
        echo "error";
    }

?>