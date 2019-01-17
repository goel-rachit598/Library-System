<?php
session_start();
//$posted = false;
$error = "";
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
  $conn = new mysqli("localhost","root","","project");
  $enroll = test_input($_POST['enroll']);
  $password = test_input($_POST['password']);

  $sql = "select * from students where id='$enroll' and password='$password';";
  $result = $conn->query($sql);
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if($result->num_rows > 0)
    {
      $_SESSION['id'] = $enroll;
      $_SESSION['password'] = $password;
      $sql_1 = "select name from students where id='$enroll';";
      $result = $conn->query($sql_1);
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $_SESSION['name'] = $name;
      header('location:http://localhost/Library-System-master/afterLoginH.php');
    }
    else
    {
      $error = "Wrong Password";
    }
  }
 ?>
