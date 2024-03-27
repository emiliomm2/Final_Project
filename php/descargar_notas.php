<?php
    $nombreArchivo = 'notas.txt'; 
    $rutaArchivo = '../notas/' . $nombreArchivo; 


    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
    readfile($rutaArchivo);
?>
