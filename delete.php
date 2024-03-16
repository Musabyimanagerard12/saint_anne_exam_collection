<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    
    $delete = "DELETE FROM products WHERE ProductId = '$id'";
    
    $result = mysqli_query($conn, $delete);
    
    if($result) {
        header("Location: product.php");
    }
}
?>
