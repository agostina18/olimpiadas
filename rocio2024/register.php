<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Cambia esto por tu usuario de la base de datos
$password = "";  // Cambia esto por tu contraseña de la base de datos
$dbname = "olimpiadas";  // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$escuela = $_POST['escuela'];
$actividad = $_POST['actividad'];

// Insertar datos en la base de datos
$sql = "INSERT INTO alumnos (nombre, apellido, fecha_nacimiento, escuela, actividad) 
        VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$escuela', '$actividad')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
