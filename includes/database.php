<?php
$db = mysqli_connect('localhost', 'root', '', 'mymovielist_db');

// Validar conexión
if (!$db) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
} else {
    echo "Connected successfully to MySQL!";  // Mensaje que muestra si la conexión fue exitosa
}
?>
