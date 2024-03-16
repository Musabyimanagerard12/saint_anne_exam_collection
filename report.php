<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['name'])){
      header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Report</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
      <?php
      include("dashboard.php");
      ?>
      <div class="right">
            <?php
            include 'connect.php';
// SQL query to fetch report data
$sql = "SELECT Products.ProductId, products.ProductName, 
               SUM(stock_in.quantity) AS stockinid, 
               SUM(Stock_out.quantity) AS stockoutid
        FROM products
        LEFT JOIN stock_in ON Products.ProductId = stock_in.ProductId
        LEFT JOIN stock_out ON Products.ProductId = stock_out.ProductId
        GROUP BY Products.ProductId";

$result = $conn->query($sql);

$conn->close();
?>

       <h1>Products Report</h1>
    <table class="table table-bordered table-hover table-stripped">
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Total Stocked In</th>
            <th>Total Stocked Out</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["ProductId"]."</td>";
                echo "<td>".$row["ProductName"]."</td>";
                echo "<td>".$row["stockinid"]."</td>";
                echo "<td>".$row["stockoutid"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
        }
        ?>
    </table>
      </div>
      
</body>
</html>