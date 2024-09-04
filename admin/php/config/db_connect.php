<?php 
#time zone
date_default_timezone_set('Asia/Kuala_Lumpur');

#database connection
$conn = mysqli_connect('localhost', 'root', '', 'preschool-mini-projek');

#check connection
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
} 
