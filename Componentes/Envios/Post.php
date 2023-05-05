<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $nombreProducto = $_POST['nombreProducto'];
    $cantidadProducto = $_POST['cantidadProducto'];
    $precioProducto = $_POST['precioProducto'];
    $adelanto = $_POST['adelanto'];
    $direccion = $_POST['direccion'];
    $costoEnvio = $_POST['costoEnvio'];
    $nombreEncomendista = $_POST['nombreEncomendista'];
    $fechaRecibir = $_POST['fechaRecibir'];
    $fechaRegistro = $_POST['fechaRegistro'];
    $fechaDeposito = $_POST['fechaDeposito'];

    // Consulta para insertar el nuevo envío en la tabla envios
    $sql = "INSERT INTO envios (nombreCliente, nombreProducto, cantidadProducto, precioProducto, adelanto, direccion, costoEnvio, nombreEncomendista, fechaRecibir, fechaRegistro, fechaDeposito) VALUES ('$nombreCliente', '$nombreProducto', $cantidadProducto, $precioProducto, $adelanto, '$direccion', $costoEnvio, '$nombreEncomendista', '$fechaRecibir', '$fechaRegistro', '$fechaDeposito')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error al insertar la envio: " . mysqli_error($conn));
    }

} 

?>

<div class="container">
    <h1>Agregar envío</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nombreCliente">Nombre del cliente:</label>
            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
        </div>
        <div class="form-group">
            <label for="nombreProducto">Nombre del producto:</label>
            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
        </div>
        <div class="form-group">
            <label for="cantidadProducto">Cantidad del producto:</label>
            <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" required>
        </div>
        <div class="form-group">
            <label for="precioProducto">Precio del producto:</label>
            <input type="text" class="form-control" id="precioProducto" name="precioProducto" required pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <div class="form-group">
            <label for="adelanto">Adelanto:</label>
            <input type="text" class="form-control" id="adelanto" name="adelanto" required pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección de envío:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="costoEnvio">Costo de envío:</label>
            <input type="text" class="form-control" id="costoEnvio" name="costoEnvio" required pattern="[0-9]+([\.|,][0-9]+)?">
        </div>
        <div class="form-group">
            <label for="nombreEncomendista">Nombre del encomendista:</label>
            <input type="text" class="form-control" id="nombreEncomendista" name="nombreEncomendista" required>
        </div>
        <div class="form-group">
            <label for="fechaRecibir">Fecha de recibir:</label>
            <input type="date" class="form-control" id="fechaRecibir" name="fechaRecibir" required>
        </div>
        <div class="form-group">
            <label for="fechaRegistro">Fecha de registro:</label>
            <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" required>
        </div>
        <div class="form-group">
            <label for="fechaDeposito">Fecha de depósito:</label>
            <input type="date" class="form-control" id="fechaDeposito" name="fechaDeposito" required>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
    </form>
</div>
<br/>
