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

// Consulta para obtener los datos de la tabla envios
$sql = "SELECT * FROM envios";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
}
?>
<div class="container">
    <h1>Tabla de Envios</h1>
    <table class="table table-striped table-hover bg-pink">
  <thead>
  <tr style="background-color: #A1217D; color: #fff;">
      <th>ID</th>
      <th>Nombre del Cliente</th>
      <th>Nombre del Producto</th>
      <th>Cantidad del Producto</th>
      <th>Precio del Producto</th>
      <th>Adelanto</th>
      <th>Dirección</th>
      <th>Costo del Envío</th>
      <th>Nombre del Encomendista</th>
      <th>Fecha de Recibir</th>
      <th>Fecha de Depósito</th>
      <th>Fecha de Registro</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr style="background-color: #FFA0E4; color: #333;">
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombreCliente']; ?></td>
        <td><?php echo $row['nombreProducto']; ?></td>
        <td><?php echo $row['cantidadProducto']; ?></td>
        <td><?php echo $row['precioProducto']; ?></td>
        <td><?php echo $row['adelanto']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td><?php echo $row['costoEnvio']; ?></td>
        <td><?php echo $row['nombreEncomendista']; ?></td>
        <td><?php echo $row['fechaRecibir']; ?></td>
        <td><?php echo $row['fechaDeposito']; ?></td>
        <td><?php echo $row['fechaRegistro']; ?></td>
        <td>
        <a href="Put.php?id=<?php echo $row['id']; ?>&nombreCliente=<?php echo $row['nombreCliente']; ?>&nombreProducto=<?php echo $row['nombreProducto']; ?>&cantidadProducto=<?php echo $row['cantidadProducto']; ?>&precioProducto=<?php echo $row['precioProducto']; ?>&adelanto=<?php echo $row['adelanto']; ?>&direccion=<?php echo $row['direccion']; ?>&costoEnvio=<?php echo $row['costoEnvio']; ?>&nombreEncomendista=<?php echo $row['nombreEncomendista']; ?>&fechaRecibir=<?php echo $row['fechaRecibir']; ?>&fechaDeposito=<?php echo $row['fechaDeposito']; ?>&fechaRegistro=<?php echo $row['fechaRegistro']; ?>" class="btn btn-primary">Editar</a>
        <a href="Delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Borrar</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php include './Post.php'; ?>
<br/>
<?php include '../../parts/footer.php'; ?>