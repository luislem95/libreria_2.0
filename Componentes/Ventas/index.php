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

// Consulta para obtener los datos de la tabla ventas
$sql = "SELECT ventas.id, products.name AS nombreProducto, products.costo, ventas.cantidad, ventas.valorVenta, ventas.fechaVenta FROM ventas INNER JOIN products ON ventas.product_id = products.id";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}
?>

<div class="container">
    <h1>Tabla de ventas</h1>

    <table class="table table-striped table-hover bg-pink">
        <thead class="">
        <tr style="background-color: #A1217D; color: #fff;">
                <th>ID</th>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Valor de venta</th>
                <th>Ganancia</th>
                <th>Ganancia - Costo</th>
                <th>Fecha de venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $gananciaTotal = 0;
            $gananciaNetaTotal = 0;
            while ($row = mysqli_fetch_assoc($result)):
                $ganancia = $row['valorVenta'] * $row['cantidad'];
                $gananciaNeta = $ganancia - ($row['cantidad'] * $row['costo']);
                $gananciaTotal += $ganancia;
                $gananciaNetaTotal += $gananciaNeta;
            ?>
                <tr style="background-color: #FFA0E4; color: #333;">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombreProducto']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['valorVenta']; ?></td>
                    <td><?php echo $ganancia; ?></td>
                    <td><?php echo $gananciaNeta; ?></td>
                    <td><?php echo $row['fechaVenta']; ?></td>
                    <td>
                    <a href="Put.php?id=<?php echo $row['id']; ?>&nombreProducto=<?php echo $row['nombreProducto']; ?>&cantidad=<?php echo $row['cantidad']; ?>&valorVenta=<?php echo $row['valorVenta']; ?>&fechaVenta=<?php echo $row['fechaVenta']; ?>" class="btn btn-primary">Editar</a>
                    <a href="Delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td><?php echo $gananciaTotal; ?></td>
                <td><?php echo $gananciaNetaTotal; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<?php include './Post.php'; ?>
<br/>
<?php include '../../parts/footer.php'; ?>

