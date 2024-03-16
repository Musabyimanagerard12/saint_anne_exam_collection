<?php
$conn = mysqli_connect('localhost', 'root','','saint_anne');

if(!$conn){
      die("Could not connect to Database".mysqli_connect_error());
}else{
      //echo "Database connected successfully";
}
?>