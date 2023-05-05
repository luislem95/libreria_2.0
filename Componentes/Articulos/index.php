<?php include '../../parts/header.php'; ?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "libreria";

// Conexión a la base de datos
$conn = mysqli_connect($host, $user, $password, $dbname);

// Obtener el número total de filas en la tabla products
$sql = "SELECT COUNT(*) AS count FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

// Obtener el número de filas a mostrar por página
$limit = 5;

// Obtener el número de páginas
$pages = ceil($count / $limit);

// Obtener la página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcular el offset
$offset = ($page - 1) * $limit;

// Consulta para obtener las filas de la tabla products
$sql = "SELECT * FROM products LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <h1>Tabla de productos</h1>
    <table class="table table-striped table-hover bg-pink">
        <thead >
        
            <tr style="background-color: #A1217D; color: #fff;">
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Costo</th>
                <th>Precio sugerido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr style="background-color: #FFA0E4; color: #333;">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['costo']; ?></td>
                    <td><?php echo $row['suggestedPrice']; ?></td>
                    <td>
                    <a href="Put.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&cantidad=<?php echo $row['cantidad']; ?>&costo=<?php echo $row['costo']; ?>&suggestedPrice=<?php echo $row['suggestedPrice']; ?>" class="btn btn-primary">Editar</a>
                    <a href="Delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php if ($pages > 1): ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php if ($page < $pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
                <?php include './Post.php'; ?>
            
                <br/>
    <?php include '../../parts/footer.php'; ?>
