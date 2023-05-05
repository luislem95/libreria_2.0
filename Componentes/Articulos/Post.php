<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $suggestedPrice = $_POST['suggestedPrice'];

    // Consulta para insertar el nuevo producto en la tabla products
    $sql = "INSERT INTO products (name, cantidad,costo, suggestedPrice) VALUES ('$name', $cantidad,$costo, $suggestedPrice)";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php");
} 


// Redirigir al usuario de vuelta a post.php
?>

<div class="container">
    <h1>Agregar producto</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required >
        </div>
        <div class="form-group">
            <label for="costo">Costo :</label>
            <input type="text" class="form-control" id="costo" name="costo" required pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <div class="form-group">
            <label for="suggestedPrice">Precio sugerido:</label>
            <input type="text" class="form-control" id="suggestedPrice" name="suggestedPrice" required pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
    </form>
</div>

<?php include '../../parts/footer.php'; ?>



