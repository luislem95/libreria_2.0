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

// Consulta para obtener los datos de la tabla productos
$sql = "SELECT id, name FROM products";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

// Procesar el formulario de inserción de ventas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $cantidad = $_POST['cantidad'];
    $valorVenta = $_POST['valorVenta'];
    $fechaVenta = $_POST['fechaVenta'];

    // Obtener la cantidad actual del producto
    $sql = "SELECT cantidad FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al obtener la cantidad del producto: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $cantidad_actual = $row['cantidad'];

    // Verificar si hay suficientes productos para la venta
    if ($cantidad_actual < $cantidad) {
        die("No hay suficientes productos para la venta");
    }

    // Restar la cantidad vendida a la cantidad actual
    $cantidad_nueva = $cantidad_actual - $cantidad;

    // Actualizar la cantidad del producto en la tabla products
    $sql = "UPDATE products SET cantidad = '$cantidad_nueva' WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al actualizar la cantidad del producto: " . mysqli_error($conn));
    }

    // Insertar la venta en la tabla de ventas
    $sql = "INSERT INTO ventas (product_id,cantidad, valorVenta, fechaVenta) VALUES ('$product_id', '$cantidad', '$valorVenta', '$fechaVenta')";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error al insertar la venta: " . mysqli_error($conn));
    }

    // Redirigir al usuario a la página de ventas

   
}
?>

<div class="container">
    <h1>Nueva venta</h1>
    <form method="POST">
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="form-control" id="product_id" name="product_id">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad">
        </div>
        <div class="form-group">
            <label for="valorVenta">Valor de venta</label>
            <input type="text" class="form-control" id="valorVenta" name="valorVenta" pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <div class="form-group">
            <label for="fechaVenta">Fecha de venta</label>
            <input type="date" class="form-control" id="fechaVenta" name="fechaVenta">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<?php
// Cerrar la conexión
mysqli_close($conn);
?>

<?php include '../../parts/footer.php'; ?>
