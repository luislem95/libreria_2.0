<?php include '../../parts/header.php'; ?>
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

// Verificar si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $cantidad = $_POST['cantidad'];
    $valorVenta = $_POST['valorVenta'];
    $fechaVenta = $_POST['fechaVenta'];

    // Consulta para actualizar los datos de la venta
    $sql = "UPDATE ventas SET product_id = $product_id, cantidad = $cantidad, valorVenta = $valorVenta, fechaVenta = '$fechaVenta' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al ejecutar la consulta: " . mysqli_error($conn));
    }

    // Redirigir a la página principal
    header("Location: index.php");
    exit();
}

// Consulta para obtener los datos de la venta a editar
$id = $_GET['id'];
$sql = "SELECT ventas.id, ventas.product_id, products.name AS nombreProducto, products.costo, ventas.cantidad, ventas.valorVenta, ventas.fechaVenta FROM ventas INNER JOIN products ON ventas.product_id = products.id WHERE ventas.id = $id";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

// Obtener los datos de la venta a editar
$row = mysqli_fetch_assoc($result);
$nombreProducto = $row['nombreProducto'];
$cantidad = $row['cantidad'];
$valorVenta = $row['valorVenta'];
$fechaVenta = $row['fechaVenta'];
?>

<div class="container">
    <h1>Editar venta</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nombreProducto">Nombre del producto</label>
            <select class="form-control" id="nombreProducto" name="product_id">
            <?php
// Consulta para obtener los nombres de los productos
$sql = "SELECT id, name FROM products";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

// Mostrar los nombres de los productos en un menú desplegable
while ($row = mysqli_fetch_assoc($result)):
    $selected = ($row['prducts.id'] == $row['product_id']) ? 'selected' : '';

?>
    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
<?php endwhile;?>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
        </div>
        <div class="form-group">
            <label for="valorVenta">Valor de venta</label>
            <input type="number" class="form-control" id="valorVenta" name="valorVenta" value="<?php echo $valorVenta; ?>">
        </div>
        <div class="form-group">
            <label for="fechaVenta">Fecha de venta</label>
            <input type="date" class="form-control" id="fechaVenta" name="fechaVenta" value="<?php echo $fechaVenta; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>

<?php include '../../parts/footer.php'; ?>
