<?php
include 'conexion.php'; // Incluye el archivo de conexión

// Obtener los valores enviados desde el formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Validar que los campos no estén vacíos
if (!empty($nombre) && !empty($email)) {
    // Preparar la sentencia SQL para insertar datos
    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

    // Ejecutar la consulta e insertar los datos
    if ($conn->query($sql) === TRUE) {
        echo "<div class='mensaje-exito'>Datos insertados correctamente</div>";
    } else {
        echo "<div class='mensaje-error'>Error: " . $conn->error . "</div>";
    }
} else {
    echo "<div class='mensaje-error'>Por favor, completa todos los campos.</div>";
}

// Cerrar la conexión
$conn->close();
?>
