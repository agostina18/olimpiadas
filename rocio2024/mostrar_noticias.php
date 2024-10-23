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

// Obtener las noticias de la base de datos
$sql = "SELECT titulo, contenido, fecha FROM noticias ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias Actualizadas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="news-container">
        <h2>Noticias Recientes</h2>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar cada noticia
            while($row = $result->fetch_assoc()) {
                echo "<div class='noticia'>";
                echo "<h3>" . $row["titulo"] . "</h3>";
                echo "<p>" . $row["contenido"] . "</p>";
                echo "<small>Fecha: " . $row["fecha"] . "</small>";
                echo "</div>";
            }
        } else {
            echo "No hay noticias disponibles.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
