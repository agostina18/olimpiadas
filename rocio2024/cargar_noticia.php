<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Cambia esto por tu usuario de la base de datos
$password = "";  // Cambia esto por tu contraseña de la base de datos
$dbname = "noticias_db";  // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha'];

// Insertar la noticia en la base de datos
$sql = "INSERT INTO noticias (titulo, contenido, fecha) 
        VALUES ('$titulo', '$contenido', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Noticia cargada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
