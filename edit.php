<?php
    include("db.php");
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM product WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $producto = $row['producto'];
            $referencia =$row['referencia'];
            $precio =$row['precio'];
            $peso =$row['peso'];
            $categoria =$row['categoria'];
            $stock =$row['stock'];
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $producto = $_POST['producto'];
        $referencia = $_POST['referencia'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stock'];
        $query = "UPDATE product set producto = '$producto', referencia = '$referencia', precio = '$precio', peso = '$peso', categoria = '$categoria', stock = '$stock' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'El producto se actualizo con exito';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
        
     #ne
function realizar_venta($id, $cantidad) {
    session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_prueba'
);
    $query = "SELECT product FROM producto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $stock = $row['product'];
    if ($stock < $cantidad) {
        echo "No hay suficiente stock para realizar la venta.";
        return;
    }
    $nuevo_stock = $stock - $cantidad;
    $query = "UPDATE productos SET stock=$nuevo_stock WHERE id=$id";
    mysqli_query($conn, $query);
    $fecha = date('Y-m-d');
    $query = "INSERT INTO product (id, cantidad, fecha) 
              VALUES ($id, $cantidad, '$fecha')";
    mysqli_query($conn, $query);
}

 ?>

<?php include("<includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="producto" value="<?php echo $producto; ?>"
                        class="form-control" placeholder="Actualizar Producto">
                    </div>
                    <div class="form-group">
                        <input type="int" name="referencia" value="<?php echo $referencia; ?>"
                        class="form-control" placeholder="Actualizar referencia"> 
                    </div>
                    <div class="form-group">
                        <input type="int" name="precio" value="<?php echo $precio; ?>"
                        class="form-control" placeholder="Actualizar precio"> 
                    </div>
                    <div class="form-group">
                        <input type="int" name="peso" value="<?php echo $peso; ?>"
                        class="form-control" placeholder="Actualizar peso"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="categoria" value="<?php echo $categoria; ?>"
                        class="form-control" placeholder="Actualizar categoria">
                    </div>
                    <div class="form-group">
                        <input type="int" name="stock" value="<?php echo $stock; ?>"
                        class="form-control" placeholder="Actualizar stock">
                    </div>
                    
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php include("<includes/footer.php") ?>