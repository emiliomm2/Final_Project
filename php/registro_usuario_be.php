<!--Registro-->
<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);//Algoritmo de seguridad

    $query = "INSERT INTO usuarios(nombre_completo, email, password) VALUES ('$nombre_completo', '$email', '$password')";

    $verificar_email = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' ");

    if(mysqli_num_rows($verificar_email) > 0) {
        //Si hay alguna fila con el email registrado, no deja registrar y devuelve a la página
        echo '
            <script>
                alert("Este correo ya está registrado, inténtalo con otro diferente");
                window.location = "../Registro/registro.html";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query); //Si resultado = true, ingreso en la base de datos
    
    if($ejecutar) {
        //Si todo correcto, registro completado e ingreso en la base de datos
        echo '
            <script>
                window.location = "../Registro/registro_completado.html";
            </script>
        ';
    } else{
        echo '
            <script>
                alert("Intentelo de nuevo, usuario no almacenado");
                window.location = "../Registro/registro.html";
            </script>
        ';
    }

    mysqli_close($conexion);
?>