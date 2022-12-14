<?php
$con = new mysqli("localhost","root","","glasses_store");//connect to database "glasses_store"

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

mysqli_set_charset($con,"utf8"); //set charset utf8
?>