<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Comprobar si el formulario fue enviado
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
            $mensaje_exito = "¡Felicidades! Te registraste exitosamente.";
        } else {
            $mensaje_error = "¡Uy! Algo salió mal, vuelve a intentarlo más tarde.";
        }
    } else {
        $mensaje_error = "Por favor, completa todos los campos.";
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro | Tienda de Ropa</title>
    <style>
        /* Estilos generales y mensaje de éxito/error (ver código anterior) */
        /* Puedes reutilizar el CSS que ya tienes aquí. */
    </style>
</head>
<body>

    <div class="form-container">
        <h2>¡Bienvenido a nuestra Tienda de Ropa!</h2>
        <p style="text-align:center; font-size: 16px;">Por favor, ingresa tu nombre y correo electrónico para recibir ofertas exclusivas y novedades de nuestra tienda.</p>

        <form action="enviar.php" method="POST">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="Tu correo electrónico">

            <button type="submit">Enviar</button>
        </form>

        <!-- Mostrar mensaje de éxito o error -->
        <?php
            if (isset($mensaje_exito)) {
                echo "<div class='mensaje mensaje-exito'>
                        <div class='icono exito'></div>
                        <span>$mensaje_exito</span>
                      </div>";
            }
            if (isset($mensaje_error)) {
                echo "<div class='mensaje mensaje-error'>
                        <div class='icono error'></div>
                        <span>$mensaje_error</span>
                      </div>";
            }
        ?>
    </div>

</body>
</html>
