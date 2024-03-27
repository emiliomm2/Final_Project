<?php

    session_start();

    include 'conexion_be.php';

$targetDir = "../uploads/"; 
$email = $_SESSION['email'];
$username = strstr($email,'@', true);
$fileName = basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDir . $username . "_" . $fileName;
$uploadOk = 1;

$docExtensions = array('pdf', 'docx'); 


$extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


if (!in_array($extension, $docExtensions)) {
    echo "Lo siento, solo se permiten archivos PDF y DOCX.";
    $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Lo siento, tu archivo es demasiado grande.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue cargado.";

} else {
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

