<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
        $contenido = $_POST['contenido'];
        $nombreArchivo = 'notas.txt'; 
        $rutaArchivo = '../notas/' . $nombreArchivo; 


        file_put_contents($rutaArchivo, $contenido);


        echo 'Guardado exitoso';
    } else {
        echo 'Error al procesar la solicitud';
    }
?>
