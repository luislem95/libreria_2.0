<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verificar si se han pasado los parámetros de la URL
if (isset($_GET['id'])) {
    // Obtener los datos del producto a editar
    $id = $_GET['id'];
} else {
    // Si no se han pasado los parámetros, redirigir al usuario a index.php
    header("Location: index.php");
}


    // Consulta para actualizar el producto en la tabla products
    $sql = "Delete FROM  ventas WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php");

?>

