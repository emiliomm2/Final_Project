<!--Subida de documentación-->
<?php

    session_start();

    include 'conexion_be.php';

$targetDir = "../uploads/"; //Carpeta donde se guardan
$email = $_SESSION['email']; //Comprueba el email de la sesión
$username = strstr($email,'@', true); //Se crea el usuario hasta el @ del correo
$fileName = basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDir . $username . "_" . $fileName; //Subida del archivo entre nombre archivo y nombre usuario
$uploadOk = 1; //Subida de archivo

$docExtensions = array('pdf', 'docx'); //Extensiones aceptadas


$extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//En caso de otro tipo de archivos
if (!in_array($extension, $docExtensions)) {
    echo "Lo siento, solo se permiten archivos PDF y DOCX.";
    $uploadOk = 0;
}

//En caso de archivo demasiado grande
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Lo siento, tu archivo es demasiado grande.";
    $uploadOk = 0;
}

//Archivo no cargado
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue cargado.";

} else {
    //Subido archivo correctamente
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo '
            <script>
                alert("Actividad subida correctamente")
                window.location = "../plataforma/plataforma.php";
            </script>
        ';
    } else {
        echo "Lo siento, hubo un error al cargar tu archivo.";
    }
}
?>

