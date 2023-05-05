<?php 

include("db.php");

if(isset($_POST['save_product'])){
    $producto = $_POST['producto'];
    $referen = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    
    $query = "INSERT INTO product(producto, referencia, precio, peso, categoria, stock) VALUES ('$producto', '$referen', '$precio', '$peso', '$categoria', '$stock')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Producto guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");


   
}



?>