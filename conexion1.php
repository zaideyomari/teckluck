<?php
// Datos de conexión
$host = 'localhost';  // Host, en este caso es 'localhost'
$dbname = 'teckluck1';  // Nombre de la base de datos actualizado
$username = 'root';  // Usuario de MySQL (en XAMPP por defecto es 'root')
$password = '';  // Contraseña de MySQL (en XAMPP por defecto está vacía)

// Intentamos conectar a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para manejar errores de forma más amigable
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
