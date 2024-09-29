<?php
$conn_nttm = new mysqli("localhost","root","","nguyenthitrami-2210900041-project1");

// Check connection
if ($conn_nttm -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn_nttm -> connect_error;
  exit();
}
?>