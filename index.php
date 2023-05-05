<?php include("db.php")?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

    <div class="col-md-4">

        <?php if(isset($_SESSION['message'])) {?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <?php session_unset();}?>
        <div class="card card-body">
            <form action="save_product.php" method="POST">
                <div class="form-group">
                    <input type="text" name="producto" class="form-control" placeholder="Producto" autofocus>
                </div>
                <div class="form-group">
                    <input type="int" name="referencia" class="form-control" placeholder="Referencia" autofocus>
                </div>
                <div class="form-group">
                    <input type="int" name="precio" class="form-control" placeholder="Precio" autofocus>
                </div>
                <div class="form-group">
                    <input type="int" name="peso" class="form-control" placeholder="Peso" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="categoria" class="form-control" placeholder="Categoria" autofocus>
                </div>
                <div class="form-group">
                    <input type="int" name="stock" class="form-control" placeholder="Stock" autofocus>
                </div>
                
                <input type="submit" class="btn btn-success btn-block" name="save_product" value="Guardar Producto">
            </form>
        </div>

    </div>

    <div class="col-md-8">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            $query = "SELECT * FROM product";
            $result_product = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($result_product)) { ?>
                    <tr>
                        <td><?php echo $row['producto'] ?></td>
                        <td><?php echo $row['referencia'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['peso'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $row['id']?>">
                            EDITAR
                        </a>
                        <a href="delete_product.php?id=<?php echo $row['id']?>">
                            ELIMINAR
                        </a>
                        <a href="ventas.php?id=<?php echo $row['id']?>">
                            VENDER
                        </a>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
            </table>
    </div>

    </div>
</div>

    <?php include("includes/footer.php")?>