<?php
// Incluir la conexión a la base de datos
include "../../parts/header.php";

$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verificar si se ha recibido la información del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Obtener los datos del formulario
  $id = $_POST["id"];
  $nombreCliente = $_POST["nombreCliente"];
  $nombreProducto = $_POST["nombreProducto"];
  $cantidadProducto = $_POST["cantidadProducto"];
  $precioProducto = $_POST["precioProducto"];
  $adelanto = $_POST["adelanto"];
  $direccion = $_POST["direccion"];
  $costoEnvio = $_POST["costoEnvio"];
  $nombreEncomendista = $_POST["nombreEncomendista"];
  $fechaRecibir = $_POST["fechaRecibir"];
  $fechaDeposito = $_POST["fechaDeposito"];
  $fechaRegistro = $_POST["fechaRegistro"];

  // Actualizar los datos en la tabla envios
  $sql = "UPDATE envios SET nombreCliente='$nombreCliente', nombreProducto='$nombreProducto', cantidadProducto='$cantidadProducto', precioProducto='$precioProducto', adelanto='$adelanto', direccion='$direccion', costoEnvio='$costoEnvio', nombreEncomendista='$nombreEncomendista', fechaRecibir='$fechaRecibir', fechaDeposito='$fechaDeposito', fechaRegistro='$fechaRegistro' WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "Los datos han sido actualizados exitosamente.";
    header('Location: index.php');
  } else {
    echo "Error al actualizar los datos: " . mysqli_error($conn);
  }
}
// Obtener los datos del envío a actualizar
$id = $_GET["id"];
$nombreCliente = $_GET["nombreCliente"];
$nombreProducto = $_GET["nombreProducto"];
$cantidadProducto = $_GET["cantidadProducto"];
$precioProducto = $_GET["precioProducto"];
$adelanto = $_GET["adelanto"];
$direccion = $_GET["direccion"];
$costoEnvio = $_GET["costoEnvio"];
$nombreEncomendista = $_GET["nombreEncomendista"];
$fechaRecibir = $_GET["fechaRecibir"];
$fechaDeposito = $_GET["fechaDeposito"];
$fechaRegistro = $_GET["fechaRegistro"];

?>
<div class="container">
  <h1>Editar envío</h1>
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group">
      <label for="nombreCliente">Nombre del cliente</label>
      <input type="text" class="form-control" name="nombreCliente" value="<?php echo $nombreCliente ?>">
    </div>
    <div class="form-group">
      <label for="nombreProducto">Nombre del producto</label>
      <input type="text" class="form-control" name="nombreProducto" value="<?php echo $nombreProducto ?>">
    </div>
    <div class="form-group">
      <label for="cantidadProducto">Cantidad del producto</label>
      <input type="number" class="form-control" name="cantidadProducto" value="<?php echo $cantidadProducto ?>">
    </div>
    <div class="form-group">
      <label for="precioProducto">Precio del producto</label>
      <input type="text" class="form-control" id="precioProducto" name="precioProducto" required  value="<?php echo $precioProducto; ?>">
    </div>

    <div class="form-group">
      <label for="adelanto">Adelanto</label>
      <input type="text" class="form-control" id="adelanto" name="adelanto" required  value="<?php echo $adelanto; ?>">
    </div>

    <div class="form-group">
      <label for="direccion">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" required  value="<?php echo $direccion; ?>">
    </div>

    <div class="form-group">
      <label for="costoEnvio">Costo del envío</label>
      <input type="text" class="form-control" id="costoEnvio" name="costoEnvio" required  value="<?php echo $costoEnvio; ?>">
    </div>

    <div class="form-group">
      <label for="nombreEncomendista">Nombre del encomendista</label>
      <input type="text" class="form-control" id="nombreEncomendista" name="nombreEncomendista" required  value="<?php echo $nombreEncomendista; ?>">
    </div>

    <div class="form-group">
      <label for="fechaRecibir">Fecha de recibir</label>
      <input type="date" class="form-control" id="fechaRecibir" name="fechaRecibir" required  value="<?php echo $fechaRecibir; ?>">
    </div>
    <div class="form-group">
      <label for="fechaRegistro">Fecha de Registro</label>
      <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" required  value="<?php echo $fechaRegistro; ?>">
    </div>

    <div class="form-group">
      <label for="fechaDeposito">Fecha de depósito</label>
      <input type="date" class="form-control" id="fechaDeposito" name="fechaDeposito" required  value="<?php echo $fechaDeposito; ?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>