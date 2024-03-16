<?php
include 'connect.php';
session_start();

if(isset($_POST['submit'])){
      $user = $_POST['user'];
      $pass = $_POST['pass'];

      $select = "SELECT * FROM `chief` WHERE UserName='$user'";
      $result = mysqli_query($conn,$select);

      $res = mysqli_num_rows($result);

      if($res>0){
            while($row = mysqli_fetch_assoc($result)){
                  if($row['Password']== $pass){
                        $_SESSION['name'] = $_POST['user'];
                        header("location:home.php");
                  }else{
                        echo "<script>alert('Incorrect Password!')</script>";
                  }
            }
      }else{
            echo "<script>alert('User Not Found!')</script>";
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Saint Anne-Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
            body{
                  background-color: rgb(4, 4, 88);
            }
            form{
                  border: 1px solid #333;
                  color: white;
                  width: 400px;
                  box-shadow: 0px 0px 5px 10px rgba(0, 0, 0, 0.1);
                  margin-top: 60px;
                  margin-left: 500px;
                  margin-right: 500px;
                  border-radius: 10px;
                  padding: 20px;
            }
      </style>
</head>
<body>
            <form action="" method="post">
                  <center>
                  <h1>SAINT ANNE</h1>
                  <h2>Login</h2><hr>
                  </center>
                  <label>UserName</label><br>
                  <input class="form-control" type="text" name="user" placeholder="UserName" required><br>
                  <label>Password</label><br>
                  <input class="form-control" type="password" name="pass" placeholder="Password" required><br>
                  
                  <center><button class="btn btn-primary" type="submit" name="submit">LogIn</button></center required><br>
            </form>
      
      
</body>
</html>