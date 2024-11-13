<?php
// Datos de conexión a la base de datos
$servername = "localhost";  // El servidor de base de datos (localhost para XAMPP)
$username = "root";         // El usuario predeterminado de XAMPP
$password = "";             // La contraseña está vacía por defecto en XAMPP
$dbname = "teckluck";       // Nombre de la base de datos correcta

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// echo "Conexión exitosa"; // Puedes descomentar esto para probar la conexión
?>
