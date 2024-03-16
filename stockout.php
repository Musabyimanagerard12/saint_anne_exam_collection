<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
      header("location:index.php");
}

if(isset($_POST['stockout'])) {
    $ProductName = $_POST['name'];
    $Date = $_POST['date'];
    $quantity = $_POST['quant'];

    $insert = "INSERT INTO `stock_out` (`ProductId`, `Date`, `Quantity`) VALUES ('$ProductName', '$Date', '$quantity')";
    $result = mysqli_query($conn,$insert,);

    if($result) {
        echo "<script>alert('Stockout successful');</script>";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Stockout</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
            form{
                  margin-top: 12%;
                  color: white;
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
            <h2>Stockout</h2>
            <label>ProductName</label><br>
            <select class="form-select" name="name">
            <?php
            include 'connect.php';
            $select = "SELECT ProductId, ProductName FROM Products";
            $result = mysqli_query($conn,$select);
            echo "<option value='' selected disabled>--Select ProductName--</option>";

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['ProductId']."'>".$row['ProductName']."</option>";
            }
        } 
            ?>
            </select><br>
            <label>Date</label><br>
            <input type="date" class="form-control" name="date" required><br>
            <label>Quantity</label><br>
            <input type="text" class="form-control" name="quant" placeholder="Quantity" required><br>

            <center><button class="btn btn-primary" type="submit" name="stockout">Stockout</button></center>
      </form>
      </div>
</body>
</html>