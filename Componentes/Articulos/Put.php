<?php include '../../parts/header.php'; ?>

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
    $name = $_GET['name'];
    $cantidad = $_GET['cantidad'];
    $costo = $_GET['costo'];
    $suggestedPrice = $_GET['suggestedPrice'];
} else {
    // Si no se han pasado los parámetros, redirigir al usuario a index.php
    header("Location: index.php");
}

// Procesar el formulario
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $suggestedPrice = $_POST['suggestedPrice'];

    // Consulta para actualizar el producto en la tabla products
    $sql = "UPDATE products SET name='$name', cantidad=$cantidad, costo=$costo, suggestedPrice=$suggestedPrice WHERE id=$id";
    $result = mysqli_query($conn, $sql);
     header("Location: index.php");
}
?>

<div class="container">
    <h1>Editar producto</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" required pattern="[0-9]+([\.|,][0-9]+)?" value="<?php echo $cantidad; ?>">
        </div>
        <div class="form-group">
            <label for="costo">Costo:</label>
            <input type="text" class="form-control" id="costo" name="costo" required pattern="[0-9]+([\.|,][0-9]+)?" value="<?php echo $costo; ?>">
        </div>
        <div class="form-group">
            <label for="suggestedPrice">Precio sugerido:</label>
            <input type="text" class="form-control" id="suggestedPrice" name="suggestedPrice" required pattern="[0-9]+([\.|,][0-9]+)?" value="<?php echo $suggestedPrice; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Guardar cambios</button>
    </form>
</div>

<?php include '../../parts/footer.php'; ?>
