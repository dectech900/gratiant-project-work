<?php
$con = mysqli_connect("localhost","root","","gratian_db");

// Check connection
if($con){
  echo "Database connected";
}else{
  echo "Database not connected";
}
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }

?>