<?php
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;}
$conn = new mysqli("localhost","root","","project");
$enroll = test_input($_POST['enroll']);
$password = test_input($_POST['password']);

$sql = "select * from students where id='$enroll' and password='$password';";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  echo "Yes";
}
else {
  echo "No";
}


 ?>
