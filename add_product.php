<?php
include("connect.php");
session_start();
if(!isset($_SESSION['name'])){
      header("location:index.php");
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    
    $insert = "INSERT INTO products(ProductName) VALUES('$name')";
    $result = mysqli_query($conn,$insert);
    if($result){
        header("location:product.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add Product</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
            form{
                  color: white;
                  margin-top: 15%;
                  margin-left: 300px;
                  margin-right: 300px;
                  box-shadow: 0px 0px 5px 10px rgba(0, 0, 0, 0.1);
                  border-radius: 10px;
                  border: 1px solid #333;
                  padding: 20px;
            }
      </style>
</head>
<body>
      <?php
      include 'dashboard.php';
      ?>
      <div class="right">
      <form action="" method="post">
            <h2>Add Furniture</h2>
            <label>ProductName</label><br>
            <input type="text" class="form-control" name="name" placeholder="ProductName" required><br>

            <center><button class="btn btn-primary" type="submit" name="add">Add</button></center>
      </form>
      </div>
</body>
</html>