<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Inicializar el array para la respuesta
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($email)) {
        // Preparar la sentencia SQL para insertar los datos
        $sql = "INSERT INTO usuarios (nombre, email, fecha_registro) 
                VALUES ('$nombre', '$email', NOW())";

        // Ejecutar la consulta e insertar los datos
        if ($conn->query($sql) === TRUE) {
            // Si la inserción es exitosa
            $response['status'] = 'success';
            $response['message'] = '¡Felicidades! Te registraste exitosamente.';
        } else {
            // Si hay un error en la consulta
            $response['status'] = 'error';
            $response['message'] = 'Error al registrar. Por favor, inténtalo nuevamente.';
        }
    } else {
        // Si los campos están vacíos
        $response['status'] = 'error';
        $response['message'] = 'Por favor, completa todos los campos.';
    }

    // Cerrar la conexión
    $conn->close();

    // Devolver la respuesta como JSON
    echo json_encode($response);
}
?>
