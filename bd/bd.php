<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener los datos de la tabla products
$sql = "SELECT id, name, cantidad, suggestedPrice FROM products";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

// Cerrar la conexión
mysqli_close($conn);

?>

