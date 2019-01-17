<?php
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
  $conn = new mysqli("localhost","root","","project");
  $enroll = test_input($_POST['enroll']);
  $name = test_input($_POST['name']);
  $email = test_input($_POST['email']);
  $password = test_input($_POST['password']);
  $sql = "INSERT INTO students (id,name,email,password) values('$enroll','$name','$email','$password');";
  if($conn->query($sql))
  {
    echo "Yes";

  }
  else {
    echo "No";
  }
 ?>
